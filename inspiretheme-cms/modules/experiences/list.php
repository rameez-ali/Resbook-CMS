<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType, $moduleMainHeading, $moduleSubHeading;
  $tableRows      = (empty($tableRows)) ? '' : $tableRows;

  $sqlExtra = ($listType == FLAG_DELETED) ? "pmd.`status` = '".FLAG_DELETED."'" : "pmd.`status` != '".FLAG_DELETED."'";

  $sql = "SELECT e.`id`, 
      e.`is_featured`,
      e.`page_meta_data_id`,
      pmd.`name`, 
      pmd.`status`, 
      pmd.`rank`,
      DATE_FORMAT(pmd.`date_created`, '%d %b %Y %h:%i %p') AS created_date, 
      DATE_FORMAT(pmd.`date_updated`, '%d %b %Y %h:%i %p') AS updated_date,
      DATE_FORMAT(pmd.`date_deleted`, '%d %M %Y %h:%i %p') AS deleted_date
    FROM `experience` AS e
    LEFT JOIN `page_meta_data` AS pmd
      ON(e.`page_meta_data_id` = pmd.`id`)
    WHERE {$sqlExtra}
    ORDER BY pmd.`status`, pmd.`rank`";
 
  $arrItems = DB::fetchAll($sql);
 
  if(!empty($arrItems)) {
    
    foreach ($arrItems as $item) {

      $itemId          = $item['id'];
      $itemMetaDataId  = $item['page_meta_data_id'];
      $itemLabel       = $item['name'];
      $itemStatus      = $item['status'];
      $itemDateUpdated = $item['updated_date'];
      $itemDateDeleted = $item['deleted_date'];
      $itemRank        = $item['rank'];
      $itemIsFeatured  = $item['is_featured'];
  
      $itemLabel = $itemLabel ?: 'Untitled-'.$itemId ;

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
           class ="checkall" value="'.$itemMetaDataId.'"><span></span>
        </label>';
    
      if ($itemStatus == FLAG_ACTIVE) {
  
        $itemStatus = '<span class="label label-success">Published</span>';
  
      } elseif ($itemStatus == FLAG_HIDDEN) {
  
        $itemStatus = '<span class="label label-warning">Hidden</span>';
  
      } else {
  
        $itemStatus = '<span class="label label-danger">Deleted</span>';
  
      }

      $itemDate = ($listType == FLAG_DELETED) ? $itemDateDeleted : $itemDateUpdated;

      $itemIsFeatured = ($itemIsFeatured === FLAG_YES) 
        ? '<span class="label label-primary">Yes</span>' 
        : '<span class="label label-default">No</span>';

      $itemRankElm = '';
    
      if ($listType != FLAG_DELETED) {

          $itemRankElm = '<input type="text" name="item_rank['.$itemMetaDataId.']" value="'.$itemRank.'" 
            title="Rank for '.$itemLabel.'"
            class="input--rank">';

      }

      $tableRows .= '<td width="20" align="center">'.$itemSelect.'</td>
        <td>
          '.$itemRankElm.'
          <a href="'.ADMIN_BASE_URL.'/?do='.$do
            .'&action=edit&id='.$itemId.'" 
            title="Edit the '.$itemLabel.' page">'.$itemLabel.'</a>
        </td>        
        <td width="100">'.$itemIsFeatured.'</td>   
        <td width="200">'.$itemDate.'</td>
        <td width="100">'.$itemStatus.'</td>
      </tr>';
    }

  } else {

    $moduleLabel = strtolower(str_replace(' | Trash','',(string) $moduleMainHeading));

    $tableRows .= '<tr>
      <td colspan="5" align="center"class="no-data">No '.$moduleLabel.' available.</td>
    </tr>';

  }

  return $tableRows;
}
?>