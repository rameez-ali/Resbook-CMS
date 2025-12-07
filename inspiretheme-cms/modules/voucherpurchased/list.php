<?php
/**  Contact Enquiries - Generate item table list */

function generateTable()
{
  global $do, $listType, $moduleMainHeading, $moduleSubHeading, $itemDeliveryString;
  $rowitems    = (empty($rowitems)) ? '' : $rowitems;

  $sql = "SELECT DISTINCT vt.`id`, vp.`id` AS vp_id, vp.`delivery_string`, 
  TRIM(CONCAT(vp.`purchaser_first_name`, ' ', vp.`purchaser_last_name`)) AS name, 
  vp.`purchaser_email`,vp.`amount`,
  vt.`txn_id` AS transaction_id,
  vt.`response_text`,vp.`voucher_transaction_id`,vp.`status`
  FROM `voucher_transaction` vt
  INNER JOIN `voucher_purchased` vp
  ON (vt.`id` = vp.`voucher_transaction_id`) 
  WHERE (vp.`status` != 'D'  OR vp.`status` is null)
  ORDER BY vp.`id` DESC ";
 
 $arrItems = DB::fetchAll($sql);

  if(!empty($arrItems)) {
    
    foreach ($arrItems as $item) {

      $itemId               = $item['vp_id'];
      $itemDeliveryString   = $item['delivery_string'];
      $itemName             = $item['name'];
      $itemAmount           = $item['amount'];
      $itemTransactionId    = $item['transaction_id'];
      $itemResponse         = $item['response_text'];
      $itemEmail            = Helper::mailTo($item['purchaser_email']);      


      if ($itemResponse == "APPROVED") { 
        $itemStatus = '<span class="label label-success">APPROVED</span>'; 
    }
    elseif ($itemResponse == "DECLINED") { 
        $itemStatus = '<span class="label label-danger">DECLINED</span>'; 
    } else {
        $itemStatus = '<span class="label label-warning">'.$itemResponse.'</span>'; 
    }


      
      $itemLabel      = $itemName ?: 'Untitled';

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
           class ="checkall" value="'.$itemId.'"><span></span>
        </label>';
    
      $rowitems .= '<tr">
        <td width="20">'.$itemSelect.'</td>
        <td width="70">
          <a href="'.ADMIN_BASE_URL.'/?do='.$do.'&action=edit&id='.$itemId.'">'.$itemDeliveryString.'</a>
        </td>
        <td width="200">'.$itemLabel.'</td>
        <td width="200">'.$itemEmail.'</td>
        <td width="100">'.$itemAmount.'</td>
        <td width="100">'.$itemTransactionId.'</td>
        <td width="100">'.$itemStatus.'</td>
        </tr>';
    }

  } else {

    $moduleLabel = strtolower(str_replace(' | Trash','',(string) $moduleMainHeading));

    $rowitems .= '<tr>
      <td colspan="5" align="center" class="no-data">No '.$moduleLabel.' available.</td>
    </tr>';

  }

  return $rowitems;
}
?>