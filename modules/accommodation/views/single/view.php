<?php

$accommodationView = '';

$sqlAccommodation = "SELECT a.`id`,
    MD5(a.`id`) AS `hexId`,
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
    pmd.`introduction`,
    pmd.`short_description`,
    pmd.`description`,
    pmd.`slideshow_id`,
    pmd.`gallery_id`,
    pmd.`photo_path`,
    pmd.`thumb_photo_path`,
    pmd.`photo_alt_text`,
    pmd.`template_id`,
    pmd.`title`,
    pmd.`meta_description`,
    pmd.`og_title`,
    pmd.`og_meta_description`,
    pmd.`og_image`,
    pmd.`page_code_head_close`,
    pmd.`page_code_body_open`,
    pmd.`page_code_body_close`,
    pmd.`page_custom_code`,
    pmd.`page_structure_data_markup`,
    pmd.`item_key` AS `module_key`,
    pmd.`page_meta_index_id`
  FROM `accommodation` a
  LEFT JOIN `page_meta_data` pmd
    ON(a.`page_meta_data_id` = pmd.`id`)
  WHERE pmd.`url` = '{$segment1}'
  AND pmd.`status` = 'A'
  LIMIT 1";

$accommodation = DB::fetchRow($sqlAccommodation);

if (!empty($accommodation)) {

  // DEFINE PAGE VARS

  $accommodationId               = $accommodation['id'];
  $accommodationHashId           = $accommodation['hexId'];
  $accommodationHeading          = $accommodation['heading'];
  $accommodationIntroduction     = $accommodation['introduction'];

  $accommodationFeatures         = $accommodation['features'];

  $accommodationGuests           = $accommodation['guests'];
  $accommodationBeds             = $accommodation['beds'];
  $accommodationroomsize         = $accommodation['room_size'];
  $accommodationbathroom         = $accommodation['bathrooms'];
  $accommodationFromPrice        = $accommodation['from_price'];
  $accommodationFromPriceCaption = $accommodation['from_price_caption'];
  $accommodationCurrencyCode     = $accommodation['currency_code'];

  $accommodationBookingUrl       = $accommodation['booking_url'];
  $accommodationButtonLabel      = $accommodation['button_text'];

  $accommodationOgImage          = $accommodation['og_image'];
  $accommodationOgImage          = (empty($accommodationOgImage)) ? '' : Helper::getFullUrl($accommodationOgImage);
  $accommodationShowPOA          = $accommodation['show_poa'];

  /* OVERRIDE PAGE VARS */
  $pageHeading                   = $accommodationHeading;
  $pageSubHeading                = '';
  $pageIntroduction              = $accommodationIntroduction;
  $pageMetaDataId                = $accommodation['page_meta_data_id'];
  $pageMetaIndexId               = $accommodation['page_meta_index_id'];

  $pageGalleryId                 = $accommodation['gallery_id'];
  $pageSlideshowId               = $accommodation['slideshow_id'];
  $pageCodeHeadClose             = $accommodation['page_code_head_close'];
  $pageCodeBodyOpen              = $accommodation['page_code_body_open'];
  $pageCodeBodyClose             = $accommodation['page_code_body_close'];
  $pageSchemaMarkup              = $accommodation['page_structure_data_markup'];
  $pageCustomCode                = $accommodation['page_custom_code'];
  $pageQlModuleKey               = $accommodation['module_key'];
  $pageQlItemId                  = $accommodationId;

  /** UPDATE TEMPLATE TAGS */

  $templateTags['title']                = $accommodation['title'];
  $templateTags['meta_description']     = $accommodation['meta_description'];
  $templateTags['og_title']             = $accommodation['og_title'];
  $templateTags['og_meta_description']  = $accommodation['og_meta_description'];
  $templateTags['og_image']             = $accommodationOgImage;

  /* Partials View  */
  require_once __DIR__ . '/partials/content.php';

  /* Facilities Section */
  require_once __DIR__ . '/facilities.php';

  /* Features Section */
  require_once __DIR__ . '/features.php';

  /* Booking Section */
  require_once __DIR__ . '/booking_panel.php';
  
  /* more accommodation Section */
  require_once __DIR__ . '/accommodation.php';

  // OVERRIDE PAGE VARS
  //$templateTags['accommodation_view']       .= $accommodationFacilityView;
  //$templateTags['accommodation_view']       .= $accommodationView;
  // OVERRIDE PAGE VARS
  $templateTags['page_features_view']  .= ''.$accommodationView;
  $templateTags['accommodation_book_view']  .= $accommodationBookingView;

  if(!empty($pageCustomCode)) {
    $templateTags['custom_code'] = '<section class="section yonder_bg">
    <div class="container container--fw">
      <div class="row justify-content-lg-center pl-4 pr-4 pl-lg-0 pr-lg-0">
        <div class="col-12 accommodation-wrapper">
        '.$pageCustomCode.'
        </div>
      </div>
    </div>
  </section>';
        
  }

}