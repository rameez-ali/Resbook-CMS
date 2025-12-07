<?php

/** Save Partnership Logo data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel;

  $now = Helper::getCurrentDateTimeStr();

  $arrItemData                = [];
  $arrItemData['name']        = validateInput('name');
  $arrItemData['menu_label']  = validateInput('menu_label');
  $arrItemData['alt_text']    = validateInput('alt_text');
  $arrItemData['logo_path']   = validateInput('logo_path');
  $arrItemData['url']         = validateInput('url', FILTER_VALIDATE_URL); 
  
  if (!empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrItemData, 'partnership_logo', "WHERE id = '{$id}' LIMIT 1");

  } else {

    $id = DB::insertRow( $arrItemData, 'partnership_logo' );
  
  }
  
  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";
  
}

?>