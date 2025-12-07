<?php

/** Save gallery settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey, $modName;

  $modSettings = [];

  $modSettings['imp_page']          = validateInput('mod_imp_page');
  
  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);

  $message = $moduleMainHeading." settings have been saved";

}

?>