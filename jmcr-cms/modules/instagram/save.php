<?php

/** Save account data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading;;

  $igAccounts = requestVar('account');

  $now = Helper::getCurrentDateTimeStr();

  $currentDate     = new DateTime();
  $lastChangeDate = $currentDate->modify('-4 hours');
  $lastFeedTime = $lastChangeDate->format('Y-m-d H:i:s');

  if (!empty($igAccounts)) {
  
    foreach ($igAccounts as $igAccountId => $igAccount) {
        
      $tempAccountData = [];
      
      $tempAccountData['username']           = sanitizeVar($igAccount['username']);
      $tempAccountData['client_id']          = sanitizeVar($igAccount['clientid']);
      $tempAccountData['client_secret']      = sanitizeVar($igAccount['clientsecret']);
      $tempAccountData['access_token']       = sanitizeVar($igAccount['accesstoken']);
      $tempAccountData['url']                = sanitizeVar($igAccount['url'], FILTER_VALIDATE_URL);
      $tempAccountData['create_token_time']  = $now;
      $tempAccountData['refresh_token_time'] = $now;
      $tempAccountData['last_feed_datetime']     = $lastFeedTime;

      DB::updateRow($tempAccountData, 'instagram_accounts', "WHERE id = '{$igAccountId}'");

    }
  }
  
  $message = ucfirst(strtolower((string) $moduleMainHeading))." have been saved";
  
}

?>