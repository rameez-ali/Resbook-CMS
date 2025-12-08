<?php

/** CTA BOOK NOW Button View */
$ctaButtonView = '';
$currentDate = '';$nextDate = ''; $appendBookUrl = '';
$currentDate = date('Y-m-d');
$nextDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
$appendBookUrl = '&checkInDate='.$currentDate.'&checkOutDate='.$nextDate.'';


if (!empty($accommodationBookingUrl) && !empty($accCtaHeading)) {
  if(str_contains($accommodationBookingUrl, 'thebookingengine.net')){
  $ctaButtonView = '<a href="'.$accommodationBookingUrl.''.$appendBookUrl.'" class="btn btn--primary btn--white section__btn mb-2 mb-lg-0"
     data-category="Accommodation" data-action="Book Now Link" data-name="'.$accommodationHeading.'">Book</a><span class="sidepadding"></span>';
  }else {
    $ctaButtonView = '<a href="'.$accommodationBookingUrl.'" class="btn btn--primary btn--white section__btn mb-2 mb-lg-0"
     data-category="Accommodation" data-action="Book Now Link" data-name="'.$accommodationHeading.'">Book</a><span class="sidepadding"></span>';
  }
}

if (!empty($accCEnquiryBtnUrl) && !empty($accCtaHeading)) {
  
  $ctaButtonView .= '<a href="'.$accCEnquiryBtnUrl.'?subject=Enquiry for the accommodation '.$accommodationHeading.'#form_id" 
      class="btn btn--ghost btn--sm btn-cta mr-0" 
      data-category="Accommodation" data-action="Enquire Now Link" data-name="'.$accommodationHeading.'">'.$accEnquiryBtnTxt.'</a>';

}