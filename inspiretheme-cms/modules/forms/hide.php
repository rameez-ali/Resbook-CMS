<?php
/** Hide Items */

function hideItems() 
{
  global $message, $itemSelect;

  if (!empty($itemSelect)) {
  
    DB::runQuery("UPDATE `form` 
      SET `status` = '".FLAG_HIDDEN."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");
    
    $message = "Selected forms have been hidden";
    
  } else {

    $message = "Please select a form from the list";

  }
}

?>