<?php
/** Show all active reviews */

$sqlreviews ="SELECT `id`,
      `name`,
      `header`,
      `description`,
      `image_path`,
      `image_alt_txt`,
      `page_id`,
      `button_text`,
      `url`,
      `rank`
	FROM `showcase` s
	WHERE s.`status` = '".FLAG_ACTIVE."'
	ORDER BY `rank`";

$arrShowcase = DB::fetchAll($sqlreviews);

$pageShowcaseContent = '';

if ($arrShowcase) {		

	foreach ($arrShowcase as $showcase) {

		$showcaseName             = $showcase['name'];
		$showcaseHeader           = $showcase['header'];
    $showcaseDescription      = $showcase['description'];
		$showcaseImgSrc           = $showcase['image_path'];
		$showcaseImgAlt           = $showcase['image_alt_txt'];
		$showcaseBtnText          = (empty($showcase['button_text'])) ? 'Discover More' : $showcase['button_text'];
		$showcaseUrl              = $showcase['url'];
		$showcaseBtnPage          = $showcase['page_id'];

    if (!empty($showcaseBtnPage)) {
      $sql= 'SELECT pmd.full_url FROM page_meta_data pmd, general_pages gp where gp.page_meta_data_id = pmd.id and pmd.status = "A" and gp.id = "'.$showcaseBtnPage.'"';
      $showcaseBtnPage = fetchValue($sql);
    }

    $showcaseDestUrl          = (empty($showcaseUrl)) ?  $showcaseBtnPage : $showcaseUrl;

    $btnView = '';

    if (!empty($showcaseDestUrl)) {
      $btnView = '<a href="'.$showcaseDestUrl.'" class="btn btn--ghost-white mt-3">
        '.$showcaseBtnText.'
      </a>';
    }
		
		$pageShowcaseContent .='<div class="showcase-item">
          <img src="'.$showcaseImgSrc.'" alt="'.$showcaseImgAlt.'" class="showcase-image">
          <div class="showcase-box container container--fw text-center">
            <h6 class="showcase-name">
              '.$showcaseName.'
            </h6>
            <h2 class="showcase-header">
              '.$showcaseHeader.'
            </h2>
            <p class="showcase-desc">
              '.$showcaseDescription.'
            </p>
            '.$btnView.'
          </div>
			</div>';
	}
	
	$pageShowcaseContent = '<section class="section showcase-section px-0">
		'.$pageShowcaseContent.'
  </section>';
    
  $templateTags['mod_view'] .= $pageShowcaseContent;

}

?>