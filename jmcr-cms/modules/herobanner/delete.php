<?php

/** Delete item data */

function deleteItem()
{
  global $message, $itemSelect, $moduleMainHeading, $moduleSubHeading, $modMsgLabel;

  $moduleMsgLabel     = strtolower((string) $moduleMainHeading);

  if (!empty($itemSelect)) {

    /** Remove Attached slideshow */
    $sqlUpdate = "UPDATE `page_meta_data` 
      SET `slideshow_id` = NULL 
      WHERE `slideshow_id` IN(".implode(',', $itemSelect).")";

    DB::runQuery($sqlUpdate);

    /** Delete slideshow Images*/
    $sqlDeletePhotos = "DELETE FROM `hero_banner_item` WHERE `hero_banner_id` IN(".implode(',', $itemSelect).")";

    DB::runQuery($sqlDeletePhotos);
    
    /** Delete slideshow*/
    $sqlDeleteSlideshow = "DELETE FROM `hero_banner` WHERE `id` IN(".implode(',', $itemSelect).")";

    DB::runQuery($sqlDeleteSlideshow);

    $message = "Selected {$moduleMsgLabel} have been moved to trash.";
    
  } else {

    $message = "Please select {$moduleMsgLabel} from the list.";

  }
}

?>
