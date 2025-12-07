<?php

$reviewsSectionBG      = '';
$reviewsSectionHeading = '';
$reviewsSectionButton  = '';

/** Section Heading View */
if (!empty($rsHeading)) {

  $reviewsSectionHeading = '<div class="col-12">
      <header class="section__header text-center">
        <h2	class="review__heading">'.$rsHeading.'</h2>
      </header>
    </div>';
}

/** Section Button View */
if (!empty($impPageReviews) && !empty($rsButtonText)) {

  $moreReviewsUrl   = Helper::getFullUrl($impPageReviews->full_url);
  $moreReviewstitle = $impPageReviews->title;

  $reviewsSectionButton = '<div class="text-center pt-3">
    <a href="'.$moreReviewsUrl.'" class="btn" data-category="Reviews" data-action="CTA Button" data-name="'.$rsButtonText.'">'.$rsButtonText.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/>
    </svg>
    </a>
  </div>';
}


/** Set Section Background */

$isSectionBg = !empty($rsBackgroundPhoto);

$reviewsSectionBgClass = (empty($isSectionBg)) ? '' : ' review--bg';

$reviewsSectionBg = (empty($isSectionBg)) 
  ? '' 
  : 'style="background-image: url('.Helper::getFullUrl($rsBackgroundPhoto).')" title="'.$rsHeading.'"'; 

$jsVars['reviews']['speed']      = (empty($rsSpeed)) ? 4000 : $rsSpeed * 1000;
$jsVars['reviews']['autoplay']   = $rsAutoplay === FLAG_YES;
$jsVars['reviews']['dots']       = $rsNavigation == 'D';
$jsVars['reviews']['arrows']     = $rsNavigation == 'A';

?>