<?php
/**
 * Manage website general settings
 *
 * @category   Module
 * @package    NetZone Base CMS 2.0
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */
function initMain()
{

  $resultPageContent = null;
  global $message, $moduleMainHeading, $do;
  $moduleContent      = (empty($moduleContent)) ? '' : $moduleContent;
  $fcontactDescription = (empty($fcontactDescription)) ? '' : $fcontactDescription;
  $template           = (empty($template)) ? '' : $template;
  $action     = requestVar('action');

  $moduleMainHeading = 'General Settings';

  if ($action === 'save') {
      require_once __DIR__ . '/save.php';
      $return = saveItem();
  }
  
  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }
  
  $sql = "SELECT `id`,
      `company_name`,
      `start_year`,
      `email_address`,
      `phone_number`,
      `free_phone_number`,
      `fax_number`,
      `address`,
      `resbook_id`,
      `booking_url`,
      `is_resbook_calendar`,
      `rb_check_personal_widget`,
      `rb_checkin_widget`,
      `rb_property_manager_widget`,
      `fcontact_heading`,
      `fcontact_short_description`,
      `fcontact_btntext`,
      `fcontact_btnurl`      
    FROM `general_settings`
    WHERE `id` = '1'
    LIMIT 1";

  $siteData = fetchRow($sql); 
  
  /** define vars */

  $id                   = $siteData['id'];
  $gsCompanyName        = $siteData['company_name'];
  $gsStartYear          = $siteData['start_year'];
  $gsEmailAddress       = $siteData['email_address'];
  $gsPhoneNumber        = $siteData['phone_number'];
  $gsFreePhoneNumber    = $siteData['free_phone_number'];
  $gsFaxNumber          = $siteData['fax_number'];
  $gsAddress            = $siteData['address'];
  $gsBookingUrl         = $siteData['booking_url'];
  $gsResbookID          = $siteData['resbook_id'];
  $gsIsResbookCalendar  = $siteData['is_resbook_calendar'];
  $gsCPWidget           = $siteData['rb_check_personal_widget'];
  $gsChInWidget         = $siteData['rb_checkin_widget'];
  $gsPropManagerWidget  = $siteData['rb_property_manager_widget'];
  $fcontactHeading      = $siteData['fcontact_heading'];
  $fcontactDescription  = $siteData['fcontact_short_description'];
  $fcontactBtnText      = $siteData['fcontact_btntext'];
  $fcontactBtnUrl       = $siteData['fcontact_btnurl'];  

  $readOnly = empty($gsCompanyName) ? '' : 'readonly';
  
  /** Module actions */
	$moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" id="pg-save"
          onclick="submitForm(\'save\',1)">
            <i class="glyphicon glyphicon-floppy-save"></i> Save
        </button>
      </li>
    </ul>';

  /** Social tab content */
  require_once MOD_VIEWS_DIR.DS.'company_details.php';

  /** Important pages tab content */
  require_once MOD_VIEWS_DIR.DS.'important_pages.php';

  /** RB Widget tab content */
  require_once MOD_VIEWS_DIR.DS.'rb_widget.php';
 
  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Company Details']    = $tabCompanyDetailsContent;
  $arrMenuTabs['Important Pages']    = $tabImportantPagesContent;
  $arrMenuTabs['RS Widget']          = $tabRSWidgetContent;
  $arrMenuTabs['Footer']             = $tabFooterContactContent;

  $tabIndex   = 0;
  $tabList    = "";
  $tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

    $tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
    $tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
    $tabIndex++;

  }

  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/?do='.$do.'"
    method="post" name="pageList" enctype="multipart/form-data">
			<div id="tabs">
				<ul>'.$tabList.'</ul>
				'.$tabContent.'
			</div>
			<input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'">
	</form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();
}

?>