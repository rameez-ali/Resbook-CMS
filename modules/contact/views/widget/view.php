<?php
$contactSectionContent = '';
$fcontactShortDescView = '';
$contactPhoneNumberContent = '';
$contactFreePhoneNumberContent = '';
$fcontactBtnView = '';

if ($contactEmailAddress) {
  $contactSectionContent .= '<a href="mailto: '.$contactEmailAddress.'"
                                class="footer__text--mail"
                                data-category="Email Link" 
                                data-action="Click" 
                                data-name="'.$contactEmailAddress.'">
                                '.$contactEmailAddress.'
                              </a>';
}

if ($contactPhoneNumber) {
    $contactPhoneNumberContent = '<a href="tel: '.$contactPhoneNumber.'" 
                                class="footer__text--phone"
                                data-category="Phone Link" 
                                data-action="Click" 
                                data-name="'.$contactPhoneNumber.'">
                                '.$contactPhoneNumber.'
                              </a>';
}

if ($contactFreePhoneNumber) {
    $contactFreePhoneNumberContent = '<a href="tel: '.$contactFreePhoneNumber.'" 
                                class="footer__text--phone"
                                data-category="Phone Link" 
                                data-action="Click" 
                                data-name="'.$contactFreePhoneNumber.'" >
                                '.$contactFreePhoneNumber.'
                              </a>';
}

if ($contactPhoneNumberContent && $contactFreePhoneNumberContent) {
  $contactSectionContent .= '<div class="d-flex align-items-center phone-container">' . $contactPhoneNumberContent . '<span class="mx-2">|</span>' . $contactFreePhoneNumberContent . '</div>';
} else {
  $contactSectionContent .= $contactPhoneNumberContent . $contactFreePhoneNumberContent;
}

$contactContent = '';
if(!empty($fcontactShortDesc)){
  $fcontactShortDescView = '<p class="footer__text footer_shortdesc">'.$fcontactShortDesc.'</p>';
}

if($fcontactBtnUrl) {
  $parsedUrl = parse_url($fcontactBtnUrl);
  $isExternal = isset($parsedUrl['host']) && $parsedUrl['host'] != $_SERVER['SERVER_NAME'];
}else {
  $isExternal = ''; 
}

$opnNewTab = '';
if($isExternal){
  $opnNewTab = 'target=_blank rel="external" ';
} else {
  $opnNewTab = '';
}
if(!empty($fcontactBtnText)) {
  $fcontactBtnView = '<a href="'.$fcontactBtnUrl.'" '.$opnNewTab.' class="btn footer_btn" data-category="Contact" data-action="Contact Button" data-name="'.$fcontactBtnText.'">
  '.$fcontactBtnText.'
    <svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"></path>
    </svg>
  </a>';
}

/** Check if Mobile Devide Detected */
$objMobileDetect = new MobileDetect();
$isMobileDevice  = ($objMobileDetect->isMobile() || $objMobileDetect->isTablet());

$txtCenterCls = ($isMobileDevice) ? 'text-center' : ''; 

if($contactSectionContent != '') {
  
  $contactContent = '<div class="col-12 col-xl-3 col-lg-4  footer__item"><div class="footer__content">
      <h2 class="footer__heading">'.$fcontactHeading.'</h2>
      '.$fcontactShortDescView.'
      <div class="footer__text '.$txtCenterCls.' ">'.$contactSectionContent.'</div>
      <div>
        '.$fcontactBtnView.'
      </div>
      </div></div>';
}


$templateTags['contact-widget'] = $contactContent;