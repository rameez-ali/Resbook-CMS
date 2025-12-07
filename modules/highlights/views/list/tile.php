<?php

if (!empty($arrHighlights)) {

  $highlightsItem   = '';
  $highlightsPhotos = '';
  $highlightKey = 1;

  foreach ($arrHighlights as $highlight) {

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

    $hHasLink = !empty($highlightSettings['url']) || !empty($highlightSettings['page_id']);
    $hButtonView = '';

    if ($hHasLink) {
      $parsedUrl = parse_url($highlightUrl);
      $isExternal = isset($parsedUrl['host']) && $parsedUrl['host'] != $_SERVER['SERVER_NAME'];

      $hButtonView = '<a href="'.$highlightUrl.'" class="btn btn--primary highlight_btn"';

      if ($isExternal) {
        $hButtonView .= ' rel="external" target="_blank"';
      }

      $hButtonView .= ' data-category="highlight Link" data-action="Button Link" data-name="'.$highlightHeading.'">'.$highlightButtonText.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
      </svg></a>';

    } else {
      $hButtonView = '';
    }

    if(!empty($highlightUrl)) {    
      $openNewTab = 'target="_blank" rel=external ';                        
    } else {
      $sql= 'SELECT full_url FROM page_meta_data where id = "'.$highlightPageId.'"';
      $highlightUrl = fetchValue($sql);
      $openNewTab = '';          // No new tab by default
    }

    if(!empty($highlightButtonText)) {
      $hButtonView .= '<div class="card__cta">
      <a href="'.$highlightUrl.'" class="btn btn--ghost btn--sm card__btn"
      data-category="Highlight" data-action="Read More Link" data-name="'.$highlightName.'">'.$highlightButtonText.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
          <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/>
          </svg>
      </a>
    </div>';
    }
    $imageView = '';
    $headingView = '';

    $isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    $finalImage = $isMobileDevice ? $highlightThumbImg : $highlightImg;

    if(!empty($highlightUrl)) {
      $imageView = '<a href="'.$highlightUrl.'" '.$openNewTab.' class="card__figure-link"
        data-category="Highlight" data-action="Image Link" data-name="'.$highlightName.'">
        <img src="'.$finalImage.'" alt="'.$highlightImgAltText.'" class="card__figure-image">
      </a>';
      $headingView = '<h5 class="card__heading">
        <a href="'.$highlightUrl.'" '.$openNewTab.' data-category="Highlight"
        data-action="Title Link" data-name="'.$highlightName.'">
          '.$highlightName.'
        </a>
      </h5>';
    } else {
      $imageView = '<img src="'.$finalImage.'" alt="'.$highlightImgAltText.'" class="card__figure-image">';
      $headingView = '<h5 class="card__heading">      
          '.$highlightName.'      
        </h5>';
    }

    $highlightsItem .= '<div class="col-12 card card--with-shadow">
    <div class="card__inner">
      <figure class="card__figure highlight_tile_figure">
        '.$imageView.'
      </figure>

      <div class="card__content">
        <div class="card__content-inner">
          '.$headingView.'
          <p class="card__text">'.$highlightShortDescription.'</p>
        </div>
      </div>

      '.$hButtonView.'

    </div>
  </div>';


    ++$highlightKey;

  }

    /** Section Header View */
    $highlightSectionHeaderView ='';
    if (!empty($highlightHeading) || !empty($highlightDescription)) {

      $highlightSectionHeaderView   = '<div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9 col-12 section__header-wrapper">
            <header class="section__header">
              <a href="'.$highlightUrl.'"><h3	class="highlight__heading">'.$highlightHeading.'</h3></a>
            </header>
            <p class="text-center">'.$highlightDescription.'</p>
          </div>
        </div>
      </div> ';
    }
    $templateTags['mod_view'] .='<section class="section section-highlight tile-highlight bg_white pt-5 pb-5">
        '.$highlightSectionHeaderView.'
        <div class="container container--fw">
            <div class="row highlight highlight_tile">
                '.$highlightsItem.'
            </div>
        </div>
      </section>';

}