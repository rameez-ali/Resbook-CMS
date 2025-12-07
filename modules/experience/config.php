<?php

/** Identify module for Settings */
$modName            = 'Experience';

$experienceSettings = ModuleSettings::fetchSettings($modName);

if (!empty($experienceSettings)) {

  /** define vars */

  $expHeading         = $experienceSettings['heading'];
  $expMoreHeading     = $experienceSettings['experince_heading'];
  $expButtonText      = $experienceSettings['button_text'];
  $expDescription     = $experienceSettings['description']; 
  $expImpPageId       = $experienceSettings['imp_page'];

  $impPageExperiences = DBHelper::fetchImpPageData($expImpPageId);
}

?>