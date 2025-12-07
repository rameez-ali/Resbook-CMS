<?php

require_once __DIR__.DS.'config.php';
require_once __DIR__.DS.'views/partials/content.php';

$blogPageFullURL = $impPageBlog->full_url;

if ($mainPageId == $impPageBlog->id) {

	require_once __DIR__ . '/views/list/index.php';

} else {

	require_once __DIR__ . '/views/featured/view.php';

}


?>