<?php
#******************************************************************************
#* Name          	: PxPay_Sample_Curl.php
#* Description   	: Direct Payment Solutions Payment Express PxPay PHP cURL Sample
#* Copyright	 	: Direct Payment Solutions 2009(c)
#* Date          	: 2009-10-21
#* References    	: http://www.paymentexpress.com/technical_resources/ecommerce_hosted/pxpay.html
#*@version 	        : 1.0
#* Author 		: Thomas Treadwell
#************************************ ******************************************

# This file is a sample demonstrating integration with the PxPay interface using PHP with the cURL extension installed.

$PxPay_Url    = "https://sec.paymentexpress.com/pxpay/pxaccess.aspx";

// Live Account
// $PxPay_Userid = "TheGeorgePxp2"; #Important! Update with your UserId
// $PxPay_Key    = "dc1bcbb35a5943d6b147332d124bfd7ebf4fe3dacc29faf559eb1ca6226004c0"; #Important! Update with your Key

// For testing

$PxPay_Userid = "TomahawkSurcharge_Dev"; #Important! Update with your UserId
$PxPay_Key    = "9d11e64e5f26792355ac0e16739a2bbc3d1818a14e4f165c2e307b0b8b117aa0"; #Important! Update with your Key




#Inlcude PxPay objects
include CLASS_DIR."/PxPay_Curl.inc.php";

$pxpay = new PxPay_Curl( $PxPay_Url, $PxPay_Userid, $PxPay_Key );


#******************************************************************************
# Database lookup to check the status of the order or shopping cart
#******************************************************************************

function isProcessed($TxnId): bool
{
	# Check database if order relating to TxnId has alread been processed
	$transaction = DB::fetchValue("SELECT `id` FROM `voucher_transaction` WHERE `txn_id` = '$TxnId' LIMIT 1");
 return (bool) $transaction;

}

function send_info()
{

	$voucher_amount = null;
 global $pxpay, $newVoucherIdString, $newVoucherId, $htmlroot, $segment1 , $impPageVoucher, $voucherTransactionId;

	$request     = new PxPayRequest();
	$http_host   = getenv("HTTP_HOST");
	$request_uri = $impPageVoucher->url;
	$server_url  = "http://$http_host";
	$script_url = BASE_URL.''.$impPageVoucher->full_url;

	# the following variables are read from the form
	$MerchantReference = uniqid('tomahawk');

	#Generate a unique identifier for the transaction
	$TxnId = uniqid("ID");

	$voucher_details = [];
	if(!empty($newVoucherIdString))
	{
		$sqldata = "SELECT `id`, `date`, `amount`, `voucher_name`,
		`purchaser_first_name`, `purchaser_last_name`, `purchaser_email`,`purchaser_phone`,
		`status`, `voucher_id`, `recipient_name`, `recipient_name_on_voucher`, `message`,
		`delivery_option`, `delivery_email`,`delivery_post`,`delivery_string`
		FROM `voucher_purchased`
		WHERE `voucher_transaction_id` = '{$voucherTransactionId}' ";
		$voucher_details = DB::fetchAll($sqldata);

if(!empty($voucher_details)){
	foreach ($voucher_details as $rowItem) {
		$voucher_amount          = $rowItem['amount'];
	}
}

		#Set PxPay properties
		$request->setMerchantReference($MerchantReference);
		$request->setAmountInput($voucher_amount);
		$request->setTxnData1('');
		$request->setTxnData2('');
		$request->setTxnData3($newVoucherIdString);
		$request->setTxnType("Purchase");
		$request->setCurrencyInput("NZD");
		$request->setUrlFail($script_url.'?error');			# can be a dedicated failure page
		$request->setUrlSuccess($script_url.'?success');	# can be a dedicated success page
		$request->setTxnId($TxnId);

		#The following properties are not used in this case
		$request->setEnableAddBillCard(1);    // Token Billing
		//$request->setBillingId($BillingId); // Comment out to let dps generate billing id
		# $request->setOpt($Opt);

		#Call makeRequest function to obtain input XML
		$request_string = $pxpay->makeRequest($request);

		#Obtain output XML
		$response = new MifMessage($request_string);

		#Parse output XML
		$url   = $response->get_element_text("URI");
		$valid = $response->get_attribute("valid");

		#Redirect to payment page
		header("Location: ".$url);
		exit();
	}
	else
	{
		return FALSE;
	}
}//send_info

