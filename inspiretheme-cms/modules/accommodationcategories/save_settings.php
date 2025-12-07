<?php

/** Save accommodation settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey, $modName;

  $modSettings = array();

  $modSettings['imp_page']                    = validateInput('mod_imp_page');
  //$modSettings['accommodationcategory_heading']       = validateInput('mod_accommodationcategory_heading');
  $modSettings['description']                 = validateInput('mod_description');
  $modSettings['button_text']                 = validateInput('mod_button_text');  
  $modSettings['imp_page']                    = validateInput('mod_imp_page');
  $modSettings['heading']                     = validateInput('mod_heading');
  $modSettings['allaccomfiltertext']          = validateInput('mod_allaccomfiltertext');

  $slideshowSpeed                             = validateInput('slideshow_speed', FILTER_VALIDATE_INT);
  $modSettings['slideshow_speed']             = ((empty($slideshowSpeed)) ? 2000 : $slideshowSpeed);

  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);

  $message = $moduleMainHeading." settings have been saved";

}

?>