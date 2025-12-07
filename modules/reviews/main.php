<?php

require_once __DIR__.DS.'config.php';
require_once __DIR__.DS.'views/partials/content.php';

$pageReviewsContent = '';

if ($mainPageId == $impPageReviews->id) {
    require_once __DIR__ . '/views/list/view.php';
} elseif ($rsCount > 1) {
    require_once __DIR__ . '/views/carousel/view.php';
} else {

  require_once __DIR__ . '/views/single/view.php';

}

?>