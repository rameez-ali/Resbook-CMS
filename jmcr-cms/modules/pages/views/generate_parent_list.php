<?php

/** Generate Parent page list */

function generateParentList($list, 
    $parentPageId = null, 
    $disabled = "", 
    $sel = '')
{
  global $generation, $id, $selected;

  if (empty($parentPageId)) {
    
    $list .= '<option value="0" '.$selected.'>This is the parent</option>';
  
  }
  
  $exParentId = ((empty($parentPageId)) ? " IS NULL" : " = '{$parentPageId}'");

  $sql = "SELECT gp.`id`, 
      gp.`parent_id`, 
      pmd.`name`, 
      pmd.`title`, 
      pmd.`url`
    FROM `general_pages` gp
    LEFT JOIN `page_meta_data` pmd
      ON(gp.`page_meta_data_id` = pmd.`id`)
    WHERE pmd.`status` != '".FLAG_DELETED."'
      AND gp.`parent_id`".$exParentId."
    ORDER BY pmd.`rank`";
  
  $result = DB::runQuery($sql);

  $generation++;
  
  $indentation = '';

  for ($i=1; $i<$generation; $i++) { 
    
    $indentation .= '......'; 
  
  }

  while($row = mysqli_fetch_assoc($result)) {

    $resultPageId       = $row['id'];
    $resultPageParentId = $row['parent_id'];
    $resultPageUrl      = $row['url'];
    $resultPageTitle    = $row['title'];
    $resultPageLabel    = $row['name'];
    
    $resultPageLabel = $resultPageLabel ?: $resultPageTitle;

    /** 
     * Figure out whether or not to disable this page from being selected
     * if this page is the page that is currently being edited
     * if this page's parent is the page that is currently being edited
     */
    $disabled = ($generation > PAGE_GENERATIONS || $resultPageId == $id || $disabled != '') 
              ? 'disabled="disabled"'
              : '';

    /** Figured out whether or not to initially select this page on page-load */
    $selected  = ($sel == $resultPageId) ? 'selected = "selected"' : '';

    /** Add this page to the dropdown menu */
    $list .= '<option value="'.$resultPageId.'" '.$disabled.' '.$selected.'>';
    $list .= $indentation.$resultPageLabel;
    $list .= '</option>';
      
    /** 
     * Get all of the children of this page.
     * Put the $disabled parameter to make sure that if this page can not be 
     * selected, then all of its childeren should not be able to be selected.
     */

    $list = generateParentList($list,$resultPageId,$disabled, $sel);
    
    /** 
     * Reset the disabled variable to 'enabled' (effectively) 
     * so that all of the siblings of this page CAN be selected
     */
    $disabled = '';

  }

  $generation--;
  
  return $list;

}

$homePageUrls = ['/', 'home'];

if( !in_array($pageUrl, $homePageUrls) ) {

  $parentPageList  = '<select name="page_parentid" id="page_parentid" style="width:250px">';
  $parentPageList  = generateParentList($parentPageList, 0, '', $pageParentId);
  $parentPageList .= "</select>";

} else {

  $parentPageList = 'Sorry, this page can not be a child.';

}

$parentPageList = '<td width="130">
    <label for="page_parentid">Parent of this page</label>
  </td>
  <td>'.$parentPageList.'</td>';

?>