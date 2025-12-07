<?php

/** Save Redirect Data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel;

  $oldURL     = str_replace(' ', '', filter_input(INPUT_POST, 'old_url', FILTER_SANITIZE_ADD_SLASHES));
  $newURL     = str_replace(' ', '', filter_input(INPUT_POST, 'new_url', FILTER_SANITIZE_ADD_SLASHES));
  
  /** GET PATH FROM URL */
  $oldURLPath = rtrim((string) Helper::getUrlPath($oldURL), '/');
  $newURLPath = rtrim((string) Helper::getUrlPath($newURL), '/');
  
  $newURLPath = (empty($newURLPath)) ? '/' : $newURLPath;

  $arrItemData = [];
  $arrItemData['old_url']        = $oldURLPath;
  $arrItemData['new_url']        = $newURLPath;
  
  if (!empty($oldURLPath) && !empty($newURLPath)) {

    if($oldURLPath !== $newURLPath) {
    
      $redirectId = DB::fetchValue("SELECT `id` 
        FROM `redirect`
        WHERE `old_url` = '".$oldURLPath."'
          AND  `status` = '".FLAG_ACTIVE."'
          AND `id` != '".$id."'
        LIMIT 1");

      if (empty($redirectId)) {
        
        if (!empty($id)) {
          /** Update existing item data */
          $sql =  "UPDATE `redirect` SET
              `old_url` = '".$oldURLPath."',
              `new_url` = '".$newURLPath."'
            WHERE `id` = '".$id."'
            LIMIT 1";

          DB::runQuery($sql);

        } else {
          /** Add new item data */

          $sql =  "INSERT INTO `redirect`(`old_url`, `new_url`, `status_code`, `status`)
            VALUES ('".$oldURLPath."', '".$newURLPath."', '301', '".FLAG_ACTIVE."')";

          $id = DB::runQuery($sql);
        
        }

        $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved successfully.";

      } else {
        $message = "Old URL already exists.";
      }
    } else {
      $message = "Old and New URL cannot be the same.";
    }
  } else {
    $message = "Invalid Old or New URL.";
  }
}

?>