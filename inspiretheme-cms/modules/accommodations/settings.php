<?php

/** Edit accommodation settings */

function editSettings()
{

  $moduleContent = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $modKey, $modName;

  $disableMenu = FLAG_YES;

  $itemSettings = ModuleSettings::fetchSettings($modName);

  if (!empty($itemSettings)) {

    /** define vars */

    $aImpPage               = $itemSettings['imp_page'];
    $aHeading               = $itemSettings['heading'];
    $aAccommodationsHeading = $itemSettings['accommodation_heading'];
    $aButtonText            = $itemSettings['button_text'];
    $aDescription           = $itemSettings['description'];
    $aAccomBookCtaHeading   = $itemSettings['accom_bookctaheading'];
    $aModDisplay            = $itemSettings['module_display'];
    $aMenuDisplay           = $itemSettings['menu_display'];    
    $aEnquiryBtnTxt         = $itemSettings['enquiry_btntxt'];
    $aEnquiryBtnUrl         = $itemSettings['enquiry_btnurl'];
    $aShowMoreAccom         = $itemSettings['show_moreaccom'];
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

  $arrMenuTabs['Featured Accommodations']               = $tabModuleSettingsContent;
  $arrMenuTabs['Explore Other Accommodations']  = $tabAccommodationSettingsContent;
  $arrMenuTabs['Booking CTA']                   = $tabAccommodationBookCtaContent;
  //$arrMenuTabs['Display Settings']              = $tabAccommodationDisplaySettingContent;

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