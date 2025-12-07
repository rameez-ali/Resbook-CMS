<?php

function getUserDetailByEmail($rawEmail)
{
  return fetchRow("SELECT `user_id`, 
        TRIM(CONCAT(`user_fname`, ' ', `user_lname`)) AS full_name, 
        `user_fname`, 
        `user_lname`, 
        `user_email`, 
        `last_login_date`, 
        `access_id`
        FROM `cms_users`
        WHERE `user_email` = '{$rawEmail}'
        LIMIT 1");
}

function displayForgetView()
{
  global $moduleContent, $pageHeading, $rawEmail, $company, $message;
  if(!empty($message))
  {
    $moduleContent .= '<div class="alert alert-danger">
      <strong>
        <i class="glyphicon glyphicon-remove-sign" 
          style="font-size:15px;vertical-align:text-top;margin:-2px 4px 0 0;"></i>
        '.$message.'
      </strong>
    </div>';
  }
  $moduleContent = '
      <div class="lform-wrapper">
      ' . $moduleContent . '
        <div class="col-xs-12 well well-small forgot-password-form">
          <form method="post" action="'.ADMIN_BASE_URL.'/?do=forget&action=process-retrieve" name="forgot">
            <fieldset>
              <legend>' . $pageHeading . '</legend>
              <p>Fear not. We’ll email you instructions to reset your password.</p>
              <div class="form-group">
                <label for="user-log">Email Address</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
                    <input class="form-control" name="email-address" type="text" id="email-address" autofocus value="'.$rawEmail.'">
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
                <input name="do" type="hidden" value="forget">
                <input name="action" type="hidden" value="process-retrieve">
                <a href="' . ADMIN_BASE_URL . '" class="btn__link">Return to Login</a>
              </div>
            </fieldset>  
          </form>         
          <hr>
          <div>
            <p id="licence-info">
              <img src="' . ADMIN_BASE_URL . '/images/resbook-icon.png" alt="ResBook" style="float:right;margin:-3px 0 0 10px;width:47px;">
              <strong>Netzone CMS &copy; <a target="_blank" href="https://www.resbook.com/tourism-websites">ResBook</a> 2009 - ' . date('Y') . '.</strong><br>
              <span>Powered By Netzone CMS</span><br>
              <span>This application is licensed to ' . $company . '.</span>
              <span class="clear"></span>
            </p>
          </div>                    
        </div>
      </div>';
}

function processRetrieveRequest($rawEmail, $isValidCaptcha) {
  global $message;

  if(!empty($rawEmail) && $isValidCaptcha)
  {
    $userDetails = getUserDetailByEmail($rawEmail);

    if(!empty($userDetails))
    {
      sendResetPasswordEmail($userDetails);
    } else {
      $message = "User with this email address does not exist.";
      displayForgetView();
    }
  } else {
    $message = "Please check the email and captcha.";
    displayForgetView();
  }
}

function sendResetPasswordEmail($userDetails)
{
  $emailTags = [];
  global $message, $moduleContent, $companyEmail, $company;

  require_once CLASS_DIR_PATH . '/Emailer.class.php';

  $keyTime = time();
  $token   = sha1((string) $userDetails['user_id']);

  $resetPasswordUrl = ADMIN_BASE_URL."/?do=forget&action=reset&token=".$token."&key=".$keyTime;

  $emailTags['email_subject'] = "Reset Password";
  $emailTags['subject']       = "Forgot your password? Let's get you a new one.";
  $emailTags['company_name']  = $company;
  $emailTags['reset_url']     = $resetPasswordUrl;

  $emailTags = array_merge($userDetails, $emailTags);
  $emailTemplatePath = ADMIN_TEMPLATE_DIR_PATH.'/email/reset_password.tmpl';

  $isEmailSent = Emailer::sendEmail($emailTags, $emailTemplatePath, $userDetails['user_email'], $companyEmail);

  if( $isEmailSent )
  {
    $message = "Reset password instructions sent";
    $pageHeading = "Password reset email has been sent.";
    $moduleContent = '
        <div class="lform-wrapper">
          <div class="col-xs-12 well well-small">
            <fieldset>
              <legend>'.$pageHeading.'</legend>
              <div class="alert alert-success">
                  We\'ve sent an email to <strong>'.$userDetails['user_email'].'</strong> with password reset instructions.
              </div>
              <p>If the email doesn\'t show up soon, check your spam folder. </p>
              <p class="text-center" style="margin-top: 30px;"><a href="'.ADMIN_BASE_URL.'" class="btn btn-default">Return To Login</a></p>
            </fieldset>  
            <hr>
            <div>
              <p id="licence-info">
                <img src="'. ADMIN_BASE_URL . '/images/resbook-icon.png" alt="ResBook" style="float:right;margin:-3px 0 0 10px;width:47px;">
                <strong>Netzone CMS &copy; <a target="_blank" href="https://www.resbook.com/tourism-websites">ResBook</a> 2009 - '.date('Y').'</strong><br>
                <span>Powered By Netzone CMS</span><br>
                <span>This application is licensed to '.$company.'.</span>
                <span class="clear"></span>
              </p>
            </div>                    
          </div>
        </div>';
  } else {
    $message = "Couldn't send reset password instructions. Please try again later";
  }
}

