<?php

require_once __DIR__.DS.'config.php';



if ($arrHighlightsStyleId == 1) {
  /** default style */
  require_once __DIR__ . '/views/list/default.php';
} elseif ($arrHighlightsStyleId == 2) {
  /** Tile (Card) style */
  require_once __DIR__ . '/views/list/tile.php';
} else {
  /** Icon style */
  require_once __DIR__ . '/views/list/icon.php';
}

// Display the featured highlight
if ($featuredHighlight) {
  require_once __DIR__ . '/views/list/featured.php';   // Load the view for featured highlights
}
?>
