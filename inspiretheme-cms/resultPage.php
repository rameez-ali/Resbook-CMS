<?php
/**
 * @package    NetZone Base CMS 2.0
 * @author     Sam Walsh, Tomahawk Brand Management Ltd.
 * @author     Ton Jo Immanuel, Tomahawk Brand Management Ltd.
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management Ltd.
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */

/**
* Auto generate and submit the sitemap
* 
* $arrSitemapDo - Define module which so ever should be included in sitemap
* $arrSitemapAction - Define set of action (aligned with Do) on which sitemap should be generated.  
*/

global  $moduleTabContent, $moduleMainHeading, $moduleSubHeading, $disableMenu; 
$extraScripts     = (empty($extraScripts)) ? '' : $extraScripts;
$extraStyles      = (empty($extraStyles)) ? '' : $extraStyles;
$scriptsOnLoad    = (empty($scriptsOnLoad)) ? '' : $scriptsOnLoad;
$arrSitemapDo     = ['pages'];
$arrSitemapAction = ['save', 'publish', 'hide', 'delete'];

if(in_array($do, $arrSitemapDo) && in_array($action, $arrSitemapAction)) {
    
  Sitemap::generate();
  
  /** UPDATE RSS FEED */
  $blogImpPage = Rss::getBlogImpPageData();

  if (!empty($blogImpPage) && $id == $blogImpPage['pg_id']){
    Rss::generate();
  }

}

/** Get template file and content */
if ($template == "") {
  
  $template = TEMPLATES_DIR.DS.'general.html';

}

$resultPageContent = file_get_contents("{$template}");

/** Include navigation file here */
require_once ADMIN_BASE_PATH.DS.INCLUDES_DIR.DS.'navigation.php';
require_once ADMIN_BASE_PATH.DS.INCLUDES_DIR.DS.'ckeditor.config.php';

$arrResultPage = [];

if(!defined('USER_FNAME')) define('USER_FNAME', false);
if(!defined('USER_LNAME')) define('USER_LNAME', false);
if(!defined('USER_EMAIL')) define('USER_EMAIL', false);
if(!defined('USER_ID')) define('USER_ID', false);
$mainMenuView = '';
if (!empty(USER_ID)) { 

  $mainMenuView      = buildSiteMenu();
  $siteUserFirstName = USER_FNAME;
  $siteUserLastName  = USER_LNAME;
  $siteUserEmail     = USER_EMAIL;  
  $siteUserFullName  = USER_FNAME.' '.USER_LNAME;
  

  $arrResultPage['site_user_data'] = '
    <div style="color:#fff;">
      <i class="glyphicon glyphicon-user"></i> 
        User logged in: <strong>'.$siteUserFullName.'</strong> 
      <a href="'.ADMIN_BASE_URL.'?do=logout" style="color:#fff;
       text-decoration:none">
        <strong>
          <span class="label label-success" style="padding:0.5em 0.8em 0.6em;
          margin-left:6px;font-size:13px;">
            <i class="fa fa-sign-out fa-fw"></i> 
            Logout
          </span>
        </strong>
      </a>
    </div>';

} else {

  $arrResultPage['site_user_data'] = '';

}

$templatePath  = ADMIN_BASE_PATH.DS.TEMPLATES_DIR.DS.'underscore'.DS;
$templatePath .= 'content_row.tmpl';

$jsVars['baseUrl']        = ADMIN_BASE_URL.DS;
$jsVars['dataManagerUrl'] = ADMIN_BASE_URL.DS.'?do=files';


$jsVars['templates']['contentRow'] = file_get_contents($templatePath);

$jsVars['templates']['contentRow'] = file_get_contents($templatePath);

$copyrightText  = "Netzone CMS 2.0 &copy; Copyright 2009 - ";
$copyrightText .= date('Y')." Tomahawk Brand Management Limited.";

$arrResultPage['jsVars'] = json_encode($jsVars, JSON_THROW_ON_ERROR);


$arrResultPage['root']                = ADMIN_BASE_URL;
$arrResultPage['site_main_menu']      = $mainMenuView ;

$arrResultPage['module_actions']      = $moduleActions;

$arrResultPage['module_main_heading'] = ($moduleMainHeading) 
                                          ? '<h1 class="main-h1">'
                                            .$moduleMainHeading.
                                            '</h1>' 
                                          : '';
$arrResultPage['module_sub_heading']  = ($moduleSubHeading) 
                                          ? '<h2 class="main-h2">'
                                            .$moduleSubHeading.'</h2>' 
                                          : '';

$arrResultPage['module_content_cls']  = ($arrResultPage['module_sub_heading'] !== '' && $arrResultPage['module_sub_heading'] !== '0') 
                                          ? 'xl' 
                                          : '';
$arrResultPage['data_disabled']       = ($disableMenu) 
                                          ? ' disabled="disabled"' 
                                          : '';

$arrResultPage['module_content']      = $moduleContent ;
$arrResultPage['module_tab_content']  = $moduleTabContent;
$arrResultPage['active_tab_index']    = (empty($activeTabIndex)) ? 0 : $activeTabIndex;

$arrResultPage['copyright']           = $copyrightText;

$arrResultPage['scripts_onload']      = $scriptsOnLoad;
$arrResultPage['styles_ext']          = $extraStyles;
$arrResultPage['scripts_ext']         = $extraScripts;

foreach ($arrResultPage as $key => $value) {
  if ($value !== null) {
      $resultPageContent = str_replace('==' . $key . '==', $value, $resultPageContent);
  }
}

?>