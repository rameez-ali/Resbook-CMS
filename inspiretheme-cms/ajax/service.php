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

switch ($action)
{
	case 'get-coords':
		get_latlng_of_address(mysqli_real_escape_string($cConnection->Connect(), (string) $_POST['address']));
	break;
	case 'check-url':
		validate_url($_POST['url'], $_POST['currUrl'], $_POST['type']);
	break;
	case 'generate-sitemap':
		generateSitemap();
	break;
	case 'fetch-structured-data':
		fetchJsonData($_POST['type']);
	break;
	case 'save-form':
		save_form( filter_input(INPUT_POST,'id', FILTER_VALIDATE_INT) );
	break;
	case 'fetch-form-entry-data':
		get_form_entry_data( filter_input(INPUT_POST,'ind', FILTER_VALIDATE_INT) );
	break;
}

function get_form_field( $arr, $attr )
{

	return (isset($arr[$attr])) ? $arr->attributes()->class[0] : '';
}

function save_form( $formId )
{
	$data = [];

	$xmlData  = $_POST['xml'];
	$jsonData = $_POST['json'];
	
	if( $formId )
	{

		updateRow(['xml_data' => $xmlData, 'json_data' => $jsonData], 'form', "WHERE `id` = '{$formId}' LIMIT 1");

		runQuery("DELETE FROM `form_field` WHERE `form_id` = '{$formId}'");
		$xmlFormData = simplexml_load_string( (string) $xmlData );

		if( $xmlFormData )
		{

			$mapAttrs = ['type'        => 'type', 'required'    => 'is_required', 'label'       => 'label', 'description' => 'help_text', 'placeholder' => 'placeholder', 'class'       => 'class', 'name'        => 'name', 'value'       => 'default_value', 'subtype'     => 'subtype', 'multiple'	  => 'is_multiple', 'toggle'	  => 'is_toggle'];

			$rank = 1;

			foreach ( $xmlFormData->fields->field as $field )
			{

				$fieldData        = [];
				$fieldOptionsArr = [];


				foreach ( $field->attributes() as $attrName => $attrValue )
				{

					$attrValue = (string) $attrValue;

					if( isset($mapAttrs[$attrName]) )
					{

						if( $attrName == 'required' || $attrName == 'multiple'  || $attrName == 'toggle' )
						{
							$fieldData[$mapAttrs[$attrName]] = ($attrValue == 'true') ? 'Y' : 'N';
						}
						else
						{
							$fieldData[$mapAttrs[$attrName]] = $attrValue;
						}
					}
				}

				if( property_exists($field, 'option') && $field->option instanceof \SimpleXMLElement && !empty($field->option) )
				{

					foreach ($field->option as $option)
					{
						$optionData = [];

						foreach ($option->attributes() as $optAttrName => $optAttrValue)
						{
							$optAttrValue = (string) $optAttrValue;
							
							if( $optAttrName === 'value' ||  $optAttrName === 'label' )
							{
								$optionData[$optAttrName] = $optAttrValue;
							}

						}

						$fieldOptionsArr[] = $optionData;

					}

				}

			
				$fieldData['options_json']  = json_encode($fieldOptionsArr, JSON_THROW_ON_ERROR);
				$fieldData['rank']          = $rank;
				$fieldData['form_id']       = $formId;
				
				insertRow($fieldData, 'form_field');

				$rank++;

			}

		}
	}

	die( json_encode( $data ) );
}


function get_form_entry_data( $formEntryId )
{

	$fields = [];

	if( $formEntryId )
	{

		$entryData = fetchRow("SELECT 'Entry Date' AS label, DATE_FORMAT(`date_added`, '%d %b %Y %h:%i %p') AS value
			FROM `form_entry`
			WHERE `id` = '{$formEntryId}'
			LIMIT 1");

		$fields = fetchAll("SELECT `label`, `value` FROM `form_entry_data` WHERE `form_entry_id` = '{$formEntryId}'");

		$fields[] = $entryData;
	}

	die( json_encode( $fields, JSON_THROW_ON_ERROR ) );

}

function generateSitemap() {

	$data = [];
 $isValid = false;

	$status = Sitemap::generateSitemap();

	if($status['response'] == 1) {

		$isValid = true;
		$updatedDate = Helper::getDateTimeStr($status['time']);

		$data['isValid']   = $isValid;
		$data['msg']       = 'Sitemap Generated';
		$data['updatedOn'] = $updatedDate;
		$data['state']     = 'success';

	}else{

		$data['isValid'] = $isValid;
		$data['msg'] = 'Error! Sitemap not Generated';
		$data['state'] = 'danger';
		
	}

	die(json_encode($data, JSON_THROW_ON_ERROR));

}

function get_latlng_of_address($address, $return_json = TRUE)
{
	if($address)
	{
		$address = str_replace(' ','+',str_replace("\n",'',str_replace("\r",'',(string) $address)));
	
		$request_url = "http://maps.googleapis.com/maps/api/geocode/json?address=$address&sensor=true";

		$c = curl_init();
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_URL, $request_url);
		curl_setopt($c, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		$json = curl_exec($c);
		$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
		curl_close($c);
		$details = json_decode($json, null, 512, JSON_THROW_ON_ERROR);

		$result = $details->results[0]->geometry->location;
		
		$coords = ['lat'              => $result->lat, 'lng'              => $result->lng, 'formattedAddress' => $details->results[0]->formatted_address];

		if($return_json) die(return_json($coords));
		else return $coords;
	}
}

function validate_url($newUrl, $currentUrl, $type = '')
{

	$newUrl         = Helper::url($newUrl);
	$currentFullUrl = Helper::url($currentUrl);
	
	$parentPageInd  = sanitizeInput('pid', FILTER_VALIDATE_INT);
	$valid          = false;
	$message        = '';

 	if (!empty($newUrl)) {

		// Check if folder exists with the same name as the url
		$valid = (!is_dir((BASE_PATH.'/'.$newUrl)));

		if ($valid) {

			// Check if url exists
			if ($type === 'gp') {
			
				$parentFullUrl =  fetchValue("SELECT pmd.`full_url`
		            FROM `general_pages` gp
		            LEFT JOIN `page_meta_data` pmd
		            ON(pmd.`id` = gp.`page_meta_data_id`)
		            WHERE gp.`id` ".((is_null($parentPageInd)) ? " IS NULL" : " = {$parentPageInd}")."
		            LIMIT 1");
				
				$newFullUrl = $parentFullUrl.'/'.$newUrl;
   				$newFullUrl = Helper::url($newFullUrl);				

			} else {
				
				$newFullUrl = Helper::url($newUrl);			
			}
			
			$sql = "SELECT COUNT(`url`) 
				FROM `page_meta_data`
				WHERE `full_url` = '/{$newFullUrl}'
				AND `full_url` != '/{$currentFullUrl}'
				AND `status` != 'D'";
				
			$totalUrls = fetchValue($sql);

			$valid = ($totalUrls == 0);

			$message = ($valid) ? '' : 'URL already exists.';
			
		} else {

			$message = 'URL conflicts with the system. Please enter another.';
		}

 	} else {

		$message = 'Please provide valid URL';
 	}

 	die( json_encode( ['valid' => $valid, 'message' => $message], JSON_THROW_ON_ERROR ) );
}

function fetchJsonData($type): never 
{
	$jsonLd = file_get_contents(STRUCTURED_DATA_DIR_PATH.$type.'.json');
	die($jsonLd);
}

?>