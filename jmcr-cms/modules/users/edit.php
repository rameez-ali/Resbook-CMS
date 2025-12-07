<?php

/** Edit CMS user. */

function editItem()
{
  $moduleContent = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleMainHeading, $isValidSession, $moduleSubHeading;
  $template           = (empty($template)) ? '' : $template;
  $disableMenu = FLAG_YES;

  $sqlModuleData = "SELECT `user_id`,
      `user_fname`,
      `user_lname`,
      `user_pass`,
      `user_email`,
      `last_login_date`,
      `access_id`,
      TRIM(CONCAT(`user_fname`, ' ', `user_lname`)) AS full_name
    FROM `cms_users`
    WHERE `user_id` = '{$id}'
    LIMIT 1";

  $userData = fetchRow($sqlModuleData);

  if (empty($userData)) {

    Helper::redirect(ADMIN_BASE_URL.DS.'?do='.$do);

  }

  /** define vars */

  $userId            = $userData['user_id'];
  $userFirstName     = $userData['user_fname'];
  $userLastName      = $userData['user_lname'];
  $userFullName      = $userData['full_name'];
  $userPassword      = $userData['user_pass'];
  $userEmail         = $userData['user_email'];
  $userAccessId      = $userData['access_id'];

  $moduleSubHeading = 'Editing user: '.$userFullName;

  /** Module actions */
  $moduleActions = '<ul class="page-action">
    <li>
      <button type="button" class="btn btn-default" id="pg-save"
        onclick="submitForm(\'save\',1)">
          <i class="glyphicon glyphicon-floppy-save"></i> Save
      </button>
    </li>
    <li>
      <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
        <i class="glyphicon glyphicon-arrow-left"></i> Cancel
      </a>
    </li>
  </ul>';

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  /** Content tab content */
  require_once MOD_VIEWS_DIR.DS.'content.php';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Details']  = $tabDetailsContent;

  $tabIndex   = 0;
  $tabList    = "";
  $tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

    $tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
    $tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
    $tabIndex++;

  }

  $moduleContent = '<form action="'.ADMIN_BASE_URL.'/index.php" method="post" 
    name="pageList" enctype="multipart/form-data">
      <div id="tabs">
        <ul>'.$tabList.'</ul>
        <div style="padding:10px;">'.$tabContent.'</div>
      </div>
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'">
      <input type="hidden" name="id" value="'.$id.'">
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();
}
