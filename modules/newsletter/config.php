<?php

$flgProductionMode = (PRODUCTION_MODE === true) ? FLAG_YES : FLAG_NO;

/** GET Mailchimp API Key */
$sqlMcAccounts = "SELECT `id`,
  `api_key`
  FROM `mailchimp_account`
  WHERE `is_production_mode` = '{$flgProductionMode}'";

$mcSettings = DB::fetchRow($sqlMcAccounts);

if (!empty($mcSettings)) {

  $mcAccountId      = $mcSettings['id'];
  $mailchimpApiKey  = $mcSettings['api_key'];

  /** GET Mailchimp List Id */
  $sqlList = "SELECT `option_value`
    FROM `mailchimp_lists`
    WHERE `option_key` = 'primary_list_id'
      AND `mailchimp_account_id` = '{$mcAccountId}'";

  $mailchimpListId = DB::fetchValue($sqlList);

}

/** GET Newsletter Settings */

$newsletterSettings = ModuleSettings::fetchSettings('Newsletter');

if (!empty($newsletterSettings)) {

   /** define vars */

  $newsletterHeading         = $newsletterSettings['heading'];
  $newsletterDescription     = $newsletterSettings['description'];
   
}
?>