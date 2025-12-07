<?php
/** save user access */

function saveItem() {
  global $message,$accessId;
  
 
  foreach($accessId as $userAccessId){

    $this_access_id = $j;

    $tempUserAccess['access_users']           = (sanitizeInput('users_'.$userAccessId)) ? FLAG_YES : FLAG_NO;
    $tempUserAccess['access_userpasswords']   = (sanitizeInput('userpasswords_'.$userAccessId)) ? FLAG_YES : FLAG_NO;
    $tempUserAccess['access_useraccesslevel'] = (sanitizeInput('useraccess_'.$userAccessId)) ? FLAG_YES : FLAG_NO;
    $tempUserAccess['access_accessgroups']    = (sanitizeInput('accessgroups_'.$userAccessId)) ? FLAG_YES : FLAG_NO;
    $tempUserAccess['access_settings']        = (sanitizeInput('settings_'.$userAccessId)) ? FLAG_YES : FLAG_NO;

    updateRow($tempUserAccess,'cms_accessgroups', "WHERE `access_id` = '{$userAccessId}'");

    $message = "All CMS settings have been updated";
  }
}

?>
