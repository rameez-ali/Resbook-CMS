<?php

if (!empty($featuredHighlight)) {

  $highlightsItem   = '';
  $highlightsPhotos = '';
  $highlightKey = 1;

  foreach ($featuredHighlight as $highlight) {

    $highlightImg         = Helper::getFullUrl($highlight['image_path']);
    $highlightThumbImg    = $highlight['thumb_image_path'];
    $highlightImgAltText  = $highlight['image_alt_txt'];
    $highlightName        = $highlight['name'];
    $highlightShortDescription = $highlight['short_description'];
    $highlightUrl         = $highlight['url'];
    $highlightPageId      = $highlight['page_id'];
    $highlightButtonText  = $highlight['button_text'];

    if (strlen((string) $highlightName) > 100) {
      $highlightNameCut = substr((string) $highlightName, 0, 100);
      $endPoint = strrpos($highlightNameCut, ' ');

      $highlightName = $endPoint ? substr($highlightNameCut, 0, $endPoint) : substr($highlightNameCut, 0);
    }

    if (strlen((string) $highlightShortDescription) > 140) {
      $highlightShortDescriptionCut = substr((string) $highlightShortDescription, 0, 140);
      $endPoint = strrpos($highlightShortDescriptionCut, ' ');

      $highlightShortDescription = $endPoint ? substr($highlightShortDescriptionCut, 0, $endPoint) : substr($highlightShortDescriptionCut, 0);
    }

    $hHasLink = !empty($highlightSettings['url']) || !empty($highlightSettings['page_id']);
    $hButtonView = '';
    $hLButtonView = '';

    if ($hHasLink) {
      $parsedUrl = parse_url($highlightUrl);
      $isExternal = isset($parsedUrl['host']) && $parsedUrl['host'] != $_SERVER['SERVER_NAME'];

      $hButtonView = '<a href="'.$highlightUrl.'" class="btn btn--primary highlight_btn"';
      $hLButtonView ='<a href="'.$highlightUrl.'" class="btn btn--primary highlight_btn"';

      if ($isExternal) {
        $hButtonView .= ' rel="external" target="_blank"';
        $hLButtonView .= ' rel="external" target="_blank"';
      }

      $hButtonView .= ' data-category="highlight Link" data-action="Button Link" data-name="'.$highlightHeading.'">'.$highlightButtonText.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
      </svg></a>';
      $hLButtonView .= ' data-category="highlight Link" data-action="Button Link" data-name="'.$highlightHeading.'">'.$highlightButtonText.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
      </svg></a>';

    } else {
      $hButtonView = '';
      $hLButtonView = '';
    }

    if(!empty($highlightUrl)) {

      if(isset($menuItemExternalUrl) && $menuItemExternalUrl !== "") {
          if(strpos($menuItemExternalUrl, "http://") === 0 || strpos($menuItemExternalUrl, "https://") === 0) {
              $menuUrl = $menuItemExternalUrl;
              $openNewTab = 'target="_blank" rel=external ';
          } elseif(strpos($menuItemExternalUrl, "/") === 0) {
              $menuUrl = $menuItemExternalUrl;
              $openNewTab = '';
          } else {
              $menuUrl = 'https://'.$menuItemExternalUrl;
              $openNewTab = 'target="_blank" rel=external ';
          }
      } else {
          // Handle the case where $menuItemExternalUrl is not defined or is empty
          $menuUrl = $highlightUrl;  // Set the default URL to $highlightUrl
          $openNewTab = '';          // No new tab by default
      }
    }
    if(!empty($highlightSectionBtnTxt)) {
      $hButtonView .= '<div class="col-12 col-lg-6 card__cta p-0 pt-3 text-center text-lg-left">
      <a href="'.$highlightUrl.'" class="btn btn--ghost btn--sm card__btn featured-button"
      data-category="Highlight" data-action="Read More Link" data-name="'.$highlightName.'">'.$highlightSectionBtnTxt.'</a>
    </div>';
    }
    if(!empty($highlightUrl)) {
        $hLButtonView .= '<div class="col-12 col-lg-5 card__cta p-0 pt-3 text-center text-lg-left">
        <a href="'.$highlightUrl.'" class="btn btn--ghost btn--sm card__btn featured-button"
        data-category="Highlight" data-action="Read More Link" data-name="'.$highlightName.'">Find Out More</a>
      </div>';
      }

    $isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    $finalImage = $isMobileDevice ? $highlightThumbImg : $highlightImg;

    $highlightsItem .= '<div class="col-12 card card--with-shadow">
        <div class="row card__inner bg_lighter-grey border-0">
            <figure class="col-lg-9 col-12 featured-height p-0 pl-lg-2 pr-lg-2">
                '.((!empty($highlightUrl)) ? '<a href="'.$highlightUrl.'" class="card__figure-link"
                data-category="Highlight" data-action="Image Link" data-name="'.$highlightName.'">' : '').'
                <img src="'.$finalImage.'" alt="'.$highlightImgAltText.'" class="card__figure-image featured-image">
                '.((!empty($highlightUrl)) ? '</a>' : '').'
            </figure>
            <div class="col-lg-5 col-12 highlight-featured-box">
                <div class="card__content-inner">
                    <h2 class="card_featured_heading text-lg-left text-center pb-lg-4 pb-3">
                        '.((!empty($highlightUrl)) ? '<a href="'.$highlightUrl.'" data-category="Highlight" class="featured-line"
                        data-action="Title Link" data-name="'.$highlightName.'">' : '').'
                        '.$highlightName.'
                        '.((!empty($highlightUrl)) ? '</a>' : '').'
                    </h2>
                    <p class="card__text text-lg-left text-center">'.$highlightShortDescription.'</p>
                    <div class="row">
                    '.$hLButtonView.'
                    '.$hButtonView.'
                    </div>
                </div>
            </div>
        </div>
    </div>';


    ++$highlightKey;

  }

    /** Section Header View */
    $highlightSectionHeaderView ='';
    if (!empty($highlightHeading) || !empty($highlightDescription)) {

      $highlightSectionHeaderView   = '';
    }
    $templateTags['mod_view'] .='<section class="section section-highlight bg_lighter-grey pt-5 pb-3">
        '.$highlightSectionHeaderView.'
        <div class="container container--fw">
            <div class="row highlight highlight_featured">
                '.$highlightsItem.'
            </div>
        </div>
      </section>';

}