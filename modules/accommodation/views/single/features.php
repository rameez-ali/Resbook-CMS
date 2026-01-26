<?php


$templateTags['page_features_view'] = '';

if (!empty($accommodationFeatures)) {

  // Extract <li> items from $accommodationFeatures and split into 3 columns.
  $items = [];
  if (is_string($accommodationFeatures)) {
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML('<?xml encoding="utf-8" ?>' . $accommodationFeatures);
    foreach ($doc->getElementsByTagName('li') as $li) {
      $items[] = trim($doc->saveHTML($li));
    }
    libxml_clear_errors();
  }

  // Fallback: if no <li> found, render original HTML.
  if (empty($items)) {
    $columnsHtml = '<div class="amenities-grid"><div class="amenities-col"><ul class="amenities-list">'.$accommodationFeatures.'</ul></div></div>';
  } else {
    $cols = 3;
    $perCol = (int) ceil(count($items) / $cols);
    $columnsHtml = '';
    for ($c = 0; $c < $cols; $c++) {
      $slice = array_slice($items, $c * $perCol, $perCol);
      if (!$slice) { continue; }
      $columnsHtml .= '<div class="amenities-col"><ul class="amenities-list">'.implode('', $slice).'</ul></div>';
    }
    $columnsHtml = '<div class="amenities-grid" aria-labelledby="amenities-heading">'.$columnsHtml.'</div>';
  }

  $templateTags['page_features_view'] = '
    <section class="section page-amenities">
      <div class="container">
        <h2 id="amenities-heading" class="amenities-heading">Key Facts &amp; Amenities</h2>
        '.$columnsHtml.'
      </div>
    </section>
  ';
}