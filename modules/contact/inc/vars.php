<?php 

/** Initialize variables */
global $firstNameError, $lastNameError, $subjectError, $emailAddressError, $contactNumberError, $messageError, $captchaError,
$lastNameErrorMsg, $firstNameErrorMsg, $emailAddressErrorMsg, $messageErrorMsg, $captchaErrorMsg;

$gcSiteKey          = GC_SITE_KEY;
$gcSecretKey        = GC_SECRET_KEY;

$form               = '';
$formIsValid        = false;
$contactFormView    = '';
$cotactPgUrl        = (empty($pageFullUrl)) ? $impPageContact->full_url : $pageFullUrl;
$contactPageFullUrl = Helper::getFullUrl($cotactPgUrl);

/** Create post variables */

$firstName            = validateInput('first-name');
$lastName             = validateInput('last-name');
$emailAddress         = validateInput('email-address', FILTER_VALIDATE_EMAIL);
$contactNumber        = validateInput('contact-number');
$subject              = validateInput('subject');
$message              = validateInput('message');

$captchaResponseToken = isset($_POST['g-recaptcha-response']);


/** FETCH ANY GET DATA */

if (isset($_GET['subject'])) {

	$subject = $_GET['subject'];

} elseif (empty($subject)) {

	$subject = '';

} 


/** Validate Input Data */
if (sanitizeInput('continue') === '1') { 

	/** Create error variables */
	$firstNameError     = true;
	$emailAddressError  = true;
	$contactNumberError = true;
	$messageError       = true;
	$captchaError       = true;
	
	/** validate first name */
	if (empty($firstName)) {	
	
		$firstNameErrorMsg = displayMessage('First name is required.');
	
	} elseif (!isAlpha($firstName)) {
	
		$firstNameErrorMsg = displayMessage('Invalid first name provided.');
	
	} else {
		
		$firstNameErrorMsg  = '';
		$firstNameError     = false;

	}

	/** validate last name */
	if (empty($lastName)) {

		$lastNameErrorMsg = displayMessage('Last name is required.');

	} elseif (!isAlpha($lastName)) {

		$lastNameErrorMsg = displayMessage('Invalid last name provided.');

	} else {

		$lastNameErrorMsg = '';
		$lastNameError    = false;

	}


	/** validate email address */
	if (empty($emailAddress)) {

		$emailAddressErrorMsg = displayMessage('Email address is required.');

	} elseif (!isEmail($emailAddress)) {

		$emailAddressErrorMsg = displayMessage('Invalid email provided.');

	} else {

		$emailAddressErrorMsg = '';
		$emailAddressError    = false;

	}

	/** validate Message */
	if (empty($message)) {

		$messageErrorMsg = displayMessage('Message is required.');

	} else {
		
		$messageErrorMsg = '';
		$messageError    = false;

	}


	/** validate captcha */
	if (!empty($captchaResponseToken)) {

		$postFields = "secret={$gcSecretKey}&response={$captchaResponseToken}&remoteip=".getenv('REMOTE_ADDR');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$gRecaptchaResponseJson = curl_exec ($ch);
		curl_close ($ch);

		$gRecaptchaResponse = json_decode($gRecaptchaResponseJson, true, 512, JSON_THROW_ON_ERROR);
		
		$captchaError = !$gRecaptchaResponse['success'];
	
	} else {
	
		$captchaError = TRUE;
		$captchaErrorMsg = 'Invalid captcha provided.';
	
	}

	if (!$firstNameError 
		&& !$lastNameError 
		&& !$emailAddressError
		&& !$messageError
		&& !$captchaError
		) {

		$formIsValid = true;

	} 

}

?>