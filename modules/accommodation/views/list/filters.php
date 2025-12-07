<?php
$allDefault = '';
$sqlCategory = "SELECT DISTINCT ahc.`accommodation_category_id`, MD5(ahc.`accommodation_category_id`) AS `hex_id`, 
ac.`page_meta_data_id`, pmd.`menu_label`, pmd.`url`, pmd.`rank`
FROM `accommodation_has_category` ahc 
LEFT JOIN `accommodation_category` ac ON (ac.`id` = ahc.`accommodation_category_id`)
LEFT JOIN `page_meta_data` pmd ON (ac.`page_meta_data_id` = pmd.`id`) 
WHERE pmd.`status` = '".FLAG_ACTIVE."' ORDER BY pmd.`rank` ASC";

$allCategories = DB::fetchAll($sqlCategory);

if (!empty($allCategories)) {

  foreach ($allCategories AS $cat) {

    $catName     = $cat['menu_label'];
    $catFilterId = $cat['hex_id'];
    $catUrl      = $cat['url'];

    $catFilters .= '<a class="filters__btn"
          href="'.$catUrl.'" data-category="Accommodation"
          data-action="Filter Link" data-name="'.$catName.'"
          data-group="'.$catFilterId.'">'.$catName.'</a>';

  }
  if(!empty($accallaccomfiltertext)) {
    $allDefault = $accallaccomfiltertext;
  } else {
    $allDefault = 'All Rooms';
  }
  if (!empty($catFilters)) {

    $catFilters = '
    <div class="row">
      <div class="col-12" id="filters__wrapper">
        <span class="filter__show-btn">'.$allDefault.'<i class="fa fa-angle-down"></i></span>
        <div class="filters" id="gallery-filters">
          <a class="filters__btn filters__btn--active" href="#" 
          data-category="Accommodation" data-action="Filter Link" data-name="All Rooms" data-group="all">'.$allDefault.'</a>
          '.$catFilters.'
        </div>
      </div>
    </div>';

  } 

}