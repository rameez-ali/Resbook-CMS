<?php
	
	$firstName    = validateInput('first-name');
	$lastName     = validateInput('last-name');
	$emailAddress = validateInput('email-address', FILTER_VALIDATE_EMAIL);


	// If all posted data is valid store entry information in database
	$insArr = [];
	
	$insArr['first_name']    = $firstName;
	$insArr['last_name']     = $lastName;
	$insArr['full_name']     = trim("{$firstName} {$lastName}");
	$insArr['email_address'] = $emailAddress;
	$insArr['date_added']    = date('Y-m-d H:i:s');
	$insArr['ip_address']    = getenv('REMOTE_ADDR');
	$insArr['form_id']       = $pageFormId;

	$formEntryId = insertRow($insArr, 'form_entry');

	if( $formEntryId && $pageFormId )
	{

		$insertQuery = '';

		foreach ($formFields as $formField)
		{
			$fieldPostedValue = $_REQUEST["{$formField['name']}"];
			if(is_array($fieldPostedValue)) {
                $valueString = '';
				foreach ($fieldPostedValue as $item ) {
					$valueString .= htmlspecialchars((string) $item) . ", ";
				}
                $fieldPostedValue = $valueString;
			}
			$fieldPostedValue = htmlspecialchars((string) $fieldPostedValue);
			$insertQuery .= ",('{$formField['label']}','{$fieldPostedValue}',{$pageFormId},{$formEntryId})";
		}

		if( $insertQuery !== '' && $insertQuery !== '0' )
		{
			$insertQuery = ltrim($insertQuery, ',');
			runQuery("INSERT INTO `form_entry_data`(`label`, `value`, `form_id`, `form_entry_id`) VALUES {$insertQuery}");
		}

		$entryData = fetchRow("SELECT `id`, `first_name`, `last_name`, `full_name`,
			`email_address`, DATE_FORMAT(`date_added`, '%d %b %Y %h:%i %p') AS added_date
			FROM `form_entry`
			WHERE `id` = '{$formEntryId}'
			AND `form_id` = '{$pageFormId}'
			LIMIT 1");


		$postedFormData = fetchAll("SELECT `label`, `value`
			FROM `form_entry_data`
			WHERE `value` != ''
			AND `form_id` = '{$pageFormId}'
			AND `form_entry_id` = '{$formEntryId}'");

		//  Assign to mailchimp if mailchimp list id is assiged to this form

		if( !empty($postedFormData) )
		{

			//  Generate form fields view
			$formData = '';

			foreach ($postedFormData as $fieldData)
			{
				$fieldDataValue = ($fieldData['value'] ?: '-');

				$fieldDataValue = ( filter_var($fieldDataValue, FILTER_VALIDATE_EMAIL) ) ? '<a href="mailto:'.$fieldDataValue.'">'.$fieldDataValue.'</a>' : $fieldDataValue;

				$formData .= '<tr>
					<td width="200" valign="top"><strong>'.$fieldData['label'].':</strong></td>
					<td valign="top">'.$fieldDataValue.'</td>
				</tr>';
			}

			//  Send email to user and admin
			$emailTemplatePath = TEMPLATES_DIR_PATH."/email/client_success.tmpl";

			$emailTemplateTags = [];

			$emailTemplateTags['email_subject'] = $emailSubject;
			$emailTemplateTags['added_date']    = $entryData['added_date'];
			$emailTemplateTags['form_data']     = $formData;

			$compiledEmail = processTemplate($emailTemplatePath, $emailTemplateTags);
			
			// Initiate php mailer class to send email
			require_once (CLASS_DIR_PATH.DS.'PHPMailer.class.php');

			$emailAdd = empty($formEmailAddress) ? $contactEmailAddress : $formEmailAddress;

			// Split multiple email addresses by commas or semicolons
			$emailAddresses = preg_split('/[;,]+/', $emailAdd);

			// Send Email
			$mail = new PHPMailer();
			$mail->IsHTML();
			$mail->AddReplyTo($entryData['email_address']);

			foreach ($emailAddresses as $emailAddress) {
				$emailAddress = trim($emailAddress);
				if (!empty($emailAddress)) {
					$mail->AddAddress($emailAddress);
				}
			}

			if( !empty($compiledEmail) )
			{
				foreach ($compiledEmail->list as $email)
				{
					$mail->AddCC($email);
				}
			}
			// Set the From address dynamically based on the current domain
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

			// $mail->SetFrom($entryData['email_address']);
			$mail->SetFrom($fromEmail);
			$mail->FromName = $entryData['full_name'];
			$mail->Subject  = $emailSubject;
			$mail->msgHTML($compiledEmail);

			if ($mail->Send()) {
				Helper::redirect(BASE_URL.$pageFullUrl.'?success='.md5((string) $formEntryId));
				exit();
			} else {
				// Handle error
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}

		}

	}
?>
