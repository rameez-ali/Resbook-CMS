<?php

$galleryView = '';
$isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);

$galleryItemsDisplay = $arrHeroBannerItem;
$galleryItemsLast    = [];
$pageGalleryView = '';
$photoCls            = ' swipebox';


if (count($arrHeroBannerItem) >= 4) {    
    // Only select to view first 3 items
    $galleryItemsDisplay = array_slice($arrHeroBannerItem, 0, 3);
    // Select Last items in the array
    $galleryItemsLast    = array_slice($arrHeroBannerItem, 3);
}


foreach ($galleryItemsDisplay as $itemKey => $galleryItem) {
    // Extracting item properties
    extract($galleryItem);

    $itemPhotoPath = empty($photo_path) ? '' : Helper::getFullUrl($photo_path);
    $itemThumbPhotoPath = Helper::getFullUrl($thumb_photo_path);

    $pageGalleryOverlay = '';
    if ($itemKey == 2 && count($arrHeroBannerItem) >= 4) {
        $pageGalleryOverlay = '<span class="gallery-single__item-img-overlay"></span>
                  <span class="gallery-single__item-view-more">More Photos<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/></svg></span>';
    }

    include MODULES_DIR_PATH . '/herobanner/content.php';

    $columnClass = 'col-12'; // default to full width
    switch(count($galleryItemsDisplay)) {
        case 1:
            $columnClass = 'col-12';
            break;
        case 2:
            $columnClass = ($itemKey == 2) ? 'col-6' : 'col-6 pr-1';
            break;
        case 3:
            $columnClass = ($itemKey == 2) ? 'col-4' : 'col-4 pr-1';
            break;
    }

    // Construct class names
    $aClass = ($isMobileDevice ? 'banner__slider' : 'banner__slider') . $photoCls . ' swipebox-' . $itemKey . ' ' . $columnClass;
    $figureClass = 'banner__slider-figure';
    $imageTag = ($isMobileDevice ? '<img src="' . $itemThumbPhotoPath : '<img src="' . $itemPhotoPath) . '" alt="' . $itemAltText . '" class="banner__slider-image">';

    
    // Append to gallery view
    $galleryView .= buildGalleryFigure($itemPhotoPath, $aClass, $figureClass, $imageTag, $bannerCaptionView, $pageGalleryOverlay);

}

// Handling hidden images for Swipebox
foreach ($galleryItemsLast as $itemKey => $galleryItem) {
    extract($galleryItem);

    $itemPhotoPath = empty($photo_path) ? '' : Helper::getFullUrl($photo_path);
    $itemThumbPhotoPath = Helper::getFullUrl($thumb_photo_path);

    // Construct class names
    $aClass = ($isMobileDevice ? 'gallery-single__item-hidden ' : 'gallery-single__item-hidden ') . $photoCls . ' swipebox-' . $itemKey . ' ' . $columnClass;
    $figureClass = 'gallery-single__figure';
    $imageTag = ($isMobileDevice ? '<img src="' . $itemThumbPhotoPath : '<img src="' . $itemPhotoPath) . '" alt="' . $itemAltText . '" class="banner__slider-image">';

    // Append to gallery view (You may need a different function or modify the existing function to handle hidden images)
    $galleryView .= buildGalleryFigure($itemPhotoPath, $aClass, $figureClass, $imageTag, $bannerCaptionView, $pageGalleryOverlay);
}

$sectionContent = $isHomePage ? buildHeroGalleryHomePageSection($galleryView, $heroBannerLogoView, $bannerCaptionView) : buildHeroGalleryOtherPageSection($galleryView, $heroBannerLogoView, $bannerCaptionView);
$bannerView = wrapInSection($sectionContent, $sectionBookingWidget, $sectionCls, $extraCls);
$pageBannerView = wrapInSection($pageBannerContent, $sectionBookingWidget, $sectionCls, $extraCls);
?>