function get_result_from_dps()
{

	global $pxpay, $tags_arr, $classdir, $incdir, $moddir, $htmlrootfull, $fromroot, $page,$root, $page_voucher, $templates_dir, $htmlroot,
			$comp_emails, $newVoucherIdString, $voucherTransactionId;

	$enc_hex             = $_GET["result"];

	$update_arr          = [];
	$new_transaction_arr = [];
	$email_template_tags = [];

	#getResponse method in PxPay object returns PxPayResponse object
	#which encapsulates all the response data

	$response                                   = $pxpay->getResponse($enc_hex);


	$TxnId                                      = $response->getTxnId();
	$success                                    = $response->getSuccess();   # =1 when request succeeds
	$new_transaction_arr['amount_settlement']   = $AmountSettlement     = $response->getAmountSettlement();
	$new_transaction_arr['amount_surcharge']    = $AmountSurcharge     = $response->getSurcharge()  ?: 0;

	$new_transaction_arr['auth_code']           = $AuthCode             = $response->getAuthCode();  # from bank
	$new_transaction_arr['cc_name']             = $CardName             = $response->getCardName();  # e.g. "Visa"
	$new_transaction_arr['cc_holder_name']      = $CardHolderName       = $response->getCardHolderName();
	$new_transaction_arr['cc_number']           = $CardNumber           = $response->getCardNumber(); # Truncated card number
	$new_transaction_arr['cc_date_expire']      = $DateExpiry           = $response->getDateExpiry(); # in mmyy format
	$new_transaction_arr['dps_billing_id']      = $DpsBillingId         = $response->getDpsBillingId();
	$new_transaction_arr['dps_ref']             = $DpsTxnRef            = $response->getDpsTxnRef();
	$new_transaction_arr['type']                = $TxnType              = $response->getTxnType();
	$new_transaction_arr['data1']               = $TxnData1             = $response->getTxnData1();
	$new_transaction_arr['data2']               = $TxnData2             = $response->getTxnData2();
	$new_transaction_arr['data3']               = $TxnData3             = $response->getTxnData3();
	$new_transaction_arr['currency_settlement'] = $CurrencySettlement    = $response->getCurrencySettlement();
	$new_transaction_arr['client_ip']           = $ClientInfo           = $response->getClientInfo(); # The IP address of the user who submitted the transaction
	$new_transaction_arr['txn_id']              = $TxnId                = $response->getTxnId();
	$new_transaction_arr['currency_input']      = $CurrencyInput        = $response->getCurrencyInput();
	$new_transaction_arr['merchant_ref']        = $MerchantReference    = $response->getMerchantReference();
	$new_transaction_arr['response_text']       = $ResponseText         = $response->getResponseText();
	$new_transaction_arr['mac_address']         =  $TxnMac              = $response->getTxnMac(); # An indication as to the uniqueness of a card used in relation to others
	$new_transaction_arr['response_url']        = $enc_hex;
	$new_transaction_arr['date_processsed']     = date("Y-m-d h:i:s");
	$BillingId                                  = $response->getBillingId();

	$buyer_id           = $response->getTxnData3();
	$transaction_id     = NULL;
	$new_transaction_id = NULL;

	if( !isProcessed($response->getTxnId()) )
	{
		$new_transaction_id = DB::updateRow($new_transaction_arr, 'voucher_transaction', "WHERE data3 = '$buyer_id' ");
	}

	// Get current order details

		$query = "SELECT vp.`id`, vp.`date`, vp.`amount`, vp.`voucher_name`,
					vp.`purchaser_first_name`, vp.`purchaser_last_name`, vp.`purchaser_email`, vp.`status`,
					vp.`voucher_id`, vp.`recipient_name`, vp.`delivery_option`,vp.`delivery_email`,vp.`delivery_post`,
					vp.`recipient_name_on_voucher`, vp.`message`, vp.`purchaser_phone`, vp.`is_notified`, vp.`delivery_string`,
					vt.`merchant_ref` AS dps_reference, vt.`response_text` AS dps_status, vt.`txn_id`,
					vt.`id` AS transaction_id, REPLACE(vt.`amount_settlement`, '.00', '') AS amountPaid,
					REPLACE(vt.`amount_surcharge`, '.00', '') AS surcharge,
	    			DATE_FORMAT(vt.`date_processsed`, '%e %M %Y') AS purchase_date
					FROM `voucher_purchased` vp
					LEFT JOIN voucher_transaction vt
					ON(vt.`id` = vp.`voucher_transaction_id`)
					WHERE vt.`data3` = '{$buyer_id}'";
	// $voucherTransactionData = DB::fetchAll($query);
	// $voucherNameAppend = '';
	// for($i=0; $i < count($voucherTransactionData); $i++) {
	// 	$voucherNameAppend .= $voucherTransactionData[$i]['voucher_name'] .',' .'<br>';

	// }
	//$voucherNameAppend = rtrim($voucherNameAppend, ',');

	$transaction_details = DB::fetchRow($query);

	$is_notified 	  = $transaction_details['is_notified'];

	$transaction_details['gstAmount'] = ((float)$transaction_details['amount'] + (float)$transaction_details['delivery'])*0.15;
	$transaction_details['amountPaid'] = (float)$transaction_details['surcharge']+(float)$transaction_details['amountPaid'];

	$email_settings = DB::fetchRow("SELECT `id`, `terms_and_cond`, `fail_payment_message`, `success_payment_message`,
		`notification_email_address` AS notification_email_address,`voucher_subject`,`client_subject`
		FROM `voucher_settings`
		WHERE `id` = 1");

	// get comany details i.e. name and emai laddress
	$company_details = DB::fetchRow("SELECT `company_name`, `email_address`,`address`,`phone_number` FROM `general_settings` WHERE `id` = '1'");
	$company_email   = $company_details['email_address'];
	$company_name    = $company_details['company_name'];
	$company_address    = $company_details['address'];
	$phone_number    = $company_details['phone_number'];

	if($success && $is_notified === 'N'){

		$voucher_path = MODULES_DIR."/voucher/email/voucher.tmpl";
		$template_path = MODULES_DIR."/voucher/email/voucher_admin.tmpl";
		$client_template_path = MODULES_DIR."/voucher/email/voucher_client.tmpl";


		if (file_exists($template_path) && file_exists($client_template_path)) {

			$email_template                    = file_get_contents($template_path);

			$email_template_tags               = [];
			$email_template_tags['subject']    = "Voucher has been Purchased";
			$email_template_tags['root']       = BASE_URL;
			$email_template_tags['company_email']       = $company_email;
			$email_template_tags['company_address']       = $company_address;
			$email_template_tags['phone_number']       = $phone_number;

			$email_template_tags               = [...$email_template_tags, ...$transaction_details];
			$email_template_tags               = array_merge($email_template_tags, $email_settings);
			$email_template_tags['ref_number'] = ($transaction_details['ref_number'] === '0') ? 'N/A' : $transaction_details['ref_number'];

			foreach ($email_template_tags as $tag => $value) {
				$email_template = str_replace("{".$tag."}", $value, $email_template);
			}

			// Initiate php mailer class to send email
			require_once  CLASS_DIR_PATH. "/PHPMailer.class.php";

			// Extract domain and set dynamic "From" email
			$domain = $_SERVER['HTTP_HOST'];
			$domain = preg_replace('/^www\./', '', $domain); // Remove 'www.' if present

			// Determine if it is a subdomain
			if (preg_match('/^[^.]+\.(netzone\.website)$/', $domain, $matches)) {
				// Use root domain for From email
				$verifiedDomain = $matches[1];
				$fromEmail = 'noreply@' . $verifiedDomain;
			} else {
				// Otherwise use the current domain
				$fromEmail = 'noreply@' . $domain;
			}

			// Send Email to Admin
			$mail = new PHPMailer();
			$mail->IsHTML();
			$mail->AddReplyTo($email_template_tags['purchaser_email']);
            $notificationEmailReceivers = explode(';', (string) $email_settings['notification_email_address']);
            foreach ($notificationEmailReceivers as $email ) {
                $mail->AddAddress(trim($email));
            }

			foreach ($comp_emails->list as $email)
				{
					$mail->AddCC($email);
				}

				// $mail->SetFrom($email_template_tags['purchaser_email']);
			$mail->SetFrom($fromEmail);
			$mail->FromName = $company_name;
			$mail->Subject  = $email_template_tags['subject'];
			$mail->msgHTML($email_template);
			$mail->Send();

			// Send Email to Purchaser
			$email_template_tags['subject']    = $email_settings['client_subject'] ?: "Voucher has been Purchased";
			$client_email_template = file_get_contents($client_template_path);

			foreach ($email_template_tags as $tag => $value) {
				$client_email_template = str_replace("{".$tag."}", $value, $client_email_template);
			}

			// if(!empty($email_settings['notification_email_address'])) {
			//     $fromEmails = explode(';', (string) $email_settings['notification_email_address']);
            //     $fromEmail = trim($fromEmails[0]);
            // } else {
            //     $fromEmail = $company_email;
            // }

			$mail2 = new PHPMailer();
			$mail2->IsHTML();
			$mail2->AddReplyTo($fromEmail);
			$mail2->AddAddress($email_template_tags['purchaser_email']);

			$mail2->SetFrom($fromEmail);
			$mail2->FromName = "{$company_name}";
			$mail2->Subject  = $email_template_tags['subject'];
			$mail2->msgHTML($client_email_template);
			$mail2->Send();

			// Send Email to Purchaser
			$email_template_tags['subject']    = $email_settings['voucher_subject'] ?: "Voucher has been Purchased";
			$voucher_template = file_get_contents($voucher_path);

			foreach ($email_template_tags as $tag => $value) {
				$voucher_template = str_replace("{".$tag."}", $value, $voucher_template);
			}

			if(file_exists($voucher_path) && $transaction_details['delivery_option'] == 'Email') {

				$mail3 = new PHPMailer();
				$mail3->IsHTML();
				$mail3->AddReplyTo($fromEmail);
				$mail3->AddAddress($transaction_details['delivery_email']);
				$mail3->SetFrom($fromEmail);
				$mail3->FromName = "{$company_name}";
				$mail3->Subject  = $email_template_tags['subject'];
				$mail3->msgHTML($voucher_template);
				$mail3->Send();
			}

			$arrupp = [];
			$arrupp['is_notified'] = 'Y';


			DB::updateRow($arrupp, 'voucher_purchased', "WHERE `id` = '{$transaction_details['id']}' LIMIT 1");

		}


	}


	return ($success) ? $buyer_id : false;
}

?>