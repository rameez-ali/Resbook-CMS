<?php

/** Edit experience data */

function editItem() 
{

  $itemName = null;
  $moduleContent = null;
  $itemMetaDataId = null;
  $itemId = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $action, $modKey;

  $disableMenu = FLAG_YES; 

  $moduleLabel = strtolower((string) $modMsgLabel);
  
  $sqlItem = "SELECT e.`id`,
      e.`from_price`,
      e.`booking_url`,
      e.`features`,
      e.`caption`,
      e.`currency_code`,
      e.`is_featured`,
      e.`button_text`,
      e.`price_description`,
      e.`page_meta_data_id`,
      pmd.`name`,
      pmd.`menu_label`,
      pmd.`heading`,
      pmd.`url`,
      pmd.`full_url`,
      pmd.`introduction`,
      pmd.`short_description`,
      pmd.`description`,      
      pmd.`photo_path`,
      pmd.`thumb_photo_path`,
      pmd.`photo_alt_text`,
      pmd.`slideshow_id`,
      pmd.`template_id`,
      pmd.`gallery_id`
    FROM `experience` e
    LEFT JOIN `page_meta_data` pmd
      ON(e.`page_meta_data_id` = pmd.`id`)
    WHERE e.`id` = '{$id}'
    LIMIT 1";

  $itemData = DB::fetchRow($sqlItem);

  if (!empty($itemData)) {

    /** define vars */

    /** Define vars */
    $itemId                    = $itemData['id'];
    $itemMetaDataId            = $itemData['page_meta_data_id'];
    
    $itemFromPrice             = $itemData['from_price'];
    $itemCaption               = $itemData['caption'];
    $itemCurrencyCode          = $itemData['currency_code'];
    $itemPriceDescription      = $itemData['price_description'];
    $itemPhotoPath             = $itemData['photo_path'];
    $itemPhotoThumbPath        = $itemData['thumb_photo_path'];
    $itemPhotoAltText          = $itemData['photo_alt_text'];
    $itemIsFeatured            = $itemData['is_featured'];
    $itemButtontext            = $itemData['button_text'];
    $itemFeatures              = $itemData['features'];
    $itemName                  = $itemData['name'];
    $itemMenuLabel             = $itemData['menu_label'];
    $itemHeading               = $itemData['heading'];
    $itemBookingURL            = $itemData['booking_url'];
    $itemUrl                   = $itemData['url'];
    $itemFullUrl               = $itemData['full_url'];
    $itemIntroduction          = $itemData['introduction'];
    $itemShortDescription      = $itemData['short_description'];

    $itemGalleryId             = $itemData['gallery_id'];
    $itemSlideshowId           = $itemData['slideshow_id'];
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
  require_once MOD_VIEWS_DIR.DS.'content.php';

  /** Settings tab content */
  require_once MOD_VIEWS_DIR.DS.'settings.php';

  /** Product features tab content */
  require_once MOD_VIEWS_DIR.DS.'features.php';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Settings']    = $tabSettingsContent;
  $arrMenuTabs['Features']    = $tabFeaturesContent;
  $arrMenuTabs['Content']     = $tabContentContent;
  $arrMenuTabs['SEO']         = SeoHelper::getSeoData($itemMetaDataId, $modMsgLabel);
  $arrMenuTabs['Quicklinks']  = QuicklinkHelper::getQuickLinksData($modKey, $itemId, $modMsgLabel);
  $arrMenuTabs['Highlights']  = HighlightHelper::getHighlightData($modKey, $itemId, $modMsgLabel);

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
