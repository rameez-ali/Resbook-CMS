<?php
/** Publish Items */

function publishItems() 
{
  global $message,$itemSelect;

	if (!empty($itemSelect)) {
          
    DB::runQuery("UPDATE `form` 
      SET `status` = '".FLAG_ACTIVE."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");

    $message = "Selected highlights have been published";

	} else {

    $message = "Please select a form from the list";
    
	}

}

?>