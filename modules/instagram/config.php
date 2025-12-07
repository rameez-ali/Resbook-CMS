<?php

$flgProductionMode = (PRODUCTION_MODE === true) ? FLAG_YES : FLAG_NO;

$sqlSettings = "SELECT `id`,
    `username`,
    `client_id`,
    `client_secret`,
    `access_token`,
    `url`
  FROM `instagram_accounts`
  WHERE `is_production_mode` = '{$flgProductionMode}'";

$instagramSettings = DB::fetchRow($sqlSettings);

if (!empty($instagramSettings)) {

  $instagramClientId     = $instagramSettings['client_id'];
  $instagramClientSecret = $instagramSettings['client_secret'];
  $instagramAccessToken  = $instagramSettings['access_token'];
  $instagramUsername     = $instagramSettings['username'];
  $instagramUrl          = $instagramSettings['url'];
     
}

?>