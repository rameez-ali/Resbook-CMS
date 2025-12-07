<?php

$sqlExperience = "SELECT e.`id`,
    e.`from_price`,
    e.`features`,
    e.`booking_url`,
    e.`currency_code`,
    e.`caption`,
    e.`is_featured`,
    e.`price_description`,
    e.`page_meta_data_id`,
    pmd.`name`,
    pmd.`menu_label`,
    pmd.`heading`,
    pmd.`url`,
    pmd.`full_url`,
    pmd.`introduction`,
    pmd.`short_description`,
    pmd.`description`,
    pmd.`slideshow_id`,
    pmd.`template_id`,
    pmd.`title`,
    pmd.`meta_description`,
    pmd.`og_title`,
    pmd.`og_meta_description`,
    pmd.`og_image`,
    pmd.`page_code_head_close`,
    pmd.`page_code_body_open`,
    pmd.`page_code_body_close`,
    pmd.`page_structure_data_markup`,
    pmd.`item_key` AS `module_key`,
    pmd.`gallery_id`,
    pmd.`page_meta_index_id`
  FROM `experience` e
  LEFT JOIN `page_meta_data` pmd
    ON(e.`page_meta_data_id` = pmd.`id`)
  WHERE pmd.`url` = '{$segment1}'
  LIMIT 1";

$experience = DB::fetchRow($sqlExperience);

if (!empty($experience)) {

  // DEFINE PAGE VARS

  $experienceId                        = $experience['id'];
  $experienceHeading                   = $experience['heading'];
  $experienceMenuLabel                 = $experience['menu_label'];
  $experienceIntroduction              = $experience['introduction'];
  $experienceFromPrice                 = $experience['from_price'];
  $experienceCurrencyCode              = $experience['currency_code'];
  $experiencePriceDesc                 = $experience['price_description'];
  $experienceCaption                   = $experience['caption'];
  $experienceBookingUrl                = $experience['booking_url'];
  $experienceFeatures                  = $experience['features'];
  $experienceOgImage                   = $experience['og_image'];
  $experienceOgImage                   = (empty($experienceOgImage)) ? '': Helper::getFullUrl($experienceOgImage);

  /* OVERRIDE PAGE VARS */
  $pageHeading                         = $experienceHeading;
  $pageSubHeading                      = '';
  $pageIntroduction                    = $experienceIntroduction;
  $pageMetaDataId                      = $experience['page_meta_data_id'];
  $pageMetaIndexId                     = $experience['page_meta_index_id'];

  $pageSlideshowId                     = $experience['slideshow_id'];
  $pageGalleryId                       = $experience['gallery_id'];
  $pageCodeHeadClose                   = $experience['page_code_head_close'];
  $pageCodeBodyOpen                    = $experience['page_code_body_open'];
  $pageCodeBodyClose                   = $experience['page_code_body_close'];
  $pageSchemaMarkup                    = $experience['page_structure_data_markup'];

  $pageQlModuleKey                     = $experience['module_key'];
  $pageQlItemId                        = $experienceId;

  // SET TEMPLATE VARS	

  $templateTags['title']               = $experience['title'];
  $templateTags['meta_description']    = $experience['meta_description'];
  $templateTags['og_title']            = $experience['og_title'];
  $templateTags['og_meta_description'] = $experience['og_meta_description'];
  $templateTags['og_image']            = $experienceOgImage; 
  
  /** Pricing text view */
    
  $experiencePricingLabel = '';
  $experienceBookNowButtonView = '';

  /** Check if Mobile Devide Detected */
  $objMobileDetect = new MobileDetect();

  $isMobileDevice  = ($objMobileDetect->isMobile() || $objMobileDetect->isTablet());
  $dnoneCls = '';
  if($isMobileDevice) {
    $mobilePriceDesc = '
          <span class=" text-center price_desc_single_mobile">'.$experiencePriceDesc.'</span>
        ';
    $txtCenterCls = 'text-center';
    $dnoneCls = 'd-none';
    $paddCls = 'pt-3';
  } else {
    $mobilePriceDesc = '';
    $txtCenterCls = '';
    $paddCls = '';
  }

  if (!empty($experienceFromPrice)) {
   
    $experienceCurrencyCode =  (empty($experienceCurrencyCode)) ? '' : "{$experienceCurrencyCode} ";
   
    $experiencePricingLabel = '<div class="card__price row pt-3">
      <div class="col-12 col-md-6 text-right '.$txtCenterCls.'">
        <span class="price_from"> From </span>
        <span class="card__price-rate"> $'.$experienceFromPrice.'</span>
        <span class="price_caption"> '.$experienceCaption.' </span>
        
      </div>
      <div class="col-12 col-md-6 text-left '.$txtCenterCls.' '.$paddCls.'">
        <span class="price_desc_single">'.$experiencePriceDesc.'</span>
      </div>
    </div>';

  } else {
    $experiencePricingLabel = '<div class="card__price"><span style="padding:0;">POA</span></div>';
  }



  if(!empty($experienceBookingUrl)) {
    $experienceBookNowButtonView = '<div class="card__booking col-12 col-md-3"><a href="'.$experienceBookingUrl.'" class="btn btn--primary"
      data-category="experience" data-action="Book Now Link" data-name="'.$experienceHeading.'">
      Book<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
      <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
    </svg></a></div>';
  }
  

  /* Category Section */
  //require_once 'inc/category.php';
  /* Fetaure Section */
  require_once __DIR__ . '/inc/features.php';
  
  $pageSubHeading = ''.$experiencePricingLabel.'';
  // OVERRIDE PAGE VARS
  $templateTags['page_features_view']  .= ''.$experienceFeatureView;
  /* More Experince Section */
  require_once __DIR__ . '/inc/experience.php';
}