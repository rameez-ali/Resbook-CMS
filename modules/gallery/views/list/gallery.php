<?php

if (!empty($arrGalleries)) {

  foreach ($arrGalleries as $gallery) {
    
    $galleryId       = $gallery['id'];
    $galleryHashedId = $gallery['hex_id'];
    $galleryLabel    = $gallery['menu_label'];

    /** Get all gallery Photos */

    $sqlGalleryPhotos = "SELECT `id`,
        `photo_path`,
        `thumb_photo_path`,
        `photo_width`,
        `photo_height`,
        `caption`,
        `alt_text`,
        `video_id`,
        `rank`
      FROM `gallery_photo`
      WHERE `gallery_id` = '{$galleryId}'
      ORDER BY `rank`";
    
    $arrGalleryPhotos = DB::fetchAll($sqlGalleryPhotos);
    
    if(!empty($arrGalleryPhotos)){
      
      foreach($arrGalleryPhotos as $photo) {

        /** list gallery photos */

        $photoFullPath  = Helper::getFullUrl($photo['photo_path']);
        $photoThumbPath = Helper::getFullUrl($photo['thumb_photo_path']);
        $photoCaption   = $photo['caption'];
        $photoAltText   = $photo['alt_text'];
        $photoVideoId   = $photo['video_id'];
		
        $lightBoxContentUrl = (empty($photoVideoId)) 
                            ? $photoFullPath 
                            : "https://www.youtube.com/watch?v={$photoVideoId}";
        
        $photoGroupKeys = 'all,'.$galleryHashedId;
    
        $galleryPhotos .= '<a href="'.$lightBoxContentUrl.'" class=" col-4 col-xl-3 gallery-item swipebox" 
            data-groups="'.$photoGroupKeys.'" data-swipe-rel="'.$galleryHashedId.'" title="'.$photoCaption.'" 
            data-category="Photo Gallery" data-action="Image Link" data-name="'.$galleryLabel.'">
             <figure class="gallery-item__figure">           
              <img data-src="'.$photoThumbPath.'" alt="'.$photoAltText.'" class="gallery-item__image lazy">
              </figure>
            </a>
          ';
      }
    }
  }
}