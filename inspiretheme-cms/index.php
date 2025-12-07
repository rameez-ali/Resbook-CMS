<?php
/**
 * @package    NetZone Base CMS 2.0
 * @author     Sam Walsh, Tomahawk Brand Management
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */

/** Remove warning message PHP 8.0 */
error_reporting(E_ERROR | E_PARSE);

 /** Include Required Files */
require_once ('../utility/config.php');


if (!$cConnection->Connect()) {

  echo "Database connection failed";
  exit();

}


/** Get the query string and split the name value pairs */

if(isset($_POST['do']) || isset($_GET['do']) ) {
  $do          = getNullIfEmpty(sanitizeCallback(requestVar('do')));
} else {
  $do          = '';
} 

if(isset($_POST['s_user_id']) || isset($_GET['s_user_id'])) {
  $userSession = getNullIfEmpty(sanitizeVar($_SESSION['s_user_id'], FILTER_VALIDATE_INT));
}
if(isset($_POST['action'])) {
  $action      = getNullIfEmpty(sanitizeCallback(requestVar('action'))); 
}
if(isset($_POST['id']) || isset($_GET['id'])) {
  $id          = getNullIfEmpty(sanitizeVar(requestVar('id'), FILTER_VALIDATE_INT));
}
if(isset($_POST['disableMenu'])) {
  $disableMenu = (requestVar('disableMenu') == 'true') ? true : false;
}

$jsVars      = [];
$loginCls    = '';

$companyData = fetchRow("SELECT `company_name`, 
          `email_address`, 
          `phone_number`, 
          `address`,
          `rptoken`,
          `rptoken_createdat`
          FROM `general_settings`
          LIMIT 1");

$companyEmail = explode(';', str_replace(["\r", "\n", "\t"], '', (string) $companyData['email_address']));
$companyEmail = (!empty($companyEmail)) ? $companyEmail[0] : '';
$company  = $companyData['company_name'] ?: '';
$rpAccessToken = $companyData['rptoken'];
$rpTokenCreatedDate = $companyData['rptoken_createdat'];

/** Include login module and check for valid session */
require_once MODULES_DIR.DS.'login'.DS.'index.php';

initLoginMain();


/** Get CMS settings and convert it to variables */
$mainPageContent = "";

$settingsResult = fetchAll("SELECT `cmsset_name`,
    `cmsset_value`
  FROM `cms_settings`
  WHERE `cmsset_status` = 'A'");    

foreach ($settingsResult AS $row) {

  ${$row['cmsset_name']} = $row['cmsset_value'];

}

/* user has logged in and has a valid login session */
if (!empty($do)) {
  if($isValidSession == FLAG_YES)
  {
    define('USER_ID',    $_SESSION['s_user_id']);
    define('USER_FNAME', $_SESSION['s_user_fname']);
    define('USER_LNAME', $_SESSION['s_user_lname']);
    define('USER_EMAIL', $_SESSION['s_user_email']);
    define('ACCESS_ID',  $_SESSION['s_access_id']);

    $access_arr = fetchRow("SELECT *
    FROM cms_accessgroups
    WHERE access_id = '".ACCESS_ID."'");

    require_once 'access.php';

    $module_path = MODULES_DIR.DS.$do.DS.'index.php';

    if($do == "refundprotect") {
      
      global $rpAccessToken, $company, $rpApiUrl;

        if(empty($rpAccessToken)) {
          
            $objrpOauth = new RefundApiOauth();
            $rpAccessToken = $objrpOauth->RefundProtectOauth();
            $now = Helper::getCurrentDateTimeStr();
            $arrSettings = [];
            $arrSettings['rptoken']           = $rpAccessToken;            
            $arrSettings['rptoken_createdat'] = $now;                    
            updateRow($arrSettings, 'general_settings', "WHERE `id` = '1' LIMIT 1");
            
        }else {
          
            $now = Helper::getCurrentDateTimeStr();                
            $rpTokenCreatedDateObj = new DateTime($rpTokenCreatedDate);
            $currentDateObj   = new DateTime($now);
            $date_diff = $rpTokenCreatedDateObj->diff($currentDateObj);
      
            if($date_diff->days >=365) {

              $objrpOauth = new RefundApiOauth();
              $rpAccessToken = $objrpOauth->RefundProtectOauth();            
              $arrSettings = []; 
              $arrSettings['rptoken']           = $rpAccessToken;             
              $arrSettings['rptoken_createdat'] = $now;      
              updateRow($arrSettings, 'general_settings', "WHERE `id` = '1' LIMIT 1");
            }else {  
                       
              $rpAccessToken = $companyData['rptoken'];            
            }    
        }                
    } 

    /**
     * Get the include file from the do variable, load it in
     * and run the main subroutine.
     */

    if (file_exists($module_path) && !is_dir($module_path)) {

      require_once $module_path;

      initMain();

    } else {

      die('<pre>#Invalid request</pre>');

    }
  }
} else {
  Helper::redirect(ADMIN_BASE_URL . '/?do=login');
}

require "resultPage.php"; 
echo $resultPageContent;
exit();

