<?php

if (!empty($pageGalleryId)) {

  $sqlGalleryPhotos = "SELECT gp.`id`,
		gp.`photo_path`,
		gp.`thumb_photo_path`,
		gp.`photo_width`,
		gp.`photo_height`,
		gp.`caption`,
		gp.`alt_text`,
		gp.`video_id`,
		gp.`rank`,
		g.`menu_label`
	FROM `gallery_photo` gp
	LEFT JOIN `gallery` g
		ON (g.`id` = gp.`gallery_id`)
	WHERE gp.`gallery_id` = '{$pageGalleryId}'
	ORDER BY gp.`rank`";

  $arrGalleryPhotos = DB::fetchAll($sqlGalleryPhotos);

  if (!empty($arrGalleryPhotos)) {

    $slidesHtml = '';

    foreach ($arrGalleryPhotos as $gp) {

      $full = Helper::getFullUrl($gp['photo_path']);
      $thumb = Helper::getFullUrl($gp['thumb_photo_path']);
      $cap = htmlspecialchars((string) ($gp['caption'] ?? ''), ENT_QUOTES, 'UTF-8');
      $alt = htmlspecialchars((string) ($gp['alt_text'] ?? ''), ENT_QUOTES, 'UTF-8');
      $video = $gp['video_id'];
      $href = empty($video) ? $full : "https://www.youtube.com/watch?v={$video}";

      $slidesHtml .= '
        <div class="gallery__slide">
          <a href="' . $href . '" class="gallery__link swipebox" title="' . $cap . '">
            <figure class="gallery__figure">
              <img class="gallery__img lazy" data-src="' . $full . '" src="' . $thumb . '" alt="' . $alt . '">
              ' . ($cap ? '<figcaption class="gallery__caption">' . $cap . '</figcaption>' : '') . '
            </figure>
          </a>
        </div>';
    }

    

  }

}

?>