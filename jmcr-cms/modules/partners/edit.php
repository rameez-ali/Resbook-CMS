<?php

/** Edit Partnership Logo */
function editItem() 
{

  $itemName = null;
  $moduleContent = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $action;
  $template           = (empty($template)) ? '' : $template;
  $disableMenu = FLAG_YES; 

  $sql = "SELECT `id`,
      `name`,
      `menu_label`,
      `logo_path`,
      `alt_text`,
      `url`
    FROM `partnership_logo`
    WHERE `id` = '{$id}'
    LIMIT 1";

  $itemData = DB::fetchRow($sql);

  if (!empty($itemData)) {

    /** define vars */

    $itemId         = $itemData['id'];
    $itemName       = $itemData['name'];
    $itemMenuLabel  = $itemData['menu_label'];
    $itemAltText    = $itemData['alt_text'];
    $itemUrl        = $itemData['url'];
    $itemLogoPath   = $itemData['logo_path'];
  }

  $itemLabel = $itemName ?: 'Untitled';

  $moduleSubHeading = 'Editing '.$modMsgLabel.': '.$itemLabel;


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

?>
