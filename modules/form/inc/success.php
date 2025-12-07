<?php 

$hashedEntryId = $_GET['success'];
$isValidEntry = DB::fetchValue("SELECT `id` FROM `form_entry` WHERE MD5(`id`) = '{$hashedEntryId}' LIMIT 1");

if( !$successMessage )
{
	$successMessage = 'We\'ve received your request. We\'ll get back to you as soon as possible.';
}

if( $isValidEntry && $successMessage )
{

	$pageHeading 		  = 'Success!';
	$pageIntroduction = '<div class="row">
	    <div class="col-12">
		    <p class="text-success">'.$successMessage.'</p>
		</div>
	</div>';

}
else
{
	Helper::redirect(BASE_URL.$pageFullUrl);
	exit();
}



?>