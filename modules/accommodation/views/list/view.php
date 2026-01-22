<?php 

$accommodationItems = '';

$sqlAccommodations = "SELECT a.`id`, MD5(a.`id`) AS `hex_id`,
    a.`guests`,
    a.`beds`,
    a.`bathrooms`,
    a.`room_size`,
    a.`deck_size`,
    a.`bedroom_details`,
    a.`sleeps_details`,
    a.`from_price`,
    a.`currency_code`,
    a.`from_price_caption`,
    a.`features`,
    a.`booking_url`,
    a.`button_text`,
    a.`page_meta_data_id`,
    a.`show_poa`,
    a.`type`,
    pmd.`name`,
    pmd.`menu_label`,
    pmd.`heading`,
    pmd.`url`,
    pmd.`full_url`,
    pmd.`introduction`,
    pmd.`photo_path`,
    pmd.`thumb_photo_path`,
    pmd.`photo_alt_text`,
    pmd.`item_key`
  FROM `accommodation` a
  LEFT JOIN `page_meta_data` pmd
    ON(a.`page_meta_data_id` = pmd.`id`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
  ORDER BY pmd.`rank` ASC";

$arrAccommodations = DB::fetchAll($sqlAccommodations);

if (!empty($arrAccommodations)) {

  foreach ($arrAccommodations AS $accommodation) {

    $accommodationId               = $accommodation['id'];
    $accommodationHexId            = $accommodation['hex_id'];
    $accommodationHeading          = $accommodation['heading'];
    $accommodationShortDescription = $accommodation['introduction'];
    $accommodationImage            = Helper::getFullUrl($accommodation['thumb_photo_path']);
    $accommodationImageAltText     = $accommodation['photo_alt_text'];
    $accommodationFullImage        = Helper::getFullUrl($accommodation['photo_path']);
    
    $accommodationGuests           = $accommodation['guests'];
    $accommodationBeds             = $accommodation['beds'];
    $accommodationroomsize         = $accommodation['room_size'];
    $accommodationDeckSize         = $accommodation['deck_size'] ?? null;
    $accommodationBedroomDetails   = $accommodation['bedroom_details'] ?? null;
    $accommodationSleepsDetails    = $accommodation['sleeps_details'] ?? null;
    $accommodationbathroom         = $accommodation['bathrooms'];    
    $accommodationFromPrice        = $accommodation['from_price'];
    $accommodationFromPriceCaption = $accommodation['from_price_caption'];
    $accommodationCurrencyCode     = $accommodation['currency_code'];

    $accommodationBookingUrl       = $accommodation['booking_url'];
    $accommodationButtonLabel      = $accommodation['button_text'];
    $accommodationItemKey          = $accommodation['item_key'];
    $accommodationShowPOA          = $accommodation['show_poa'];
    $accommodationType             = isset($accommodation['type']) ? trim((string) $accommodation['type']) : null;

    $accommodationShortDescription = nl2br((string) $accommodationShortDescription);
    $accommodationShortDescription = Helper::strTruncate($accommodationShortDescription, 180,'', true, true);    
    
    $accommodationFullURL        = Helper::getFullUrl($impPageAccommodation->full_url.$subUrl.$accommodation['full_url']);

    $accommodationButtonLabel = (empty($accommodationButtonLabel)) ? 'DISCOVER MORE' : $accommodationButtonLabel ;

    echo "<!-- Type for {$accommodationHeading}: '{$accommodationType}' -->";
    
    /** Generate view for facilities */
    require __DIR__ . '/facilities.php';

    $sqlAccommodations = "SELECT
        MD5(ahc.`accommodation_category_id`) AS `hex_id`
    FROM `accommodation` a
    LEFT JOIN `page_meta_data` pmd
        ON(a.`page_meta_data_id` = pmd.`id`)
    LEFT JOIN `accommodation_has_category` ahc
        ON(ahc.`accommodation_id` = a.`id` )  
    WHERE pmd.`status` = '".FLAG_ACTIVE."' 
    AND ahc.`accommodation_id` = '".$accommodationId."'
    ORDER BY pmd.`rank` ASC";

    $arrAccomHexIds = DB::fetchAll($sqlAccommodations);
    $hexIds = '';
    /** apend hexids */
    foreach ($arrAccomHexIds AS $hexId) {
      $hexIds .= $hexId['hex_id'].',';
    }

    $accomGroupKeys = 'all,'.$hexIds.'';
    
    $accommodationPriceView = '';
   
    if (!empty($accommodationFromPrice)) {

      $accommodationPriceView .= (empty($accommodationCurrencyCode)) ? '' : '<span>FROM </span>';
      $accommodationPriceView .= (empty($accommodationFromPrice)) ? '' : ' <span class="card__price-rate">$'.$accommodationFromPrice.'</span> ';
      $accommodationPriceView .= (empty($accommodationFromPriceCaption)) ? '' : '<span>'.$accommodationFromPriceCaption.'</span>';

      $accommodationPriceView = '<div class="card__price">'.$accommodationPriceView.'</div>';
    } else {      
      if($accommodationShowPOA == FLAG_YES) {

        $accommodationPriceView = '<div class="card__price"><span class="card__price-poa" style="padding:0;">POA</span></div>';

      } else {
        $accommodationPriceView = '';
      }      
    }

    $accommodationBookNowButtonView = '';

    if(!empty($accommodationBookingUrl)) {
      $accommodationBookNowButtonView = '<a href="'.$accommodationBookingUrl.'" class="btn btn--sm card__btn"
        data-category="Accommodation" data-action="Book Now Link" data-name="'.$accommodationHeading.'">Book</a>';
    }

    $isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    $finalImage = $isMobileDevice ? $accommodationImage : $accommodationFullImage;
    // Determine column classes based on accommodation type
    // Villa shows as full width (single card per row), all others show 3 cards per row
    
    $isVilla = (!empty($accommodationType) && strtolower($accommodationType) === 'villa');
    $columnClasses = $isVilla ? 'col-12' : 'col-12 col-md-6 col-lg-4';

    $accommodationItems .= '<div class="'.$columnClasses.'  card card--with-shadow accom-items" data-groups="'.$accomGroupKeys.'" data-swipe-rel="'.$galleryHashedId.'"
    data-category="Accommodation">
        <div class="card__inner">
          <figure class="card__figure">
            <a href="'.$accommodationFullURL.'" class="card__figure-link"
             data-category="Accommodation" data-action="Image Link" data-name="'.$accommodationHeading.'">
              <img data-src="'.$finalImage.'" alt="'.$accommodationImageAltText.'" class="card__figure-image lazy"/>
            </a>
            
          </figure>
          <div class="card__content">
            <div class="card__content-inner">          
              <h2 class="card__heading">
                <a href="'.$accommodationFullURL.'" data-groups="'.$accomGroupKeys.'"
                data-category="Accommodation" data-action="Title Link" data-name="'.$accommodationHeading.'">
                  '.$accommodationHeading.'
                </a>
              </h2>
              '.$accommodationFacilities.'
              
              <p class="card__text">'.$accommodationShortDescription.'</p>
              '.$accommodationPriceView.'
            </div>            
          </div>
          <div class="card__cta">
            <a href="'.$accommodationFullURL.'" class="btn btn--ghost btn--sm card__btn"
            data-category="Accommodation" data-action="Read More Link" data-name="'.$accommodationHeading.'">'
            .$accommodationButtonLabel.'</a>
            '.$accommodationBookNowButtonView.'
          </div>  
        </div>
      </div>';

  }

  /** Generate view for filters */
  require __DIR__ . '/filters.php';
  
  if (!empty($accommodationItems)) {

    $accommodationView = '<section class="section accommodation_list">
      <div class="container container--fw">
      '.$catFilters.'
        <div class="row justify-content-lg-center pl-4 pr-4 pl-lg-0 pr-lg-0">
          <div class="col-12 accommodation-wrapper">
            <div class="row justify-content-center accom-shuffle">
            '.$accommodationItems.'
            </div>
          </div>
        </div>
      </div>
    </section>';
  
    $templateTags['mod_view'] .= $accommodationView;

  }
  
}