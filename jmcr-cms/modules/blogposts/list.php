<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType, $moduleMainHeading, $moduleSubHeading;
  $tableRows      = (empty($tableRows)) ? '' : $tableRows;
  $sqlExtra = ($listType == FLAG_DELETED) ? "pmd.`status` = '".FLAG_DELETED."'" : "pmd.`status` != '".FLAG_DELETED."'";

  $sql = "SELECT bp.`id`, 
      bp.`page_meta_data_id`,
      bp.`is_featured`,
      pmd.`heading`,
      pmd.`status`,
      DATE_FORMAT(pmd.`date_updated`, '%d %b %Y %h:%i %p') AS updated_date,
      DATE_FORMAT(pmd.`date_deleted`, '%d %M %Y %h:%i %p') AS deleted_date,
      IF(bp.`date_posted`, DATE_FORMAT(bp.`date_posted`, '%d %b %Y'), '' ) AS `posted_date`
    FROM 
      `blog_post` AS `bp`
    LEFT JOIN `page_meta_data` pmd
      ON(bp.`page_meta_data_id` = pmd.`id`)
    WHERE {$sqlExtra}
    ORDER BY pmd.`status`, bp.`date_posted` DESC";
        
  $arrItems = DB::fetchAll($sql);
 
  if(!empty($arrItems)) {
    
    foreach ($arrItems as $rowItem) {

      $rowItemId          = $rowItem['id'];
      $rowItemMetaDataId  = $rowItem['page_meta_data_id'];
      $rowItemLabel       = $rowItem['heading'];
      $rowItemStatus      = $rowItem['status'];
      $rowItemDatePosted  = $rowItem['posted_date'];
      $rowItemDateUpdated = $rowItem['updated_date'];
      $rowItemDateDeleted = $rowItem['deleted_date'];
      $rowItemIsFeatured  = $rowItem['is_featured'];
  
      $rowItemLabel = $rowItemLabel ?: 'Untitled' ;

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

      $rowItemIsFeatured = ($rowItemIsFeatured === FLAG_YES) 
        ? '<span class="label label-primary">Yes</span>' 
        : '<span class="label label-default">No</span>';

      $itemDate = ($listType == FLAG_DELETED) ? $rowItemDateDeleted : $rowItemDateUpdated;

      $rowItemDatePosted = (empty($rowItemDatePosted)) ? '-' : $rowItemDatePosted;

      $tableRows .= '<td width="20" align="center">'.$itemSelect.'</td>
        <td>
          <a href="'.ADMIN_BASE_URL.'/?do='.$do
            .'&action=edit&id='.$rowItemId.'" 
            title="Edit the '.$rowItemLabel.' page">'.$rowItemLabel.'</a>
        </td>
        <td width="100">'.$rowItemIsFeatured.'</td>        
        <td width="100">'.$rowItemDatePosted.'</td>
        <td width="150">'.$itemDate.'</td>
        <td width="100">'.$rowItemStatus.'</td>
      </tr>';
    }

  } else {

    $moduleLabel = strtolower(str_replace(' | Trash','',(string) $moduleMainHeading));

    $tableRows .= '<tr>
      <td colspan="6" align="center"class="no-data">No '.$moduleLabel.' available.</td>
    </tr>';

  }

  return $tableRows;
}
?>