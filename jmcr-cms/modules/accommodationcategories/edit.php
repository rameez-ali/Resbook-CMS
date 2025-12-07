<?php

/** Edit accommodation data */

function editItem() 
{

  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $modKey, $modName;

  $disableMenu = FLAG_YES; 

  $sqlItem = "SELECT ac.`id`,      
      ac.`from_price`,
      ac.`currency_code`,
      ac.`from_price_caption`,
      ac.`features`,
      ac.`booking_url`,
      ac.`button_text`,
      ac.`page_meta_data_id`,
      ac.`is_featured`,
      ac.`iframe_code_accomm`,
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
      pmd.`gallery_id`,
      pmd.`template_id`,
      pmd.`updated_by`
    FROM `accommodation_category` ac
    LEFT JOIN `page_meta_data` pmd
      ON(ac.`page_meta_data_id` = pmd.`id`)
    WHERE ac.`id` = '{$id}'
    LIMIT 1";

  $itemData = DB::fetchRow($sqlItem);

  if (!empty($itemData)) {

    /** Define vars */
    $itemId                = $itemData['id'];
    $itemMetaDataId        = $itemData['page_meta_data_id'];

    $itemFromPrice         = $itemData['from_price'];
    $itemCurrencyCode      = $itemData['currency_code'];
    $itemIsFeatured        = $itemData['is_featured'];
    $itemIframe_code_accomm= $itemData['iframe_code_accomm'];
    $itemFromPriceCaption  = $itemData['from_price_caption'];
    $itemFeatures          = $itemData['features'];
    $itemPhotoPath         = $itemData['photo_path'];
    $itemPhotoThumbPath    = $itemData['thumb_photo_path'];
    $itemPhotoAltText      = $itemData['photo_alt_text'];
    $itemBookingUrl        = $itemData['booking_url'];
    $itemButtonText        = $itemData['button_text'];

    $itemName              = $itemData['name'];
    $itemMenuLabel         = $itemData['menu_label'];
    $itemHeading           = $itemData['heading'];
    $itemUrl               = $itemData['url'];
    $itemFullUrl           = $itemData['full_url'];
    $itemIntroduction      = $itemData['introduction'];
    $itemShortDescription  = $itemData['short_description'];

    $itemGalleryId         = $itemData['gallery_id'];
    $itemSlideshowId       = $itemData['slideshow_id'];
  }

  $itemLabel = ($itemName) ? $itemName : 'Untitled';

  $moduleSubHeading = 'Editing '.$modMsgLabel.': '.$itemLabel;

  $moduleLabel = strtolower($modMsgLabel);
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

  /** Settings tab content */
  //require_once MOD_VIEWS_DIR.DS.'details.php';

  /** Product category tab content */
  //require_once MOD_VIEWS_DIR.DS.'features.php';

  /** Generate tab array */

  $arrMenuTabs = array();

  $arrMenuTabs['Settings']   = $tabSettingsContent;  
  //$arrMenuTabs['Content']    = $tabContentContent;  
  //$arrMenuTabs['SEO']        = SeoHelper::getSeoData($itemMetaDataId, $modMsgLabel);
  //$arrMenuTabs['Quicklinks'] = QuicklinkHelper::getQuickLinksData($modKey, $itemId, $modMsgLabel);

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
