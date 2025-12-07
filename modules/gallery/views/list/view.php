<?php

$galleryFilters   = '';
$galleryPhotos    = '';

$sqlGalleries = "SELECT `id`,
    MD5(`id`) AS `hex_id`,
    `name`,
    `menu_label`
  FROM `gallery`
  WHERE `menu_label` != ''
  AND `show_on_gallery_page` = '".FLAG_YES."'
  AND (SELECT COUNT(*)
    FROM `gallery_photo`
    WHERE `gallery_id` = `gallery`.`id`) > 0
  ORDER BY `rank` ASC";

$arrGalleries = DB::fetchAll($sqlGalleries);

/** GENERATE VIEW FOR FILTERS */

require_once __DIR__ . '/filters.php';

/** GENERATE VIEW FOR GALLERY PHOTOS */

require_once __DIR__ . '/gallery.php';


if (!empty($galleryFilters) && !empty($galleryPhotos)) {
  
  /** Generate Gallery View */
  $pageGalleryView ='<section class="section section-gallery">
      <div class="container-fluid container-fluid--fw">
        '.$galleryFilters.'            
        <div class="row gallery-shuffle">
          '.$galleryPhotos.'
        </div>
      </div>
    </section>';
}

?>