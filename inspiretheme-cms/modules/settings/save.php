<?php 

function saveItem()
{
  global  $message, $id, $do, $disableMenu;

  $id = validateInput('id', FILTER_VALIDATE_INT);

  if (!empty($id)) {

    $arrSettings = [];

    $arrSettings['company_name']         = validateInput('company_name');
    $arrSettings['start_year']           = validateInput('start_year', FILTER_VALIDATE_INT);
    $arrSettings['email_address']        = validateInput('email_address');
    $arrSettings['phone_number']         = validateInput('phone_number');
    $arrSettings['free_phone_number']    = validateInput('free_phone_number');
    $arrSettings['fax_number']           = validateInput('fax_number');
    $arrSettings['address']              = validateInput('address');
    $arrSettings['resbook_id']           = validateInput('resbook_id');
    $arrSettings['is_resbook_calendar']  = validateInput('is_resbook_calendar');
    
    $arrSettings['rb_check_personal_widget']    = requestVar('rb_cp_widget');
    $arrSettings['rb_checkin_widget']           = requestVar('rb_ci_widget');
    $arrSettings['rb_property_manager_widget']  = requestVar('rb_pm_widget');
    
    $arrSettings['booking_url']          = validateInput('booking_url', FILTER_VALIDATE_URL);

    $arrSettings['fcontact_heading']              = validateInput('fcontact_heading');
    $arrSettings['fcontact_short_description']    = validateInput('fcontact_short_description');
    $arrSettings['fcontact_btntext']              = validateInput('fcontact_btntext');
    $arrSettings['fcontact_btnurl']               = validateInput('fcontact_btnurl');
        
    if( updateRow($arrSettings, 'general_settings', "WHERE `id` = '{$id}' LIMIT 1") ) { 
      
        $message = "Settings have been saved";

    }

  }
  

  /** SAVE IMPORTANT PAGE DATA **/

  $impPageIds = $_POST['imp_page_id'];

  foreach ($impPageIds as $impPageId => $pageId) { 

    $end = "WHERE `imppage_id` = '{$impPageId}' LIMIT 1";

    $arrUpdateImpPage = [];

    $arrUpdateImpPage['page_id'] = getNullIfEmpty($pageId);

    updateRow($arrUpdateImpPage, 'general_importantpages', $end);

  }

  $message = "Settings have been saved";
}
?>