<?php

/** Save FAQs data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading;;

  $now = Helper::getCurrentDateTimeStr();

  $arrItemData = [];
  $arrItemData['question']  = validateInput('question');
	$arrItemData['answer']    = requestVar('answer');
  $arrItemData['date_updated']    = $now;
  $arrItemData['updated_by']      = USER_ID;
  
  if (!empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrItemData, 'faq', "WHERE id = '{$id}' LIMIT 1");

  } else {

    /** Add new item*/
    $arrItemData['status']       = FLAG_HIDDEN;
    $arrItemData['date_created'] = $now;
    $arrItemData['created_by']   = USER_ID;  
  
    $id = DB::insertRow( $arrItemData, 'faq' );
   }
  
  $message = $moduleMainHeading." has been saved";
  
}

?>