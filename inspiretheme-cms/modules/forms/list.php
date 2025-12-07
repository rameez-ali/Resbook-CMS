<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType;

  $sqlExtra = ($listType == FLAG_DELETED) ? "`status` = '".FLAG_DELETED."'" : "`status` != '".FLAG_DELETED."'";
  $tableRows = (empty($tableRows)) ? '' : $tableRows;
  $sqlTableData = "SELECT `id`, `name`, `status`,
      IF(`date_created`, DATE_FORMAT(`date_created`, '%d %b %Y %h:%i %p'), '-') AS created_on,
      IF(`date_updated`, DATE_FORMAT(`date_updated`, '%d %b %Y %h:%i %p'), '-') AS updated_on
      FROM `form`
    WHERE {$sqlExtra}
    ORDER BY `status`";

  $arrTableData = DB::fetchAll($sqlTableData);

  if(!empty($arrTableData)) {
    
    foreach ($arrTableData as $rowItem) {

      $itemId          = $rowItem['id'];
      $itemLabel       = $rowItem['name'];
      $itemCreated     = $rowItem['created_on'];
      $itemUpdated     = $rowItem['updated_on'];
      $itemStatus      = $rowItem['status'];     
      //$itemRank        = $rowItem['rank'];    // do not have Rank in cms module. No need.

      $itemLabel = $itemLabel ?: 'Untitled-'.$itemId ;

      if ($itemStatus == FLAG_ACTIVE) {
  
        $itemStatus = '<span class="label label-success">Published</span>';
  
      } elseif ($itemStatus == FLAG_HIDDEN) {
  
        $itemStatus = '<span class="label label-warning">Hidden</span>';
  
      } else {
  
        $itemStatus = '<span class="label label-danger">Deleted</span>';
  
      }

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
          class ="checkall" value="'.$itemId.'"><span></span>
        </label>';

      $tableRows .= '<td width="20" align="center">'.$itemSelect.'</td>
          <td>
            <a href="'.ADMIN_BASE_URL.'/?do='.$do
            .'&action=edit&id='.$itemId.'" 
            title="Edit the '.$itemLabel.' page">'.$itemLabel.'</a>
          </td>
          <td width="200" align="left">'.$itemCreated.'</td>
          <td width="200" align="left">'.$itemUpdated.'</td>
          <td width="100" align="center">'.$itemStatus.'</td>
        </tr>';
    }
  
  } else {

    $tableRows .= '<tr>
      <td colspan="3" align="center" class="no-data">No forms available.</td>
    </tr>';

  }

  return $tableRows;

}

?>