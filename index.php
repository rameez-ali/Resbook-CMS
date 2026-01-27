<?php
/**
 * @package   NetZone Base CMS 2.0
 * @author    Sam Walsh, Tomahawk Brand Management
 * @author    Ton Jo Immanuel, Tomahawk Brand Management
 * @author    Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright Tomahawk Brand Management Ltd.
 * @version   2.0
 * @since     File available since Release 1.0
 */

/**
 * Include Required Files & System config file 
 */
global $debug, $bodyCls;

require_once __DIR__ . '/utility/config.php';

if ($debug) {

    FB::setEnabled($debug);

}

/**
 * CONNECT TO DATABASE 
 */

if (!$cConnection->Connect()) {

    echo "Database connection failed";
    exit;

}

/**
 * HANDLE 301 REDIRECTS 
 */

$requestedUrl = rtrim((string) $_SERVER['REQUEST_URI'], '/');

$redirectSQL = "SELECT 
	`new_url`, 
	`status_code`
	FROM `redirect`
	WHERE `old_url` = '{$requestedUrl}'
    AND `old_url` != `new_url`
		AND `status` = '" . FLAG_ACTIVE . "'
	LIMIT 1";

$redirectDetails = fetchRow($redirectSQL);

if (!empty($redirectDetails)) {

    $location = Helper::getFullUrl($redirectDetails['new_url']);
    $statusCode = $redirectDetails['statusCode'];

    Helper::redirect($location, 301);

}

/**
 *  Get the query string and split the name value pairs
 * Add the non-processed mod_rewrite queries to $_GET
 */
$_GET2 = [];
$queryString = parse_url((string) $_SERVER['REQUEST_URI'], PHP_URL_QUERY);
if ($queryString !== null) {
    parse_str($queryString, $_GET2);
}
$_GET = array_merge($_GET, is_array($_GET2) ? $_GET2 : []);

$page = sanitizeSqlSafe($_GET['pg'] ?? false);

$option1 = sanitizeSqlSafe($_GET['a'] ?? false);
$option2 = sanitizeSqlSafe($_GET['b'] ?? false);
$option3 = sanitizeSqlSafe($_GET['c'] ?? false);
$option4 = sanitizeSqlSafe($_GET['d'] ?? false);
$option5 = sanitizeSqlSafe($_GET['e'] ?? false);
$option6 = sanitizeSqlSafe($_GET['f'] ?? false);
$option7 = sanitizeSqlSafe($_GET['g'] ?? false);

$uriSegments = [];

if (!empty($page)) {
    $uriSegments[] = $page;
}

if (!empty($option1)) {
    $uriSegments[] = $option1;
}

if (!empty($option2)) {
    $uriSegments[] = $option2;
}

if (!empty($option3)) {
    $uriSegments[] = $option3;
}

if (!empty($option4)) {
    $uriSegments[] = $option4;
}

if (!empty($option5)) {
    $uriSegments[] = $option5;
}

if (!empty($option6)) {
    $uriSegments[] = $option6;
}

if (!empty($option7)) {

    $uriSegments[] = $option7;
}

/**
 * REQUIRED FILES
 * Get page/website-settings/module information from db
 */

require_once INCLUDES_DIR_PATH . DS . "pageInfo.php";

/**
 * INCLUDE NAVIGATION FILE 
 */
require_once INCLUDES_DIR_PATH . DS . "components" . DS . "main.php";
require_once INCLUDES_DIR_PATH . DS . "views" . DS . "main.php";

/**
 * GET MODULES 
 */

$sql = "SELECT mt.`mod_id` AS id, 
	mt.`tmplmod_rank` AS tmplrank, 
	m.`mod_path`
    FROM `module_templates` mt
    LEFT JOIN `modules` m 
    	ON (m.`mod_id` = mt.`mod_id`) 
    WHERE mt.`tmpl_id` = '{$pageTemplateId}'
    AND m.`mod_path` != ''

    UNION
		
    SELECT mp.`mod_id` AS id, 
    mp.`modpages_rank` AS tmplrank, 
    m.`mod_path`
    FROM `module_pages` mp
    LEFT JOIN modules m
    	ON (m.`mod_id` = mp.`mod_id`)
    WHERE mp.`page_id` = '{$mainPageId}'
    AND m.`mod_path` != ''    
    ORDER BY `tmplrank` ASC";

$pageModules = DB::fetchAll($sql);

if (!empty($templateTags['reservation_banner'])) {
    $pageModules[] = [
        'id' => 'virtual_reservation_banner',
        'tmplrank' => !empty($templateTags['reservation_banner_rank']) ? $templateTags['reservation_banner_rank'] : 0,
        'mod_path' => 'reservation_banner_virtual_path'
    ];
}


