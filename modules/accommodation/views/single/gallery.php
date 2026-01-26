<?php

$accommodationGalleryView = '';

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
        <div class="accommodation-gallery__slide">
          <a href="' . $href . '" class="accommodation-gallery__link swipebox" title="' . $cap . '">
            <figure class="accommodation-gallery__figure">
              <img class="accommodation-gallery__img lazy" data-src="' . $full . '" src="' . $thumb . '" alt="' . $alt . '">
              ' . ($cap ? '<figcaption class="accommodation-gallery__caption">' . $cap . '</figcaption>' : '') . '
            </figure>
          </a>
        </div>';
    }

    $accommodationGalleryView = '
        <section class="section accommodation-gallery-section">
          <div class="container container--fw">
            <div class="accommodation-gallery" aria-label="Gallery Images">
              
              <button type="button"
                class="accommodation-gallery__arrow accommodation-gallery__arrow--prev"
                aria-label="Previous slide">❮</button>

              <button type="button"
                class="accommodation-gallery__arrow accommodation-gallery__arrow--next"
                aria-label="Next slide">❯</button>

              <div class="accommodation-gallery__viewport">
                <div class="accommodation-gallery__track">
                  ' . $slidesHtml . '
                </div>
              </div>

            </div>
          </div>
        </section>

        <script>
        (function(){
          const gallery = document.querySelector(".accommodation-gallery");
          if (!gallery) return;

          const track = gallery.querySelector(".accommodation-gallery__track");
          const slides = gallery.querySelectorAll(".accommodation-gallery__slide");
          const prev = gallery.querySelector(".accommodation-gallery__arrow--prev");
          const next = gallery.querySelector(".accommodation-gallery__arrow--next");

          let index = 0;
          let slidesPerView = window.innerWidth <= 991 ? 1 : 2;

          function update() {
            slidesPerView = window.innerWidth <= 991 ? 1 : 2;
            track.style.transform = "translateX(-" + (index * (100 / slidesPerView)) + "%)";
          }

          next.addEventListener("click", function(){
            if (index < slides.length - slidesPerView) {
              index++;
              update();
            }
          });

          prev.addEventListener("click", function(){
            if (index > 0) {
              index--;
              update();
            }
          });

          window.addEventListener("resize", update);
        })();
        </script>
        ';

  }

}

?>