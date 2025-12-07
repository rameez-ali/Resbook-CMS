<?php

require_once (__DIR__ . '/../../../utility/config.php'); 

if (!$cConnection->Connect()) {
  
  echo "Database connection failed";
  exit;

}

$Message   = "";
$cMessage = $cConnection->GetMessage();

$requestType = $_POST ?: $_GET;

$action       = sanitizeVar($requestType['action']);

if ($action === 'fetch-igfeed') {
    fetchInstagramFeed();
}


function fetchInstagramFeed()
{
	$data = [];
 global $instagramAccessToken, $flgProductionMode;

	$isValid  = false;
	
	$flgProductionMode = (PRODUCTION_MODE === true) ? FLAG_YES : FLAG_NO;

	$sqlSettings = "SELECT `id`,
			`username`,
			`client_id`,
			`client_secret`,
			`access_token`,
			`url`,
			TIMESTAMPDIFF( HOUR , `refresh_token_time`,NOW()) as `token_time_diff`,
			TIMESTAMPDIFF( HOUR , `last_feed_datetime`,NOW()) as `feed_time_diff`
		FROM `instagram_accounts`
			WHERE `is_production_mode` = '{$flgProductionMode}'";

	$instagramSettings = DB::fetchRow($sqlSettings);

	if (!empty($instagramSettings)) {

		$instagramClientId     = $instagramSettings['client_id'];
		$instagramClientSecret = $instagramSettings['client_secret'];
		$instagramAccessToken  = $instagramSettings['access_token'];
		$instagramTimeDiff     = $instagramSettings['token_time_diff'];	
		$instagramFeedDiff     = $instagramSettings['feed_time_diff'];	
	
		$instagramFeeds = DB::fetchAll("SELECT
				`media_id`
				FROM `instagram_feeds`");

		if($instagramTimeDiff >= 24 || empty($instagramFeeds)){
			refreshToken();	
		}
		
		if($instagramFeedDiff >= 3|| empty($instagramFeeds)) {
			fetchIGFeed();
		}
	}

	$instagramFeeds = DB::fetchAll("SELECT
				`media_id`,
				`media_type`,
				`media_url`,
				`thumbnail_url`,
				`permalink`,
				`caption`
				FROM `instagram_feeds`");
	
	$data['items'] = (empty($instagramFeeds)) ? [] : $instagramFeeds;
	$data['isValid'] = true;
	die( json_encode( $data, JSON_THROW_ON_ERROR ) );
}
/**
 * Refresh Long Lived Access Token 
 * Refresh Token on 24 hours interval
 */
function refreshToken(): bool
{
		global $instagramAccessToken, $flgProductionMode;

		$requestURL = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token={$instagramAccessToken}";

		$c = curl_init();

		curl_setopt($c, CURLOPT_URL, $requestURL);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_ENCODING, "");
		curl_setopt($c, CURLOPT_MAXREDIRS, 10);
		curl_setopt($c, CURLOPT_TIMEOUT, 30);
		curl_setopt($c, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($c, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($c, CURLOPT_POSTFIELDS, "");

		$json = curl_exec($c);
		$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
		curl_close($c);
		
		$result = json_decode($json, null, 512, JSON_THROW_ON_ERROR);

		$tempAccountData                       = [];		
		$tempAccountData['access_token']       = $result->access_token;
		$tempAccountData['refresh_token_time'] = Helper::getCurrentDateTimeStr();

		DB::updateRow($tempAccountData, 'instagram_accounts', "WHERE `is_production_mode` = '{$flgProductionMode}'");

		return true;
}
/**
 * Fetch IG Photos and Save in Database
 * Featch Photos every 3 hours.
 */
function fetchIGFeed(): bool
{
		global $instagramAccessToken, $flgProductionMode;
	
		$fields = "id,media_type,media_url,thumbnail_url,permalink,caption,timestamp";
		
		$requestURL = "https://graph.instagram.com/me/media?fields={$fields}&access_token={$instagramAccessToken}";

		$c = curl_init();

		curl_setopt($c, CURLOPT_URL, $requestURL);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_ENCODING, "");
		curl_setopt($c, CURLOPT_MAXREDIRS, 10);
		curl_setopt($c, CURLOPT_TIMEOUT, 30);
		curl_setopt($c, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($c, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($c, CURLOPT_POSTFIELDS, "");

		$json = curl_exec($c);
		$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
		curl_close($c);
		
		$result = json_decode($json, null, 512, JSON_THROW_ON_ERROR);

		$outputs = $result->data;

		DB::runQuery("TRUNCATE TABLE `instagram_feeds`");
	
		if(!empty($outputs)){

			$tempFeedData  = [];
		
			foreach($outputs as $output) {
			  $tempFeedData['media_id']      = $output->id;
				$tempFeedData['media_type']    = $output->media_type;
				$tempFeedData['media_url']     = $output->media_url;
				$tempFeedData['thumbnail_url'] = $output->thumbnail_url;
				$tempFeedData['permalink']     = $output->permalink;
				$tempFeedData['caption']       = $output->caption;

				$mediaId = $tempFeedData['media_id'];

			 	DB::insertRow( $tempFeedData, 'instagram_feeds');
			}
			
			$tempAccountData                       = [];		
			$tempAccountData['last_feed_datetime'] = Helper::getCurrentDateTimeStr();
			DB::updateRow($tempAccountData, 'instagram_accounts', "WHERE `is_production_mode` = '{$flgProductionMode}'");
			
		}
	return true;
}

?>