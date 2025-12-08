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
    <a href="'.$moreReviewsUrl.'" class="btn" data-category="Reviews" data-action="CTA Button" data-name="'.$rsButtonText.'">'.$rsButtonText.'</a>
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