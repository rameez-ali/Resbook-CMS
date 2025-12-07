<?php

if (!empty($arrHighlights)) {

  $highlightsItem   = '';
  $highlightsPhotos = '';
  $highlightKey = 1;
  foreach ($arrHighlights as $highlight) {

    if ($highlightKey > 3) {
      break;
    }
    $highlightImg         = $highlight['image_path'];
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

    $renderedHighlightsCount = min(count($arrHighlights), 3);
  
    $gClass = '';
    if ($renderedHighlightsCount == 3) {
        $gClass = 'col-lg-4';
    } elseif ($renderedHighlightsCount == 2) {
        $gClass = 'col-lg-6';
    } else {
      $gClass = 'col-lg-12';
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
      $headingView = '<a href="'.$highlightUrl.'" '.$openNewTab.'><h3 class="highlight__subheading-icon text-white">'.$highlightName.'</h3></a>';
    } else {
      $imageView = '<img src="'.$finalImage.'" alt="'.$highlightImgAltText.'" class="card__figure-image">';
      $headingView = '<h3 class="highlight__subheading-icon text-white">'.$highlightName.'</h3>';
    }

    $highlightIcon = '';
    $highlightsItem .= '<div class="col-12 '.$gClass.'">
          <div class="row pl-4 pr-4 pl-lg-0 pr-lg-0">
            <div class="col-2 highlight__icon">
            '.$imageView.'
            </div>
            <div class="col-10 pl-lg-4 pl-2 pt-1">
              '.$headingView.'
            </div>
            <div class="col-12 offset-lg-2 col-lg-10 pl-lg-4 pt-1 pt-lg-0">
            <p class="highlight__text text-white">'.$highlightShortDescription.'</p>
            </div>
          </div>
        </div>';
    $highlightKey++;
  }

    $sectionBtnView = '';
    if(!empty($highlightSectionBtnTxt)) {
      $sectionBtnView = '<div class="col-12 text-center"><a href="'.$highlightSectionUrl.'" class="btn btn--ghost-white"
      data-category="Experience" data-action="Read More Link" aria-label="Find out more - '.$highlightHeading.'" data-name="'.$highlightHeading.'">
      '.$highlightSectionBtnTxt.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"></path>
      </svg></a></div>';
    }
    $sectionDescView = '';
    if(!empty($highlightDescription)) {
      $sectionDescView = '<p class="highlight__desc text-white pb-4 icon-desc">'.$highlightDescription.'</p>';
    }
    
    $templateTags['mod_view'] .='<section class="section section-highlight bg-icon-highlight">
        <div class="container container--fw">
          <div class="highlight-heading text-center">
            <h2 class="highlight__heading text-white">'.$highlightHeading.'</h2>
            '.$sectionDescView.'
          </div>
            <div class="row">
                '.$highlightsItem.'
                '.$sectionBtnView.'
            </div>
        </div>
      </section>';

}