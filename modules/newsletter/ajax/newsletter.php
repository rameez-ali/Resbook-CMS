<?php

require_once (__DIR__ . '/../../../utility/config.php'); 

if (!$cConnection->Connect()) {
  
  echo "Database connection failed";
  exit;

}

$Message   = "";
$cMessage = $cConnection->GetMessage();


$requestType = $_POST ?: $_GET;

$action       = sanitizeVar($requestType['action']);

if ($action === 'sign-up') {
    doMailchimpSignup();
}

function doMailchimpSignup()
{
	global $requestType;

	$msg      = '';
	$msgType = 'text-danger';
	$isValid = false;

	$fullName     = '';
	$emailAddress = sanitizeOne(strtolower((string) $requestType['email']));

	if (!empty($emailAddress)) {

		if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) { 
			
      $flgProductionMode = (PRODUCTION_MODE === true) ? FLAG_YES : FLAG_NO;

      $mailchimpApiKey = '';
      $mailchimpListId = '';

      /** GET Mailchimp API Key */
      $sqlMcAccounts = "SELECT `id`,
        `api_key`
        FROM `mailchimp_account`
        WHERE `is_production_mode` = '{$flgProductionMode}'";

      $mcSettings = DB::fetchRow($sqlMcAccounts);

      if(!empty($mcSettings)) {

        $mcAccountId  = $mcSettings['id'];
        $mcApiKey     = $mcSettings['api_key'];

        /** GET Mailchimp List Id */
        $sqlList = "SELECT `option_value`
          FROM `mailchimp_lists`
          WHERE `option_key` = 'primary_list_id'
            AND `mailchimp_account_id` = '{$mcAccountId}'";

        $mcListId = DB::fetchValue($sqlList);

      }

			if (!empty($mcApiKey ) && !empty($mcListId)) { 

				/** Initiate Mailchimp Object */
				$MailChimp = new MailChimp($mcApiKey);

				/** Check if email already subscribed to the list */
				$mcListMember = $MailChimp->get("lists/$mcListId/members/".md5((string) $emailAddress), []);
				
				/** Check subscribe status for provided email */
				if(isset($mcListMember['unique_email_id']) 
					&& $mcListMember['email_address'] == $emailAddress 
					&& $mcListMember['status'] == 'subscribed') {
					
					$mcCallStatus = 'subscribed';

				} else {
					
					$mcCallStatus = 'pending';

				}

				/** Subscribe email and show results */

				$result = $MailChimp->put("lists/$mcListId/members/".md5((string) $emailAddress), [
					"email_address" => $emailAddress,
					'merge_fields'  => ['FNAME'=>'', 'LNAME'=>'','FPHONE'=>'', 'FMSG'=>''],
					"status_if_new" => $mcCallStatus,
					"status"        => $mcCallStatus
				]);

				if ($MailChimp->success() && $mcCallStatus == 'subscribed') {
        $msg      = $emailAddress.' is already subscribed to list.';
    } elseif ($MailChimp->success()) {
        $msg     = 'Success! Check your email to confirm sign up.';
        $msgType = 'newsletter__success';
        $isValid = true;
    } else {

					$msg      = 'Something went wrong! Please contact us for more information.';

				} 
			}

		} else {

			$msg = 'Invalid email address provided.';

		}

	} else {

		$msg = 'Your name and email address is required.';

	}
	
	die( json_encode( ['msg' => $msg, 'type' => $msgType, 'isValid' => $isValid], JSON_THROW_ON_ERROR ) );
}

?>