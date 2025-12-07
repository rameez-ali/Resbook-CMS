<?php

/** Edit accommodation data */

function editItem() 
{

  $itemName = null;
  $moduleContent = null;
  $itemMetaDataId = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $modKey, $modName;
  $template         = (empty($template)) ? '' : $template;
  $disableMenu = FLAG_YES; 

  $sqlItem = "SELECT v.`id`,
      v.`amount`,
      v.`currency_code`,
      v.`page_meta_data_id`,      
      pmd.`name`,
      pmd.`photo_path`,
      pmd.`thumb_photo_path`,
      pmd.`menu_label`,
      pmd.`description`,
      pmd.`short_description`,
      pmd.`valid_for`      
    FROM `voucher` v
    LEFT JOIN `page_meta_data` pmd
      ON(v.`page_meta_data_id` = pmd.`id`)
    WHERE v.`id` = '{$id}'
    LIMIT 1";

  $itemData = DB::fetchRow($sqlItem);

  if (!empty($itemData)) {

    /** Define vars */
    $itemId                = $itemData['id'];
    $itemMetaDataId        = $itemData['page_meta_data_id'];

    $itemName              = $itemData['name'];
    $itemAmount            = $itemData['amount'];
    $itemCurrencyCode      = $itemData['currency_code'];
    $itemMenuLabel         = $itemData['menu_label'];
    $itemDescription       = $itemData['short_description'];
    $itemPhotoPath         = $itemData['photo_path'];
    $itemPhotoThumbPath    = $itemData['thumb_photo_path'];
    $itemLongDescription   = $itemData['description'];
    $itemValidFor          = $itemData['valid_for'];
  }

  $itemLabel = $itemName ?: 'Untitled';

  $moduleSubHeading = 'Editing '.$modMsgLabel.': '.$itemLabel;

  $moduleLabel = strtolower((string) $modMsgLabel);
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


  /** Settings tab content */
  require_once MOD_VIEWS_DIR.DS.'settings.php';
  
  /** Content tab content */
  require_once MOD_VIEWS_DIR.DS.'content.php';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Settings']   = $tabSettingsContent;
  $arrMenuTabs['Details']    = $tabDetailsContent;

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
      <input type="hidden" name="meta_data_id" value="'.$itemMetaDataId.'">
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>
