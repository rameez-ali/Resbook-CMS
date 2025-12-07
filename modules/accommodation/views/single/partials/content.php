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
     data-category="Accommodation" data-action="Book Now Link" data-name="'.$accommodationHeading.'">Book<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"></path>
      </svg></a><span class="sidepadding"></span>';
  }else {
    $ctaButtonView = '<a href="'.$accommodationBookingUrl.'" class="btn btn--primary btn--white section__btn mb-2 mb-lg-0"
     data-category="Accommodation" data-action="Book Now Link" data-name="'.$accommodationHeading.'">Book<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"></path>
      </svg></a><span class="sidepadding"></span>';
  }
}

if (!empty($accCEnquiryBtnUrl) && !empty($accCtaHeading)) {
  
  $ctaButtonView .= '<a href="'.$accCEnquiryBtnUrl.'?subject=Enquiry for the accommodation '.$accommodationHeading.'#form_id" 
      class="btn btn--ghost btn--sm btn-cta mr-0" 
      data-category="Accommodation" data-action="Enquire Now Link" data-name="'.$accommodationHeading.'">'.$accEnquiryBtnTxt.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
        <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"></path>
        </svg>
    </a>';

}