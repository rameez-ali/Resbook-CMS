<?php 

if ($pageFormId)
{

	$sql = "SELECT `public_token`, `name`, `email_subject`, `email_address`, `mailchimp_list_id`,
	   `success_message`, `terms_and_conditions`
		FROM `form`
		WHERE `id` = '{$pageFormId}'
		AND `status` = '".FLAG_ACTIVE."'
		LIMIT 1";

	$formDetails = DB::fetchRow($sql);

	if( !empty($formDetails) )
	{
		
		$successMessage      = nl2br((string) $formDetails['success_message']);
		$termsAndConditions = $formDetails['terms_and_conditions'];
		$emailSubject        = $formDetails['email_subject'];
		$formEmailAddress        = $formDetails['email_address'];
		$mailchimpListId    = $formDetails['mailchimp_list_id'];
		
		$hasTermsAndConditions = (bool) $termsAndConditions;
		
		require_once __DIR__ . '/inc/vars.php';


		if( isset($_POST['continue']) )
		{
			if($formIsValid && !$captchaError) {
			    require_once __DIR__ . '/inc/insert_data.php';
            }else
            {
                require_once __DIR__ . '/inc/form.php';
            }
		}
		elseif( isset($_GET['success']) )
		{
			require_once __DIR__ . '/inc/success.php';
		}
		else
		{
			require_once __DIR__ . '/inc/form.php';
		}
				
		$templateTags['content'] .= '<section class="section form_bg" id="form_id"><div class="container">'.$form.'</div></section>';

    }


    
}

?>