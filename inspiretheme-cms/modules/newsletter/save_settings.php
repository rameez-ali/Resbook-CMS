<?php

/** Save review settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modName;

  $modSettings = [];

  $modSettings['heading']           = validateInput('mod_heading');
  $modSettings['description']       = validateInput('mod_description');
  
   /** Update item data */
   ModuleSettings::saveSettings($modSettings, $modName);
  
  $message = "Newsletter settings have been saved";

}

?>