<?php 

$accommodationItems = '';
$sqlAccommodations = "SELECT a.`id`,
    a.`guests`,
    a.`beds`,
    a.`bathrooms`,
    a.`room_size`,
    a.`from_price`,
    a.`currency_code`,
    a.`from_price_caption`,
    a.`features`,
    a.`booking_url`,
    a.`button_text`,
    a.`page_meta_data_id`,
    a.`show_poa`,
    pmd.`name`,
    pmd.`menu_label`,
    pmd.`heading`,
    pmd.`url`,
    pmd.`full_url`,
    pmd.`short_description`,
    pmd.`photo_path`,
    pmd.`thumb_photo_path`,
    pmd.`photo_alt_text`
  FROM `accommodation` a
  LEFT JOIN `page_meta_data` pmd
    ON(a.`page_meta_data_id` = pmd.`id`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
    AND a.`is_featured` = '".FLAG_YES."'
  ORDER BY pmd.`rank` ASC";

$arrAccommodations = DB::fetchAll($sqlAccommodations);

if (!empty($arrAccommodations)) {

  foreach ($arrAccommodations AS $accommodation) {

    $accommodationId               = $accommodation['id'];
    $accommodationHeading          = $accommodation['heading'];
    $accommodationShortDescription = $accommodation['short_description'];
    $accommodationImage            = Helper::getFullUrl($accommodation['thumb_photo_path']);
    $accommodationImageAltText     = $accommodation['photo_alt_text'];
    $accommodationGuests           = $accommodation['guests'];
    $accommodationBeds             = $accommodation['beds'];
    $accommodationroomsize         = $accommodation['room_size'];
    $accommodationFromPrice        = $accommodation['from_price'];
    $accommodationFromPriceCaption = $accommodation['from_price_caption'];
    $accommodationCurrencyCode     = $accommodation['currency_code'];
    $accommodationBookingUrl       = $accommodation['booking_url'];
    $accommodationButtonLabel      = $accommodation['button_text'];
    $accommodationFullImage        = Helper::getFullUrl($accommodation['photo_path']);
    $accommodationShowPOA          = $accommodation['show_poa'];

    $accommodationShortDescription = nl2br((string) $accommodationShortDescription);
    $accommodationShortDescription = Helper::strTruncate($accommodationShortDescription, 80, '...', true, true);    
  
    $accommodationFullURL        = Helper::getFullUrl($impPageAccommodation->full_url.$accommodation['full_url']);

    $accommodationButtonLabel = (empty($accommodationButtonLabel)) ? 'More' : $accommodationButtonLabel ;

    $accommodationPriceView = '';
   
    if (!empty($accommodationFromPrice)) {

      $accommodationPriceView .= (empty($accommodationCurrencyCode)) ? '' : '<span>FROM </span>';
      $accommodationPriceView .= (empty($accommodationFromPrice)) ? '' : ' <span class="card__price-rate">$'.$accommodationFromPrice.'</span> ';
      $accommodationPriceView .= (empty($accommodationFromPriceCaption)) ? '' : '<span>'.$accommodationFromPriceCaption.'</span>';

      $accommodationPriceView = '<div class="card__price">'.$accommodationPriceView.'</div>';
    } else {
      if($accommodationShowPOA == FLAG_YES) {

        $accommodationPriceView = '<div class="card__price"><span style="padding:0;">POA</span></div>';
        
      } else {
        $accommodationPriceView = '';
      }
    }

    $accommodationBookNowButtonView = '';

    if(!empty($accommodationBookingUrl)) {
      $accommodationBookNowButtonView = '<a href="'.$accommodationBookingUrl.'" class="btn card__btn"
        data-category="Accommodation" data-action="Book Now Link" data-name="'.$accommodationHeading.'">Book</a>';
    }
    
      /** Generate view for facilities */
      require __DIR__ . '/facilities.php';

    $isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    $finalImage = $isMobileDevice ? $accommodationImage : $accommodationFullImage;

    $accommodationItems .= '<div class="col-12 card card--with-shadow">
        <div class="card__inner">
          <figure class="card__figure">
            <a href="'.$accommodationFullURL.'" class="card__figure-link"
             data-category="Accommodation" data-action="Image Link" data-name="'.$accommodationHeading.'">
              <img data-lazy="'.$finalImage.'" alt="'.$accommodationImageAltText.'" class="card__figure-image"/>
            </a>            
          </figure>
          <div class="card__content">
            <div class="card__content-inner">          
              <h3 class="card__heading">
                <a href="'.$accommodationFullURL.'"
                data-category="Accommodation" data-action="Title Link" data-name="'.$accommodationHeading.'">
                '.$accommodationHeading.'</a></h3>
                '.$accommodationFacilities.'
              <p class="card__text">'.$accommodationShortDescription.'</p>
              '.$accommodationPriceView.'
            </div>            
          </div>
          <div class="card__cta">
            <a href="'.$accommodationFullURL.'" class="btn btn--sm btn--ghost"
            data-category="Accommodation" data-action="Read More Link" data-name="'.$accommodationHeading.'">'
            .$accommodationButtonLabel.'</a>
            '.$accommodationBookNowButtonView.'  
          </div>  
        </div>
      </div>';
  }
  if (!empty($accommodationItems)) {

    $accommodationSectionHeaderView = ''; 
    $accommodationSectionHeading    = '';  
    $accommodationSectionButton     = ''; 

     /** Section Heading View */
     if (!empty($accHeading)) {

      $accommodationSectionHeading = '<header class="section__header">
          <h2	class="accommodation__heading text-left">'.$accHeading.'</h2>
        </header>';
        
    }
    /** Section Caption View */
    $accommodationSectionCaption    = (empty($accDescription)) 
      ? '' 
      : '<p	class="featured-accommodation__description text-left">'.$accDescription.'</p>';

        /** Section Header View */
    if (!empty($accommodationSectionHeading) || !empty($accommodationSectionCaption)) {

      $accommodationSectionHeaderView   = '<div class="col-12 col-lg-9 featured-accommodation__header pl-lg-2 pr-lg-2 pl-4">
          '.$accommodationSectionHeading.'
          '.$accommodationSectionCaption.'
        </div>';
    }
  /** Section Button View */
  if (!empty($impPageAccommodation) && !empty($accButtonText)) {

    $moreAccommodationsUrl   = Helper::getFullUrl($impPageAccommodation->full_url);
    $moreAccommodationtitle = $impPageAccommodation->title;

    $accommodationSectionButton   = '
        <a href="'.$moreAccommodationsUrl.'" class="btn card__btn"
          data-category="Accommodation" data-action="CTA Button"
          data-name="'.$accButtonText.'">'.$accButtonText.'</a>
      ';
  }
    
    $templateTags['mod_view'] .= '<section class="section featured-accommodation ">
      <div class="container container--fw">
        <div class="row">
          '.$accommodationSectionHeaderView.' 
          <div class="col-12 col-lg-3 pb-4 text-lg-right pl-4">
            '.$accommodationSectionButton.'
          </div>         
        </div>
      </div>
      <div class="container container--fw">
        <div class="row justify-content-lg-center">
          <div class="col-12 showcase accommodation-showcase pl-4 pr-4 pl-lg-0 pr-lg-0">            
              '.$accommodationItems.'            
          </div>
        </div>               
      </div>
    </section>';
  }
}

// /** Featured Accommodation Category Section */

// $accommodationCatItems = '';

// $sqlAccommodationsCat = "SELECT a.`id`,
    
//     a.`from_price`,
//     a.`currency_code`,
//     a.`from_price_caption`,
//     a.`features`,
//     a.`booking_url`,
//     a.`button_text`,
//     a.`page_meta_data_id`,
//     pmd.`name`,
//     pmd.`menu_label`,
//     pmd.`heading`,
//     pmd.`url`,
//     pmd.`full_url`,
//     pmd.`short_description`,
//     pmd.`photo_path`,
//     pmd.`thumb_photo_path`,
//     pmd.`photo_alt_text`
//   FROM `accommodation_category` a
//   LEFT JOIN `page_meta_data` pmd
//     ON(a.`page_meta_data_id` = pmd.`id`)
//   WHERE pmd.`status` = '".FLAG_ACTIVE."'
//     AND a.`is_featured` = '".FLAG_YES."'
//   ORDER BY pmd.`rank` ASC";

// $arrAccommodationsCat = DB::fetchAll($sqlAccommodationsCat);

// if (!empty($arrAccommodationsCat)) {

//   foreach ($arrAccommodationsCat AS $accommodationCat) {

//     $accommodationCatId               = $accommodationCat['id'];
//     $accommodationCatHeading          = $accommodationCat['heading'];
//     $accommodationCatShortDescription = $accommodationCat['short_description'];
//     $accommodationCatImage            = Helper::getFullUrl($accommodationCat['thumb_photo_path']);
//     $accommodationCatImageAltText     = $accommodationCat['photo_alt_text'];
//     $accommodationCatFromPrice        = $accommodationCat['from_price'];
//     $accommodationCatFromPriceCaption = $accommodationCat['from_price_caption'];
//     $accommodationCatCurrencyCode     = $accommodationCat['currency_code'];
//     $accommodationCatFullImage        = $accommodationCat['photo_path'];

//     $accommodationCatBookingUrl       = $accommodationCat['booking_url'];
//     $accommodationCatButtonLabel      = $accommodationCat['button_text'];

//     $accommodationCatShortDescription = nl2br((string) $accommodationCatShortDescription);
//     $accommodationCatShortDescription = Helper::strTruncate($accommodationCatShortDescription, 80, '...', true, true);    
  
//     $accommodationCatFullURL        = Helper::getFullUrl($impPageAccommodation->full_url.'/category'.$accommodationCat['full_url']);

//     $accommodationCatButtonLabel = (empty($accommodationCatButtonLabel)) ? 'Read More' : $accommodationCatButtonLabel ;

//     $accommodationCatPriceView = '';
   
//     if (!empty($accommodationCatFromPrice)) {

//       $accommodationCatPriceView .= (empty($accommodationCatCurrencyCode)) ? '' : '<span>From '.$accommodationCatCurrencyCode.'</span>';
//       $accommodationCatPriceView .= (empty($accommodationCatFromPrice)) ? '' : ' <span class="card__price-rate">'.$accommodationCatFromPrice.'</span> ';
//       $accommodationCatPriceView .= (empty($accommodationCatFromPriceCaption)) ? '' : '<span>'.$accommodationCatFromPriceCaption.'</span>';
      
//       $accommodationCatPriceView = '<div class="card__price">'.$accommodationCatPriceView.'</div>';
//     }  else {
//       $accommodationCatPriceView = '<div class="card__price"><span style="padding:0;">POA</span></div>';
//     }

//     $accommodationCatBookNowButtonView = '';

//     if(!empty($accommodationCatBookingUrl)) {
//       $accommodationCatBookNowButtonView = '<a href="'.$accommodationCatBookingUrl.'" class="btn card__btn"
//         data-category="Accommodation" data-action="Book Now Link" data-name="'.$accommodationCatHeading.'">
//         Book Now
//         <svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
//           <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
//         </svg>
//       </a>';
//     }
    
//       /** Generate view for facilities */
//       require __DIR__ . '/facilities.php';

//     $accommodationCatItems .= '<div class="col-12 card card--with-shadow">
//         <div class="card__inner">
//           <figure class="card__figure">
//             <a href="'.$accommodationCatFullURL.'" class="card__figure-link"
//              data-category="Accommodation" data-action="Image Link" data-name="'.$accommodationCatHeading.'">
//               <img data-lazy="'.$accommodationCatFullImage.'" alt="'.$accommodationCatImageAltText.'" class="card__figure-image"/>
//             </a>
//             '.$accommodationCatPriceView.'
//           </figure>
//           <div class="card__content">
//             <div class="card__content-inner">          
//               <h3 class="card__heading">
//                 <a href="'.$accommodationCatFullURL.'"
//                 data-category="Accommodation" data-action="Title Link" data-name="'.$accommodationCatHeading.'">
//                 '.$accommodationCatHeading.'</a></h3>                
//               <p class="card__text">'.$accommodationCatShortDescription.'</p>            
//             </div>            
//           </div>
//           <div class="card__cta">
//             <a href="'.$accommodationCatFullURL.'" class="btn btn--sm btn--ghost card__btn"
//             data-category="Accommodation" data-action="Read More Link" data-name="'.$accommodationCatHeading.'">'
//             .$accommodationCatButtonLabel.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
//               <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#11BBB4"/>
//             </svg></a>
//             '.$accommodationCatBookNowButtonView.'  
//           </div>  
//         </div>
//       </div>';

//   }
//   if (!empty($accommodationCatItems)) {

//     $accommodationCatSectionHeaderView = ''; 
//     $accommodationCatSectionHeading    = ''; 
    
//     $accommodationCatSectionButton     = ''; 

//      /** Section Heading View */
//      if (!empty($accCatHeading)) {

//       $accommodationCatSectionHeading = '<header class="section__header">
//           <h2	class="accommodation__heading">'.$accCatHeading.'</h2>
//         </header>';
        
//     }
//     /** Section Caption View */
//     $accommodationCatSectionCaption    = (empty($accCatDescription)) 
//       ? '' 
//       : '<p	class="featured-accommodation__description">'.$accCatDescription.'</p>';

//         /** Section Header View */
//     if (!empty($accommodationCatSectionHeading) || !empty($accommodationCatSectionCaption)) {

//       $accommodationCatSectionHeaderView   = '<div class="col-lg-9 col-12 featured-accommodation__header">
//           '.$accommodationCatSectionHeading.'
//           '.$accommodationCatSectionCaption.'
//         </div>';
//     }
//   /** Section Button View */
  
//   if (!empty($impPageAccommodationCat) && !empty($accCatButtonText)) {

//     $moreAccommodationsCatUrl   = Helper::getFullUrl($impPageAccommodationCat->full_url);
//     $moreAccommodationCattitle = $impPageAccommodationCat->title;

//     $accommodationCatSectionButton   = '<div class="col-lg-3 col-12 text-lg-right align-self-center">
//         <a href="'.$moreAccommodationsCatUrl.'" class="btn btn--link accom_btn"
//           data-category="Accommodation" data-action="CTA Button"
//           data-name="'.$accCatButtonText.'">'.$accCatButtonText.'</a>
//       </div>';
//   }
    
//     $templateTags['mod_view'] .= '<section class="section featured-accommodation">
//       <div class="container">
//         <div class="row">
//           '.$accommodationCatSectionHeaderView.'
//           '.$accommodationCatSectionButton.'
//         </div>
//       </div>
//       <div class="container container--fw">
//         <div class="row justify-content-lg-center">
//           <div class="col-12 showcase accommodation-showcase pl-4 pr-4 pl-lg-0 pr-lg-0">            
//               '.$accommodationCatItems.'            
//           </div>
//         </div>        
//       </div>
//     </section>';

//   }
  
// }

