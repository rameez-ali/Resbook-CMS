<?php
/** Identify module for Settings */
$modName     = 'Review';

$reviewSettings = ModuleSettings::fetchSettings($modName);

if(!empty($reviewSettings)) {

  $rsHeading         = $reviewSettings['heading'];
  $rsButtonText      = $reviewSettings['button_text'];
  $rsBackgroundPhoto = $reviewSettings['background_photo'];
  $rsCount           = $reviewSettings['limit'];
  $rsOrderBy         = $reviewSettings['order_by'];
  $rsSpeed           = $reviewSettings['speed'];
  $rsAutoplay        = $reviewSettings['autoplay'];
  $rsNavigation      = $reviewSettings['navigation'];
  $rsImpPageId       = $reviewSettings['imp_page'];

  $impPageReviews = DBHelper::fetchImpPageData($rsImpPageId);  
}

$orderBy = match ($rsOrderBy) {
    'D' => 'r.`date_posted` DESC',
    'R' => 'r.`rank` ASC',
    default => 'RAND()',
};

?>