<?php
/** Publish items */

function publishItem() 
{
  global $message,$itemSelect;

	if (!empty($itemSelect)) {
    $arrRedirectItems  = [];
    $arrValidItems     = [];
    $arrAvailableItems = [];
    
    foreach ($itemSelect AS $itemId) {

      $itemOldUrl = DB::fetchValue("SELECT hr.`old_url` FROM `redirect` hr WHERE hr.`id` = '".$itemId."'");

      $redirectId = DB::fetchValue("SELECT `id` 
        FROM `redirect`
        WHERE `old_url` = (SELECT hr.`old_url` FROM `redirect` hr WHERE hr.`id` = '".$itemId."')
          AND  `status` = 'A'
          AND `id` != '".$itemId."'
        LIMIT 1");
      
        if (empty($redirectId)) {

          if (!in_array($itemOldUrl, $arrRedirectItems)) {
            
            $arrValidItems[]    = $itemId;
            $arrRedirectItems[] = $itemOldUrl;

          } else {
            $arrAvailableItems[] = $itemId;
          }          

        } else {
          $arrAvailableItems[] = $itemId;
        }

    }

    if ($arrValidItems !== []) {
      runQuery("UPDATE `redirect` 
        SET `status` = '".FLAG_ACTIVE."' 
        WHERE `id` IN(".implode(',', $arrValidItems).")");

      if ($arrAvailableItems === []) {
        $message = "Selected redirects have been published.";
      } else {
        $message = "Could not publish all the selected redirects because the old URLs already exist.";
      }      
    } elseif($arrAvailableItems !== []) {
      $message = "Could not publish the selected redirects because the old URLs already exist.";
    }
   

	} else {

    $message = "Please select a redirect from the list.";
    
	}

}
