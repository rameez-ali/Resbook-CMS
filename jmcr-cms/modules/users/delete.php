<?php

/** Delete CMS user. */

function deleteItem()
{
  global $message, $itemSelected;

  if (!empty($itemSelected)) {
    $message = "Selected users have been deleted";
    foreach ($itemSelected as $item) {
     
      if($item == USER_ID) {
        $message = "Sorry, you can't delete the user logged in.";
        break;
      }

      $sql = "DELETE FROM `cms_users` WHERE `user_id` = " . $item;
      runQuery($sql);
    }
  } else {

    $message = "Please select a user from the list";

  }
}
