<?php
/** Generate item table list */

function generateTable($activePages, $parentPageId = null)
{
  global $do, $listType, $generation, $moduleMainHeading, $moduleSubHeading;

  $exParentId = ((empty($parentPageId)) ? " IS NULL" : " = '{$parentPageId}'");
  $sqlExtra  = ($listType == FLAG_DELETED) ? "pmd.`status` = '".FLAG_DELETED."'" : "pmd.`status` != '".FLAG_DELETED."'";
  $sqlExtra .= ($listType != FLAG_DELETED) ? " AND gp.`parent_id`".$exParentId : '';

  $sql = "SELECT
      gp.`id`,
      pmd.`id` AS meta_data_id,
      pmd.`name`,
      pmd.`status`,
      pmd.`title`,
      pmd.`url`,
      pmd.`rank`,
      pmd.`is_locked`,
      DATE_FORMAT(pmd.`date_created`, '%d %b %Y %h:%i %p') AS created_date, 
      DATE_FORMAT(pmd.`date_updated`, '%d %b %Y %h:%i %p') AS updated_date,
      DATE_FORMAT(pmd.`date_deleted`, '%d %M %Y %h:%i %p') AS deleted_date,
      pmd.`updated_by`,
      gp.`parent_id`
    FROM `general_pages` gp
    LEFT JOIN `page_meta_data` pmd 
      ON (gp.`page_meta_data_id` = pmd.`id`)
    WHERE {$sqlExtra}
      
    ORDER BY pmd.`status`, pmd.`rank`";
 
  $result     = runQuery($sql);
  $countPages = mysqli_num_rows($result);
 
  $generation++;
  $indentation = 2;
  
  for ($i=1; $i<$generation; $i++) { 
    
    $indentation += 48; 
  
  }

  $arrImportantPages = [];
  
  $csvImportantPages = fetchValue("SELECT GROUP_CONCAT(DISTINCT `page_id`) 
    FROM `general_importantpages` 
    WHERE `page_id` != '0'");

  if ($csvImportantPages) {
    
    $arrImportantPages = explode(',', (string) $csvImportantPages);
  
  }
 
  while ($rowItem = mysqli_fetch_assoc($result)) {

    $rowItemId          = $rowItem['id'];
    $rowItemMetaDataId  = $rowItem['meta_data_id'];
    $rowItemLabel       = $rowItem['name'];
    $rowItemTitle       = $rowItem['title'];
    $rowItemStatus      = $rowItem['status'];
    $rowItemDateUpdated = $rowItem['updated_date'];
    $rowItemDateDeleted = $rowItem['deleted_date'];
    $rowItemRank        = $rowItem['rank'];
    $rowItemIsLocked    = $rowItem['is_locked'];

    $rowItemLabel = $rowItemLabel ?: 'Untitled-'.$rowItemId ;

    $itemSelect = '<label class="custom-check">
        <input type="checkbox" name="item_select[]"
          class ="checkall" value="'.$rowItemMetaDataId.'"><span></span>
      </label>';

    if ($rowItemIsLocked || in_array($rowItemId, $arrImportantPages)) {

      $itemSelect = '<i class="glyphicon glyphicon-lock row-locked"
        title="This page is always locked and can not be hidden "></i>';
    
    }
  
    if ($rowItemStatus == FLAG_ACTIVE) {

      $rowItemStatus = '<span class="label label-success">Published</span>';

    } elseif ($rowItemStatus == FLAG_HIDDEN) {

      $rowItemStatus = '<span class="label label-warning">Hidden</span>';

    } else {

      $rowItemStatus = '<span class="label label-danger">Deleted</span>';

    }

    $itemDate = ($listType == FLAG_DELETED) ? $rowItemDateDeleted : $rowItemDateUpdated;

    $itemRankElm = '';
  
    if ($listType != FLAG_DELETED) {

        $itemRankElm = '<input type="text" name="item_rank['.$rowItemMetaDataId.']" value="'.$rowItemRank.'" 
          title="Rank for '.$rowItemLabel.'"
          style="margin-left:'.$indentation.'px;"
          class="input--rank">';

    }

    $activePages .= '<td width="20" align="center">'.$itemSelect.'</td>
      <td>
        '.$itemRankElm.'
        <a href="'.ADMIN_BASE_URL.'/?do='.$do.'&action=edit&id='.$rowItemId.'" 
          title="Edit the '.$rowItemLabel.' page">'.$rowItemLabel.'</a>
      </td>        
      <td width="200">'.$itemDate.'</td>
      <td width="100">'.$rowItemStatus.'</td>
    </tr>';

    /** 
     * Get all of the children of this page. 
     * put the $disabled parameter to make sure that 
     * this page can not be selected, 
     * then all of its childeren should not be able to be selected.
     * Only for active page list.
     */

    if ($listType != FLAG_DELETED) {
      
      $activePages = generateTable($activePages, $rowItemId);
    
    }
    /** 
     * Reset the disabled variable to 'enabled' (effectively) 
     * so that all of the siblings of this page CAN be selected
     */
    $disabled = '';

  }
  
  $generation--;

  return $activePages;
}
?>