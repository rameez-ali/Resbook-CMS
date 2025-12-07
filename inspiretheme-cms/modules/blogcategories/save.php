<?php

/** Save Blog Category data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey;

  $now = Helper::getCurrentDateTimeStr();

  $itemId           = validateInput('id', FILTER_VALIDATE_INT);
  $metaDataId       = validateInput('meta_data_id', FILTER_VALIDATE_INT);
  
  $photoPath        = validateInput('photo_path');
  $thumbPhotoPath   = validateInput('thumb_photo_path');
  
  $newHeroThumbPath = Helper::createImageThumb($photoPath, THUMB_WIDTH, THUMB_HEIGHT, $thumbPhotoPath);
  
  $url              = (requestVar('url')) ? sanitizeInput('url') : sanitizeInput('name');
  $url              = Helper::url($url);
  
  $templateId       = validateInput('template_id', FILTER_VALIDATE_INT);
  $templateId       = (empty($templateId)) ? DEFAULT_TEMPLATE_ID: $templateId ;


  /** Save Page Meta Data */

  $arrMetaData = [];

  $arrMetaData['name']                  = validateInput('name');
  $arrMetaData['menu_label']            = validateInput('menu_label');
  $arrMetaData['url']                   = $url;
  $arrMetaData['full_url']              = "/{$url}";

  $arrMetaData['date_updated']          = Helper::getCurrentDateTimeStr();
  $arrMetaData['updated_by']            = USER_ID;
  $arrMetaData['template_id']           = $templateId;
  $arrMetaData['item_key']              = $modKey;
  
  /** Save Category data */

  $arrItemData = [];
  
  if (!empty($metaDataId) && !empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrMetaData, 'page_meta_data', "WHERE id = '{$metaDataId}' LIMIT 1");

  } else {

    /** Add New item data */

    $arrMetaData['date_created'] = $now;
    $arrMetaData['created_by']   = USER_ID;
    $arrMetaData['status']       = FLAG_HIDDEN;

    $metaDataId = DB::insertRow($arrMetaData, 'page_meta_data');	

  	if (!empty($metaDataId)) {

      $arrItemData['page_meta_data_id']  = $metaDataId;

      $id = DB::insertRow( $arrItemData, 'blog_category' );

    }
  
  } 

  /** Save SEO Data */
  $seoData            = requestVar('seo');
  SeoHelper::saveSeoData($metaDataId, $seoData);

  /** Save Quicklinks Data */
  $qlSectionData      = requestVar('quicklink');
  $arrQuicklinkIds    = requestVar('item_quicklink_id');
  $arrQuicklinkRank   = requestVar('item_quicklink_rank');

  QuicklinkHelper::saveQuicklinks($modKey, $id, $qlSectionData, $arrQuicklinkIds, $arrQuicklinkRank);
  
  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";
}

?>