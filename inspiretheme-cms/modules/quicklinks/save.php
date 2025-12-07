<?php

/** Save quicklinks data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel;

  $itemUrlTarget   = validateInput('url_target');

  $photoPath        = validateInput('photo_path');
  $thumbPhotoPath   = validateInput('thumb_photo_path');

  $newHeroThumbPath = Helper::createImageThumb($photoPath, THUMB_WIDTH, THUMB_HEIGHT, $thumbPhotoPath);

  $arrItemData                = [];
  $arrItemData['name']             = validateInput('name');
  $arrItemData['heading']          = validateInput('heading');
  $arrItemData['description']      = validateInput('description');  
  $arrItemData['photo_path']       = $photoPath;
  $arrItemData['thumb_photo_path'] = getNullIfEmpty($newHeroThumbPath);
  $arrItemData['photo_alt_text']   = validateInput('photo_alt_text');  
  $arrItemData['page_id']          = validateInput('page_id', FILTER_VALIDATE_INT);
  $arrItemData['url']              = validateInput('url', FILTER_VALIDATE_URL);
  $arrItemData['button_text']      = validateInput('button_text');
  
    
  if (!empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrItemData, 'quicklinks', "WHERE id = '{$id}' LIMIT 1");

  } else {

    $id = DB::insertRow( $arrItemData, 'quicklinks' );
  
  }
  
  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";
  
}

?>