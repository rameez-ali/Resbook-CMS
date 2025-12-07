<?php

if (!empty($arrHighlights)) {

  $highlightsItem   = '';
  $highlightsPhotos = '';
  $highlightKey = 1;
  $highlightPhoto1 = '';
  $highlightPhoto2 = '';
  $highlightPhoto3 = '';

  foreach ($arrHighlights as $highlight) {

    $highlightImg         = $highlight['image_path'];
    $highlightThumbImg    = $highlight['thumb_image_path'];
    $highlightImgAltText  = $highlight['image_alt_txt'];
    $highlightName        = $highlight['name'];
    $highlightDescription = $highlight['short_description'];
    $highlightUrl         = $highlight['url'];
    $highlightPageId      = $highlight['page_id'];

    if (strlen((string) $highlightName) > 100) {
      $highlightNameCut = substr((string) $highlightName, 0, 100);
      $endPoint = strrpos($highlightNameCut, ' ');
  
      $highlightName = $endPoint ? substr($highlightNameCut, 0, $endPoint) : substr($highlightNameCut, 0);
    }

    if (strlen((string) $highlightDescription) > 140) {
      $highlightDescriptionCut = substr((string) $highlightDescription, 0, 140);
      $endPoint = strrpos($highlightDescriptionCut, ' ');
  
      $highlightDescription = $endPoint ? substr($highlightDescriptionCut, 0, $endPoint) : substr($highlightDescriptionCut, 0);
    }

    $hHasLink = !empty($highlightSectionUrl);
    $hButtonView = '';

    if ($hHasLink) {
      $parsedUrl = parse_url($highlightSectionUrl);      
      $isExternal = isset($parsedUrl['host']) && $parsedUrl['host'] != $_SERVER['SERVER_NAME'];
    
      $hButtonView = '<a href="'.$highlightSectionUrl.'" class="btn btn--primary highlight_btn"';
    
      if ($isExternal) {
        $hButtonView .= ' rel="external" target="_blank"';
      }
    
      $hButtonView .= ' data-category="highlight Link" data-action="Button Link" data-name="'.$highlightHeading.'">'.$highlightSectionBtnTxt.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
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

    
    $highlightsItem .= '<div class="highlight__content">
        <a href="'.$highlightUrl.'" '.$openNewTab.'><h3 class="highlight__subheading">'.$highlightName.'</h6></a>
          <p class="highlight__text">'.$highlightDescription.'</p>
        </div>';
    
    if($highlightKey == 1) {
        $highlightPhoto1 = '<div class="gallery-inner">
                                <a class="thumb swipebox " href="'.Helper::getFullUrl($highlightImg).'" style="background-image: url('.Helper::getFullUrl($highlightImg).');"></a>
                            </div>';                            

      }elseif($highlightKey == 2) {
        $highlightPhoto2 = '<div class="gallery-inner">
                                <a class="thumb swipebox " href="'.Helper::getFullUrl($highlightImg).'" style="background-image: url('.Helper::getFullUrl($highlightImg).');"></a>
                            </div>';
                            
      }else {
        $highlightPhoto3 = '<div class="gallery-inner">
                                <a class="thumb swipebox " href="'.Helper::getFullUrl($highlightImg).'" style="background-image: url('.Helper::getFullUrl($highlightImg).');"></a>
                            </div>';
                            
      //$highlightPhoto3Alttext = $highlightImgAltText;
    }
    
    ++$highlightKey;

  }


  $highlightCounts = is_countable($arrHighlights) ? count($arrHighlights) : 0;
  
  $gClass = '';
  if ($highlightCounts == 3) {
      $gClass = 'three-img';
  } elseif ($highlightCounts == 2) {
      $gClass = 'two-img';
  } else {
    $gClass = 'one-img';
  }

  $highlightCol = 'highlight__'.$highlightCounts.'-col';

    $templateTags['mod_view'] .='<section class="section section-highlight highlight_default">
        <div class="container container--fw">
            <div class="highlight ">
              <div class="highlight__item highlight__item_item1">
                <h2 class="highlight__heading text-left">'.$highlightHeading.'</h2>
                '.$highlightsItem.'
                '.$hButtonView.'
              </div>             
              <div class="gallery-wrapper '.$gClass.'">
                  <div class="gallery-outer left-gallery">
                  '.$highlightPhoto1.'
                  </div>            
                  <div class="gallery-outer right-gallery">
                      '.$highlightPhoto2.'
                      '.$highlightPhoto3.'
                  </div>                 
              </div>    
            </div>  
        </div>  
      </section>';

}