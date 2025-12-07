<?php

/** Remove warning message PHP 8.0 */
error_reporting(E_ERROR | E_PARSE);

/** Identify module for Settings */
$modName               = 'Accommodation';

$accommodationSettings = ModuleSettings::fetchSettings($modName);

if (!empty($accommodationSettings)) {

  /** define vars */
  
  $accomImpPageId       = $accommodationSettings['imp_page'];
  $accButtonText        = $accommodationSettings['button_text'];
  $accHeading           = $accommodationSettings['heading'];
  $accMoreHeading       = $accommodationSettings['accommodation_heading'];
  $accDescription       = $accommodationSettings['description'];
  $accCtaHeading        = $accommodationSettings['accom_bookctaheading'];
  $accEnquiryBtnTxt     = $accommodationSettings['enquiry_btntxt'];
  $accCEnquiryBtnUrl    = $accommodationSettings['enquiry_btnurl'];
  $accShowMoreAccom     = $accommodationSettings['show_moreaccom'];

  $impPageAccommodation = [];
  if(!empty($accomImpPageId)){
    $impPageAccommodation = DBHelper::fetchImpPageData($accomImpPageId);
  } 

}

/** Identify module for Settings */
$modName               = 'Accommodation Category';

$accommodationSettings = ModuleSettings::fetchSettings($modName);

if (!empty($accommodationSettings)) {

  /** define vars */

  $accomCatImpPageId       = $accommodationSettings['imp_page'];
  $accCatButtonText        = $accommodationSettings['button_text'];
  $accCatHeading           = $accommodationSettings['heading'];  
  $accCatDescription       = $accommodationSettings['description']; 
  $accallaccomfiltertext   = $accommodationSettings['allaccomfiltertext'];

  $impPageAccommodationCat = [];
  if(!empty($accomCatImpPageId)){
    $impPageAccommodationCat = DBHelper::fetchImpPageData($accomCatImpPageId);
  }   
}
?>