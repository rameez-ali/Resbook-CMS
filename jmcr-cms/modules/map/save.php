<?php

/** Save account data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading;;

  $gmAccounts = requestVar('account');

  if(!empty($gmAccounts)){
  
    foreach ($gmAccounts as $gmAccountId => $gmAccount) {
        
      $tempAccountData = [];
      
      $tempAccountData['api_key']     = sanitizeVar($gmAccount['apikey']);
     
      DB::updateRow($tempAccountData, 'googlemap_account', "WHERE id = '{$gmAccountId}'");

    }
  }
  
  $message = ucfirst(strtolower((string) $moduleMainHeading))." have been saved";
  
}

?>