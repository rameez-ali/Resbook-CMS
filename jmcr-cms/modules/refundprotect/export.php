<?php

function export() {
  $moduleContent = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $action;
  
  /** Remove warning message PHP 8.0 */
  error_reporting(E_ERROR | E_PARSE);

  $template           = (empty($template)) ? '' : $template;
  $extraScripts       = (empty($extraScripts)) ? '' : $extraScripts;
  $disableMenu = FLAG_YES;

  $moduleSubHeading = 'Export CSV File';

  /** Module actions */
  $moduleActions = '<ul class="page-action">
    <li>
      <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
        <i class="glyphicon glyphicon-arrow-left"></i> Back
      </a>
    </li>
    <li>
      
      <button type="button" class="btn btn-default" id="pg-save" onclick="submitForm(\'exportcontent\',1)">
        <i class="glyphicon glyphicon-floppy-save"></i> Download Contract
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

  /** Content tab content */
  require_once MOD_VIEWS_DIR.DS.'exportview.php';

  $modBaseDirPath  = ADMIN_BASE_URL.'/'.MODULES_DIR.'/'.$do;  

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Export']  = $exportViewContent;

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
  </form>';


  $extraScripts .= "<script>
  $('#from_date').attr({autocomplete:'off', readonly:true}).datepicker({
      dateFormat:'dd-mm-yy',
      maxDate: new Date(),
      onSelect: function(dateText, inst){
        $('#to_date').datetimepicker('option', 'minDate', dateText);          
     }
     
  });
  
  $('#to_date').attr({autocomplete:'off', readonly:true}).datepicker({
    
    dateFormat:'dd-mm-yy',
    maxDate: new Date()
    
  });
  
  </script>";
  
  require "resultPage.php";
  echo $resultPageContent;
  exit();
}



?>
