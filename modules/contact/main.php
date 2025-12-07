<?php

require_once __DIR__.DS.'config.php';
//require_once __DIR__ . '/inc/vars.php';

//if ($mainPageId == $contactImpPageId) {

	// if(sanitizeInput('continue') === '1' && $formIsValid === true)
	// {
	// 	require_once __DIR__ . '/inc/insert_data.php';
	
	// } elseif(isset($_GET['success'])) {
	
	// 	require_once __DIR__ . '/views/form/success.php';
	
	// } else {
	
	// 	require_once __DIR__ . '/views/form/form.php';
	
	// }

	// /** CREATE PAGE CANONICAL TAGS*/
	// $pageCanonicalTags   = '<link rel="canonical" href="'.$contactPageFullUrl.'">';

//}
$contactFormView = '';
$templateTags['mod_view'] .= $contactFormView ? : '';

if (!empty($fcontactHeading) || !empty($fcontactShortDesc)) {

  require_once __DIR__ . '/views/widget/view.php';

}
$contactPhoneView = ''; $contactFaxView = ''; $contactFreePhoneView = ''; $contactAddressView = '';
if(!empty($contactPhoneNumber)){
	$contactPhoneView = '<strong>Phone: </strong><a href="tel:'.$contactPhoneNumber.'" > '.$contactPhoneNumber.'</a> ';
}
if(!empty($contactFaxNumber)){
	$contactFaxView =  '<strong>Fax: </strong> '.$contactFaxNumber.'';
}
if(!empty($contactFreePhoneNumber)) {
	$contactFreePhoneView = '<strong>Free Phone: </strong> '.$contactFreePhoneNumber.' ';
	$contactFreePhoneView = '<strong>Free Phone: </strong><a href="tel:'.$contactFreePhoneNumber.'" > '.$contactFreePhoneNumber.'</a> ';
}
if(!empty($contactAddress)){
	$contactAddressView = '<strong>Address:</strong> '.$contactAddress.' ';
}
if(!empty($impPageContact)){
	if($mainPageId == $impPageContact->id) {
		if(!empty($contactAddress) || !empty($contactPhoneNumber)) {	
			$templateTags['contact_details'] = '
			<section class="section contact_details ">
			<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
				<div class="main__content-wrapper">
					<div class="row content__row">
						<div class="col-xs-12 col-12 text-center">
							<p>'.$contactPhoneView.' &nbsp;&nbsp;'.$contactFaxView.'&nbsp;&nbsp; '.$contactFreePhoneView.'</p>
							<p>'.$contactAddressView.'</p>
						</div>
					</div>
				</div>
				</div>
			</div>
			</div>
			</section>
			';	
		}
	}
}