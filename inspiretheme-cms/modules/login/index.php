<?php
/**
 * NETZONE CMS LOGIN MODULE.
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

$message  = "";
$cMessage = $cConnection->GetMessage();
$template = ADMIN_BASE_PATH . DS . "templates" . DS . "login.html";
$moduleActions  = '';
if (!file_exists($template) && is_dir($template)) {
  exit();
}

require_once CLASS_DIR_PATH . '/Emailer.class.php';

function initLoginMain()
{
  global $do, $action, $actionView, $message, $template, $objUserAuthentication, $isValidSession, $moduleContent;

  $objUserAuthentication = new UserAuthentication();

if(isset($_POST['view']) || isset($_GET['view'])) {
  $action = (requestVar('view'));
}elseif(isset($_POST['action']) || isset($_GET['action'])) {
  $action = (requestVar('action'));
}
  //$action = (requestVar('view')) ? requestVar('view') : requestVar('action');

  $isValidSession = FLAG_NO;
 
  switch ($do) {
    case 'login':
      require_once __DIR__ . '/login.php';
      doLogin();
      break;
    case 'logout':
      require_once __DIR__ . '/logout.php';
      doLogout();
      break;
    case 'forget':
      require_once __DIR__ . '/forget.php';
      doForget();
      break;
    default:    
      $isValidSession = $objUserAuthentication->checkValidSession();
      break;
  }


  if ($isValidSession != FLAG_YES && $do != 'forget') {

    require_once __DIR__ . '/login_form.php';
    displayLoginScreen();

  } else {

    $do = (empty($do)) ? 'dashboard' : $do;

  }

}
