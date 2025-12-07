<?php

if (!empty($arrGalleries)) {

  foreach ($arrGalleries AS $gallery) {

    $galleryName     = $gallery['menu_label'];
    $galleryFilterId = $gallery['hex_id'];

    $galleryFilters .= '<a class="filters__btn"
          href="#" data-category="Photo Gallery"
          data-action="Filter Link" data-name="'.$galleryName.'"
          data-group="'.$galleryFilterId.'">'.$galleryName.'</a>';

  }

  if (!empty($galleryFilters)) {

    $galleryFilters = '
    <div class="row">
      <div class="col-12" id="filters__wrapper">
        <span class="filter__show-btn">All Galleries<i class="fa fa-angle-down"></i></span>
        <div class="filters" id="gallery-filters">
          <a class="filters__btn filters__btn--active" href="#" 
          data-category="Photo Gallery" data-action="Filter Link" data-name="All Galleries" data-group="all">All</a>
          '.$galleryFilters.'
        </div>
      </div>
    </div>';

  } 

}