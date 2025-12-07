<?php

/** Save settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modName;

  $mapColor = validateInput('mod_colormap');
  
  $modSettings = [];

  // $modSettings['button_text']       = validateInput('mod_button_text');
  // $modSettings['cover_photo_path']  = validateInput('mod_cover_photo_path');
  
  $modSettings['colormap']        = (empty($mapColor)) ? 'G' : $mapColor ;
  
  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);

  $message = "Map settings have been saved";

}

?>