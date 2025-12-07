<?php

function processResetRequest()
{
  $emailTags = [];
  global $pageHeading, $moduleContent, $message, $company, $companyEmail;

  $pageHeading = "Reset Password";

  $token = requestVar('token');
  $key   = requestVar('key');

  $requestTimeLapse = ceil((time() - $key) / 60);
  $isValidRequestTime = isTimestamp($key);

  $userDetail =  getUserDetailBySHAToken($token);

  $isValidToken = !empty($userDetail);

  // If the reset link is not expired
  if ($isValidToken && ($isValidRequestTime && $requestTimeLapse <= 120)) {
      // Process submit: Update old password
      $isValidCaptcha  = Helper::validateImageCaptcha();
      $newPassword     = trim(filter_input(INPUT_POST, 'new_password'));
      $confirmPassword = trim(filter_input(INPUT_POST, 'confirm_new_password'));
      $isValidPassword = validatePassword($newPassword, $confirmPassword);
      $errorMsg = '';
      if(!$isValidCaptcha || !$isValidPassword) {
        if (!$isValidCaptcha) {
          $errorMsg = '<p><strong> <i class="glyphicon glyphicon-info-sign"></i> Invalid captcha provided. </strong></p>';
        }
        if (!$isValidPassword) {
          $errorMsg .= '<p><strong> <i class="glyphicon glyphicon-info-sign"></i> Invalid or mismatched password provided. </strong></p>';
        }
        if (strlen($newPassword) < 6 || strlen($confirmPassword) < 6) {
          $errorMsg .= '<p><strong><i class="glyphicon glyphicon-info-sign"></i> Password should have minimum 6 letters.</strong></p>';
        }

        if(!empty($errorMsg)){
          $moduleContent = '<div class="alert alert-danger">'.$errorMsg.'</div>';
          displayResetView();
        }
      } else {
        updateRow(['user_pass' => sha1($newPassword)], 'cms_users', "WHERE SHA1(`user_id`) = '{$token}'");
        $userAuthObj = new UserAuthentication();
        $userAuthObj->userEmail = $userDetail['user_email'];
        $userAuthObj->whitelistUser();

        $message = 'Please use the new password to log in now.';

        $resetPasswordUrl = ADMIN_BASE_URL . "/?do=forget&action=request";
        $cmsLoginUrl      = ADMIN_BASE_URL;

        $emailTags['subject']         = "Your password has been changed";
        $emailTags['company_name']    = $company;
        $emailTags['reset_url']       = $resetPasswordUrl;
        $emailTags['login_url']       = $cmsLoginUrl;

        $emailTags = array_merge($userDetail, $emailTags);
        $emailTemplatePath = ADMIN_BASE_PATH . "/templates/email/reset_password_success.tmpl";

        $isEmailSent = Emailer::sendEmail($emailTags, $emailTemplatePath, $userDetail['user_email'], $companyEmail);

        $message = $isEmailSent ? "Password has been changed." : "Couldn't changed password. Please try again later";

        $moduleContent = '
          <div class="lform-wrapper">
            <div class="col-xs-12 well well-small">
              <fieldset>
                <legend>'.$pageHeading.'</legend>
                <div class="alert alert-success">
                  The password for the account with the email address <strong>'.$userDetail['user_email'].'</strong> has been changed.
                </div>
                <p class="text-center" style="margin-top: 30px;"><a href="'.ADMIN_BASE_URL.'" class="btn btn-default">Return To Login</a></p>
              </fieldset>
              <hr>
              <div>
                <p id="licence-info">
                  <img src="'.ADMIN_BASE_URL.'/images/resbook-icon.png" alt="ResBook" style="float:right;margin:-3px 0 0 10px;width:47px;">
                  <strong>Netzone CMS &copy; <a target="_blank" href="https://www.resbook.com/tourism-websites">ResBook</a> 2009 - '.date('Y').'.</strong><br>
                  <span>Powered By Netzone CMS</span><br>
                  <span>This application is licensed to '.$company.'.</span>
                  <span class="clear"></span>
                </p>
              </div>                    
            </div>
          </div>';
      }
  }
}

