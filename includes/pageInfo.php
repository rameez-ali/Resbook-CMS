<?php
/**
 * GET Page information and respective details. Create and manage template tags.
 *
 * @package    NetZone Base CMS 2.0
 * @author     Sam Walsh, Tomahawk Brand Management
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */

/** GET PAGE CONTENT */
function getPageContent($pageMetaDataId)
{
    $output  = '';
    $columns = [];

    $pageMetaDataId = filter_var($pageMetaDataId, FILTER_VALIDATE_INT);

    $columnsQuery = DB::runQuery("SELECT cc.`content`,
        cc.`css_class`,
        cc.`content_row_id`
        FROM `content_column` cc
        LEFT JOIN `content_row` cr
            ON(cc.`content_row_id` = cr.`id`)
        WHERE cr.`page_meta_data_id` = '{$pageMetaDataId}'
        ORDER BY cr.`rank`, cc.`rank`");


    if (mysqli_num_rows($columnsQuery) > 0) {
        while ($arrColumn = mysqli_fetch_assoc($columnsQuery)) {
            $columns[$arrColumn['content_row_id']][] = $arrColumn;
        }

        $rowsQuery = DB::runQuery("SELECT `id`
            FROM `content_row`
            WHERE `page_meta_data_id` = '{$pageMetaDataId}'
            ORDER BY `rank`");

        while ($row = mysqli_fetch_assoc($rowsQuery)) {
            $rowId = $row['id'];

            $output .= '<div class="row content__row">';

            foreach ($columns[$rowId] as $column) {
                $output .= '<div class="'.$column['css_class'].'">'.$column['content'].'</div>';
            }

            $output .= '</div>';
        }
    }

    return $output;
}


/** GET LIST OF IMPORTANT PAGES */

function fetchImportantPages()
{
  global $impPageName;
  $sql = "SELECT ip.`imppage_name` AS name,
        pmd.`url`,
        pmd.`full_url`,
        pmd.`name` AS menu_name,
        pmd.`menu_label`,
        pmd.`footer_menu`,
        pmd.`title`,
        gp.`id` AS pg_id
      FROM `general_importantpages` ip
      LEFT JOIN `general_pages` gp
        ON(ip.`page_id` = gp.`id`)
      LEFT JOIN `page_meta_data` pmd
        ON(gp.`page_meta_data_id` = pmd.`id`)
      WHERE pmd.`status` = '".FLAG_ACTIVE."'
        AND pmd.`url` != ''
    UNION
      SELECT ms.`module_key` AS name,
        pmd.`url`,
        pmd.`full_url`,
        pmd.`name` AS menu_name,
        pmd.`menu_label`,
        pmd.`footer_menu`,
        pmd.`title`,
        ms.`option_value` AS pg_id
      FROM `module_settings` ms
      LEFT JOIN `general_pages` gp
        ON(ms.`option_value` = gp.`id`)
      LEFT JOIN `page_meta_data` pmd
        ON(gp.`page_meta_data_id` = pmd.`id`)
      WHERE `option_name` = 'imp_page'
        AND ms.`language_id` = '".LANGUAGE_ID."'
        AND pmd.`status` = '".FLAG_ACTIVE."'
        AND pmd.`url` != ''";

    $resultQuery = DB::runQuery($sql);

    $impPages = [];

    while ($array = mysqli_fetch_assoc($resultQuery)) {

      $impPageUrl  = ($impPageName != '')  ? $array['url'] : 'home' ;

      $impPageName = strtolower(str_replace(' ', '', $array['name']));

      $impPages["impage_{$impPageName}"] = (object) ['menu_label'        => ($array['menu_label'] ?: $array['menu_name']), 'footer_menu_label' => ($array['footer_menu'] ?: $array['menu_name']), 'url'               => $impPageUrl, 'full_url'          => $array['full_url'], 'abs_full_url'      => Helper::getFullUrl( $array['full_url']), 'id'                => $array['pg_id'], 'title'             => $array['title']];
    }

    return $impPages;
}

/** GET IMPORTANT PAGES */

$objImpPages = fetchImportantPages();

/** SET IMPORTANT PAGES VARS */
$impPageHome        = $objImpPages['impage_home'] ?? null;
$impPage404         = $objImpPages['impage_404'] ?? null;
$impPageBlog        = $objImpPages['impage_blog'] ?? null;
if(!empty($objImpPages['impage_contact'])) {
  $impPageContact         = $objImpPages['impage_contact'];
}

/** Validate Page Url Here */

$arrIgnoreUrls    = [];
$arrReservedUrls  = [];
if ($impPageBlog) {
  $arrReservedUrls[] = $impPageBlog->full_url;
}
$arrReservedSlugs = ['post', 'category', 'archive', 'author'];

$validateUrlResponse = UrlValidation::validateUrl($uriSegments, $arrReservedUrls, $arrReservedSlugs);

$isInvalidUrl = $validateUrlResponse['isInvalidUrl'];





  $validPageId  = $validateUrlResponse['pageInd'];

  $sql = "SELECT pmd.`name`,
      pmd.`menu_label`,
      pmd.`footer_menu`,
      pmd.`heading`,
      pmd.`sub_heading`,
      pmd.`url`,
      pmd.`full_url`,
      pmd.`introduction`,
      pmd.`short_description`,
      pmd.`description`,
      pmd.`cover_photo`,
      pmd.`thumb_cover_photo`,
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
      pmd.`status`,
      pmd.`gallery_id`,
      pmd.`slideshow_id`,
      pmd.`slideshow_page_id`,
      pmd.`photo_path`,
      pmd.`template_id`,
      pmd.`page_meta_index_id`,
      pmd.`features`,
      pmd.`prefilter_catid`,
      gp.`id`,
      gp.`parent_id`,
      gp.`form_id`,
      gp.`page_meta_data_id`,
      pmd.`cta_bunner_title`,
      pmd.`cta_bunner_description`,
      pmd.`cta_bunner_primary_url`,
      pmd.`cta_bunner_primary_external_url`,
      pmd.`cta_bunner_primary_button_text`,
      pmd.`cta_bunner_secondary_url`,
      pmd.`cta_bunner_secondary_external_url`,
      pmd.`cta_bunner_secondary_button_text`,
      pmd.`reservation_banner_title`,
      pmd.`reservation_banner_button_text`,
      pmd.`reservation_banner_button_url`
    FROM `general_pages` gp
    LEFT JOIN `page_meta_data` pmd
        ON(gp.`page_meta_data_id` = pmd.`id`)
    LEFT JOIN `page_meta_index` pmi
        ON(pmi.`id` = pmd.`page_meta_index_id`)
    WHERE pmd.`status` = '".FLAG_ACTIVE."'
      AND gp.`id` = '".$validPageId."'
    LIMIT 1";

  $pageData = DB::fetchRow($sql);

  $pageData['content'] = getPageContent($pageData['page_meta_data_id']);

  $arrPageData = $pageData;


$currentUrlSegments = array_filter(explode('/', (string) $arrPageData['full_url']));
$lastSegment        = end($currentUrlSegments);

$pageIndex   = (array_search($lastSegment, $uriSegments)+1);

/**  DYNAMICALLY GENERATED PAGE SEGMENTS/OPTIONS */
$segment1 = ${"option{$pageIndex}"};
$segment2 = ${"option".($pageIndex+1)};
$segment3 = ${"option".($pageIndex+2)};
$segment4 = ${"option".($pageIndex+3)};

/** FETCH SETTINGS */

function fetchSettings()
{
  $sql = "SELECT `id`,
    `company_name`,
    `start_year`,
    `email_address`,
    `phone_number`,
    `free_phone_number`,
    `fax_number`,
    `address`,
    `booking_url`,
    `resbook_id`,
    `is_resbook_calendar`,
    `rb_check_personal_widget`,
    `rb_checkin_widget`,
    `rb_property_manager_widget`,
    `fcontact_imp_page`,
    `fcontact_short_description`,
    `fcontact_heading`,
    `fcontact_btntext`,
    `fcontact_btnurl`      
  FROM `general_settings`
  WHERE `id` = '1'
  LIMIT 1";

  return DB::fetchRow($sql);
}

$arrSettings                           = fetchSettings();

/** CREATE WEBSITE SETTINGS VARS */

$companyName                           = $arrSettings['company_name'];
$siteStartYear                         = $arrSettings['start_year'];
$contactEmailAddress                   = $arrSettings['email_address'];
$contactPhoneNumber                    = $arrSettings['phone_number'];
$contactFreePhoneNumber                = $arrSettings['free_phone_number'];
$contactFaxNumber                      = $arrSettings['fax_number'];
$contactAddress                        = $arrSettings['address'];
$mainBookingUrl                        = $arrSettings['booking_url'];
$resbookId                             = $arrSettings['resbook_id'];
$isResbookCalendar                     = $arrSettings['is_resbook_calendar'];
$RBCPWidget                            = $arrSettings['rb_check_personal_widget'];
$RBChInWidget                          = $arrSettings['rb_checkin_widget'];
$RBPropManagerWidget                   = $arrSettings['rb_property_manager_widget'];
$fcontactImpPage                       = $arrSettings['fcontact_imp_page'];
$fcontactShortDesc                     = $arrSettings['fcontact_short_description'];
$fcontactHeading                       = $arrSettings['fcontact_heading'];
$fcontactBtnText                       = $arrSettings['fcontact_btntext'];
$fcontactBtnUrl                        = $arrSettings['fcontact_btnurl'];

$objContactEmails                      = getEmailList($contactEmailAddress);
if($objContactEmails) {
  $contactPrimaryEmail                 = $objContactEmails->primaryEmail;
}

$objCurrentDate                        = new DateTime();
$sqlCurrentDate                        = $objCurrentDate->format('Y-m-d');

/** CREATE PAGE DATA VARS */

$templateTags                          = [];

$templateTags                          = array_merge($templateTags, $arrPageData);

$mainPageId                            = $templateTags['id'];
$pageParentId                          = $templateTags['parent_id'];

$pageMenuLabel                         = $templateTags['menu_label'];
$pageFooterMenuLabel                   = $templateTags['footer_menu'];
$pageHeading                           = $templateTags['heading'];
$pageSubHeading                        = $templateTags['sub_heading'];
$pageUrl                               = $templateTags['url'];
$pageFullUrl                           = $templateTags['full_url'];
$pageIntroduction                      = $templateTags['introduction'];
$pageShortDescription                  = $templateTags['short_description'];
$pageDescription                       = $templateTags['description'];
$pageCoverPhotoPath                      = $templateTags['cover_photo'];
$pageCoverThumbPhotoPath                 = $templateTags['thumb_cover_photo'];

$pageTitle                               = $templateTags['title'];
$pageMetaDescription                     = $templateTags['meta_description'];
$pageOgTitle                             = $templateTags['og_title'];
$pageOgMetaDescription                   = $templateTags['og_meta_description'];
$pageOgImage                             = $templateTags['og_image'];
$pageCodeHeadClose                       = $templateTags['page_code_head_close'];
$pageCodeBodyOpen                        = $templateTags['page_code_body_open'];
$pageCodeBodyClose                       = $templateTags['page_code_body_close'];
$pageSchemaMarkup                        = $templateTags['page_structure_data_markup'];
$pageGalleryId                           = $templateTags['gallery_id'];
$pageSlideshowId                         = $templateTags['slideshow_id'];
$slideshowPageId                         = $templateTags['slideshow_page_id'];
$itemPhotoPath                           = $templateTags['photo_path'];
$pageTemplateId                          = $templateTags['template_id'];
$pageMetaIndexId                         = $templateTags['page_meta_index_id'];
$pageMetaDataId                          = $templateTags['page_meta_data_id'];
$pageFormId                              = $templateTags['form_id'];
$pageQlModuleKey                         = (empty($templateTags['module_key'])) ? 'page_id' : $templateTags['module_key'];
$pageQlItemId                            = $mainPageId;
$pageFeatures                            = $templateTags['features'];
$pagePreFilterCatdId                     = $templateTags['prefilter_catid'];

/** page CTA details */
$ctaBunnerTitle                          = $templateTags['cta_bunner_title'];
$ctaBunnerDescription                    = $templateTags['cta_bunner_description'];
$ctaBunnerPrimaryUrl                     = $templateTags['cta_bunner_primary_url'];
// $ctaBunnerPrimaryExternalUrl             = $templateTags['cta_bunner_primary_external_url'];
$ctaBunnerPrimaryButtonText              = $templateTags['cta_bunner_primary_button_text'];
$ctaBunnerSecondaryUrl                   = $templateTags['cta_bunner_secondary_url'];
// $ctaBunnerSecondaryExternallUrl          = $templateTags['cta_bunner_secondary_external_url'];
$ctaBunnerSecondaryButtonText            = $templateTags['cta_bunner_secondary_button_text'];

/** page Reservation Banner details */
$reservationBannerTitle                  = $templateTags['reservation_banner_title'];
$reservationBannerButtonText             = $templateTags['reservation_banner_button_text'];
$reservationBannerButtonUrl              = $templateTags['reservation_banner_button_url'];

// INIT ANY EMPTY TEMPLATE TAGS
$templateTags['scripts_load_top']        = '';
$templateTags['style_int']               = '';  ## Position held for internal styles
$templateTags['style_ext']               = '';  ## Position held for external styles
$templateTags['script_ext']              = '';  ## Position held for external scripts
$templateTags['script_onload']           = '';  ## Position held for onload scripts
$templateTags['script_inline']           = '';
$templateTags['body_cls']                = '';
$templateTags['body_html']               = '';
$templateTags['mod_view']                = '';
$templateTags['main_title']              = '';
$templateTags['sub_heading']             = '';
$templateTags['footer_blog_post_view']   = '';
$templateTags['footer_review']           = '';
$templateTags['quicklinks_view']         = '';
$templateTags['newsletter_view']         = '';
$templateTags['page_canonical_tag']      = '';
$templateTags['robots_meta_tag']         = '';
$templateTags['ex_meta_tags']            = '';
$templateTags['instagram_view']          = '';
$templateTags['contact-widget']          = '';
$templateTags['book_btn']                = '';
$templateTags['m_booking__btn']          = '';
$templateTags['accommodation_view']      = '';
$templateTags['accommodation_book_view'] = '';
$templateTags['more_option_view']        = '';
$templateTags['booking_view']            = '';
$templateTags['resbook_calendar_slider_view']   = '';
$templateTags['resbook_calendar_form_view']   = '';
$templateTags['content']                 = '';
$templateTags['custom_code']             = '';
$templateTags['contact_details']         = '';
$templateTags['page_features_view']      = '';
$templateTags['page_cta']                = '';
$templateTags['slideshow_page_id']       = '';
$templateTags['featured_highlight']       = '';
$templateTags['gallery_filter_view']     = '';


if ($pageUrl == $impPageHome->url) {
  $bodyCls .= ' home';
}

$templateTags['headerCls'] = $pageUrl == $impPageHome->url ? '' : 'fixed';

$templateTags['partner_view']          = '';

// CREATE PAGE CANONICAL TAGS
if ($pageUrl != $impPage404->url) {

  $pageCanonicalUrl = parse_url((string) Helper::getFullUrl($_SERVER['REQUEST_URI']));

  $pageCanonicalTags   = '<link rel="canonical" href="'.BASE_URL.$pageCanonicalUrl['path'].'">';

} else {

  $pageCanonicalTags = '';

}

if ($mainPageId == $impPage404->id) {
  header("HTTP/1.1 404 Not Found");
}
// DEFINE TAGS
$ogRequestURL = parse_url((string) $_SERVER['REQUEST_URI']);

$templateTags['lang_iso_code']      = 'en';
$templateTags['og_url']             = Helper::getFullUrl($ogRequestURL['path']);
$templateTags['og_image']           = Helper::getFullUrl($pageOgImage);
$templateTags['home_url']           = Helper::getFullUrl($impPageHome->full_url);

/** Check if Mobile Devide Detected */
$objMobileDetect = new MobileDetect();

$isMobileDevice  = ($objMobileDetect->isMobile() || $objMobileDetect->isTablet());

$templateLogoPath = $isMobileDevice ? GRAPHICS_DIR.'/logo-mobile.png' : GRAPHICS_DIR.'/logo.png';
$templateTags['template_logo_path'] = Helper::getFullUrl($templateLogoPath);

$templateTags['content_label']      = (empty($pageContentLabel))
                                        ? ''
                                        : '<span class="label-highlight">
                                        '.Helper::getHighlightedText($pageMenuLabelHText, $pageContentLabel).'
                                        </span>';

$templateCssPath = ASSETS_DIR.DS.'css/'.((PRODUCTION_MODE === false) ? '_main_xl.css' : 'main.css');
$templateJsPath  = ASSETS_DIR.DS.'js/scripts/'.((PRODUCTION_MODE === false) ? 'unmin/main.js': 'min/main.js');

// TEMPLATE ASSETS FILE PATHS
$templateTags['favicon_apple_touch_path'] = Helper::getFileFullURL('apple-touch-icon.png');
$templateTags['favicon_32x32_path']       = Helper::getFileFullURL('favicon.ico');
$templateTags['favicon_path']             = Helper::getFileFullURL('favicon.ico');
// $templateTags['manifest_path']            = Helper::getFileFullURL('manifest.json');
$templateTags['safari_pinned_tab_path']   = Helper::getFileFullURL('safari-pinned-tab.svg');

$templateTags['css_path']                 = Helper::getFileFullURL($templateCssPath);
$templateTags['modernizr_path']           = Helper::getFileFullURL(ASSETS_DIR.DS.'js/vendor/min/modernizr-2.8.3.js');
$templateTags['vender_js_path']           = Helper::getFileFullURL(ASSETS_DIR.DS.'js/vendor/min/production.js');
$templateTags['js_path']                  = Helper::getFileFullURL($templateJsPath);

include_once __DIR__ . "/components/credits/main.php";

$templateTags = array_merge($arrSettings, $templateTags);

/** FETCH SEO SETTINGS */

$sqlSeoSettings = "SELECT
    `id`,
    `option_name` AS opKey,
    `option_value` AS opValue
  FROM `seo_settings`";

$seoSettings = DB::fetchPairs($sqlSeoSettings);


$templateTags = array_merge($seoSettings, $templateTags);
$slideshowSpeed = '';
/** CREATE JS VARS ARRAY */
$jsVars = ['globals' => ['baseUrl'=> BASE_URL, 'slideshowSpeed' => (($slideshowSpeed !== '') ? ($slideshowSpeed * 1000) : 5000)], 'data' => [], 'templates' => []];

/** Check if Mobile Devide Detected */
$objMobileDetect = new MobileDetect();
$isMobileDevice  = ($objMobileDetect->isMobile() || $objMobileDetect->isTablet());
$bookBtnMobileNavigation = '';
// var_dump($RBCPWidget);die('fdfdf');
if(!empty($RBCPWidget)) {

  if ($isMobileDevice) {
    $templateTags['m_booking__btn'] = '<div class="btn--navigation">'.$RBCPWidget.'</div>';
  } else {
    $templateTags['book_btn'] =' '.$RBCPWidget.' ';
  }

} else {
  if (!$isMobileDevice) {
    $templateTags['book_btn'] = '<div class="CheckInPersonWidget">
                                  <section class="booking-engine check-availability-page p-0  ">
                                    <div>
                                      <a href="'.$mainBookingUrl.'"
                                        class="btn btn__book btn--primary"
                                        data-category="Navigation"
                                        data-action="Book Now Button"
                                        data-name="Book Now" rel="external" target=”_blank”>
                                        Book
                                      </a>
                                    <div>
                                  </section>
                                </div>';
  }else {
    $templateTags['m_booking__btn'] = '<div class="btn--navigation">
                                        <div class="CheckInPersonWidget">
                                          <section class="booking-engine check-availability-page p-0">
                                            <div>
                                              <a href="'.$mainBookingUrl.'"
                                                class="btn btn__book btn--primary"
                                                data-category="Navigation"
                                                data-action="Book Now Button"
                                                data-name="Book Now" rel="external" target=”_blank”>
                                                Book
                                              </a>
                                            <div>
                                          </section>
                                        </div>
                                      </div>';
  }
}

if ($contactPhoneNumber) {
    $templateTags['phone_icon'] = '<div class="header__nav-phone">
      <a href="tel:'.$contactPhoneNumber.'" class="phone__btn" data-category="Phone Link" data-action="Click" data-name="'.$contactPhoneNumber.'">
      <svg xmlns="http://www.w3.org/2000/svg" width="21.708" height="21.721" viewBox="0 0 21.708 21.721"><g id="ic-contact-phone" transform="translate(1.069 1)"><path id="Path_89" data-name="Path 89" d="M3.789,6.492,6.5,3.778a2.271,2.271,0,0,1,3.248,0l1.544,1.544a2.271,2.271,0,0,1,0,3.214L10.284,9.558h0a18.714,18.714,0,0,0,6.4,6.416h0L17.7,14.952a2.271,2.271,0,0,1,3.213,0l1.522,1.51a2.271,2.271,0,0,1,0,3.214L19.72,22.413a1.135,1.135,0,0,1-1.431.148h0A52.235,52.235,0,0,1,3.653,7.923h0a1.136,1.136,0,0,1,.136-1.431Z" transform="translate(-3.461 -3.095)" fill="none" stroke="#11BBB4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></g></svg>
      </a>
    </div>';
} elseif ($contactFreePhoneNumber) {
    $templateTags['phone_icon'] = '<div class="header__nav-phone">
    <a href="tel:'.$contactFreePhoneNumber.'" class="phone__btn" data-category="Phone Link" data-action="Click" data-name="'.$contactFreePhoneNumber.'">
    <svg xmlns="http://www.w3.org/2000/svg" width="21.708" height="21.721" viewBox="0 0 21.708 21.721"><g id="ic-contact-phone" transform="translate(1.069 1)"><path id="Path_89" data-name="Path 89" d="M3.789,6.492,6.5,3.778a2.271,2.271,0,0,1,3.248,0l1.544,1.544a2.271,2.271,0,0,1,0,3.214L10.284,9.558h0a18.714,18.714,0,0,0,6.4,6.416h0L17.7,14.952a2.271,2.271,0,0,1,3.213,0l1.522,1.51a2.271,2.271,0,0,1,0,3.214L19.72,22.413a1.135,1.135,0,0,1-1.431.148h0A52.235,52.235,0,0,1,3.653,7.923h0a1.136,1.136,0,0,1,.136-1.431Z" transform="translate(-3.461 -3.095)" fill="none" stroke="#11BBB4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></g></svg>
    </a>
  </div>';
} else {
  $templateTags['phone_icon'] = '';
}

// Utility function to create the button

function createButtonView($url, $buttonText, $title, $svg, $isExternal = false, $buttonClass = "btn btn--primary btn--white section__btn mb-2 mb-lg-0") {
  $targetAttribute = $isExternal ? 'target="_blank"' : '';
  $html = '<a href="' . $url . '" ' . $targetAttribute . ' class="'. $buttonClass .'"
  data-category="Page CTA" data-action="Book Now Link" data-name="' . $title . '">
      ' . $buttonText . $svg
      . '</a>';
  return $html;
}

$primarySvg = '<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
<path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#11BBB4"/>
</svg>';

$secondarySvg = '<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
<path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
</svg>';

$PageCtaButtonView = '';
if (!empty($ctaBunnerPrimaryButtonText)) {
  if (!empty($ctaBunnerPrimaryUrl)) {

      if(strpos($ctaBunnerPrimaryUrl, "http://") === 0 || strpos($ctaBunnerPrimaryUrl, "https://") === 0){
        $PageCtaButtonView .= createButtonView($ctaBunnerPrimaryUrl, $ctaBunnerPrimaryButtonText, $ctaBunnerTitle, $primarySvg, true);
      }elseif(strpos($ctaBunnerPrimaryUrl, "/") === 0){
        $PageCtaButtonView .= createButtonView($ctaBunnerPrimaryUrl, $ctaBunnerPrimaryButtonText, $ctaBunnerTitle, $primarySvg);
      }
  }
}

if (!empty($ctaBunnerPrimaryButtonText) && !empty($ctaBunnerSecondaryButtonText) &&(!$isMobileDevice)) {
  $PageCtaButtonView .= '<span style="padding: 0 15px;"></span>';
}
if (!empty($ctaBunnerSecondaryButtonText)) {
  $secondaryButtonClass = "btn btn--ghost btn--sm btn-cta";
  if (!empty($ctaBunnerSecondaryUrl)) {
    if(strpos($ctaBunnerSecondaryUrl, "http://") === 0 || strpos($ctaBunnerSecondaryUrl, "https://") === 0){
      $PageCtaButtonView .= createButtonView($ctaBunnerSecondaryUrl, $ctaBunnerSecondaryButtonText, $ctaBunnerTitle, $secondarySvg, true, $secondaryButtonClass);
    }elseif(strpos($ctaBunnerSecondaryUrl, "/") === 0){
      $PageCtaButtonView .= createButtonView($ctaBunnerSecondaryUrl, $ctaBunnerSecondaryButtonText, $ctaBunnerTitle, $secondarySvg, false, $secondaryButtonClass);
    }
  }
}

$PagectaDescriptionView = !empty($ctaBunnerDescription) ? '<h6 class="text-white text-center pb-5">'.$ctaBunnerDescription.'</h6>' : '';

if(!empty($ctaBunnerTitle)){
  $templateTags['page_cta']= '<section class="section page_cta section_cta topaz-bg">
  <div class="container pb-4 pb-lg-0">
    <div class="row">
      <div class="col-12">
        <header class="section__header">
          <h2 class="section__heading section__heading--alt">
            '.$ctaBunnerTitle.'
          </h2>
        </header>
        '.$PagectaDescriptionView.'
      </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
          '.$PageCtaButtonView.'
        </div>
    </div>
  </div>
  </section>';
}

/** Reservation Banner View */
$reservationBannerButtonView = '';
if (!empty($reservationBannerButtonText) && !empty($reservationBannerButtonUrl)) {
  $reservationBannerFullUrl = $reservationBannerButtonUrl;
  
  // Check if it's an external URL
  if (strpos($reservationBannerButtonUrl, "http://") === 0 || strpos($reservationBannerButtonUrl, "https://") === 0) {
    $reservationBannerFullUrl = $reservationBannerButtonUrl;
  } elseif (strpos($reservationBannerButtonUrl, "/") === 0) {
    $reservationBannerFullUrl = Helper::getFullUrl($reservationBannerButtonUrl);
  } else {
    $reservationBannerFullUrl = Helper::getFullUrl('/' . $reservationBannerButtonUrl);
  }
  
  $reservationBannerButtonView = '<a href="'.$reservationBannerFullUrl.'" class="btn btn--primary" 
    data-category="Reservation Banner" data-action="Button Link" data-name="'.$reservationBannerTitle.'">'.$reservationBannerButtonText.'</a>';
}

if(!empty($reservationBannerTitle)){
  $templateTags['reservation_banner']= '<section class="section reservation-banner">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="reservation-banner__wrapper">
          <div class="reservation-banner__inner">
            <h3 class="reservation-banner__subtitle">STAY WITH US</h3>
            <h2 class="reservation-banner__title">
              '.$reservationBannerTitle.'
            </h2>
            <div class="reservation-banner__button-wrapper">
              '.$reservationBannerButtonView.'
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>';
}

if(!empty($pageFeatures)) {
  $templateTags['page_features_view']= '<section class="section section--no-padding accommodation-accordion page_features pt-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="accommodation-amenities page-amenities pt-5">
          <div id="accommodation" class="accommodation__body">
            '.$pageFeatures.'
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>';
}