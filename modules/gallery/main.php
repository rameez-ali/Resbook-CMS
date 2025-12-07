<?php

require_once __DIR__.DS.'config.php';

$pageGalleryView = '';

if ($mainPageId == $impPageGallery->id) {
    
	require_once __DIR__ . '/views/list/view.php';

} else {

	require_once __DIR__ . '/views/single/view.php';

}

$templateTags['gallery_filter_view'] .= $pageGalleryView;

?>