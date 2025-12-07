<?php

/** View Contact Enquiry Data */
function editItem() 
{

  $itemName = null;
  $moduleContent = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $action;
  $template           = (empty($template)) ? '' : $template;
  $disableMenu = FLAG_YES; 

  $sql = "SELECT LPAD(`id`, 4, 0) AS ind, 
      TRIM(CONCAT(`first_name`, ' ', `last_name`)) AS full_name, 
      `email_address`, 
      `contact_number`,
      `subject`,
      `comments`, 
    DATE_FORMAT(`date_of_enquiry`, '%e %M %Y @ %h:%i %p') AS date_enquired
    FROM `enquiry`
    WHERE `id` = '{$id}'
    LIMIT 1";

  $itemData = DB::fetchRow($sql);

  if (!empty($itemData)) {

    /** define vars */

    $itemId         = $itemData['ind'];
    $itemName       = $itemData['full_name'];
    $itemEmail      = Helper::mailTo($itemData['email_address']);
    $itemPhone      = $itemData['contact_number'];
    $itemSubject    = $itemData['subject'];
    $itemMessage    = $itemData['comments'];  
    $itemDate       = $itemData['date_enquired'];  
  }

  $itemLabel        = $itemName ?: 'Untitled';

  $moduleSubHeading = $modMsgLabel.' From : '.$itemLabel;


  /** Module actions */
  $moduleActions = '<ul class="page-action">
    <li>
      <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
        <i class="glyphicon glyphicon-arrow-left"></i> Back
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

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Details']  = $tabDetailsContent;

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
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>
