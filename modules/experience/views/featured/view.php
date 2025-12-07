<?php

$sqlExperiences = "SELECT e.`id`,
    e.`from_price`,
    e.`booking_url`,
    e.`currency_code`,
    e.`caption`,
    e.`button_text`,
    e.`price_description`,
    pmd.`name`,
    pmd.`menu_label`,
    pmd.`heading`,
    pmd.`sub_heading`,
    pmd.`url`,
    pmd.`full_url`,
    pmd.`introduction`,
    pmd.`photo_path`,
    pmd.`thumb_photo_path`,
    pmd.`photo_alt_text`
  FROM `experience` e
  LEFT JOIN `page_meta_data` pmd
    ON(e.`page_meta_data_id` = pmd.`id`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
    AND e.`is_featured` = '".FLAG_YES."'
  ORDER BY pmd.`rank` ASC";

$experiences = DB::fetchAll($sqlExperiences);

if (!empty($experiences)) {

  /** Get experiences items */
  
  $experienceItem = '';

  foreach ($experiences AS $experience) {

    $experienceId               = $experience['id'];
    $experienceName             = $experience['menu_label'];
    $experienceFromPrice        = $experience['from_price'];
    $experienceCaption          = $experience['caption'];
    $experienceCurrencyCode     = $experience['currency_code'];
    $experienceBookingUrl       = $experience['booking_url'];
    $experienceButtonText       = $experience['button_text'];
    $experiencePriceDesc        = $experience['price_description'];
    $experienceAltText          = $experience['photo_alt_text'];
    $experienceShortDescription = Helper::strTruncate($experience['introduction'], 180, '', true, true);
    $experienceImage            = Helper::getFullUrl($experience['thumb_photo_path']);
    $experienceUrl              = Helper::getFullUrl($impPageExperiences->full_url.''.$experience['full_url']);
    $experienceFullImage        = Helper::getFullUrl($experience['photo_path']);

    /** Pricing text view */
    
    /** Accommodation Price View */
    $experienceFromPriceView = '';   
    if (!empty($experienceFromPrice)) {

      $experienceFromPriceView .= (!empty($experienceFromPrice)) ? 'From ' : '';
      $experienceFromPriceView .= (!empty($experienceFromPrice)) ? ' <span class="card__price-rate">$'.$experienceFromPrice.'</span> ' : '';
      $experienceFromPriceView .= (!empty($experienceCaption)) ? $experienceCaption : '';      
      $experienceFromPriceView = '<div class="card__price">'.$experienceFromPriceView.'</div>';

    }  else {
      $experienceFromPriceView = '<div class="card__price"><span style="padding:0;">POA</span></div>';
    }

    /** Set button label */
    $experienceButtonLabel      = (empty($experienceButtonText)) ? 'More' : $experienceButtonText;
    $experienceBookNowButtonView = '';
      /* Experience Module ButtonView */
  if(!empty($experienceBookingUrl)) {
    $experienceBookNowButtonView = '<a href="'.$experienceBookingUrl.'" class="btn"
      data-category="experience" data-action="Book Now Link" data-name="'.$experienceName.'">Book<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/>
    </svg></a>';
  }

  $isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  $finalImage = $isMobileDevice ? $experienceImage : $experienceFullImage;

  $experiencePriceDescView = '';
  $experiencePriceDescView .= '<div class="card_pricedesc">'.$experiencePriceDesc.'</div>';
    $experienceItem .= '<div class="col-12 card card--with-shadow">
        <div class="card__inner">
          <figure class="card__figure">
            <a href="'.$experienceUrl.'" class="card__figure-link" 
            data-category="Experience" data-action="Image Link" data-name="'.$experienceName.'">
              <img data-lazy="'.$finalImage.'" alt="'.$experienceAltText.'" class="card__figure-image">
            </a>
            
          </figure>
          <div class="card__content">
            <div class="card__content-inner">
              <h3 class="card__heading">
                <a href="'.$experienceUrl.'" data-category="Experience"
                data-action="Title Link" data-name="'.$experienceName.'">
                  '.$experienceName.'
                </a>
              </h3>
              '.$experiencePriceDescView.'
              <p class="card__text">'.$experienceShortDescription.'</p>
              '.$experienceFromPriceView.'
            </div>            
          </div>
          <div class="card__cta">
            <a href="'.$experienceUrl.'" class="btn btn--ghost btn--sm card__btn"
             data-category="Experience" data-action="Read More Link" data-name="'.$experienceName.'">
              '.$experienceButtonLabel.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
                <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/>
              </svg>
            </a>
            '.$experienceBookNowButtonView.'
          </div> 
        </div>
      </div>';

  }

  if (!empty($experienceItem)) {

    $experienceSectionHeaderView = ''; 
    $experienceSectionHeading    = ''; 
    
    $experienceSectionButton     = ''; 

    /** Section Heading View */
    if (!empty($expHeading)) {

      $experienceSectionHeading = '<header class="section__header">
          <h2	class="experience__heading">'.$expHeading.'</h2>
        </header>';
        
    }

    /** Section Caption View */
    $experienceSectionCaption    = (empty($expDescription)) 
      ? '' 
      : '<p	class="featured-experience__description text-center">'.$expDescription.'</p>';

     /** Section Button View */
    if (!empty($impPageExperiences) && !empty($expButtonText)) {

    $moreExperiencesUrl   = Helper::getFullUrl($impPageExperiences->full_url);
    $moreExperiencetitle = $impPageExperiences->title;

    $experienceSectionButton   = '<div class="col-12 text-center">
        <a href="'.$moreExperiencesUrl.'" title="'.$moreExperiencetitle.'" class="btn exp_btn"
          data-category="Experience" data-action="CTA Button"
          data-name="'.$expButtonText.'">'.$expButtonText.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
          <path id="" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"></path>
        </svg></a>
      </div>';
    }

    /** Section Header View */
    if (!empty($experienceSectionHeading) || !empty($experienceSectionCaption)) {

      $experienceSectionHeaderView   = '<div class="container">
        <div class="row justify-content-center">
          <div class="col-12 section__header-wrapper">
            '.$experienceSectionHeading.'
            '.$experienceSectionCaption.'
          </div>          
        </div>
      </div> ';
    }

   


    $templateTags['mod_view'] .= '<section class="section featured-experience">
        '.$experienceSectionHeaderView.'        
        <div class="container container--fw">
          <div class="row showcase experience-showcase pl-4 pr-4 pl-lg-0 pr-lg-0">
            '.$experienceItem.'
          </div>
          <div class="row pb-4">
          '.$experienceSectionButton.'
          </div>
        </div>
      </section>';
  } 


}