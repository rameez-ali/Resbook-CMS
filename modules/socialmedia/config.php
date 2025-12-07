<?php

$sqlSocialMedia = "SELECT `id`,
    `name`,
    `url`,
    `title`,
    `icon_cls`,
    `icon_image_path`,
    `status`,
    `rank`
  FROM `social_media_account`
  WHERE `status` = '".FLAG_ACTIVE."'
    AND (`icon_cls` != '' OR `icon_image_path` != '')
    AND `url` != ''
  ORDER BY `rank` ASC";
  
$arrSocialMedia = DB::fetchAll($sqlSocialMedia);

/** Identify module for Settings */

$smSettings = ModuleSettings::fetchSettings('Social Media Account');

if (!empty($smSettings)) {

  /** define vars */

  $socialmediaHeading       = $smSettings['heading'];
  $socialmediaDescription   = $smSettings['description'];
  
}

?>