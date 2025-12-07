<?php

function exportItems()
{
	global $message, $id, $do, $moduleSubHeading;

	$formData = DB::fetchRow( "SELECT `id`, `name`
		FROM `form`
		WHERE `id` = '{$id}'
		LIMIT 1" );

	$csvContent = '';
	$csvHeader  = '';
	$csvBody    = '';
	$delimiter   = ',';

	if( $formData )
	{

		$formId       = $formData['id'];
		$formName     = $formData['name'];

		$orderFields = DB::fetchValue("SELECT GROUP_CONCAT(CONCAT( 'fed.`label` <> ', \"'\",`label`, \"'\") )  FROM `form_field` WHERE `form_id` = '{$formId}' ORDER BY `rank`");

		$labelsArr = DB::fetchAll("SELECT `label` FROM `form_field` WHERE `form_id` = '{$formId}' ORDER BY `rank`");

		$formEntries    = DB::fetchAll("SELECT fed.`label`, fed.`value`, fed.`form_entry_id`
			FROM `form_entry_data` fed
			WHERE fed.`form_id` = '{$formId}'
			ORDER BY fed.`form_entry_id`, {$orderFields}");

		$entryIds = DB::fetchAll("SELECT fed.`form_entry_id`
			FROM `form_entry_data` fed
			WHERE fed.`form_id` = '{$formId}'
			GROUP BY fed.`form_entry_id`
			ORDER BY fed.`form_entry_id`, {$orderFields}");

		$formEntriesAll = [];

		foreach ($entryIds as $key => $value) {
			$entryList = [];
			$entryIdVal = $value['form_entry_id'];

			$formEntryData = DB::fetchAll("SELECT fed.`id`, fed.`label`, fed.`value`
			FROM `form_entry_data` fed
			WHERE fed.`form_id` = '{$formId}'
			AND fed.`form_entry_id` = '{$entryIdVal}'");

			foreach($labelsArr as $labelValue ) {
				$item = [];
				$labelValueVal = $labelValue['label'];

				$item['label']= $labelValueVal;
				// $entryValue = fetchValue("SELECT fed.`value`
				// FROM `form_entry_data` fed
				// WHERE fed.`form_id` = '{$formId}'
				// AND fed.`form_entry_id` = '{$entryIdVal}'
				// AND fed.`label` = '{$labelValueVal}'");

				foreach($formEntryData as $key => $data) {
					if(str_replace($delimiter, '', (string) $data['label']) === str_replace($delimiter, '', (string) $labelValueVal)) {
						$item['value']= $data['value'];
						unset($formEntryData[$key]);
						break;
					} else {
						$item['value'] = '';
					}
				}


				// $item['value']= $entryValue;
				$item['form_entry_id'] = $entryIdVal;

				$entryList[] = $item;
			}
			$formEntriesAll[$entryIdVal]=$entryList;
		}

		$formEntriesArr = [];
		$csvHeaderCols  = [];
		
		if( $labelsArr > 0 )
		{
			$headerLabels = [];
			$headerLabelsCol = [];

			foreach($labelsArr as $label) {
				$headerLabels[] =str_replace($delimiter, '', (string) $label['label']);
				$headerLabelsCol[] = $label['label'];
			}

			$csvHeaderCols = $headerLabelsCol;

			//  Build body content
			foreach ( $formEntriesAll as $formEntry )
			{
				$rowCols = '';

				foreach ( array_keys($csvHeaderCols) as $hkey )
				{

					$fieldValue = ( isset($formEntry[$hkey]) ) ? $formEntry[$hkey]['value'] : '';
					$fieldValue = str_replace($delimiter, '-', (string) $fieldValue);
					$fieldValue = str_replace("’", '', $fieldValue);
					
					$fieldValue = trim(preg_replace('/\s\s+/', ' ', $fieldValue));

					$rowCols .= "{$delimiter}{$fieldValue}";

				}

				$rowCols = trim($rowCols, $delimiter);

				$csvBody .= "{$rowCols}\n";
				
			}


			$csvHeader  = implode($delimiter, $headerLabels)."\n";

			$csvContent = $csvHeader;
			$csvContent .= $csvBody;



			$csvFileName = prepareItemUrl($formName).'-'.time().'.csv';

			
			header('Content-Type: text/csv; charset=utf-8');
  			header("Content-Disposition: attachment; filename={$csvFileName}");
		    print($csvContent);
		    exit();
		}
	}
}

?>