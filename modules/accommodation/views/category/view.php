<?php 
// get the current category id
$sqlCategory = "SELECT ac.`id`, ac.`page_meta_data_id`, pmd.`menu_label`,pmd.`introduction`,
    pmd.`title`,
    pmd.`meta_description`,
    pmd.`og_title`,
    pmd.`og_meta_description`,
    pmd.`slideshow_id`,
    pmd.`og_image`,
    pmd.`item_key` AS `module_key`,
    pmd.`gallery_id`
  FROM `accommodation_category` ac
  LEFT JOIN `page_meta_data` pmd
    ON(ac.`page_meta_data_id` = pmd.`id`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
  AND pmd.`url` = '".$segment2."'
  LIMIT 1";

$categoryData = DB::fetchRow($sqlCategory);

$pageSlideshowId =  $categoryData['slideshow_id'];

if (!empty($categoryData)) {

    $pageHeading                          = $categoryData['menu_label'];
    $pageIntroduction                     = $categoryData['introduction'];
    $categoryId                           = $categoryData['id'];
    $templateTags['title']                = $categoryData['title'];
    $templateTags['meta_description']     = $categoryData['meta_description'];
    $templateTags['og_title']             = $categoryData['og_title'];
    $templateTags['og_meta_description']  = $categoryData['og_meta_description'];
    $accommodationCatOgImage              = $categoryData['og_image'];
    $templateTags['og_image']             = (!empty($accommodationCatOgImage)) ? Helper::getFullUrl($accommodationCatOgImage) : '';
    
    /* OVERRIDE PAGE VARS */
    $pageQlModuleKey                      = $categoryData['module_key'];
    $pageMetaDataId                       = $categoryData['page_meta_data_id'];
    $pageGalleryId                        = $categoryData['gallery_id'];
    $accommodationItems = '';

    $sqlAccommodations = "SELECT a.`id`,
        a.`guests`,
        a.`beds`,
        a.`bathrooms`,
        a.`room_size`,
        REPLACE(a.`from_price`,'.00','') AS from_price,
        a.`currency_code`,
        a.`from_price_caption`,
        a.`features`,
        a.`booking_url`,
        a.`button_text`,
        a.`page_meta_data_id`,        
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
    WHERE pmd.`status` = '".FLAG_ACTIVE."' 
    AND ahc.`accommodation_category_id` = '".$categoryId."'
    ORDER BY pmd.`rank` ASC";

    $arrAccommodations = DB::fetchAll($sqlAccommodations);

    if (!empty($arrAccommodations)) {

        foreach ($arrAccommodations AS $accommodation) {
         
          $accommodationId               = $accommodation['id'];
          $accommodationHeading          = $accommodation['heading'];
          $accommodationShortDescription = $accommodation['introduction'];
          $accommodationImage            = Helper::getFullUrl($accommodation['thumb_photo_path']);
          $accommodationImageAltText     = $accommodation['photo_alt_text'];
          $accommodationFullImage        = Helper::getFullUrl($accommodation['photo_path']);
          
          $accommodationGuests           = $accommodation['guests'];
          $accommodationBeds             = $accommodation['beds'];
          $accommodationroomsize         = $accommodation['room_size'];    
          $accommodationFromPrice        = $accommodation['from_price'];
          $accommodationFromPriceCaption = $accommodation['from_price_caption'];
          $accommodationCurrencyCode     = $accommodation['currency_code'];
         
          $accommodationBookingUrl       = $accommodation['booking_url'];
          $accommodationButtonLabel      = $accommodation['button_text'];
          $accommodationItemKey          = $accommodation['item_key'];
      
          $accommodationShortDescription = nl2br($accommodationShortDescription);
          $accommodationShortDescription = Helper::strTruncate($accommodationShortDescription, 180,'', true, true); 
          
          //$sqlAccommCat = '';
          // $sqlAccommCat = "SELECT 
          // pmd.`name`,    
          // pmd.`full_url`,    
          // FROM `accommodation_category` ac
          // LEFT JOIN `page_meta_data` pmd
          //   ON(ac.`page_meta_data_id` = pmd.`id`)
          // WHERE pmd.`status` = '".FLAG_ACTIVE."'            
          // ORDER BY pmd.`rank` ASC";
      
          // $accommCatData  =  DB::fetchRow($sqlAccommCat);
          // $accommCatHUrl  =  $accommCatData['full_url'];
          
          if($accommodationItemKey == 'accommodation_id'){
            $subUrl = '';
          } else {            
            $subUrl = '/category';
          }

          $accommodationFullURL        = Helper::getFullUrl($impPageAccommodation->full_url.$subUrl.$accommodation['full_url']);
      
          $accommodationButtonLabel = (!empty($accommodationButtonLabel)) ? $accommodationButtonLabel : 'More' ;
      
          /** Generate view for facilities */
          require 'facilities.php';
      
          $accommodationListPriceView = '';
   
          if (!empty($accommodationFromPrice)) {

            $accommodationListPriceView .= (empty($accommodationCurrencyCode)) ? '' : '<span>From '.$accommodationCurrencyCode.'</span>';
            $accommodationListPriceView .= (empty($accommodationFromPrice)) ? '' : ' <span class="card__price-rate">'.$accommodationFromPrice.'</span> ';
            $accommodationListPriceView .= (empty($accommodationFromPriceCaption)) ? '' : '<span>'.$accommodationFromPriceCaption.'</span>';
            
            $accommodationListPriceView = '<div class="card__price">'.$accommodationListPriceView.'</div>';
          }  else {
            $accommodationListPriceView = '<div class="card__price"><span style="padding:0;">POA</span></div>';
          }
      
          $accommodationBookNowButtonView = '';
      
          if(!empty($accommodationBookingUrl)) {
            $accommodationBookNowButtonView = '<a href="'.$accommodationBookingUrl.'" class="btn btn--primary btn--sm card__btn"
              data-category="Accommodation" data-action="Book Now Link" data-name="'.$accommodationHeading.'">Book</a>';
          }

          $isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
          $finalImage = $isMobileDevice ? $accommodationImage : $accommodationFullImage;
          
          $accommodationItems .= '<div class="col-12 col-md-6 col-xl-4 card">
              <div class="card__inner">
                <figure class="card__figure">
                  <a href="'.$accommodationFullURL.'" class="card__figure-link"
                   data-category="Accommodation" data-action="Image Link" data-name="'.$accommodationHeading.'">
                    <img data-src="'.$finalImage.'" alt="'.$accommodationImageAltText.'" class="card__figure-image lazy""/>
                  </a>
                    '.$accommodationListPriceView.'
                </figure>
                <div class="card__content">
                  <div class="card__content-inner">          
                    <h2 class="card__heading">
                      <a href="'.$accommodationFullURL.'"
                      data-category="Accommodation" data-action="Title Link" data-name="'.$accommodationHeading.'">
                        '.$accommodationHeading.'
                      </a>
                    </h2>
                    '.$accommodationFacilities.'
                    <p class="card__text">'.$accommodationShortDescription.'</p>            
                  </div>            
                </div>
                <div class="card__cta">
                  <a href="'.$accommodationFullURL.'" class="btn btn--ghost btn--sm card__btn"
                  data-category="Accommodation" data-action="More Link" data-name="'.$accommodationHeading.'">'
                  .$accommodationButtonLabel.'</a>
                  '.$accommodationBookNowButtonView.'
                </div>  
              </div>
            </div>';
      
        }
      
        if (!empty($accommodationItems)) {
      
          $accommodationView = '<section class="section featured-accommodation">
            <div class="container container--fw">
              <div class="row justify-content-lg-center pl-4 pr-4 pl-lg-0 pr-lg-0">
                <div class="col-12 accommodation-wrapper">
                  
                <div class="row">
                  '.$accommodationItems.'
                  </div>
                </div>
              </div>
            </div>
          </section>';
        
          $templateTags['mod_view'] .= $accommodationView;
      
        }
        
      }
}