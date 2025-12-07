<?php

/** Save data */

function saveItem ()
{

  global $message, $do ,$id;

  $arrItemData = [];

  $arrItemData['name']     = validateInput('form_name');
  $arrItemData['email_subject'] = validateInput('email_subject');
  $arrItemData['email_address'] = validateInput('email_address');
  $arrItemData['mailchimp_list_id']  = validateInput('mailchimp_list_id');
	$arrItemData['success_message']  = validateInput('success_message');
	$arrItemData['terms_and_conditions']  = filter_input(INPUT_POST,'terms_and_conditions');
  $arrItemData['date_updated']         = date('Y-m-d H:i:s'); 

  DB::updateRow($arrItemData, 'form', "WHERE id = '{$id}'");

  $message = "Form has been saved";

}

?>