<?php


$gcSiteKey     = GC_SITE_KEY;
$gcSecretKey   = GC_SECRET_KEY;

$jsonData = DB::fetchValue("
    SELECT `json_data` FROM `form` WHERE `id` = {$pageFormId}
");

$formFields = json_decode((string) $jsonData, true, 512, JSON_THROW_ON_ERROR);

$form                 = '';
$captchaErrorMsg    = '';
$tcErrorMsg         = '';

$tc             = filter_input(INPUT_POST, 'tc');

$tcChecked = ($tc) ?  'checked="checked"' : '';

// validate required fields
if( isset($_POST['continue']) )
{
	//  Create form validation rules
	require_once CLASS_DIR_PATH."/FormValidation.class.php";

	$formValidation = new FormValidation();

	foreach ($formFields as $formField)
	{
	    $formFieldLabel       = ($formField['type'] == 'checkbox-group') ? 'This field' : $formField['label'];
	    $formFieldName        = $formField['name'] ?? null;
	    $formFieldType        = $formField['type'] ?? null;
	    $formFieldSubtype     = $formField['subtype'] ?? null;
			$formFieldIsRequired = $formField['required'] ?? null;
	    if( $formFieldIsRequired == true )
	    {
	        $additionalRule = ($formFieldSubtype == 'email') ? '|email' : '';
	        $validationRule = 'trim|required'.$additionalRule;

	        $validationRule = (preg_match("/.*(group)/", (string) $formFieldType)) ? 'group' : $validationRule;
	        $formValidation->setRule($formFieldName, $formFieldLabel, $validationRule);
			}
	}

	if( $hasTermsAndConditions )
	{
		$formValidation->setRule('tc', 'Please accept terms and conditions', 'trim|required', true);
	}

	$captchaResponseToken = filter_input(INPUT_POST, 'g-recaptcha-response');
	$captchaError = false;

	// validate captcha
	if( !empty($captchaResponseToken) )
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "secret={$gcSecretKey}&response={$captchaResponseToken}&remoteip=".getenv('REMOTE_ADDR'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$gRecaptchaResponseJson = curl_exec ($ch);
		curl_close ($ch);

		$gRecaptchaResponse = json_decode($gRecaptchaResponseJson, true, 512, JSON_THROW_ON_ERROR);

		$captchaError = !$gRecaptchaResponse['success'];
	}
	else
	{
		$captchaError = TRUE;
		$captchaErrorMsg = 'Invalid captcha provided.';
	}

	$formIsValid     = $formValidation->validate();

	//  Catch form errors
	$tcErrorMsg      = $formValidation->getError('tc');
}

?>