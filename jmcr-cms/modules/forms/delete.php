<?php
/** Delete data */

function deleteItems()
{
	global $message, $itemSelect;

	if (!empty($itemSelect)) {
		
		DB::runQuery("UPDATE `form` 
			SET `status` = '".FLAG_DELETED."'
			WHERE `id` IN(".implode(',', $itemSelect).")");

		$message = "Selected forms have been moved to trash";
	
	} else {
		
		$message = "Please select a form from the list";
	
	}

}

?>