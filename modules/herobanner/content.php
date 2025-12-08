<?php

$scrollButtonView = '';

$itemTitleView = (empty($itemTitle)) 
  ? '' 
  : '<div><h4 class="text-left text-white">'.$itemTitle.'</h4></div>';

$heroBannerLogoFullpath = (empty($heroBannerLogo)) ? '':Helper::getFullUrl($heroBannerLogo);

$heroBannerLogoView = (empty($heroBannerLogoFullpath)) 
  ? '' 
  : '<div class="banner__top 1111"><img src="'.$heroBannerLogoFullpath.'" alt="'.$itemAltText.'" class="banner-logo" /></div>';

$itemSubtitleView = (empty($itemSubtitle)) 
  ? '' 
  : '<div><p class="banner__content-subtitle text-left text-white">'.$itemSubtitle.'</p></div>';

/** auto detect whether the button is internal or external*/
$itemButtonView = '';

if (!empty($itemButtonText) && !empty($itemButtonUrl) ) {

  $isItemButtonUrl = filter_var($itemButtonUrl, FILTER_VALIDATE_URL);

  $itemButtonUrl = (empty($isItemButtonUrl)) ? Helper::getFullUrl($itemButtonUrl) : $itemButtonUrl;

  $itemButtonView = '<a class="btn btn--ghost btn--sm btn-cta btn-bunner" href="'.$itemButtonUrl.'"
     data-category="Hero Banner" data-action="CTA Link" data-name="'.$itemButtonText.'">'.$itemButtonText.'</a>';
}

if (
  !empty($itemTitleView) ||
  !empty($itemButtonView)
) {

  $bannerCaptionView = '<div class="info-box">
      '.$itemTitleView.'
      '.$itemSubtitleView.'
      '.$itemButtonView.'
  </div>';

//   $videoBannerCaptionView = '<div class="banner__content-box">
//   <div class="banner__content-inner">         
//     '.$itemTitleView.'
//     '.$itemSubtitleView.'
//     '.$itemButtonView.'
//   </div>          
// </div>';

  $videoBannerCaptionView = '<div class="info-box">
    '.$itemTitleView.'
    '.$itemSubtitleView.'
    '.$itemButtonView.'
  </div>';

} else {
  $bannerCaptionView = '';
  $videoBannerCaptionView = '';
}
// var_dump($bannerCaptionView);
// die('121212');

?>
