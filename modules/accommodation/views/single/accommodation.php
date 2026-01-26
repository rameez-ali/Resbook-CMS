<?php 
if($accShowMoreAccom == FLAG_YES) {
  $accommodationItems = '';

  $sqlAccommodations = "SELECT a.`id`,
      a.`guests`,
      a.`beds`,
      a.`bathrooms`,
      a.`room_size`,
      a.`deck_size`,
      a.`bedroom_details`,
      a.`sleeps_details`,
      REPLACE(a.`from_price`,'.00','') AS from_price,
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
      AND pmd.`url` != '{$segment1}'
    ORDER BY pmd.`rank` ASC";

  $arrAccommodations = DB::fetchAll($sqlAccommodations);

  if (!empty($arrAccommodations)) {

    foreach ($arrAccommodations AS $accommodation) {

      $accommodationId = $accommodation['id'];
      $accommodationHeading = $accommodation['heading'];
      $accommodationShortDescription = $accommodation['introduction'];
      $accommodationImage = Helper::getFullUrl($accommodation['thumb_photo_path']);
      $accommodationImageAltText = $accommodation['photo_alt_text'];
      $accommodationFullImage = Helper::getFullUrl($accommodation['photo_path']);

      $accommodationGuests = $accommodation['guests'];
      $accommodationBeds = $accommodation['beds'];
      $accommodationroomsize = $accommodation['room_size'];
      $accommodationDeckSize = $accommodation['deck_size'] ?? null;
      $accommodationBedroomDetails = $accommodation['bedroom_details'] ?? null;
      $accommodationSleepsDetails = $accommodation['sleeps_details'] ?? null;
      $accommodationbathroom = $accommodation['bathrooms'];
      $accommodationFromPrice = $accommodation['from_price'];
      $accommodationFromPriceCaption = $accommodation['from_price_caption'];
      $accommodationCurrencyCode = $accommodation['currency_code'];

      $accommodationBookingUrl = $accommodation['booking_url'];
      $accommodationButtonLabel = $accommodation['button_text'];
      $accommodationItemKey = $accommodation['item_key'];
      $accommodationShowPOA = $accommodation['show_poa'];
      $accommodationType = isset($accommodation['type']) ? trim((string) $accommodation['type']) : null;

      $accommodationShortDescription = nl2br((string) $accommodationShortDescription);
      $accommodationShortDescription = Helper::strTruncate($accommodationShortDescription, 180, '', true, true);    
    
      // Use /accommodation/{slug} format for all accommodation links
      $accommodationSlug = $accommodation['url'];
      $accommodationFullURL = Helper::getFullUrl('/accommodation/' . $accommodationSlug);

      $accommodationButtonLabel = (empty($accommodationButtonLabel)) ? 'DISCOVER MORE' : $accommodationButtonLabel;

      $accommodationPriceView = '';

      if (!empty($accommodationFromPrice)) {

        $accommodationPriceView .= (empty($accommodationCurrencyCode)) ? '' : '<span>FROM </span>';
        $accommodationPriceView .= (empty($accommodationFromPrice)) ? '' : ' <span class="card__price-rate">$' . $accommodationFromPrice . '</span> ';
        $accommodationPriceView .= (empty($accommodationFromPriceCaption)) ? '' : '<span>' . $accommodationFromPriceCaption . '</span>';

        $accommodationPriceView = '<div class="card__price">' . $accommodationPriceView . '</div>';
      } else {
        if ($accommodationShowPOA == FLAG_YES) {

          $accommodationPriceView = '<div class="card__price"><span class="card__price-poa" style="padding:0;">POA</span></div>';

        } else {
          $accommodationPriceView = '';
        }
      }

      $accommodationBookNowButtonView = '';

      if (!empty($accommodationBookingUrl)) {
        $accommodationBookNowButtonView = '<a href="' . $accommodationBookingUrl . '" class="btn btn--sm card__btn"
          data-category="Accommodation" data-action="Book Now Link" data-name="' . $accommodationHeading . '">Book</a>';
      }

      $isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
      $finalImage = $isMobileDevice ? $accommodationImage : $accommodationFullImage;

      // Determine column classes based on accommodation type
      // Villa shows as full width (single card per row), all others show 3 cards per row
      $isVilla = (!empty($accommodationType) && strtolower($accommodationType) === 'villa');
      $columnClasses = $isVilla
        ? 'col-12 col-xl-10'
        : 'col-12 col-md-6 col-lg-4';

      $columnClasses1 = $isVilla ? 'card--villa' : 'card--home';

      // For non-villa, hide price and Book CTA per new design
      if (!$isVilla) {
        $accommodationPriceView = '';
        $accommodationBookNowButtonView = '';
      }

      // Build card details with emoji icons (matching main page design)
      $cardDetails = '';
      if (!empty($accommodationroomsize) && !empty($accommodationDeckSize)) {
        $cardDetails .= '<div>📐 ' . $accommodationroomsize . ' m² with ' . $accommodationDeckSize . ' m² deck</div>';
      } elseif (!empty($accommodationroomsize)) {
        $cardDetails .= '<div>📐 ' . $accommodationroomsize . ' m²</div>';
      }
      if (!empty($accommodationBedroomDetails)) {
        $cardDetails .= '<div>🛏 ' . $accommodationBedroomDetails . '</div>';
      }
      if (!empty($accommodationSleepsDetails)) {
        $cardDetails .= '<div>👤 ' . $accommodationSleepsDetails . '</div>';
      }

      $accommodationItems .= '<div class="' . ($isVilla ? 'col-12' : 'col-12 col-md-6 col-lg-4') . '">
        <div class="accommodation-card section--footer-bg ' . $columnClasses1 . '">
          <div class="card-image">
            <img src="' . $finalImage . '" alt="Accommodation Image">
          </div>
          <div class="card-content">
            <div>
              <h2 class="card-title">
                ' . $accommodationHeading . '
              </h2>
              <p class="card-description">
                ' . $accommodationShortDescription . '
              </p>
            </div>
            <div>
              ' . (!empty($cardDetails) ? '<div class="card-details">' . $cardDetails . '</div>' : '') . '
              <div class="card-cta">
                <a href="' . $accommodationFullURL . '">' . $accommodationButtonLabel . '</a>
              </div>
            </div>
          </div>
        </div>
      </div>';

    }
    if (!empty($accommodationItems)) {

      $accommodationSectionHeaderView = ''; 
      $accommodationSectionHeading    = ''; 
      
      $accommodationSectionButton     = ''; 

      /** Section Heading View */
      if (!empty($accMoreHeading)) {

        $accommodationSectionHeading = '<header class="section__header">
            <h2	class="experience__heading">'.$accMoreHeading.'</h2>
          </header>';
          
      }

          /** Section Header View */
      if (!empty($accommodationSectionHeading)) {

        $accommodationSectionHeaderView   = '<div class="col-12 featured-experience__header">
            '.$accommodationSectionHeading.'
          </div>';
      }
    /** Section Button View */
    if (!empty($impPageAccommodation) && !empty($accButtonText)) {

      $moreAccommodationsUrl   = Helper::getFullUrl($impPageAccommodation->full_url);
      $moreAccommodationtitle = $impPageAccommodation->title;

      $accommodationSectionButton   = '<div class="col-12 text-center">
          <a href="'.$moreAccommodationsUrl.'" class="btn"
            data-category="Accommodation" data-action="CTA Button"
            data-name="'.$accButtonText.'">'.$accButtonText.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
            <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
            </svg></a>
        </div>';
    }

      
      $templateTags['more_option_view'] .= '<section class="section featured-accommodation accommodation-details pt-5 pb-5">
        <div class="container">
          <div class="row">
            '.$accommodationSectionHeaderView.'
          </div>
        </div>
        <div class="container container--fw">
          <div class="row justify-content-lg-center">
            <div class="col-12 showcase accommodation-showcase pl-4 pr-4 pl-lg-0 pr-lg-0">
              
                '.$accommodationItems.'
              
            </div>
          </div>
          <div class="row">
            '.$accommodationSectionButton.'
          </div>
        </div>
      </section>';

    }
    
  }
}