<?php

/** Save FAQs settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey, $modName;

  $modSettings = [];

  $type         = validateInput('mod_type');
  $speed        = validateInput('mod_speed');
  $defaultState = validateInput('mod_default_state');
  $iconExpand   = validateInput('mod_icon_expand');
  $iconCollapse = validateInput('mod_icon_collapse');
  

  $modSettings['heading']           = validateInput('mod_heading');
  $modSettings['description']       = validateInput('mod_description');
  $modSettings['button_text']       = validateInput('mod_button_text');  
  $modSettings['type']              = (empty($type)) ? 'A' : $type ;
  $modSettings['default_state']     = (empty($defaultState)) ? 'E' : $defaultState ;
  $modSettings['icon_expand']       = (empty($iconExpand)) ? 'fa-angle-down' : $iconExpand ;
  $modSettings['icon_collapse']     = (empty($iconCollapse)) ? 'fa-angle-up' : $iconCollapse ;
  $modSettings['imp_page']          = validateInput('mod_imp_page');
  
  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);
  
  $message = $moduleMainHeading." settings have been saved";

}

?>