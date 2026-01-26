<?php

$preFilterAccommodationItems = '';
$extraSql = '';

if (!empty($pagePreFilterCatdId)) {
  $extraSql = "AND ahc.`accommodation_category_id` = '" . $pagePreFilterCatdId . "'";
}

$sqlPreFilterAccommodations = "SELECT a.`id`,
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
  LEFT JOIN `accommodation_has_category` ahc
      ON(ahc.`accommodation_id` = a.`id` )  
  WHERE pmd.`status` = '" . FLAG_ACTIVE . "' 
  {$extraSql}
  ORDER BY pmd.`rank` ASC";

$arrPreFilterAccommodations = DB::fetchAll($sqlPreFilterAccommodations);

if (!empty($arrPreFilterAccommodations)) {

  foreach ($arrPreFilterAccommodations as $accommodation) {

    $accommodationId = $accommodation['id'];
    $accommodationHexId = $accommodation['hex_id'];
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

    /** Generate view for facilities */
    require __DIR__ . '/facilities.php';

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

    $preFilterAccommodationItems .= '<div class="' . ($isVilla ? 'col-12' : 'col-12 col-md-6 col-lg-4') . '">
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
              <div class="card-details">
                <div>📐 44 m² with 31 m² deck</div>
                <div>🛏 1 Bedroom with Ensuite</div>
                <div>👤 Sleeps 4 maximum</div>
              </div>
              <div class="card-cta">
                <a href="' . $accommodationFullURL . '">DISCOVER MORE</a>
              </div>
            </div>
          </div>
        </div>
      </div>';


  }

  if (!empty($preFilterAccommodationItems)) {

    $accommodationView = '<section class="section accommodation_list">
        <div class="container container--fw">
        ' . $catFilters . '
          <div class="row justify-content-lg-center pl-4 pr-4 pl-lg-0 pr-lg-0">
            <div class="col-12 accommodation-wrapper">
              <div class="row justify-content-center">
              ' . $preFilterAccommodationItems . '
              </div>
            </div>
          </div>
        </div>
      </section>';

    $templateTags['mod_view'] .= $accommodationView;

  }

}