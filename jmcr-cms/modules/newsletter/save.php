<?php

/** Save account data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading;;

  $mcAccounts = requestVar('account');
  $mcLists    = requestVar('list');

  /** Save Account Api Details */
  if(!empty($mcAccounts)){
  
    foreach ($mcAccounts as $mcAccountId => $mcApiKey) {
        
      $tempAccountData = [];
      
      $tempAccountData['api_key']      = sanitizeVar($mcApiKey);
      
      DB::updateRow($tempAccountData, 'mailchimp_account', "WHERE id = '{$mcAccountId}'");

    }
  }

  /** Save Lists Ids */
  if(!empty($mcLists)){
  
    foreach ($mcLists as $mcAccountListId => $mcListId) {
        
      $tempListData = [];
      
      $tempListData['option_value']  = sanitizeVar($mcListId);
      
      DB::updateRow($tempListData, 'mailchimp_lists', "WHERE id = '{$mcAccountListId}'");

    }
  }
  
  $message = ucfirst(strtolower((string) $moduleMainHeading))." have been saved";
  
}

?>