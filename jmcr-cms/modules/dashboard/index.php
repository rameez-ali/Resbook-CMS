<?php
/**
 * Dashboard widget provides a summary of the pages, user and enquiry. 
 * Each of these content types are displayed in the form of a link and, 
 * when clicked upon, direct you to the specific area to manage that content.
 * 
 * @category   Module
 * @package    NetZone Base CMS 2.0
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */

function initMain(): never
{
  $generalPagesWidgetView = null;
  $lastUserWidgetView = null;
  $lastEnquiryWidgetView = null;
  $resultPageContent = null;
  global $moduleMainHeading , $do;
  $template = ''; $moduleContent = ''; $moduleActions = '';
  $moduleMainHeading = 'Dashboard';

  /** General Pages Widget */
  require_once MOD_VIEWS_DIR.DS.'general_pages.php';

  /** Last user Widget */
  require_once MOD_VIEWS_DIR.DS.'last_user.php';

  /** Latest enquiry Widget */
  require_once MOD_VIEWS_DIR.DS.'last_enquiry.php';

  $moduleContent .= '<div class="row dashboard" style="margin-top:-20px;">
    '.$generalPagesWidgetView.'
    '.$lastUserWidgetView.'
    '.$lastEnquiryWidgetView.'
    </div>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();
}

?>