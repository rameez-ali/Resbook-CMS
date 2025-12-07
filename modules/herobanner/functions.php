<?php

function buildFigure($figureClass, $backgroundStyle, $imageTag, $bannerCaptionView) {
    return "<figure class='{$figureClass}'{$backgroundStyle}>
                {$imageTag}
                {$bannerCaptionView}
            </figure>";
}

function buildGalleryFigure($itemPhotoPath,$aClass,$figureClass, $imageTag, $bannerCaptionView, $pageGalleryOverlay) {
    return "<div href='{$itemPhotoPath}' class='{$aClass}' data-category='Photo Gallery' data-action='Image Link' >
                <figure class='{$figureClass}'>
                    {$imageTag}
                    {$bannerCaptionView}
                </figure>
                {$pageGalleryOverlay}
            </div>";
}

function wrapInGallerySection($content, $sectionBookingWidget, $sectionCls, $extraCls, $bannerType = '', $galleryClass = '') {
    return '<section class="banner' . $sectionBookingWidget . ' ' . $sectionCls . ' ' . $extraCls . ' ' . $bannerType . ' ' . $galleryClass . '">' .
            $content . 
            '</section>';
}

function buildHomePageSection($slideshowView, $heroBannerLogoView) {
    return '<div class="banner__slider slideshow-home" id="banner-slider-home">'
            . $slideshowView
            // . $bannerCaptionView
            . $heroBannerLogoView
            . '</div>';
}

function buildOtherPageSection($slideshowView, $heroBannerLogoView) {
    return '<div class="banner__slider slideshow-page" id="banner-slider-page">' . 
            $slideshowView . 
            '</div>' . 
            $heroBannerLogoView;
}

function buildHeroHomePageSection($slideshowView, $heroBannerLogoView) {
    return '<div class="banner__slider" id="banner-slider-home">'
            . $slideshowView
            // . $bannerCaptionView
            . $heroBannerLogoView
            . '</div>';
}

function buildHeroOtherPageSection($slideshowView, $heroBannerLogoView) {
    return '<div class="banner__slider" id="banner-slider-page">' . 
            $slideshowView . 
            '</div>' . 
            $heroBannerLogoView;
}


function buildHeroGalleryHomePageSection($slideshowView, $heroBannerLogoView) {
    return '<div class="banner__slider row  no-gutters" id="banner-slider-home">'
            . $slideshowView
            // . $bannerCaptionView
            . $heroBannerLogoView
            . '</div>';
}

function buildHeroGalleryOtherPageSection($slideshowView, $heroBannerLogoView) {
    return '<div class="banner__slider row  no-gutters" id="banner-slider-page">' . 
            $slideshowView . 
            '</div>' . 
            $heroBannerLogoView;
}

function buildVideoOtherPageSection($slideshowView) {
    return '<div class="banner__slider" id="banner-slider-page">' . 
            $slideshowView .
            '</div>'
            ;
}

function wrapInVideoSection($content, $sectionBookingWidget = '', $sectionCls = '', $extraCls = '', $bannerType = '') {
    return '<section class="banner banner--overlay ' . $sectionBookingWidget . ' ' . $sectionCls . ' ' . $extraCls . ' ' . $bannerType . '">'
            . $content .
           '</section>';
}

function wrapInSection($content, $sectionBookingWidget, $sectionCls, $extraCls, $bannerType = '') {
    return '<section class="banner' . $sectionBookingWidget . ' ' . $sectionCls . ' ' . $extraCls . ' ' . $bannerType . '">' .
            $content . 
            '</section>';
}