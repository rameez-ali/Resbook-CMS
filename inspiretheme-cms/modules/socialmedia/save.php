<?php

/** Save Social Media Account */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel;

  $arrItemData = [];

  $arrItemData['name']            = validateInput('name');
  $arrItemData['url']             = validateInput('url', FILTER_VALIDATE_URL);
  $arrItemData['title']           = validateInput('title');
  $arrItemData['icon_cls']        = validateInput('icon_cls');
  $arrItemData['icon_image_path'] = validateInput('icon_image_path');
 
  if (!empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrItemData, 'social_media_account', "WHERE id = '{$id}' LIMIT 1");

  } else {

    $id = DB::insertRow( $arrItemData, 'social_media_account' );
  
  }
  
  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";
  
}

?>