<?php

// Ensure mod_view exists
if (!isset($templateTags['mod_view'])) {
  $templateTags['mod_view'] = '';
}

// Current page meta id (provided by the page pipeline)
$currentMetaId = isset($arrPageData['page_meta_data_id'])
  ? (int) $arrPageData['page_meta_data_id']
  : null;

// Fetch accommodations with features and meta id
$sqlAccommodations = "SELECT
    a.`id`,
    a.`features`,
    a.`type`,
    a.`page_meta_data_id`,
    a.`booking_url`,
    a.`button_text`,
    a.`show_poa`,
    a.`from_price`,
    a.`currency_code`,
    a.`from_price_caption`,
    a.`guests`,
    a.`beds`,
    a.`bathrooms`,
    a.`room_size`,
    a.`deck_size`,
    a.`bedroom_details`,
    a.`sleeps_details`,
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
    ON (a.`page_meta_data_id` = pmd.`id`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
  ORDER BY pmd.`rank` ASC";

$arrAccommodations = DB::fetchAll($sqlAccommodations);


if (!empty($arrAccommodations)) {

  foreach ($arrAccommodations as $accommodation) {

    // Detect the accommodation that matches the current detail page
    $itemMetaId = (int) ($accommodation['page_meta_data_id'] ?? 0);
    $isCurrentDetail = ($currentMetaId && $itemMetaId === $currentMetaId);

    if ($isCurrentDetail) {
      // Features HTML from DB
      $accommodationFeaturesHtml = (string) ($accommodation['features'] ?? '');

      if (!empty($accommodationFeaturesHtml)) {
        // Build Features section
        $templateTags['page_features_view'] =
          '<section class="section section--no-padding accommodation-accordion">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="accommodation-amenities pt-4 mb-5">
                    <div id="accommodation" class="accommodation__body">'
                      . $accommodationFeaturesHtml .
                    '</div>
                  </div>
                </div>
              </div>
            </div>
          </section>';

        // Also append to mod_view to guarantee output
        $templateTags['mod_view'] .= $templateTags['page_features_view'];
      }

      // Done once for the matching detail item
      break;
    }
  }
}

// This file intentionally does not render the listing/cards.