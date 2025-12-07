<?php

/** Edit Blog Category Data */
function editItem() 
{

  $itemName = null;
  $moduleContent = null;
  $itemMetaDataId = null;
  $itemId = null;
  $resultPageContent = null;
  global $message, $id, $do, $action, $disableMenu, 
    $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $action, $modKey;

  $moduleLabel = strtolower((string) $modMsgLabel);

  $disableMenu = FLAG_YES; 

  $sqlItem = "SELECT bc.`id`, 
      bc.`page_meta_data_id`,
      pmd.`name`,
      pmd.`menu_label`,
      pmd.`url`,
      pmd.`full_url`           
    FROM `blog_category` bc
    LEFT JOIN `page_meta_data` pmd
      ON(bc.`page_meta_data_id` = pmd.`id`)
    WHERE bc.`id` = '{$id}'
    LIMIT 1";

  $itemData = DB::fetchRow($sqlItem);

  if (!empty($itemData)) {

    /** define vars */

    /** Define vars */
    $itemId                    = $itemData['id'];
    $itemMetaDataId            = $itemData['page_meta_data_id'];

    $itemName                  = $itemData['name'];
    $itemMenuLabel             = $itemData['menu_label'];
    $itemUrl                   = $itemData['url'];
    $itemFullUrl               = $itemData['full_url'];
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

   /** Settings tab content */
  require_once MOD_VIEWS_DIR.'/settings.php';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Settings']   = $tabSettingsContent;
  $arrMenuTabs['SEO']        = SeoHelper::getSeoData($itemMetaDataId, $modMsgLabel, true, false);
  $arrMenuTabs['Quicklinks'] = QuicklinkHelper::getQuickLinksData($modKey, $itemId, $modMsgLabel);

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
