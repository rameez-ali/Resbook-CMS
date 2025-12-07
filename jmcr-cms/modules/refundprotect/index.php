<?php

function initMain()
{

  $resultPageContent = null;
  global $do, $id, $message, $itemSelect, $itemRank, $moduleMainHeading, $moduleSubHeading, $listType, $modName, $rpAccessToken, $rpApiUrl, $rpPaginationView;
  $moduleContent      = (empty($moduleContent)) ? '' : $moduleContent;
  $template           = (empty($template)) ? '' : $template;
  $extraScripts       = (empty($extraScripts)) ? '' : $extraScripts;
  $moduleMainHeading  = 'Refundable bookings';

  /** Identify module for Settings */
  $modName            = 'Refundable bookings';

  $action        = requestVar('view') ?: requestVar('action');
  $itemSelect    = requestVar('item_select');
  $itemRank      = requestVar('item_rank');

  /** CHECK if ACTIVE or TRASH LISTING based on action and set addtional params */
  $isActgiveListing   = $action != 'trash';
  $modActionURLParam  = (empty($isActgiveListing)) ? '&view=trash' : '';
  $moduleMainHeading .= (empty($isActgiveListing)) ? ' | Trash' : '';

  /** check if item restore has been initiated */
  $initRestore   = requestVar('action') === 'restore';

  /** Get the form action and do something */
  switch ($action) {
   
    case 'delete':
      require_once __DIR__ . '/cancel.php';
      cancelItem();
      break;
     
    case 'new':      
    case 'edit':
      require_once __DIR__ . '/edit.php';
      editItem();
      break;

    case 'save':
      require_once __DIR__ . '/save.php';
      saveItem();
      break;

    case 'export':        
      require_once __DIR__ . '/export.php';                       
      export();
      break;

    case 'exportcontent':             
      require_once __DIR__ . '/exportcontent.php';                       
      downloadContract();
      break;
    
  }
  
  /** Include list file and generate table */
  require_once __DIR__ . '/list.php';
  

  $listType    = (empty($listType)) ? FLAG_ACTIVE : $listType;
  $activePages = generateTable();

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

   /** Setup module action buttons based on active / trash listing */

  $moduleActionsButtons =  '';

  if ((empty($isActgiveListing))) {

    $moduleActionsButtons =  '<li>
        <button type="button" class="btn btn-default"
          onclick="submitForm(\'restore\',1)">
          <i class="fa fa-history"></i> Restore
        </button>
      </li>
      <li>
        <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
          <i class="glyphicon glyphicon-arrow-left"></i> Back
        </a>
      </li>';

  } else {

    $moduleActionsButtons =  '
        <li>
          <button type="button" class="btn btn-default" onclick="submitForm(\'new\',1)">
            <i class="glyphicon glyphicon-plus-sign"></i> New Contract
          </button>
        </li>

        <li>
          <button type="button" class="btn btn-default" onclick="submitForm(\'export\',1)" >
            <i class="glyphicon glyphicon-export"></i> Export
          </button>
        </li>        
        ';

  }

  /** Setup module actions  */
  $moduleActions = '<ul class="page-action">'.$moduleActionsButtons.'</ul>';

  /** Module content view  */
  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/?do='.$do.$modActionURLParam.'"
     method="post" style="margin:0px;" name="pageList" id="pageList">
      <table width="100%" class="bordered" >
        <thead>
          <tr>
            
            <th width="250" height="30" align="left">Contract Name</th>            
            <th width="150" align="left">Contract Total</th>  
            <th width="80" align="left">Currency</th>
            <th width="100" align="left">Posted On</th>
            <th width="100" align="left" align="center">Status</th>
          </tr>
        </thead>
        <tbody>
          '.$activePages.'
        </tbody>
      </table>
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'" id="do">
    </form>
    '.$rpPaginationView.'';

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
  
  $modBaseDirPath  = ADMIN_BASE_URL.'/'.MODULES_DIR.'/'.$do;
  $extraScripts .= '<script src="'.$modBaseDirPath.'/assets/js/refundprotect.js?v=1"></script>';
  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>