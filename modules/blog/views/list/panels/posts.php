<?php

$sidebarItemsView = '';

$arrPostsList = DB::fetchAll("SELECT pmd.`heading`, 
		pmd.`url`,
		pmd.`full_url` AS fullURL, 
		pmd.`title`
	FROM `blog_post` bp
	LEFT JOIN `page_meta_data` pmd
		ON(pmd.`id` = bp.`page_meta_data_id`)
	WHERE pmd.`status` = '".FLAG_ACTIVE."'
		AND bp.`date_posted` is not null
	ORDER BY bp.`date_posted` DESC
	LIMIT 10");


if (!empty($arrPostsList)) {

	foreach ($arrPostsList as $postItem) {

    $itemLabel   = $postItem['heading'];
    $itemTitle   = $postItem['title'];
    $itemFullURL = Helper::getFullUrl($blogPageFullURL.'/post/'.$postItem['url']);

		
    $sidebarItemsView .= '<li class="sidebar__content-item">
		<a href="'.$itemFullURL.'" class="sidebar__content-link" data-category="Blog"
		  data-action="Title Link" data-name="'.$itemLabel.'">'.$itemLabel.'</a>
      </li>';
	}

	$sidebarItemsView = '<div class="sidebar">
			<h2 class="sidebar__heading">Recent Posts</h2>
			<ul class="sidebar__content">
				'.$sidebarItemsView.'
			</ul>
		</div>';

	/** remove side panel as per inspire theme core 2 design */
	
	//$blogSidebarPanelView .= $sidebarItemsView;	
}


?>