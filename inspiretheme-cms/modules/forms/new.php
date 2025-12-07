<?php
/** Add new item */

function newItem()
{
	global $message, $id, $do;

	$arrNewItemData = [];

	$arrNewItemData['name'] = 'Untitled';
	$arrNewItemData['status']   = FLAG_HIDDEN;
	$arrNewItemData['date_created']   =  date('Y-m-d H:i:s');
	$arrNewItemData['public_token'] = substr(md5( sha1( (string) createRandChars() ) ), 0, 10);
	
	$id = insertRow($arrNewItemData, 'form');	

	if (!empty($id)) {

    $message = "New Form has been added and ready to edit";

    Helper::redirect(ADMIN_BASE_URL."/?do={$do}&action=edit&id={$id}");
  
  } else {

    Helper::redirect(ADMIN_BASE_URL.'/index.php?do='.$do);
  
  }
        
}

?>