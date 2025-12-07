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

    $arrGalleryItems = [];
		foreach ($arrGalleryPhotos AS $galleryPhoto) {
	
			$photoCls            = ' swipebox';			
			$photoFullUrl				 = Helper::getFullUrl($galleryPhoto['photo_path']);
			$photoThumbFullUrl	 = Helper::getFullUrl($galleryPhoto['thumb_photo_path']);	
			$photoCaption			   = $galleryPhoto['caption'];
			$photoAltText				 = $galleryPhoto['alt_text'];
			$photoVideoId 			 = $galleryPhoto['video_id'];
			$galleryLabel 			 = $galleryPhoto['menu_label'];
			
			$lightBoxContentUrl = (empty($photoVideoId)) 
				? $photoFullUrl 
				: "https://www.youtube.com/watch?v={$photoVideoId}";

			$arrGalleryItems[] = [
        'lightBoxContentUrl' => $lightBoxContentUrl,
        'photoCls' => $photoCls,
        'galleryLabel' => $galleryLabel,
        'photoThumbFullUrl' => $photoThumbFullUrl,
        'photoAltText' => $photoAltText,
        'caption' => $photoCaption,
      ];
        
    }
    
    $galleryItemsDisplay = $arrGalleryItems;
    $galleryItemsLast    = [];
    $pageGalleryView = '';

    if (count($arrGalleryItems) >= 4) {

      // Only select to view first 3 items
      $galleryItemsDisplay = array_slice($arrGalleryItems, 0, 3);

      // Select Last items in the array
      $galleryItemsLast    = array_slice($arrGalleryItems, 3);

      // Display the first 3 items
      
      foreach ($galleryItemsDisplay as $galleryKey => $galleryItem) {
        $lightBoxContentUrl = $galleryItem['lightBoxContentUrl'];
        $photoCls           = $galleryItem['photoCls'];
        $galleryLabel       = $galleryItem['galleryLabel'];
        $photoThumbFullUrl  = $galleryItem['photoThumbFullUrl'];
        $photoAltText       = $galleryItem['photoAltText'];
        $photoCaption       = $galleryItem['caption'];
        $pageGalleryOverlay = '';

        if ($galleryKey == 2) {
          
          $pageGalleryOverlay = '<span class="gallery-single__item-img-overlay"></span>
                    <span class="gallery-single__item-view-more">+ '.count($galleryItemsLast).'</span>';

        }

        $pageGalleryView .= '<a href="'.$lightBoxContentUrl.'" class="gallery-single__item '.$photoCls.' swipebox-'.$galleryKey.'" 
                      title="'.$photoCaption.'" data-category="Photo Gallery" data-action="Image Link" data-name="'.$galleryLabel.'">
                      <figure class="gallery-single__figure">
                        <img data-src="'.$photoThumbFullUrl.'" alt="'.$photoAltText.'" class="gallery-single__image lazy">
                      </figure>
                      '.$pageGalleryOverlay.'
                    </a>';

      }

      // Hidden Last Items
      foreach ($galleryItemsLast as $galleryItem) {
        $lightBoxContentUrl = $galleryItem['lightBoxContentUrl'];
        $photoCls           = $galleryItem['photoCls'];
        $galleryLabel       = $galleryItem['galleryLabel'];
        $photoThumbFullUrl  = $galleryItem['photoThumbFullUrl'];
        $photoAltText       = $galleryItem['photoAltText'];

        $pageGalleryView .= '<a href="'.$lightBoxContentUrl.'" class="gallery-single__item-hidden gallery-single__item '.$photoCls.' swipebox-'.$galleryKey++.'" 
                      title="'.$photoCaption.'" data-category="Photo Gallery" data-action="Image Link" data-name="'.$galleryLabel.'">
                      <figure class="gallery-single__figure">
                        <img data-src="'.$photoThumbFullUrl.'" alt="'.$photoAltText.'" class="gallery-single__image lazy">
                      </figure>
                    </a>';

      }

    } else {

      // Less than or equal to 3 galleries
      foreach ($arrGalleryItems as $galleryItem) {
        $lightBoxContentUrl = $galleryItem['lightBoxContentUrl'];
        $photoCls           = $galleryItem['photoCls'];
        $galleryLabel       = $galleryItem['galleryLabel'];
        $photoThumbFullUrl  = $galleryItem['photoThumbFullUrl'];
        $photoAltText       = $galleryItem['photoAltText'];

        $pageGalleryView .= '<a href="'.$lightBoxContentUrl.'" class="gallery-single__item '.$photoCls.'" 
                      title="'.$photoCaption.'" data-category="Photo Gallery" data-action="Image Link" data-name="'.$galleryLabel.'">
                      <figure class="gallery-single__figure">
                        <img data-src="'.$photoThumbFullUrl.'" alt="'.$photoAltText.'" class="gallery-single__image lazy">
                      </figure>
                    </a>';
      }

    }

    $galleryTemplateLayout = count($arrGalleryItems) >= 3 ? 'gallery-single__three-col' : 'gallery-single__two-col';
    $galleryTemplateLayout = count($arrGalleryItems) == 1 ? 'gallery-single__one-col' : $galleryTemplateLayout;

		$pageGalleryView = '<section class="section section-gallery-single">
                          <div class="container container--fw">
                            <div class="row no-gutters justify-content-center">
                            
                                <div class="gallery-single '.$galleryTemplateLayout.'">
                                  '.$pageGalleryView.'
                                </div>
                              
                            </div>
                          </div>
                        </section>';
    
  }
  
}

?>