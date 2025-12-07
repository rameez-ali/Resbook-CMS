<?php

/** Delete item data */

function deleteItem()
{
  global $message, $itemSelect, $moduleMainHeading, $moduleSubHeading, $modMsgLabel;

  $moduleMsgLabel     = strtolower((string) $moduleMainHeading);

  if (!empty($itemSelect)) {
    
    $arrPhotoThumbs = DB::fetchPairs("SELECT `id` AS opKey,
        `thumb_photo_path` AS opValue
      FROM `gallery_photo`
      WHERE `gallery_id` IN(".implode(',', $itemSelect).")");

    /** DELETE Thumb Photos */
    if (!empty($arrPhotoThumbs)) {

      foreach ($arrPhotoThumbs AS $thumbPhotoPath) {
      
        if ( Helper::isFile($thumbPhotoPath) ) {

          unlink(BASE_PATH.$thumbPhotoPath);        

        }   
      }
    }

    /** Remove Attached gallery */
    $sqlUpdate = "UPDATE `page_meta_data` 
      SET `gallery_id` = NULL 
      WHERE `gallery_id` IN(".implode(',', $itemSelect).")";

    DB::runQuery($sqlUpdate);

    
    /** Delete gallery Images*/
    $sqlDeletePhotos = "DELETE FROM `gallery_photo` 
			WHERE `gallery_id` IN(".implode(',', $itemSelect).")";

    DB::runQuery($sqlDeletePhotos);
    
    /** Delete gallery*/
    $sqlDeleteGalleries = "DELETE FROM `gallery` 
      WHERE `id` IN(".implode(',', $itemSelect).")";

    DB::runQuery($sqlDeleteGalleries);

    $message = "Selected {$moduleMsgLabel} have been moved to trash.";
    
  } else {

    $message = "Please select {$moduleMsgLabel} from the list.";

  }
  
}
?>
