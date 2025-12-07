<?php

/** View Contact Enquiry Data */
function editItem() 
{
  $itemFirstName = null;
  $itemLastName = null;
  $moduleContent = null;
  $resultPageContent = null;
  /** Remove warning message PHP 8.0 */
  error_reporting(E_ERROR | E_PARSE);

  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $action;
  $template           = (empty($template)) ? '' : $template;
  $disableMenu = FLAG_YES; 

  $sql = "SELECT vp.*,
  vt.`txn_id`,
  vt.`amount_settlement`,
  vt.`response_text`,
  vt.`amount_surcharge`
    FROM `voucher_transaction` vt
    LEFT JOIN `voucher_purchased` vp
    ON (vt.`id` = vp.`voucher_transaction_id`)
    WHERE vp.`id` = '{$id}'";

  $itemData = DB::fetchAll($sql);

  if (!empty($itemData)) {

    /** define vars */
  
    foreach ($itemData as $item) {

    $itemId                           = $item['id'];

    $itemFirstName                    = $item['purchaser_first_name'];
    $itemLastName                     = $item['purchaser_last_name'];
    $itemEmail                        = $item['purchaser_email'];
    $itemPhone                        = $item['purchaser_phone'];

    $itemAmount                       = $item['amount'];
    $itemVoucherName                  .= $item['voucher_name'] .'<br>';
    $itemVoucherPrice                 .= $item['voucher_price'] .'<br>';
    $itemVoucherQty                   .= $item['quantity'] .'<br>';
    $itemRecipientName                = $item['recipient_name'];
    $itemRecipientVoucherName         = $item['recipient_name_on_voucher'];
    $itemRecipientMessage             = $item['message'];

    $itemDeliveryOption               = $item['delivery_option'];
    $itemDeliveryEmail                = $item['delivery_email'];
    $itemDeliveryPost                 = $item['delivery_post'];
    $itemDeliveryString               = $item['delivery_string'];
    
    $itemTransctionId                 = $item['txn_id'];
    $itemAmountSettlememt             = $item['amount_settlement'];
    $itemTransctionRes                = $item['response_text'];
    $itemSurcharge                    = $item['amount_surcharge'];
    
    $itemPurchaseDate                 .= date("d-m-Y H:i", strtotime((string) $item['purchase_date'])).'<br>';
    $itemExpiryDate                   .= date("d-m-Y H:i", strtotime((string) $item['expiry_date'])) .'<br>';

    $totalAmount = $itemAmount+$itemSurcharge;

    }
    
  }

  $moduleSubHeading = $modMsgLabel.' From : '.$itemFirstName.' '.$itemLastName;


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