function resetLinkExpiredView(): string
{
  global $pageHeading;

  return '<div class="lform-wrapper">
    <div class="col-xs-12 well well-small">
      <fieldset>
        <legend>'.$pageHeading.'</legend>
        <div class="alert alert-danger">
          <i class="glyphicon glyphicon-info-sign"></i> Reset password link is expired or invalid.
        </div>
        <p class="text-center" style="margin-top: 30px;"><a href="'.ADMIN_BASE_URL.'" class="btn btn-default">Return To Login</a></p>
      </fieldset>  
      <hr>
      <div>
        <p id="licence-info">
          <img src="'. ADMIN_BASE_URL . '/images/resbook-icon.png" alt="ResBook" style="float:right;margin:-3px 0 0 10px;width:47px;">
          <strong>Netzone CMS &copy; <a target="_blank" href="https://www.resbook.com/tourism-websites">ResBook</a> 2009 - '.date('Y').'.</strong><br>
          <span>Powered By Netzone CMS </span><br>
          <span>This application is licensed to '.$company.'.</span>
          <span class="clear"></span>
        </p>
      </div>                    
    </div>
  </div>';
}

function getUserDetailBySHAToken($token)
{
  return fetchRow("
    SELECT `user_id`, 
      TRIM(CONCAT(`user_fname`, ' ', `user_lname`)) AS full_name, 
      `user_fname`,
      `user_lname`, 
      `user_email`, 
      `last_login_date`, 
      `access_id`
    FROM `cms_users`
    WHERE SHA1(`user_id`) = '{$token}'
    LIMIT 1");
}

function isTimestamp($timestamp)
{
  $check = (is_int($timestamp) || is_float($timestamp))
    ? $timestamp
    : (string) (int) $timestamp;

  return  ($check === $timestamp)
    && ( (int) $timestamp <=  PHP_INT_MAX)
    && ( (int) $timestamp >= ~PHP_INT_MAX);
}

function validatePassword($newPassword, $confirmPassword)
{
  return (
    hash('sha512', sha1(md5((string) $newPassword))) === hash('sha512', sha1(md5((string) $confirmPassword)))
    && !empty($newPassword)
    && !empty($confirmPassword)
    && strlen((string) $newPassword) > 5
  );
}

function displayResetView()
{
  global $moduleContent;

  $token = requestVar('token');
  $key   = requestVar('key');

  $requestTimeLapse = ceil((time() - $key) / 60);
  $isValidRequestTime = isTimestamp($key);

  $moduleContent = $isValidRequestTime && $requestTimeLapse <= 120 ? resetView() : resetLinkExpiredView();

}

function resetView() {

  global $moduleContent, $pageHeading, $company;

  $token = requestVar('token');
  $userDetail =  getUserDetailBySHAToken($token);

  if($userDetail) {
    return '<div class="lform-wrapper">
    '.$moduleContent.'
      <div class="col-xs-12 well well-small forgot-password-form">
        <form method="post" action="" id="forgot">
          <fieldset>
            <legend>'.$pageHeading.'</legend>
            <div class="form-group">
              <label for="user-log">New Password</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                <input class="form-control" name="new_password" type="password" maxlength="15" id="new_password" autofocus>
              </div>
            </div>
            <div class="form-group">
              <label for="user-log">Confirm New Password</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                <input class="form-control" name="confirm_new_password" type="password" maxlength="15" id="confirm_new_password" autofocus>
              </div>
            </div>
            <div class="form-group">
              <label for="captcha-inp">Captcha</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></div>
                <input type="text" placeholder="Please enter the text you see below" value="" name="spam-control" id="captcha-inp" class="form-control" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <div style="margin:10px 0;"><img src="/captcha.jpg" alt="spam control image" id="anti-spam"></div>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" value="forgot-password" class="btn btn-default">
                  Reset Password <i class="glyphicon glyphicon-log-in" style="margin-top:1px;vertical-align:text-top;"></i>
              </button>
              <input type="hidden" name="action" value="process-reset">
              <input type="hidden" name="do" value="forget">
              <a href="'.ADMIN_BASE_URL.'" class="btn__link">Return to Login</a>
            </div>
          </fieldset>  
        </form>         
        <hr>
        <div>
          <p id="licence-info">
            <img src="'.ADMIN_BASE_URL.'/images/resbook-icon.png" alt="ResBook" style="float:right;margin:-3px 0 0 10px;width:47px;">
            <strong>Netzone CMS &copy; <a target="_blank" href="https://www.resbook.com/tourism-websites">ResBook</a> 2009 - '.date('Y').'.</strong><br>
            <span>Powered By Netzone CMS</span><br>
            <span>This application is licensed to '.$company.'.</span>
            <span class="clear"></span>
          </p>
        </div>                    
      </div>
    </div>';
  } else {
    return '<div class="lform-wrapper">
    '.$moduleContent.'
      <div class="col-xs-12 well well-small forgot-password-form">
        <form method="post" action="" id="forgot">
          <fieldset>
            <div>Something wrong with the page you are visiting.</div>
          </fieldset>  
        </form>         
      </div>
    </div>';
  }
}