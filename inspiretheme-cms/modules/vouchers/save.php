<?php

/** Save Accommodation Module data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey;

  $now = Helper::getCurrentDateTimeStr();

  $itemId           = validateInput('id', FILTER_VALIDATE_INT);
  $metaDataId       = validateInput('meta_data_id', FILTER_VALIDATE_INT);
  $photoPath        = validateInput('photo_path');
  $thumbPhotoPath   = validateInput('thumb_photo_path');
  $newHeroThumbPath = Helper::createImageThumb($photoPath, EXPERIENCE_THUMB_WIDTH, EXPERIENCE_THUMB_HEIGHT, $thumbPhotoPath);
  

  /** Save Page Meta Data */
  $arrMetaData = [];

  $arrMetaData['name']               = validateInput('name');
  $arrMetaData['menu_label']         = validateInput('menu_label');
  $arrMetaData['short_description']  = validateInput('short_description');
  $arrMetaData['photo_path']         = $photoPath;
  $arrMetaData['thumb_photo_path']   = getNullIfEmpty($newHeroThumbPath);
    
  $arrMetaData['template_id']        = 1;
  $arrMetaData['description']        = requestVar('description');  
  $arrMetaData['valid_for']          = validateInput('valid_for');
  /** Save product data */
  $arrItemData = [];
  $arrItemData['amount']               = validateInput('amount');
  $arrItemData['currency_code']        = validateInput('currency_code');

  if (!empty($metaDataId) && !empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrMetaData, 'page_meta_data', "WHERE id = '{$metaDataId}' LIMIT 1");

    /** Update Product data */
    DB::updateRow($arrItemData, 'voucher', "WHERE id = '{$id}' LIMIT 1");

  } else {

    /** Add New item data */

    $arrMetaData['date_created'] = $now;
    $arrMetaData['created_by']   = USER_ID;
    $arrMetaData['status']       = FLAG_HIDDEN;

    $metaDataId = DB::insertRow($arrMetaData, 'page_meta_data');	

  	if (!empty($metaDataId)) {

      $arrItemData['page_meta_data_id']  = $metaDataId;

      $id = DB::insertRow( $arrItemData, 'voucher' );

    }
  
  }

  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";
  
}

?>