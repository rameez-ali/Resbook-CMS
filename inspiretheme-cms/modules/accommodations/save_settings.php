<?php

/** Save accommodation settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey, $modName;

  $modSettings = [];

  $modSettings['imp_page']              = validateInput('mod_imp_page');
  $modSettings['accommodation_heading'] = validateInput('mod_accommodation_heading');
  $modSettings['description']           = validateInput('mod_description');
  $modSettings['button_text']           = validateInput('mod_button_text');  
  $modSettings['imp_page']              = validateInput('mod_imp_page');
  $modSettings['heading']               = validateInput('mod_heading');
  $modSettings['accom_bookctaheading']  = validateInput('mod_accom_bookctaheading');
  $modSettings['enquiry_btntxt']        = validateInput('mod_enquiry_btntxt');
  $modSettings['enquiry_btnurl']        = validateInput('mod_enquiry_btnurl');
  $modSettings['show_moreaccom']        = validateInput('mod_show_moreaccom');

  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);

  $message = $moduleMainHeading." settings have been saved";

}

?>