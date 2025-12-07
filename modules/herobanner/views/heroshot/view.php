<?php

$heroshotView = '';
$isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
// var_dump($heroshotView);
// die('333');
if (!$isMobileDevice) {
    $heroshotView = '<figure class="banner__slider-figure">
    <img src="'.$itemPhotoPath.'" alt="'.$itemAltText.'" class="banner__slider-image">   
    '.$bannerCaptionView.'
  </figure>';

} else {
  $heroshotView = '<figure class="banner__slider-figure">
  <img src="'.$itemThumbPhotoPath.'" alt="'.$itemAltText.'" class="banner__slider-image">   
  '.$bannerCaptionView.'
</figure>';
}

$sectionContent = $isHomePage ? buildHeroHomePageSection($heroshotView, $heroBannerLogoView, $bannerCaptionView) : buildHeroOtherPageSection($heroshotView, $heroBannerLogoView, $bannerCaptionView);
$bannerView = wrapInSection($sectionContent, $sectionBookingWidget, $sectionCls, $extraCls);
// $pageBannerContent = buildPageBannerContent($heroshotView);
$pageBannerView = wrapInSection($pageBannerContent, $sectionBookingWidget, $sectionCls, $extraCls);
// var_dump($pageBannerContent);
// die('333');
?>
