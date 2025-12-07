<?php

/** Edit FAQs settings */

function editSettings() 
{

  $moduleContent = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $modKey, $modName;

  $disableMenu = FLAG_YES; 

  $itemSettings = ModuleSettings::fetchSettings($modName);

  if (!empty($itemSettings)) {

    /** define vars */

    $fsHeading         = $itemSettings['heading'];
    $fsButtonText      = $itemSettings['button_text'];
    $fsDescription     = $itemSettings['description'];
    $fsType            = $itemSettings['type'];
    $fsIconExpand      = $itemSettings['icon_expand'];
    $fsIconCollapse    = $itemSettings['icon_collapse'];
    $fsDefaultState    = $itemSettings['default_state'];    
    $fsImpPage         = $itemSettings['imp_page'];

  }

  $moduleSubHeading = 'Editing settings';


  /** Module actions */
  $moduleActions = '<ul class="page-action">
    <li>
      <button type="button" class="btn btn-default" id="pg-save"
        onclick="submitForm(\'save-settings\',1)">
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
  require_once MOD_VIEWS_DIR.DS.'module_settings.php';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['FAQs Settings']  = $tabModuleSettingsContent;

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
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>
