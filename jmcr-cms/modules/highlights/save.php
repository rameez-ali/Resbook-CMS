<?php

/** Save Highlight data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel;

  $now = Helper::getCurrentDateTimeStr();
  
  $photoPath   = validateInput('image_path');
  $thumbPhotoPath   = validateInput('thumb_image_path');
  $newHeroThumbPath = Helper::createImageThumb($photoPath, HIGHLIGHT_THUMB_WIDTH, HIGHLIGHT_THUMB_HEIGHT, $thumbPhotoPath);

  $arrItemData                      = [];
  $arrItemData['name']              = validateInput('name');
  $arrItemData['url']               = validateInput('url');
  $arrItemData['page_id']           = validateInput('page_id', FILTER_VALIDATE_INT);
  $arrItemData['short_description'] = validateInput('short_description');
  $arrItemData['image_path']        = $photoPath;
  $arrItemData['image_alt_txt']     = validateInput('image_alt_txt');
  $arrItemData['thumb_image_path']  = $newHeroThumbPath;

  if (!empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrItemData, 'highlight', "WHERE id = '{$id}' LIMIT 1");

  } else {

    $id = DB::insertRow( $arrItemData, 'highlight' );
  
  }
  
  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";
  
}

?>