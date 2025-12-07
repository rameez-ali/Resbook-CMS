<?php

/** Identify module for Settings */
$modName               = 'Blog';

$blogSettings = ModuleSettings::fetchSettings($modName);

if(!empty($blogSettings)) {
  
  $bsHeading     = $blogSettings['heading'];
  $bsButtonText  = $blogSettings['button_text'];
  $bsDescription = $blogSettings['description'];
  $bsImpPage     = $blogSettings['imp_page'];

  $impPageBlog  = DBHelper::fetchImpPageData($bsImpPage);

}

?>