<?php

/** Save  Contact Enquiries Settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey, $modName;

  $modSettings = [];

  $modSettings['heading']               = validateInput('mod_heading');
  $modSettings['description']           = validateInput('mod_description');
  
  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);
  
  $message = $moduleMainHeading." settings have been saved";

}

?>