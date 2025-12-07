<?php
/**
 * NETZONE CMS LOGIN MODULE.
 * File to check valid user login and process login
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


function doLogin()
{
  global $do, $action, $actionView, $message, $template, $moduleContent, $locked, $loginCls, $objUserAuthentication, 
  $isValidSession;

  $locked          = '0';
  $rawEmail = isset($_POST['log']) || isset($_GET['log']) ? requestVar('log') : '';
  $rawPassword = isset($_POST['key']) || isset($_GET['key']) ? requestVar('key') : '';
  

  ## Get login form variables
  $email          = validateInput('log', FILTER_VALIDATE_EMAIL);
  $password       = validateInput('key', FILTER_SANITIZE_ADD_SLASHES);

  $captchaIsValid = Helper::validateImageCaptcha();

  $objUserAuthentication->userEmail     = $email;
  $objUserAuthentication->userPassword  = $password;

  $userIsLocked = $objUserAuthentication->isUserLocked();

  if (!$userIsLocked)
  {
    if(isset($_POST['submit']) || isset($_GET['submit']))
    {
      if (!empty($email) && !empty($password) && strlen((string) $password) > 5 && $captchaIsValid )
      {
        $userData = $objUserAuthentication->validateUser();
        if (!empty($userData))
        {
          $_SESSION['s_user_id']    = $userData['user_id'];
          $_SESSION['s_user_fname'] = $userData['user_fname'];
          $_SESSION['s_user_lname'] = $userData['user_lname'];
          $_SESSION['s_user_email'] = $userData['user_email'];
          $_SESSION['s_access_id']  = $userData['access_id'];
          $_SESSION['last_user_loggedin'] = $userData['last_user_loggedin'];

          $forceAction = validateInput('force-action', FILTER_SANITIZE_STRING);
          $forceDo     = validateInput('force-do', FILTER_SANITIZE_STRING);
          $forceId     = validateInput('force-id', FILTER_VALIDATE_INT);
          $redirectTo  = ADMIN_BASE_URL . "/index.php";

          if ((!empty($forceDo) || (!empty($forceAction) && !empty($forceId))) && !empty($forceDo)) {
              $redirectTo .= "/?do={$forceDo}";
              if (!empty($forceAction) && !empty($forceId)) {
                $redirectTo .= "&action={$forceAction}&id={$forceId}";
              }
          }

          Helper::redirect($redirectTo);

        } else {
          $message = "Please correct the password and try again.";
        }
      } else {
        $message = "Invalid login, password or captcha";
      }
    }

  } else {
    $message = "The user is locked. Please reset your password and try again.";
  }

  if (!empty($message))
  {
    $moduleContent .= '<div class="alert alert-danger">
      <strong>
        <i class="glyphicon glyphicon-remove-sign" 
          style="font-size:15px;vertical-align:text-top;margin:-2px 4px 0 0;"></i>
        '.$message.'
      </strong>
    </div>';
    $loginCls = ' invalid';
  }
}

