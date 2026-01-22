<?php
function displayLoginScreen()
{
  global $pageHeading, $moduleContent, $loginCls, $company;

  $ipAddress = getenv('REMOTE_ADDR');

  $isBlocked = fetchValue("SELECT `id` 
      FROM `cms_blacklist_user` 
      WHERE `ip_address` = '{$ipAddress}' 
        AND `is_disabled` = 1");

  $isBlocked = false;

  if (!$isBlocked) {
    
    $year        = date('Y');
    $pageHeading = "Welcome to NetZone website administration.";

    /** Check and generate force redirection url. */

    $action = validateInput('action', FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'get');
    $do     = validateInput('do', FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'get');
    $id     = validateInput('id', FILTER_VALIDATE_INT, 'get');
  

    $forceDo = $forceAction = $forceId = '';

    if ($do && $do != 'login' && $do != 'logout') {

      $forceDo     = $do;
      $forceAction = $action;
      $forceId     = $id;

    }
    
    $redirectTo = ADMIN_BASE_URL."/index.php";

    if ((!empty($forceDo) || ( !empty($forceAction) && !empty($forceId))) && !empty($forceDo)) {
        $redirectTo .= "/?do={$forceDo}";
        if(!empty($forceAction) && !empty($forceId)) {

          $redirectTo .= "&action={$forceAction}&id={$forceId}";

        }
    }

    $moduleContent = '<div class="lform-wrapper">
        '.$moduleContent.'
        <div class="col-xs-12 well well-small login-form '.$loginCls.'">
          <form method="post" action="'.$redirectTo.'" name="login" id="login">
            <fieldset>
              <legend>'.$pageHeading.'</legend>
              <div class="form-group">
                <label for="user-log">Username</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                  <input class="form-control" name="log" type="text" id="user-log" autofocus>
                </div>
              </div>
              <div class="form-group">
                <label for="user-pwd">Password</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                  <input class="form-control" name="key" type="password" id="user-pwd">
                </div>
              </div>
              <div class="form-group">
                <button type="submit" name="submit" value="login" class="btn btn-default">
                  Login <i class="glyphicon glyphicon-log-in" style="margin-top:1px;vertical-align:text-top;"></i>
                </button>
                <a href="'.ADMIN_BASE_URL.'/?do=forget&action=request" class="btn__link">Forgot Password?</a>
              </div>
            </fieldset>
            <input name="do" type="hidden" id="do" value="login">
            <input name="action" type="hidden" id="action" value="authentication">
            <input type="hidden" name="force-do" value="'.$forceDo.'">
            <input type="hidden" name="force-action" value="'.$forceAction.'">
            <input type="hidden" name="force-id" value="'.$forceId.'">
          </form>
          <hr>
          <div>
            <p id="licence-info">
              <img src="'.ADMIN_BASE_URL.'/images/resbook-icon.png" 
               alt="ResBook" style="float:right;margin:-3px 0 0 10px;width:47px;">
              <strong>Netzone CMS &copy; 
                <a target="_blank" href="https://www.resbook.com/tourism-websites">ResBook</a> 2009 - '.$year.'.
              </strong><br>
              <span>This application is licensed to '.$company.'.</span>
              <span class="clear"></span>
            </p>
          </div>            
        </div>
      </div>';

  } else {

    $moduleContent = '<div class="lform-wrapper">
        <div class="col-xs-12 ">
          <div class="alert alert-danger"><strong><i class="glyphicon glyphicon-ban-circle"></i> You are blocked. Please try again later.</strong></div>
        </div>
      </div>';

  }

}

?>