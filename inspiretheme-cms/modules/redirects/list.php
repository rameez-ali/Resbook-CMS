<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType, $moduleMainHeading, $moduleSubHeading;
  $rowitems        = (empty($rowitems)) ? '' : $rowitems;
  $sql = "SELECT `id`, 
      `old_url`, 
      `status`
    FROM `redirect`
    WHERE `status` != '".FLAG_DELETED."'
    ORDER BY `status`";
 
 $arrItems = DB::fetchAll($sql);

  if(!empty($arrItems)) {
    
    foreach ($arrItems as $item) {

      $itemId         = $item['id'];
      $itemName       = $item['old_url'];
      $itemStatus     = $item['status'];
     
      $itemLabel      = ($itemName) ? Helper::getFullUrl($itemName) : 'Untitled-'.$itemId;

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
           class ="checkall" value="'.$itemId.'"><span></span>
        </label>';
    
      if ($itemStatus == FLAG_ACTIVE) {
  
        $itemStatus = '<span class="label label-success">Published</span>';
  
      } elseif ($itemStatus == FLAG_HIDDEN) {
  
        $itemStatus = '<span class="label label-warning">Hidden</span>';
  
      } else {
  
        $itemStatus = '<span class="label label-danger">Deleted</span>';
  
      }
  
      $rowitems .= '<tr>
        <td width="20">'.$itemSelect.'</td>
        <td>
          <a href="'.ADMIN_BASE_URL.'/?do='.$do.'&action=edit&id='.$itemId.'">'.$itemLabel.'</a>
        </td>
        <td width="100">'.$itemStatus.'</td>
        </tr>';
    }

  } else {

    $moduleLabel = strtolower(str_replace(' | Trash','',(string) $moduleMainHeading));

    $rowitems .= '<tr>
      <td colspan="4" align="center" class="no-data">No '.$moduleLabel.' available.</td>
    </tr>';

  }

  return $rowitems;
}
?>