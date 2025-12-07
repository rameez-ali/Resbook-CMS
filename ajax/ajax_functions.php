<?php

require_once (__DIR__ . '/../utility/config.php');

if(!$cConnection->Connect())
{
	echo "Database connection failed";
	exit;
}

$request_type = $_POST ?: $_GET;

$action       = sanitizeVar($request_type['action']);

if ($action === 'sign-up') {
    doMailchimpSignup();
}

function doMailchimpSignup()
{
	global $request_type;

	$msg      = '';
	$msgType = 'form--newsletter__msg--error';
	$isValid = false;

	$fullName     = '';
	$emailAddress = sanitizeOne(strtolower((string) $request_type['email']));

	if (!empty($emailAddress)) {

		if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) { 
			
			$mailchimpData = fetchRow("SELECT `mailchimp_api_key`, `mailchimp_list_id` 
				FROM `general_settings` 
				WHERE `id` = '1'
				LIMIT 1");

			if ($mailchimpData) { 

				$mcListId  = $mailchimpData['mailchimp_list_id'];
				$mcApiKey = $mailchimpData['mailchimp_api_key'];
				
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
        $msgType = 'form--newsletter__msg--success';
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