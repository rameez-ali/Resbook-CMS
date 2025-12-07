<?php
/**
 * Manage SEO Settings
 *
 * @category   Module
 * @package    NetZone Base CMS 3.0
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    1.0
 * @since      File available since Release 3.0
 */

function initMain()
{

  $resultPageContent = null;
  global $do, $id, $message, $itemSelect, $itemRank, $moduleMainHeading, $moduleSubHeading, $listType;
  $moduleContent      = (empty($moduleContent)) ? '' : $moduleContent;
  $template           = (empty($template)) ? '' : $template;
  $moduleMainHeading  = 'SEO Settings';

  $action        = requestVar('view') ?: requestVar('action');
  
  if ($action === 'save') {
      require_once __DIR__ . '/save.php';
      saveItem();
  }
  
  /** Module actions */
  $moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" id="pg-save"
          onclick="submitForm(\'save\',1)">
            <i class="glyphicon glyphicon-floppy-save"></i> Save
        </button>
      </li>
    </ul>';

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  $sqlSettings = "SELECT
      `id`,
      `option_name` AS opKey,
      `option_value` AS opValue
  FROM `seo_settings`";

  $itemSettings = DB::fetchPairs($sqlSettings);

  if (!empty($itemSettings)) {

  /** define vars */

  $seoJsCodeHeadClose      = $itemSettings['js_code_head_close'];
  $seoJsCodeBodyOpen       = $itemSettings['js_code_body_open'];
  $seoJsCodeBodyClose      = $itemSettings['js_code_body_close'];
  $seoGtmCodeHeadClose     = $itemSettings['gtm_code_head_close'];
  $seoGtmCodeBodyOpen      = $itemSettings['gtm_code_body_open'];  
  $seoAdwordsCode          = $itemSettings['adwords_code'];
  $seoStructureDataMarkup  = $itemSettings['structure_data_markup'];

  }
  
  /** Tab Google Tag Manager */
  require_once MOD_VIEWS_DIR.DS.'gtm_code.php';

  /** Tab Template Codes */
  require_once MOD_VIEWS_DIR.DS.'template_code.php';

  /** Tab Adwords Code */
  require_once MOD_VIEWS_DIR.DS.'adwords_code.php';

  /** Structured Data */
  require_once MOD_VIEWS_DIR.DS.'structured_data.php';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Google Tag Manager']  = $tabGtmCodes;
  $arrMenuTabs['Template Codes']      = $tabTemplateCodes;
  $arrMenuTabs['Google Ads']          = $tabAdwordsCode;
  $arrMenuTabs['Structured Data']     = $tabStructuredData;

  $tabIndex   = 0;
  $tabList    = "";
  $tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

    $tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
    $tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
    $tabIndex++;

  }

  /** Module content view  */
  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/index.php" method="post" 
      name="pageList" enctype="multipart/form-data">
        <div id="tabs">
          <ul>'.$tabList.'</ul>
          <div style="padding:10px;">'.$tabContent.'</div>
        </div>
        <input type="hidden" name="action" value="" id="action">
        <input type="hidden" name="do" value="'.$do.'">
        <input type="hidden" name="id" value="'.$id.'">
    </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>