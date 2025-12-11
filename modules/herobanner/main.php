<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$bannerView = '';
$pageBannerView = '';

$browserIsIE = (preg_match('~MSIE|Internet Explorer~i', (string) $_SERVER['HTTP_USER_AGENT'])
  || (str_contains((string) $_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0')));

$jsVars['slideshow']['speed'] = (empty($heroBannerSpeed)) ? 4000 : $heroBannerSpeed;

include_once __DIR__ . '/functions.php';

$sectionBookingWidget = empty($templateTags['booking_view']) ? '' : 'has-booking-widget';
$isHomePage = ($mainPageId == $impPageHome->id);
$sectionCls = ($isHomePage) ? 'banner--fs' : '';


// Common function to get hero banner data and generate banner view
function fetchAndGenerateBanners($slideshowId, $isHomePage, $sectionBookingWidget, $sectionCls, $extraCls) {
	global $arrHeroBanner, $arrHeroBannerItem;
	$arrHeroBanner = [];
    $arrHeroBannerItem = [];
	$allBannerViews = ''; 

    $sectionContent = '';

    $sqlheroBanner = "SELECT `id`,
        `name`,
        `thumb_photo`,
        `slideshow_speed`,
        `active_type`,
		`is_gallery`
      FROM `hero_banner`
      WHERE `id` = '{$slideshowId}'";

    $arrHeroBanner = DB::fetchRow($sqlheroBanner);
  	if (!empty($arrHeroBanner)) {
		$heroBannerId		      = $arrHeroBanner['id'];
		$heroBannerName    		= $arrHeroBanner['name'];
		$heroBannerLogo 		= $arrHeroBanner['thumb_photo'];
		$heroBannerSpeed   		= $arrHeroBanner['slideshow_speed'];
		$heroBannerType		    = $arrHeroBanner['active_type'];
		$heroBannerTypeLabel 	= "";
		$isGallery              = $arrHeroBanner['is_gallery'];
		$galleryClass = $isGallery ? 'is-gallery' : '';
		include __DIR__ . '/vars.php';

// var_dump($isGallery);die('fff');
		if ($heroBannerType == HERO_BANNER_TYPE_IMAGE) {
			$heroBannerTypeLabel = "image-banner";
			ob_start();
			require __DIR__ . '/content.php';
			$content = ob_get_clean();
			ob_start();
			include __DIR__ . '/views/heroshot/view.php';
			$bannerView = ob_get_clean();
			$allBannerViews .= wrapInSection($sectionContent, $sectionBookingWidget, $sectionCls, $extraCls, strtolower($heroBannerTypeLabel));
		} elseif ($heroBannerType == HERO_BANNER_TYPE_VIDEO) {
			$heroBannerTypeLabel = "video-banner";
			ob_start();
			require __DIR__ . '/content.php';
			$content = ob_get_clean();
			ob_start();
			include __DIR__ . '/views/video/view.php';
			$bannerView = ob_get_clean();
			$allBannerViews .= wrapInVideoSection($sectionContent, $sectionBookingWidget, $sectionCls, $extraCls, strtolower($heroBannerTypeLabel));
		} elseif ($isGallery && $heroBannerType == HERO_BANNER_TYPE_SLIDER) {
			$heroBannerTypeLabel = "gallery-banner";
			ob_start();
			include __DIR__ . '/views/gallery/view.php';
			$bannerView = ob_get_clean();
			$allBannerViews .= wrapInSection($sectionContent, $sectionBookingWidget, $sectionCls, $extraCls, strtolower($heroBannerTypeLabel));
		} elseif ($heroBannerType == HERO_BANNER_TYPE_SLIDER) {
			$heroBannerTypeLabel = "slider-banner";
			ob_start();
			include __DIR__ . '/views/slideshow/view.php';
			$bannerView = ob_get_clean();
			$allBannerViews .= wrapInSection($sectionContent, $sectionBookingWidget, $sectionCls, $extraCls, strtolower($heroBannerTypeLabel));
		} 
		// var_dump($allBannerViews);
	}
    return $allBannerViews;
}

$heroBannerTypeLabel = '';
if (!empty($pageSlideshowId)) {
    $bannerView = fetchAndGenerateBanners($pageSlideshowId, $isHomePage, $sectionBookingWidget, $sectionCls,'banner-view', strtolower($heroBannerTypeLabel));
}

if (!empty($slideshowPageId)) {
	$pageBannerView = fetchAndGenerateBanners($slideshowPageId, $isHomePage, $sectionBookingWidget, $sectionCls, 'page-bunner');
}

if (empty($bannerView)) {
    $bodyCls .= ' no-banner header-white';
}

// var_dump($pageBannerView);
// die('vvv');
$templateTags['banner_view'] = $bannerView;
$templateTags['page_banner_view'] = $pageBannerView;
 
?>
