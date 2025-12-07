<?php

$videoSectionContent = '';
$modalVideoUrl  = '';
$isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);

if (!$browserIsIE && !$isMobileDevice && $itemVideoId) {

  /* Load Video View */
  $videoSectionContent = '
        <div class="banner__video" data-id="'.$itemVideoId.'"></div>
        '.$videoBannerCaptionView.'
        '.$scrollButtonView.'
       ';

} elseif(!empty($itemThumbPhotoPath)) {

  $modalVideoUrl = 'https://www.youtube.com/embed/'.$itemVideoId;
  $modalVideoUrl .='?rel=0&amp;version=3&amp;autoplay=1&amp;controls=1&amp;showinfo=0&amp;loop=0';
  /* Load Video Cover View */
  $videoSectionContent = '
      <figure class="banner__video-figure">
        <img src="'.$itemThumbPhotoPath.'" alt="'.$itemAltText.'" class="banner__video-image">
        <a href="#" class="banner__video-link" data-hero-popup="#hero-video"
        data-category="Hero Banner" data-action="Video Link" data-name="https://www.youtube.com/embed/'.$itemVideoId.'">
          <i class="fas fa-play"></i>
        </a>
      </figure>
      '.$videoBannerCaptionView.'
      '.$heroBannerLogoView.'
      '.$scrollButtonView.'
      <div class="hero-video-popup" id="hero-video" tabindex="-1" role="dialog">
        <a class="hero-video-popup-close" href="#hero-video"><i class="fa fa-times"></i></a>
        <iframe width="100%" height="100%" class="hero-modal-video" data-src="'.$modalVideoUrl.'" frameborder="0">
        </iframe>
      </div>
';
} else {
  $bodyCls .= ' no-banner';
}

$sectionContent = 
// isHomePage
    // ? buildHomePageSection($videoSectionContent, $heroBannerLogoView, $videoBannerCaptionView)
    // :
    buildVideoOtherPageSection($videoSectionContent);
$bannerView = wrapInSection($videoSectionContent, $sectionBookingWidget, $sectionCls, $extraCls);

// $pageBannerContent = buildPageBannerContent($videoSectionContent);
$pageBannerView = wrapInSection($pageBannerContent, $sectionBookingWidget, $sectionCls, $extraCls);

?>
