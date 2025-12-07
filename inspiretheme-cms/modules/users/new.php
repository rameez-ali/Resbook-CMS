<?php

/** Add new CMS user. */

function newItem()
{
  $arrTemporary = [];
  global $message, $id, $do;

  $arrTemporary['user_fname'] = 'New User';
  
  $id = insertRow($arrTemporary, 'cms_users');

  if (!empty($id)) {

    $message = "New user has been added and ready to edit";

    Helper::redirect(ADMIN_BASE_URL."/?do={$do}&action=edit&id={$id}");
  
  } else {

    Helper::redirect(ADMIN_BASE_URL.'/index.php?do='.$do);
  }
}
