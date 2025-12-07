<?php

/** Edit BLOG PPOSTS Data */
function editItem() 
{

  $itemHeading = null;
  $moduleContent = null;
  $itemMetaDataId = null;
  $itemId = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $action, $modKey;

  $disableMenu = FLAG_YES; 

  $sqlItem = "SELECT bp.`id`,
      bp.`is_featured`,
      IF(bp.`date_posted`, DATE_FORMAT(bp.`date_posted`, '%d/%m/%Y'), '') AS posted_on,
      bp.`page_meta_data_id`,
      pmd.`heading`,
      pmd.`url`,
      pmd.`full_url`,
      pmd.`introduction`,
      pmd.`short_description`,
      pmd.`description`,
      pmd.`slideshow_id`,
      pmd.`photo_path`,
      pmd.`thumb_photo_path`,
      pmd.`photo_alt_text`, 
      pmd.`updated_by`               
    FROM `blog_post` bp
    LEFT JOIN `page_meta_data` pmd
      ON(bp.`page_meta_data_id` = pmd.`id`)
    WHERE bp.`id` = '{$id}'
    LIMIT 1";

  $itemData = DB::fetchRow($sqlItem);

  if (!empty($itemData)) {

    /** Define vars */
    $itemId                = $itemData['id'];
    $itemMetaDataId        = $itemData['page_meta_data_id'];
    $itemIsFeatured        = $itemData['is_featured'];
    $itemPhotoPath         = $itemData['photo_path'];
    $itemPhotoThumbPath    = $itemData['thumb_photo_path'];
    $itemPhotoAltText      = $itemData['photo_alt_text'];
    $itemPostedOn          = $itemData['posted_on'];

    $itemHeading           = $itemData['heading'];
    $itemUrl               = $itemData['url'];
    $itemFullUrl           = $itemData['full_url'];

    $itemIntroduction      = $itemData['introduction'];
    $itemShortDescription  = $itemData['short_description'];
    $itemDescription       = $itemData['description'];
    $itemSlideshowId       = $itemData['slideshow_id'];

    $itemUpdatedBy         = $itemData['updated_by'];
  }

  $itemLabel = $itemHeading ?: 'Untitled';

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

  /** Description tab content */
  require_once MOD_VIEWS_DIR.DS.'description.php';

  /** blog categories tab content */
  require_once MOD_VIEWS_DIR.DS.'categories.php'; 

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Settings']    = $tabSettingsContent;  
  $arrMenuTabs['Content']     = $tabDescriptionContent;
  $arrMenuTabs['Categories']  = $tabBlogCategoriesContent;
  $arrMenuTabs['SEO']         = SeoHelper::getSeoData($itemMetaDataId, $modMsgLabel);
  $arrMenuTabs['Quicklinks']  = QuicklinkHelper::getQuickLinksData($modKey, $itemId, $modMsgLabel);

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
