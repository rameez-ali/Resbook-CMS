<?php

/** Edit an Item */

function editItem()
{

  $jsVars = [];
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $action;
  $extraScripts       = (empty($extraScripts)) ? '' : $extraScripts;
  $extraStyles        = (empty($extraStyles)) ? '' : $extraStyles;
  $template           = (empty($template)) ? '' : $template;  
  $disableMenu = FLAG_YES; 

    $sqlItemData = "SELECT `id`, `name`, `email_subject`, `email_address`,`success_message`, `mailchimp_list_id`, 
      `terms_and_conditions`, `xml_data`, `json_data`
    FROM `form`
    WHERE `id` = '{$id}'
    LIMIT 1";

  $itemData = DB::fetchRow($sqlItemData);

  $jsVars['data']['formId'] = $id;

  if (empty($itemData)) {

    Helper::redirect(ADMIN_BASE_URL."/?do={$do}");
  
  }

  /** Define vars */

  $itemId               = $itemData['id'];
  $itemName             = $itemData['name'];
  $itemMailchimpListId  = $itemData['mailchimp_list_id'];
  $itemEmailSubject     = $itemData['email_subject'];
  $itemEmailAddress     = $itemData['email_address'];
  $itemSuccessMessage   = $itemData['success_message'];
  $itemTermsCondition   = $itemData['terms_and_conditions'];
  $jsonData = $itemData['json_data'];
  

  
  $moduleSubHeading = 'Editing Form: '.$itemName;

  /** Module actions */
	$moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" id="save-changes">
            <i class="glyphicon glyphicon-floppy-save"></i> Save
        </button>
      </li>
      <li>
        <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
          <i class="glyphicon glyphicon-arrow-left"></i> Cancel
        </a>
      </li>
    </ul>';

  /** Settings tab content */
  require_once MOD_VIEWS_DIR.'/settings.php';

  require_once MOD_VIEWS_DIR.'/fields.php';
  require_once MOD_VIEWS_DIR.'/entries.php';


  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Details']       = $tabSettingsContent;
  $arrMenuTabs['Fields']        = $tabFieldsContent;
  $arrMenuTabs['Entries']       = $tabEntriesContent;


  $tabIndex   = 0;
	$tabList    = "";
	$tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

		$tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
		$tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
		$tabIndex++;

  }

  $moduleContent = '<form action="'.ADMIN_BASE_URL.DS.'?do='.$do.'" method="post" 
     name="pageList" enctype="multipart/form-data">
      <div id="tabs">
        <ul>'.$tabList.'</ul>
        '.$tabContent.'
      </div>
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'">
      <input type="hidden" name="id" value="'.$id.'">
      <input type="hidden" name="meta_data_id" value="'.$id.'">

  </form>';
  
  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>