if (!empty($templateTags['video_thumbnail'])) {
    $pageModules[] = [
        'id' => 'virtual_video_banner',
        'tmplrank' => !empty($templateTags['video_rank']) ? $templateTags['video_rank'] : 0,
        'mod_path' => 'video_banner_virtual_path'
    ];
}

if (!empty($templateTags['faq_section'])) {
    $pageModules[] = [
        'id' => 'virtual_faq_section',
        'tmplrank' => !empty($templateTags['faqs_rank']) ? $templateTags['faqs_rank'] : 0,
        'mod_path' => 'faq_section_virtual_path'
    ];
}

// Sort modules by rank (tmplrank)
usort($pageModules, function ($a, $b) {
    return $a['tmplrank'] <=> $b['tmplrank'];
});

if (!empty($pageModules)) {

    foreach ($pageModules as $pageModule) {

        $pageModulePath = $pageModule['mod_path'];

        if ($pageModulePath === 'reservation_banner_virtual_path') {
            if (!empty($templateTags['reservation_banner'])) {
                $templateTags['mod_view'] .= $templateTags['reservation_banner'];
            }
        } elseif ($pageModulePath === 'video_banner_virtual_path') {
            if (!empty($templateTags['video_thumbnail'])) {
                $templateTags['mod_view'] .= $templateTags['video_thumbnail'];
            }
        } elseif ($pageModulePath === 'faq_section_virtual_path') {
            if (!empty($templateTags['faq_section'])) {
                $templateTags['mod_view'] .= $templateTags['faq_section'];
            }
        } else {
            include_once MODULES_DIR_PATH . DS . "{$pageModulePath}/main.php";
        }
    }
}

// Hide CTA banner, customer reviews, and partner sections on accommodation detail pages
// Check if we're on an accommodation detail page (mainPageId matches accommodation page and segment1 exists)
if (
    !empty($mainPageId) && !empty($impPageAccommodation) && isset($impPageAccommodation->id) &&
    $mainPageId == $impPageAccommodation->id && !empty($segment1) && empty($segment2) && empty($segment3)
) {
    $templateTags['page_cta'] = '';
    $templateTags['footer_review'] = '';
    $templateTags['partner_view'] = '';
}

/**
 * ADD TEMPLATE BODY CLASS 
 */
$templateTags['content_main_cls'] = '';
$templateTags['js_vars'] = '<script> var jsVars = ' . json_encode($jsVars, JSON_THROW_ON_ERROR) . '; </script>';
$templateTags['body_cls'] = (empty($bodyCls)) ? '' : trim((string) $bodyCls);
$templateTags['content_main_cls'] = ($templateTags['content_main_cls']) ? trim((string) $templateTags['content_main_cls']) : '';

/**
 * ADD CANONICAL TAGS 
 */

if (!empty($pageCanonicalTags)) {

    $templateTags['page_canonical_tag'] = $pageCanonicalTags;

}

/**
 * ADD ROBOT TAGS 
 */
if (PRODUCTION_MODE === true || isset($_GET['test'])) {

    $pageMetaIndex = DB::fetchValue(
        "SELECT `value`
    FROM `page_meta_index`
		WHERE `id` = '{$pageMetaIndexId}'"
    );

    if (!empty($pageMetaIndex)) {

        $templateTags['robots_meta_tag'] = '<meta name="robots" content="' . $pageMetaIndex . '">';

    }

} else {

    $templateTags['robots_meta_tag'] = '<meta name="robots" content="NOINDEX, NOFOLLOW">';

}

/**
 * ADD PAGE DEVELOPER CODE CONTENT TO SITE LEVEL DEVELOPER CODE CONTENT 
 */

$templateTags['js_code_head_close'] .= (empty($pageCodeHeadClose)) ? '' : $pageCodeHeadClose;
$templateTags['js_code_body_open'] .= (empty($pageCodeBodyOpen)) ? '' : $pageCodeBodyOpen;
$templateTags['js_code_body_close'] .= (empty($pageCodeBodyClose)) ? '' : $pageCodeBodyClose;

/**
 * ADD STRUCTURED DATA  
 */
if (!empty($pageSchemaMarkup)) {

    $templateTags['structure_data_markup'] = $pageSchemaMarkup;

}

/**
 * OUTPUT PAGE VIEW
 * IF PRODUCTION THEN OUTPUT MINIFIED
 * IF DEV THEN OUTPUT UNMINIFIED
 */

require_once INCLUDES_DIR_PATH . DS . "resultPage.php";

if (PRODUCTION_MODE === true) {

    ob_start("sanitizeOutput");
    echo $pageView;
    ob_end_flush();

} else {

    echo $pageView;

}

exit();

?>