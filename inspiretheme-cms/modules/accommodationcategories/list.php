<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType, $moduleMainHeading, $moduleSubHeading;

  $sqlExtra = ($listType == FLAG_DELETED) ? "pmd.`status` = '".FLAG_DELETED."'" : "pmd.`status` != '".FLAG_DELETED."'";

  $sql = "SELECT ac.`id`, 
      ac.`page_meta_data_id`,
      ac.`is_featured`,
      pmd.`name`, 
      pmd.`status`, 
      pmd.`rank`,
      DATE_FORMAT(pmd.`date_created`, '%d %b %Y %h:%i %p') AS created_date, 
      DATE_FORMAT(pmd.`date_updated`, '%d %b %Y %h:%i %p') AS updated_date,
      DATE_FORMAT(pmd.`date_deleted`, '%d %M %Y %h:%i %p') AS deleted_date
    FROM `accommodation_category` AS ac
    LEFT JOIN `page_meta_data` AS pmd
      ON(ac.`page_meta_data_id` = pmd.`id`)
    WHERE {$sqlExtra}
    ORDER BY pmd.`status`, pmd.`rank`";
 
  $arrItems = DB::fetchAll($sql);
 
  if(!empty($arrItems)) {
    
    foreach ($arrItems as $rowItem) {

      $rowItemId          = $rowItem['id'];
      $rowItemMetaDataId  = $rowItem['page_meta_data_id'];
      $rowItemLabel       = $rowItem['name'];
      $rowItemStatus      = $rowItem['status'];
      $rowItemDateUpdated = $rowItem['updated_date'];
      $rowItemDateDeleted = $rowItem['deleted_date'];
      $rowItemRank        = $rowItem['rank'];
      $rowItemIsFeatured  = $rowItem['is_featured'];
  
      $rowItemLabel = ($rowItemLabel) ? $rowItemLabel : 'Untitled-'.$rowItemId ;

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
           class ="checkall" value="'.$rowItemMetaDataId.'"><span></span>
        </label>';
    
      if ($rowItemStatus == FLAG_ACTIVE) {
  
        $rowItemStatus = '<span class="label label-success">Published</span>';
  
      } elseif ($rowItemStatus == FLAG_HIDDEN) {
  
        $rowItemStatus = '<span class="label label-warning">Hidden</span>';
  
      } else {
  
        $rowItemStatus = '<span class="label label-danger">Deleted</span>';
  
      }

      $itemDate = ($listType == FLAG_DELETED) ? $rowItemDateDeleted : $rowItemDateUpdated;

      $rowItemIsFeatured = ($rowItemIsFeatured === FLAG_YES) 
      ? '<span class="label label-primary">Yes</span>' 
      : '<span class="label label-default">No</span>';

      $itemRankElm = '';
    
      if ($listType != FLAG_DELETED) {

          $itemRankElm = '<input type="text" name="item_rank['.$rowItemMetaDataId.']" value="'.$rowItemRank.'" 
            title="Rank for '.$rowItemLabel.'"
            class="input--rank">';

      }

      $tableRows .= '<td width="20" align="center">'.$itemSelect.'</td>
        <td>
          '.$itemRankElm.'
          <a href="'.ADMIN_BASE_URL.'/?do='.$do
            .'&action=edit&id='.$rowItemId.'" 
            title="Edit the '.$rowItemLabel.' page">'.$rowItemLabel.'</a>
        </td>        
        <td width="200">'.$itemDate.'</td>
       <!-- <td width="100">'.$rowItemIsFeatured.'</td>  -->
        <td width="100">'.$rowItemStatus.'</td>
      </tr>';
    }

  } else {

    $moduleLabel = strtolower(str_replace(' | Trash','',$moduleMainHeading));

    $tableRows .= '<tr>
      <td colspan="4" align="center"class="no-data">No '.$moduleLabel.' available.</td>
    </tr>';

  }

  return $tableRows;
}
?>