<?php

/** Save review settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modName;

  $modSettings = [];

  $count      = validateInput('mod_count');
  $speed      = validateInput('mod_speed');
  $navigation = validateInput('mod_navigation');
  $autoplay   = validateInput('mod_autoplay');
  $orderBy    = validateInput('mod_order_by');

  $modSettings['heading']           = validateInput('mod_heading');
  $modSettings['button_text']       = validateInput('mod_button_text');
  $modSettings['background_photo']  = validateInput('mod_background_photo');
  $modSettings['limit']             = (($count > 10) ? 10 : (empty($count) ?  1 : $count ));
  $modSettings['speed']             = (($speed > 10) ? 10 : (empty($speed) ?  4 : $speed ));
  $modSettings['navigation']        = (empty($navigation)) ? 'A' : $navigation ;
  $modSettings['autoplay']          = (empty($autoplay)) ? 'Y' : $autoplay ;
  $modSettings['order_by']          = (empty($orderBy)) ? 'A' : $orderBy ;
  $modSettings['imp_page']          = validateInput('mod_imp_page');
  
  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);

  $message = $moduleMainHeading." settings have been saved";

}

?>