<?php

/** Identify module for Settings */
$modName = 'Highlight';

$highlightHeading = '';
$highlightUrl = '';
$highlightButtonText = '';
$arrHighlightsStyleId = '';
$isFeaturedHighlight = false;

$arrHighlightsContent     = HighlightHelper::fetchPageHighlightContent($pageQlModuleKey, $pageQlItemId);
$arrHighlights           = $arrHighlightsContent['highlights'];
$featuredHighlight       = $arrHighlightsContent['featured']; // Extract featured highlight details
$arrHighlightsStyleId     = $arrHighlightsContent['highlight_style_id'];


  if (!empty($arrHighlights)) {
    /** define vars for regular highlights */
    $highlightHeading         = $arrHighlightsContent['heading'];
    $highlightDescription     = $arrHighlightsContent['description'];
    $highlightSectionUrl      = $arrHighlightsContent['sectionurl'];
    $highlightSectionBtnTxt   = $arrHighlightsContent['buttontext'];

    $highlightUrl             = $arrHighlights[0]['url'] ?? null;
    $highlightButtonText      = $arrHighlights[0]['button_text'] ?? null;
  }

  // Variables specific for featured highlight
  $featuredHighlightUrl = $featuredHighlight['url'] ?? null;
  $featuredHighlightName = $featuredHighlight['name'] ?? null;
  $featuredHighlightDescription = $featuredHighlight['short_description'] ?? null;
  $featuredHighlightImage = $featuredHighlight['image_path'] ?? null;

?>
