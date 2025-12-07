<?php

/** Identify module for Settings */
$modName     = 'Gallery';

$gallerySettings = ModuleSettings::fetchSettings($modName);

if (!empty($gallerySettings)) {

  /** define vars */

  $galleryImpPageId   = $gallerySettings['imp_page'];

  $impPageGallery     = DBHelper::fetchImpPageData($galleryImpPageId);
}