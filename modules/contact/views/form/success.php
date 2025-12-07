<?php 

$hashedEnquiryId = $_GET['success'];

$isEnquiry = fetchValue("SELECT `id` 
	FROM `enquiry` 
	WHERE MD5(`id`) = '{$hashedEnquiryId}' 
	LIMIT 1");

if ($isEnquiry) {

	$pageHeading 		  = 'Success!';
	$pageIntroduction = '<div class="row">
	    <div class="col-12" style="text-align:center;">
		    <p class="text-success">Thank you for your enquiry. We will get back to you as soon as possible.</p>
		</div>
	</div>';

} else {

	Helper::redirect($contactPageFullUrl);
	exit();

}