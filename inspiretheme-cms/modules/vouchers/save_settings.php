<?php

/** Save accommodation settings */

function saveSettings (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey, $modName;

  $modSettings = [];

  $modSettings['imp_page']     = validateInput('mod_imp_page');


  /** Update item data */
  ModuleSettings::saveSettings($modSettings, $modName);

  
  $vSettings = [];

  $vSettings['notification_email_address']        = validateInput('mod_email');
  $vSettings['success_payment_message']      = validateInput('mod_message');
  $vSettings['fail_payment_message']      = validateInput('mod_fail_message');
  $vSettings['terms_and_cond']      = requestVar('mod_terms');
  $vSettings['voucher_amount']      = requestVar('mod_amount');
  $vSettings['voucher_subject']      = requestVar('mod_voucher_subject');
  $vSettings['client_subject']      = requestVar('mod_client_subject');
  $vSettings['surcharge_text']      = validateInput('surcharge_text');
  $vSettings['valid_for']                   = validateInput('valid_for');

  DB::updateRow($vSettings, 'voucher_settings', "WHERE id = 1 LIMIT 1");

  $message = $moduleMainHeading." settings have been saved";

}

?>