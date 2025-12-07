<?php

/**
 * NETZONE CMS Class to validate user login and do respective process.
 * File to process Login functionality
 *
 * @package    NetZone Base CMS 2.0
 * @author     Brian Walker, Tomahawk Brand Management
 * @author     Sam Walsh, Tomahawk Brand Management
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 2.0
 */
class UserAuthentication
{
    /**
     * @var var - Sets user email address
     */
    public $userEmail = '';

    /**
     * @var var - Sets user password
     */
    public $userPassword = '';

    /**
     * @var var - Sets path for Log file
     */
    public $logFilePath = '';

    /**
     * @var var - Sets path for Log file
     */
    public $isValidSession = FLAG_NO;

    /**
     * Do
     *
     * @param void
     *
     * @return mixed
     */

    public function doLogin()
    {

    }

    /**
     * Do
     *
     * @param void
     *
     * @return mixed
     */
    public function isUserLocked($byIp = false)
    {
        $username = sanitizeOne($this->userEmail, 'sqlsafe');

        $isDisabled       = true;
        $maxLoginAttempts = 4;
        $loginTimeDisabled   = 1; // In hours
        $maxDisabledHours = ($maxLoginAttempts);
        $ipAddress        = getenv("REMOTE_ADDR");

        $blockedUser = fetchRow("SELECT `id`, 
            `first_failed_attempt_on`, 
            `failed_login_attempt_count`, 
            `date_updated`, 
            `is_disabled`,
            `disabled_on`, 
            `username`, 
            `recent_login_attempt_on`, 
            `failed_hour_count`, 
            `total_failed_attempt`, 
            `is_notified`
            FROM `cms_blacklist_user`
            WHERE " . (($byIp) ? "`ip_address` = '{$ipAddress}'"
                : "`username` = '{$username}'") . "
            LIMIT 1");

        if (!empty($blockedUser)) {

            if ($blockedUser['is_disabled']) {
                $id                   = $blockedUser['id'];
                $recentLoginAttemptOn = $blockedUser['recent_login_attempt_on'];
                $isNotified           = $blockedUser['is_notified'];
                $totalFailedAttempt   = $blockedUser['total_failed_attempt'];
                $failedHourCount      = $blockedUser['failed_hour_count'];
                $blockedUsername      = $blockedUser['username'];

                $isDisabled = (bool) $blockedUser['is_disabled'];

                $currentDateTime     = new DateTime();
                $lastAttemptDateTime = new DateTime($recentLoginAttemptOn);

                $differenceHour = $currentDateTime->diff($lastAttemptDateTime)->h;

                //max time already done
                if ($failedHourCount >= $maxDisabledHours) {
                    if (!$isNotified) {
                        $adminEmail = fetchValue("SELECT `set_admin_email` 
                            FROM `general_settings` 
                            WHERE `site_id` = '" . SITE_ID . "' 
                            LIMIT 1");

                        $adminEmail = $adminEmail ?: 'riskresponseteam@tomahawk.co.nz';

                        $firstFailedAttemptOn = new DateTime($blockedUser['first_failed_attempt_on']);

                        $emailSubject = "Urgent: Login attempts failed on " . BASE_URL . " website.";
                        $emailMessage = 'IP Address: ' . getenv('REMOTE_ADDR')
                            . ' is trying to login and we already have total '
                            . $totalFailedAttempt . ' failed attempts with user id:'
                            . $blockedUsername . " on website: "
                            . BASE_URL . " very first failed attempt was on "
                            . $firstFailedAttemptOn->format('d M Y h:i:s')
                            . " \n Please have a look.";

                        if (mail((string) $adminEmail, $emailSubject, $emailMessage)) {
                            runQuery("UPDATE `cms_blacklist_user` 
                                SET `is_notified` = 1 
                                WHERE `id` = '{$id}' 
                                LIMIT 1");
                        }
                    }
                } elseif ($differenceHour > $loginTimeDisabled) {
                    //reset count after 1 hour
                    runQuery("UPDATE `cms_blacklist_user` 
                            SET `failed_login_attempt_count` = 0, 
                                `recent_login_attempt_on` = NOW(),
                                `is_disabled` = 0, 
                                `disabled_on` = NULL, 
                                `failed_hour_count` = (`failed_hour_count` + 1)
                            WHERE `id` = '{$id}'
                            LIMIT 1");
                    $isDisabled = false;
                } else {
                    $isDisabled = true;
                }
            } else {
                $isDisabled = false;
            }

        } else {
            $isDisabled = false;
        }

        return $isDisabled;
    }

    /**
     * Do
     *
     * @param void
     *
     * @return mixed
     */
    public function validateUser()
    {
        $sql = "SELECT `user_id`, 
            `user_fname`, 
            `user_lname`, 
            `user_email`, 
            `last_login_date`, 
            `access_id`
          FROM `cms_users`
          WHERE `user_email` = '" . $this->userEmail . "'
          AND `user_pass` = SHA1('" . $this->userPassword . "')
          LIMIT 1";

        $userData = fetchRow($sql);
        if (!empty($userData)) {

            $isValidSession = FLAG_YES;

            $userId = $userData['user_id'];

            /** get data for last loggedin user */
            $lastLoggedinUser = fetchRow("SELECT `user_id`, 
                CONCAT(`user_fname`, ' ', `user_lname`) AS full_name, 
                `last_login_date`
                FROM `cms_users`
                WHERE `last_login_date` = (
                    SELECT MAX(`last_login_date`) FROM `cms_users` LIMIT 1
                )");

            $userData['last_user_loggedin'] = $lastLoggedinUser;

            /** Update last login date for the user */

            runQuery("UPDATE `cms_users` 
                SET `last_login_date` = '" . date('Y-m-d H:i:s') . "' 
                WHERE `user_id` = '{$userId}' LIMIT 1");

            /** Whitelist User if Blacklisted */
            $this->whitelistUser();

        } else {
            $isValidSession = FLAG_NO;
            $this->blacklistUser($this->userEmail);
        }

        /** Log User Login Attempt */
        $this->logFilePath    = ADMIN_BASE_PATH . DS . '_login_logs';
        $this->isValidSession = $isValidSession;
        $this->logLoginAttempts($isValidSession, $userData);

        return $userData;
    }

    /**
     * Check if valid user session is available
     *
     * @param void
     *
     * @return var
     */
    public function checkValidSession()
    {
        $isValidSession = FLAG_YES;

        if (!isset($_SESSION['s_user_id'])) {

            $isValidSession = FLAG_NO;

        }

        return $isValidSession;
    }

    /**
     * Record login attempts
     *
     * @param void
     *
     * @return void
     */
    private function logLoginAttempts($isValidSession, $userData)
    {
        $loginAttemptArr = [];
        ($logFileHandler = fopen($this->logFilePath, "a+")) || die("Some error occured!");

        $logText = 'Date: ' . Helper::getCurrentDateTimeStr();
        $logText .= ', IP Address: ' . getenv('REMOTE_ADDR');
        $logText .= ', Email Address: ' . $this->userEmail;
        $logText .= ($this->isValidSession == FLAG_NO) ? ', Password:'
            . $this->userPassword : '';
        $logText .= ($this->isValidSession == FLAG_YES) ? ', Status: Success'
            : ', Status: Failed';

        file_put_contents($this->logFilePath, $logText . PHP_EOL, FILE_APPEND);
        fclose($logFileHandler);

        $loginAttemptArr['username']      = ($isValidSession == FLAG_YES) ? $userData['user_email'] : requestVar('log');
        $loginAttemptArr['access_key']    = ($isValidSession == FLAG_NO) ? requestVar('key') : '';
        $loginAttemptArr['is_successful'] = ($isValidSession == FLAG_YES) ? 'Y' : 'N';
        $loginAttemptArr['ip_address']    = getenv('REMOTE_ADDR');
        $loginAttemptArr['record_date']   = date('Y-m-d H:i:s');

        insertRow($loginAttemptArr, 'cms_login_attempt');
    }

    /**
     * Record login attempts
     *
     * @param void
     *
     * @return void
     */
    public function whitelistUser()
    {
        $state    = false;
        $username = trim($this->userEmail);
        if (!empty($username)) {
            $sql = "DELETE FROM `cms_blacklist_user` WHERE `username` = '{$username}' LIMIT 1";
            if (runQuery($sql)) {
                $state = true;
            }
        }
        return $state;
    }

    private function blacklistUser($rawEmail)
    {
        $arrBlacklistUser = [];
        $maxLoginAttempts     = 4;
        $timeLoginDisabled    = 1;     // In hours
        $maxTimeLoginDisabled = 24;    // In hours
        $maxDisabledHours     = ($maxLoginAttempts);
        $processFurther       = false;
        $ipAddress            = getenv('REMOTE_ADDR');

        $rawEmail = trim(filter_var($rawEmail, FILTER_SANITIZE_EMAIL));

        if($rawEmail === '' || $rawEmail === '0') return $processFurther;

        $blockedUser = fetchRow("SELECT `id`, 
            `first_failed_attempt_on`, 
            `failed_login_attempt_count`, 
            `is_disabled`, 
            `disabled_on`, 
            `username`, 
            `recent_login_attempt_on`, 
            `failed_hour_count`, 
            `total_failed_attempt`, 
            `is_notified`
          FROM `cms_blacklist_user`
          WHERE `username` = '" . sanitizeOne($rawEmail, 'sqlsafe') . "'");


        if($blockedUser)
        {
            $id                      = $blockedUser['id'];
            $failedLoginAttemptCount = $blockedUser['failed_login_attempt_count'];
            $recentLoginAttemptOn    = $blockedUser['recent_login_attempt_on'];
            $isDisabled              = $blockedUser['is_disabled'];
            $failedHourCount         = $blockedUser['failed_hour_count'];

            $currentDateTimeObj         = new DateTime();
            $latestAttemptOnDateTimeObj = new DateTime($recentLoginAttemptOn);

            $differenceHour = $currentDateTimeObj->diff($latestAttemptOnDateTimeObj)->h;

            if(($differenceHour >= $timeLoginDisabled) || !$isDisabled)
            {
                if ($differenceHour >= $maxTimeLoginDisabled) {
                    runQuery("UPDATE `cms_blacklist_user` 
                        SET `failed_login_attempt_count` = 1, 
                            `total_failed_attempt` = (`total_failed_attempt` + 1), 
                            `recent_login_attempt_on` = NOW(), 
                            `is_disabled` = 0, 
                            `disabled_on` = NULL, 
                            `failed_hour_count` = 0, 
                            `ip_address` = '{$ipAddress}'
                        WHERE `id` = '{$id}'
                        LIMIT 1");
                } elseif ($failedLoginAttemptCount < $maxLoginAttempts) {
                    // if login is unsuccessful but login attempt(s) are less than max login attempts
                    runQuery("UPDATE `cms_blacklist_user` 
                            SET `failed_login_attempt_count` = (`failed_login_attempt_count` + 1), 
                                `total_failed_attempt` = (`total_failed_attempt` + 1), 
                                `recent_login_attempt_on` = NOW(), 
                                `ip_address` = '{$ipAddress}'
                            WHERE `id` = '{$id}'
                            LIMIT 1");
                } elseif ($differenceHour < $timeLoginDisabled) {
                    // If login attempts are reached the max login attempts limit, Something is not right here and it is time to block the login proccess
                    // If last try was within 1 hour
                    runQuery("UPDATE `cms_blacklist_user` 
                                SET `failed_login_attempt_count` = (`failed_login_attempt_count` + 1), 
                                    `total_failed_attempt` = (`total_failed_attempt` + 1), 
                                    `recent_login_attempt_on` = NOW(), 
                                    `is_disabled` = 1, 
                                    `disabled_on` = NOW(), 
                                    `ip_address` = '{$ipAddress}'
                                WHERE `id` = '{$id}'
                                LIMIT 1");
                } elseif ($failedHourCount < $maxDisabledHours) {
                    //max time not done
                    runQuery("UPDATE `cms_blacklist_user` 
                                    SET `failed_login_attempt_count` = 1, 
                                        `total_failed_attempt` = (`total_failed_attempt` + 1), 
                                        `recent_login_attempt_on` = NOW(), 
                                        `is_disabled` = 0, 
                                        `disabled_on` = NULL, 
                                        `failed_hour_count` = (`failed_hour_count` + 1),
                                        `ip_address` = '{$ipAddress}'
                                    WHERE `id` = '{$id}'
                                    LIMIT 1");
                } else {
                    runQuery("UPDATE `cms_blacklist_user` 
                                    SET `total_failed_attempt` = (`total_failed_attempt` + 1), 
                                        `recent_login_attempt_on` = NOW(), 
                                        `is_disabled` = 1, 
                                        `disabled_on` = NOW(), 
                                        `ip_address` = '{$ipAddress}'
                                    WHERE `id` = '{$id}'
                                    LIMIT 1");
                }
            }
        } else {

            $now = date('Y-m-d H:i:s');

            $arrBlacklistUser['first_failed_attempt_on']    = $now;
            $arrBlacklistUser['failed_login_attempt_count'] = 1;
            $arrBlacklistUser['username']                   = $rawEmail;
            $arrBlacklistUser['recent_login_attempt_on']    = $now;
            $arrBlacklistUser['total_failed_attempt']       = 1;
            $arrBlacklistUser['ip_address']                 = $ipAddress;

            insertRow($arrBlacklistUser, 'cms_blacklist_user');
        }
    }
}