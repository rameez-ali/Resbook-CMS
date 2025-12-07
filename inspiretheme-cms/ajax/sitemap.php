<?php

require_once (__DIR__ . '/../../utility/config.php'); ## System config file

if(!$cConnection->Connect())
{
    echo "Database connection failed";
    exit;
}

$Message   = "";
$c_Message = $cConnection->GetMessage();

$action = mysqli_real_escape_string($cConnection->Connect(), (string) $_POST['action']);

if ($action === 'generate-sitemap') {
    generateSitemap();
}

function generateSitemap() {

	$data = [];
 $isValid     = false;
	$state       = '';
	$message     = '';
	$dateUpdated = '';

	$sitemapStatus = Sitemap::generate();

	if($sitemapStatus) {

		$sitemapUpdatedDate = fetchValue("SELECT `set_sitemapupdated`
	    FROM general_settings
	    WHERE `id` = '1'
	    LIMIT 1");

		$updatedDate = Helper::getDateTimeStr($sitemapUpdatedDate);

		$isValid 			= true;
		$message      = 'Sitemap has been updated.';
		$dateUpdated  = $sitemapUpdatedDate;
		$state        = 'success';


	}else{

		$message      = "Error! Couldn't update sitemap. Please try again later.";
		$state        = 'danger';
		
	}

	$data['isValid']    = $isValid;
  $data['state']      = $state;
  $data['msg']        = $message;
  $data['updatedOn']  = $dateUpdated;

	die(json_encode($data, JSON_THROW_ON_ERROR));

}

?>