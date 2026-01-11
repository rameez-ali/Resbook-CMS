<?php

/** Save Highlight data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel;

  $now = Helper::getCurrentDateTimeStr();
  
  $photoPath   = validateInput('image_path');

  $arrItemData                      = [];
  $arrItemData['name']              = validateInput('name');
  $arrItemData['header']            = validateInput('header');
  $arrItemData['url']               = validateInput('url');
  $arrItemData['page_id']           = validateInput('page_id', FILTER_VALIDATE_INT);
  $arrItemData['description']       = validateInput('description');
  $arrItemData['button_text']       = validateInput('button_text');
  $arrItemData['image_path']        = $photoPath;
  $arrItemData['image_alt_txt']     = validateInput('image_alt_txt');

  if (!empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrItemData, 'showcase', "WHERE id = '{$id}' LIMIT 1");

  } else {

    $id = DB::insertRow( $arrItemData, 'showcase' );
  
  }
  
  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";
  
}

?>