<?php

$slideshowView = '';
$isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
// var_dump($arrHeroBannerItem);
// die('ff');
foreach ($arrHeroBannerItem as $item) {
    // Extracting item properties
    extract($item);
    $itemTitle = $item['title'];
    $itemSubtitle = $item['sub_title'];
    $itemButtonText = $item['button_text'];
    $itemButtonUrl = $item['button_url'];
    // Enhancing specific properties
    $itemPhotoPath = empty($photo_path) ? '' : Helper::getFullUrl($photo_path);
    $itemThumbPhotoPath = Helper::getFullUrl($thumb_photo_path);
    // var_dump($thumb_photo_path);die('ccc');

    include MODULES_DIR_PATH . '/herobanner/content.php';

    $figureClass = $isMobileDevice ? 'banner__slider-figure mobile-slider-slide' : 'banner__slider-figure';
    $imageTag = $isMobileDevice ? '<img data-lazy="'. $itemThumbPhotoPath .'" alt="'. $alt_text .'" class="banner__slider-image">' : '<img data-lazy="'. $itemPhotoPath .'" alt="'. $alt_text .'" class="banner__slider-image">';
    // $backgroundStyle = $isMobileDevice ? ' style="background-image:url('.$itemPhotoPath.');"' : '';
    // $imageTag = '<img data-lazy="'. $itemThumbPhotoPath .'" alt="'. $alt_text .'" class="banner__slider-image">';
    $backgroundStyle = '';
    $slideshowView .= buildFigure($figureClass, $backgroundStyle, $imageTag, $bannerCaptionView);
}

$sectionContent = $isHomePage ? buildHomePageSection($slideshowView, $heroBannerLogoView) : buildOtherPageSection($slideshowView, $heroBannerLogoView , $bannerCaptionView);
$bannerView = wrapInSection($sectionContent, $sectionBookingWidget, $sectionCls, $extraCls);
// $pageBannerContent = buildPageBannerContent($slideshowView);
$pageBannerView = wrapInSection($pageBannerContent, $sectionBookingWidget, $sectionCls, $extraCls);

?>
