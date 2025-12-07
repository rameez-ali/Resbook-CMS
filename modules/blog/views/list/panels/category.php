<?php

/** Get list of category which has active posts */
$sidebarItemsView = '';
$sqlCategoryListExtra = '';
$csvCategoryIds = DB::fetchValue("SELECT GROUP_CONCAT(DISTINCT(bphc.`category_id`))
		FROM `blog_post_has_category` bphc
		LEFT JOIN `blog_post` bp
			ON(bp.`id` = bphc.`post_id`)
	  LEFT JOIN `page_meta_data` pmd
	    ON(pmd.`id` = bp.`page_meta_data_id`)
	  WHERE pmd.`status` != '".FLAG_DELETED."'");
$arrCategoryIds = [];

$sqlCategoryListExtra .= ( $arrCategoryIds === [] ) ? '' : "AND bc.`id` IN(".implode($delimiter, $arrCategoryIds).")";

/** Get category data */
$sqlCategoryList = "SELECT pmd.`menu_label`, 
    pmd.`url`,
    pmd.`full_url` AS fullURL, 
    pmd.`title`
  FROM `blog_category` bc
  LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = bc.`page_meta_data_id`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
    AND pmd.`menu_label` != ''
    {$sqlCategoryListExtra}
  ORDER BY pmd.`rank`";

$arrCategoryList = DB::fetchAll($sqlCategoryList);

if (!empty($arrCategoryList)) {

	foreach ($arrCategoryList as $categoryItem) {
    
    $itemLabel   = $categoryItem['menu_label'];
    $itemFullURL = Helper::getFullUrl($blogPageFullURL.'/category/'.$categoryItem['url']);

		
    $sidebarItemsView .= '<li class="sidebar__content-item">
				<a href="'.$itemFullURL.'" class="sidebar__content-link" data-category="Blog"
				  data-action="Category Link" data-name="'.$itemLabel.'">'.$itemLabel.'</a>
      </li>';
	}

	$sidebarItemsView = '<div class="sidebar">
			<h2 class="sidebar__heading">Categories</h2>
			<ul class="sidebar__content">
				'.$sidebarItemsView.'
			</ul>
		</div>';

	$blogSidebarPanelView .= $sidebarItemsView;
}


?>
