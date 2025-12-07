<?php 
/** Get list of archive posts*/

$sidebarItemsView = '';

$arrPostDateRange = DB::fetchAll("SELECT 
		DISTINCT DATE_FORMAT(bp.`date_posted`, '%M %Y') AS mon, 
		YEAR(bp.`date_posted`) AS dateYear,
		LPAD(MONTH(bp.`date_posted`), 2, '0') AS dateMonth
	FROM `blog_post` bp 
	LEFT JOIN `page_meta_data` pmd
		ON(pmd.`id` = bp.`page_meta_data_id`)
	WHERE pmd.`status` = '".FLAG_ACTIVE."'
	ORDER BY dateYear DESC");

if (!empty($arrPostDateRange)) {
	
	foreach ($arrPostDateRange as $item) {

    $itemYear       = $item['dateYear'];
    $itemMonth      = $item['dateMonth'];
    $itemMonthLable = $item['mon'];

		$itemFullURL   = Helper::getFullUrl($blogPageFullURL.'/archive/'.$itemYear.'/'.$itemMonth);

    $sidebarItemsView .= '<li class="sidebar__content-item">
				<a href="'.$itemFullURL.'" class="sidebar__content-link"
				 data-category="Blog" data-action="Archive Link"
				 data-name="'.$itemMonthLable.'">'.$itemMonthLable.'</a>
      </li>';
	}

	$sidebarItemsView = '<div class="sidebar">
			<h2 class="sidebar__heading">Archives</h2>
			<ul class="sidebar__content">
				'.$sidebarItemsView.'
			</ul>
		</div>';

	/** remove side panel as per inspire theme core 2 design */
	
	//$blogSidebarPanelView .= $sidebarItemsView;
	
}

?>