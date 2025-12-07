<?php

/** Save  Contact Enquiries Settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey, $modName;

  $modSettings = [];

  $modSettings['heading']               = validateInput('mod_heading');
  $modSettings['description']           = validateInput('mod_description');
  $modSettings['form_heading']          = validateInput('mod_form_heading');  
  $modSettings['contact_email_address'] = validateInput('mod_contact_email',FILTER_VALIDATE_EMAIL);   
  $modSettings['imp_page']              = validateInput('mod_imp_page');
  
  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);
  
  $message = $moduleMainHeading." settings have been saved";

}

?>