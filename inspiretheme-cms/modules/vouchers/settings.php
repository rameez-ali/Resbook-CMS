<?php

/** Edit accommodation settings */

function editSettings()
{

  $moduleContent = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $modKey, $modName;
  $template         = (empty($template)) ? '' : $template;
  $disableMenu = FLAG_YES;

  $itemSettings = ModuleSettings::fetchSettings($modName);

  if (!empty($itemSettings)) {

    /** define vars */

    $vImpPage     = $itemSettings['imp_page'];

    $vDetails = DB::fetchRow("SELECT * FROM `voucher_settings`");

    $vEmail             = $vDetails['notification_email_address'];
    $vMessage           = $vDetails['success_payment_message'];
    $vFailMessage       = $vDetails['fail_payment_message'];
    $vTerms             = $vDetails['terms_and_cond'];
    $vAmt             = $vDetails['voucher_amount'];
    $voucherSubject     = $vDetails['voucher_subject'];
    $clientSubject      = $vDetails['client_subject'];
    $surchargeText      = $vDetails['surcharge_text'];
    $vValidFor          = $vDetails['valid_for'];
    
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

  $arrMenuTabs['Settings']          = $tabModuleSettingsContent;
  $arrMenuTabs['Terms & Conditions'] = $tabModuleTerms;
  $arrMenuTabs['Custom Amount'] = $tabModuleAmt;
  
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