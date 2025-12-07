<?php

$sqlExperiences = "SELECT e.`id`,
    ROUND(e.`from_price`,0) as from_price,
    e.`currency_code`,
    e.`booking_url`,
    e.`button_text`,
    e.`caption`,
    e.`price_description`,
    pmd.`name`,
    pmd.`menu_label`,
    pmd.`heading`,
    pmd.`sub_heading`,
    pmd.`url`,
    pmd.`full_url`,
    pmd.`short_description`,
    pmd.`photo_path`,
    pmd.`thumb_photo_path`,
    pmd.`photo_alt_text`
  FROM `experience` e
  LEFT JOIN `page_meta_data` pmd
    ON(e.`page_meta_data_id` = pmd.`id`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
  ORDER BY pmd.`rank` ASC";

$experiences = DB::fetchAll($sqlExperiences);

if (!empty($experiences)) {

  /** Get Attached Category */
  // $experienceCategoryCsv = DB::runQuery("SELECT ehc.`experience_id`,
  //     MD5(ehc.`experience_category_id`) AS `hex_id`
  //   FROM `experience_has_category` ehc
  //   LEFT JOIN `experience` e
  //     ON (ehc.`experience_id` = e.`id`)
  //   LEFT JOIN `page_meta_data` pmd
  //     ON(e.`page_meta_data_id` = pmd.`id`)
  //   WHERE pmd.`status` = '".FLAG_ACTIVE."'
  //   ORDER BY pmd.`rank` ASC");
    
  
  // if ($experienceCategoryCsv > 0) {
    
  //   while ($experienceCategoryId = mysqli_fetch_assoc($experienceCategoryCsv)) {
  //     $arrExperienceCategory[$experienceCategoryId['experience_id']][] = $experienceCategoryId['hex_id']; 
  //   }
  
  // }

  /** Get experiences items */
  
  $experienceItem = '';

  foreach ($experiences AS $experience) {

    $experienceId               = $experience['id'];
    $experienceName             = $experience['menu_label'];
    $experienceFromPrice        = $experience['from_price'];
    $experienceCurrencyCode     = $experience['currency_code'];
    $experienceButtonText       = $experience['button_text'];
    $experienceAltText          = $experience['photo_alt_text'];
    $experienceCaption          = $experience['caption'];
    $experienceBookingUrl       = $experience['booking_url'];
    $experienceShortDescription = Helper::strTruncate($experience['short_description'], 80, '...', true, true);
    $experienceImage            = Helper::getFullUrl($experience['thumb_photo_path']);
    $experienceUrl              = Helper::getFullUrl($impPageExperiences->full_url.''.$experience['full_url']);
    $experiencePriceDesc        = $experience['price_description'];
    $experienceFullImage        = Helper::getFullUrl($experience['photo_path']);
    $groupKeys = 'all';

    // if ($arrExperienceCategory[$experienceId]) {

    //   foreach ($arrExperienceCategory[$experienceId] AS $categoryIdHex) {
  
    //     $groupKeys .= ','.$categoryIdHex;
        
    //   }
    
    // }

    /** Accommodation Price View */
    $experienceFromPriceView = '';   
    if (!empty($experienceFromPrice)) {

      $experienceFromPriceView .= (!empty($experienceFromPrice)) ? 'FROM ' : '';
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
    $experienceBookNowButtonView = '<a href="'.$experienceBookingUrl.'" class="btn btn--sm"
      data-category="experience" data-action="Book Now Link" data-name="'.$experienceName.'">Book<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
        <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/>
      </svg></a>';
  }

  /** Get Price Description */
  $experiencePriceDescView = '';
  $experiencePriceDescView .= '<div class="card_pricedesc">'.$experiencePriceDesc.'</div>';

  $isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  $finalImage = $isMobileDevice ? $experienceImage : $experienceFullImage;

    $experienceItem .= '<div class="col-12 col-md-6 col-lg-4 col-xl-4 card card--with-shadow mb-4" data-groups="'.$groupKeys.'">
        <div class="card__inner">
          <figure class="card__figure">
            <a href="'.$experienceUrl.'" class="card__figure-link" 
            data-category="Experience" data-action="Image Link" data-name="'.$experienceName.'">
              <img data-src="'.$finalImage.'" alt="'.$experienceAltText.'" class="card__figure-image lazy">
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
              '.$experienceButtonLabel.' <svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
              <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/>
            </svg>
            </a>
            '.$experienceBookNowButtonView.'
          </div>
           
        </div>
      </div>';

  }

  $templateTags['mod_view'] .= '<section class="section experience_list">
      <div class="container container--fw">          
        <div class="row experience justify-content-center text-center">
          '.$experienceItem.'
        </div>
      </div>
    </section>';

}
