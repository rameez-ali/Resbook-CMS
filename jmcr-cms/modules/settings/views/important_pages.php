<?php
/** important pages tab content */

ini_set('memory_limit', '256M');

$listImportantPages = '';
$step = 0;

/** Define function to generate page list */

function generateImpPageList($parentId=0, $selectedPageId='')
{
	global $step;
	
  $sql = "SELECT gp.`id`, 
      pmd.`name`, 
      gp.`parent_id`
	  FROM `general_pages` gp
    LEFT JOIN `page_meta_data` pmd
     	ON(gp.`page_meta_data_id` = pmd.`id`)
    WHERE pmd.`status` != '".FLAG_DELETED."'
     AND gp.`parent_id`".((empty($parentId)) ? " IS NULL" : " = '{$parentId}'")."
    ORDER BY pmd.`rank`";
   
	$pages  = fetchAll($sql);
	
	$impPageList = '';
	$hellip      = '';
	$step++;

	if((is_countable($pages) ? count($pages) : 0) > 0)
	{

    for ($i=1; $i < $step; $i++) { 
      
      $hellip .= '&hellip;&hellip;'; 
    
    }
		
		foreach ($pages as $page)
		{
			$pageId = $page['id'];
      
      $label = $hellip.($page['name'] ?: 'Untitled '.$pageId);
      $optAttr = [];
			$optAttr['value']  =  $pageId;

			if($pageId == $selectedPageId) {
        
        $optAttr['selected'] = 'selected';
      
      }

      $impPageList .= createElement($optAttr, 'option', $label)."\n";
      $impPageList .= generateImpPageList($pageId, $selectedPageId);
		}
	}
	
	$step--;

	return $impPageList;
}

/** Generate Important fields */

$impPagesQuery = "SELECT `imppage_id`,
    `imppage_name`,
    `page_id`
  FROM `general_importantpages`
  WHERE `imppage_name` != ''
  AND `imppage_showincms` = '".FLAG_YES."'";

$arrImpPages = fetchAll($impPagesQuery);

foreach ($arrImpPages as $arrImpPage) {

  $impPageName   = ucwords((string) $arrImpPage['imppage_name']);
  $selImpPageId  = $arrImpPage['page_id'];
  $impPageId     = $arrImpPage['imppage_id'];

  $pagelabel = strtolower($impPageName );
  $parentId = null; 
  
  $importantPagesOptions = generateImpPageList($parentId , $selImpPageId);
  
  $listImportantPages .= '<tr>
      <td>
        '.$impPageName.'
      </td>
      <td>
        <select name="imp_page_id['.$impPageId.']" style="width: 250px;">
          <option value="">--Select '.$pagelabel.' page--</option>
          '.$importantPagesOptions.'
        </select>
      </td>
    </tr>';
}

$tabImportantPagesContent = '<table width="100%" border="0" 
   cellspacing="0" cellpadding="4">
      '.$listImportantPages.'
  </table>';
?>