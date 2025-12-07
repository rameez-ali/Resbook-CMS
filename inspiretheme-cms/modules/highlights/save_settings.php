<?php

/** Save settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modName;

  $modSettings = [];

  $modSettings['heading']       = validateInput('mod_heading');
  $modSettings['page_id']       = validateInput('mod_pageid');
  $modSettings['url']           = validateInput('mod_url');
  $modSettings['button_text']   = validateInput('mod_buttontext');
  
  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);

  $message = "Highlight settings have been saved";

}

?>