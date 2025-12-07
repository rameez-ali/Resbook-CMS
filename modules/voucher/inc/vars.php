<?php 

/** Initialize variables */
$form               = '';
$formIsValid        = false;
$voucherFormView    = '';
$voucherPgUrl        = (empty($pageFullUrl)) ? $impPageVoucher->full_url : $pageFullUrl;
$voucherPageFullUrl = Helper::getFullUrl($voucherPgUrl);
$termConditionErrorMsg = '';
/** Create post variables */

$firstName            = validateInput('first-name');
$lastName             = validateInput('last-name');
$emailAddress         = validateInput('email-address', FILTER_VALIDATE_EMAIL);
$phoneNumber          = validateInput('phone-number');
$subject              = validateInput('subject');
$message              = validateInput('message');

$voucherType          = validateInput('voucher-type');
$voucherCustAmount    = validateInput('voucher-cust-amount');
$voucherTitle         = validateInput('voucher-title');

$name                 = validateInput('name');
$voucherName          = validateInput('voucher_name');

$deliveryEmail        = validateInput('delivery-email');
$deliveryAddress      = validateInput('delivery-address');
$deliverType          = validateInput('deliver-type');

$termCondition          = validateInput('term-condition');

$reName = str_replace(' ', '', (string) $name);

$amount = empty($voucherType) ? $voucherCustAmount : $voucherType;
/** Validate Input Data */
if (sanitizeInput('continue') === '1') { 

	/** Create error variables */
	$firstNameError     = true;
	$nameError     = true;
	$emailAddressError  = true;
	$contactNumberError = true;
	$captchaError       = true;
	$voucherAmountError = true;
	$deliverTypeError = true;
	$deliveryEmailError = true;
	$deliveryAddressError = true;
	$termConditionError = true;
	
	/** validate Voucher Amount */
	if (empty($voucherType) && empty($voucherCustAmount)) {	
		$voucherAmountErrorMsg = displayMessage('Please choose voucher amount or apply custom price.');	
	} else {		
		$voucherAmountErrorMsg  = '';
		$voucherAmountError     = false;
	}

	/** validate Delivery Type */
	if (empty($deliverType)) {	
		$deliverTypeErrorMsg = displayMessage('Please choose one of the opition for delivery.');	
	} else {		
		$deliverTypeErrorMsg  = '';
		$deliverTypeError     = false;
	}
	
	/** validate Delivery Type */
	if (!empty($deliverType) && $deliverType == 'Email' && empty($deliveryEmail)) {	
		$deliveryEmailErrorMsg = displayMessage('Email Address is required.');	
		$deliveryEmailError = true;
		$deliveryAddressError = false;
	} elseif (!empty($deliverType) && $deliverType == 'Post' && empty($deliveryAddress)) { 
		$deliveryAddressErrorMsg = displayMessage('Post/Courier Address is required.');
		$deliveryAddressError = true;
		$deliveryEmailError = false;
	} else {		
		$deliveryEmailErrorMsg  = '';
		$deliveryAddressError  = '';
		$deliveryEmailError = false;
		$deliveryAddressError = false;
	}

	/** validate first name */
	if (empty($termCondition)) {	
		$termConditionErrorMsg = displayMessage('Please accept terms and condition.');
	}  else {
		$termConditionErrorMsg  = '';
		$termConditionError     = false;
	}

	/** validate first name */
	if (empty($firstName)) {	
		$firstNameErrorMsg = displayMessage('First name is required.');
	} elseif (!isAlpha($firstName)) {
		$firstNameErrorMsg = displayMessage('Invalid first name provided.');
	} else {
		$firstNameErrorMsg  = '';
		$firstNameError     = false;
	}
	/** validate first name */
	if (empty($name)) {	
		$nameErrorMsg = displayMessage('Recipient name is required.');
	} elseif (!isAlpha($reName)) {
		$nameErrorMsg = displayMessage('Invalid recipient name provided.');
	} else {
		$nameErrorMsg  = '';
		$nameError     = false;
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

	if (!$firstNameError 
		&& !$lastNameError 
		&& !$emailAddressError		
		&& !$voucherAmountError
		&& !$deliverTypeError
		&& !$deliveryAddressError 
		&& !$termConditionError 
		&& !$deliveryEmailError
		&& !$nameError
		) {

		$formIsValid = true;

	} 

}

?>