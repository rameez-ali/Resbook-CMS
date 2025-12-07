<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType, $moduleMainHeading, $moduleSubHeading;
  $rowitems = (empty($rowitems)) ? '' : $rowitems;
  $sqlExtra = ($listType == FLAG_DELETED) ? "`status` = '".FLAG_DELETED."'" : "`status` != '".FLAG_DELETED."'";

  $sql = "SELECT `id`,
      `name`,
      `status`,
      `rank`
    FROM `social_media_account`
    WHERE {$sqlExtra}
    ORDER BY `status`, `rank`";
 
 $arrItems = DB::fetchAll($sql);

  if(!empty($arrItems)) {
    
    foreach ($arrItems as $item) {

      $itemId         = $item['id'];
      $itemName       = $item['name'];
      $itemStatus     = $item['status'];
      $itemRank       = $item['rank'];
  
      $itemLabel = $itemName ?: 'Untitled';

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

      $itemRankElm = '';

      if ($listType != FLAG_DELETED) {

        $itemRankElm = '<input type="text" name="item_rank['.$itemId.']" value="'.$itemRank.'" 
          title="Rank for '.$itemLabel.'"
          class="input--rank">';

      }
  
      $rowitems .= '<tr>
        <td width="20">'.$itemSelect.'</td>
        <td>
          '.$itemRankElm.'
          <a href="'.ADMIN_BASE_URL.'/?do='.$do.'&action=edit&id='.$itemId.'">'.$itemLabel.'</a>
        </td>
        <td width="100">'.$itemStatus.'</td>
        </tr>';
    }

  } else {

    $moduleLabel = strtolower(str_replace(' | Trash','',(string) $moduleMainHeading));

    $rowitems .= '<tr>
      <td colspan="3" align="center" class="no-data">No '.$moduleLabel.' available.</td>
    </tr>';

  }

  return $rowitems;
}
?>