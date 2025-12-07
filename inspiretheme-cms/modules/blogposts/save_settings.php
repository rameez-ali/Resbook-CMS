<?php

/** Save Blog Posts settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey, $modName;

  $modSettings = [];

  $modSettings['heading']           = validateInput('mod_heading');
  $modSettings['description']       = validateInput('mod_description');
  $modSettings['button_text']       = validateInput('mod_button_text');  
  $modSettings['imp_page']          = validateInput('mod_imp_page');
  
  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);
  
  $message = $moduleMainHeading." settings have been saved";

}

?>