<?php
/**  Contact Enquiries - Generate item table list */

function generateTable()
{
  global $do, $listType, $moduleMainHeading, $moduleSubHeading;
  $rowitems = (empty($rowitems)) ? '' : $rowitems;
  $template           = (empty($template)) ? '' : $template;
  $sqlExtra = ($listType == FLAG_DELETED) ? "`status` = '".FLAG_DELETED."'" : "`status` != '".FLAG_DELETED."'";

  $sql = "SELECT `id`, 
      TRIM(CONCAT(`first_name`, ' ', `last_name`)) AS name, 
      `email_address`, `status`,
      DATE_FORMAT(`date_of_enquiry`, '%e %b %Y @ %h:%i %p') AS date_enquired
    FROM `enquiry`
    WHERE `status` != '".FLAG_DELETED."'
    ORDER BY `date_of_enquiry` DESC";
 
 $arrItems = DB::fetchAll($sql);

  if(!empty($arrItems)) {
    
    foreach ($arrItems as $item) {

      $itemId         = $item['id'];
      $itemName       = $item['name'];
      $itemEmail      = Helper::mailTo($item['email_address']);
      $itemStatus     = $item['status'];
      $itemDate       = $item['date_enquired'];

      $longItemId     = str_pad((string) $itemId, 4, 0, STR_PAD_LEFT);
      
      $itemLabel      = $itemName ?: 'Untitled';

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
           class ="checkall" value="'.$itemId.'"><span></span>
        </label>';
    
      $rowitems .= '<tr>
        <td width="20">'.$itemSelect.'</td>
        <td width="70">
          <a href="'.ADMIN_BASE_URL.'/?do='.$do.'&action=edit&id='.$itemId.'">'.$longItemId.'</a>
        </td>
        <td width="200">'.$itemLabel.'</td>
        <td width="200">'.$itemEmail.'</td>
        <td width="150">'.$itemDate .'</td>
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