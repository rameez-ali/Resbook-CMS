<?php

/** Edit General data */

function editItem() 
{

  global $message, $id, $do, $action, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $modKey;
  $template = '';
  $disableMenu = FLAG_YES; 

  $sqlPage = "SELECT gp.`id`,
        gp.`parent_id`,
        gp.`form_id`,
        gp.`page_meta_data_id`,
        pmd.`features`,
        pmd.`name`,
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
        pmd.`gallery_id`,
        pmd.`slideshow_id`,
        pmd.`external_url`,
        pmd.`template_id`,
        pmd.`cta_bunner_title`,
        pmd.`cta_bunner_description`,
        pmd.`cta_bunner_primary_url`,
        pmd.`cta_bunner_primary_button_text`,
        pmd.`cta_bunner_secondary_url`,
        pmd.`cta_bunner_secondary_button_text`,
        pmd.`template_id`,
        pmd.`slideshow_page_id`,
        pmd.`prefilter_catid`        
    FROM `general_pages` gp
    LEFT JOIN `page_meta_data` pmd
        ON(gp.`page_meta_data_id` = pmd.`id`)
    WHERE gp.`id` = '{$id}'
    LIMIT 1";

  $pageData = DB::fetchRow($sqlPage);

  if (!empty($pageData)) {

    /** Define vars */
    $pageId                  = $pageData['id'];
    $pageParentId            = $pageData['parent_id'];
    $pageMetaDataId          = $pageData['page_meta_data_id'];
    $pageName                = $pageData['name'];
    $pageMenuLabel           = $pageData['menu_label'];
    $pageFooterMenu          = $pageData['footer_menu'];
    $pageHeading             = $pageData['heading'];
    $pageSubHeading          = $pageData['sub_heading'];
    $pageUrl                 = $pageData['url'];
    $pageFullUrl             = $pageData['full_url'];
    $pageIntroduction        = $pageData['introduction'];
    $pageShortDescription    = $pageData['short_description'];
    $pageDescription         = $pageData['description'];
    $pageCoverPhotoPath      = $pageData['cover_photo'];
    $pageCoverThumbPhotoPath = $pageData['thumb_cover_photo'];
    $itemFeatures            = $pageData['features'];
    $pageGalleryId           = $pageData['gallery_id'];
    $pageSlideshowId         = $pageData['slideshow_id'];
    $slideshowPageId         = $pageData['slideshow_page_id'];
    $pageTemplateId          = $pageData['template_id'];
    $formId                  = $pageData['form_id'];
    $pageExternalUrl         = $pageData['external_url'];

    $ctaBunnerTitle          = $pageData['cta_bunner_title'];
    $ctaBunnerDescription    = $pageData['cta_bunner_description'];
    $ctaBunnerPrimaryUrl     = $pageData['cta_bunner_primary_url'];
    // $ctaBunnerPrimaryExternalUrl     = $pageData['cta_bunner_primary_external_url'];
    $ctaBunnerPrimaryButtonText      = $pageData['cta_bunner_primary_button_text'];
    $ctaBunnerSecondaryUrl   = $pageData['cta_bunner_secondary_url'];
    // $ctaBunnerSecondaryExternallUrl  = $pageData['cta_bunner_secondary_external_url'];
    $ctaBunnerSecondaryButtonText    = $pageData['cta_bunner_secondary_button_text'];

    $itemPreFilterCatId    = $pageData['prefilter_catid'];

  } else  {
    $pageFullUrl = ''; 
    // $pageMetaDataId = '';
    // $pageHeading = '';
    // $pageIntroduction = '';
    // $pageUrl = '';
    // $pageParentId = '';
    // $pageSlideshowId = '';
    // $pageGalleryId = '';
    // $pageTemplateId = '';
    // $formId = ''; 
  }

  $itemLabel = (empty($pageName)) ? 'Untitled' : $pageName;

  $moduleSubHeading = 'Editing '.$modMsgLabel.': '.$itemLabel;
  $moduleSubHeading .= '<a href="'.BASE_URL.$pageFullUrl.'" target="_blank">
       ('.BASE_URL.$pageFullUrl.'</a>)';


  /** Module actions */
  $moduleActions = '<ul class="page-action">
    <li>
      <button type="button" class="btn btn-default" id="pg-save"
        onclick="submitForm(\'save\',1)">
          <i class="glyphicon glyphicon-floppy-save"></i> Save
      </button>
    </li>
    <li>
      <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
        <i class="glyphicon glyphicon-arrow-left"></i> Cancel
      </a>
    </li>
  </ul>';

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  /** Content tab content */
  require_once MOD_VIEWS_DIR.DS.'content.php';

  /** Settings tab content */
  require_once MOD_VIEWS_DIR.DS.'settings.php';

  /** Modules tab content */
  require_once MOD_VIEWS_DIR.DS.'modules.php';

  /** Page features tab content */
  require_once MOD_VIEWS_DIR.DS.'features.php';

  /** CTA bunner tab content */
  require_once MOD_VIEWS_DIR.DS.'cta_bunner.php';
  // require_once MOD_VIEWS_DIR.DS.'cta.php';

  /** Generate tab array */

  $arrMenuTabs = array();

  $arrMenuTabs['Content']     = $tabContentContent;
  $arrMenuTabs['Settings']    = $tabSettingsContent;
  $arrMenuTabs['Modules']     = $tabModulesContent;
  $arrMenuTabs['SEO']         = SeoHelper::getSeoData($pageMetaDataId, $modMsgLabel);
  $arrMenuTabs['Quicklinks']  = QuicklinkHelper::getQuickLinksData($modKey, $pageId, $modMsgLabel);
  $arrMenuTabs['Highlights']  = HighlightHelper::getHighlightData($modKey, $pageId, $modMsgLabel);
  $arrMenuTabs['Features']    = $tabFeaturesContent;
  $arrMenuTabs['CTA Banner']  = $tabCTABunnerContent;

  $tabIndex   = 0;
  $tabList    = "";
  $tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

    $tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
    $tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
    $tabIndex++;

  }

  $moduleContent = '<form action="'.ADMIN_BASE_URL.'/index.php" method="post" 
     name="pageList" enctype="multipart/form-data">
      <div id="tabs">
        <ul>'.$tabList.'</ul>
        <div style="padding:10px;">'.$tabContent.'</div>
      </div>
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'">
      <input type="hidden" name="id" value="'.$id.'">
      <input type="hidden" name="meta_data_id" value="'.$pageMetaDataId.'">
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>
