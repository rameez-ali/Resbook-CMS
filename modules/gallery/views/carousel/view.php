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
	
	
			$pageGalleryView .= '<a href="'.$lightBoxContentUrl.'" class="showcase-gallery__item '.$photoCls.'" 
				 title="'.$photoCaption.'" data-category="Photo Gallery" data-action="Image Link" data-name="'.$galleryLabel.'">
				 	<figure class="showcase-gallery__figure">
						<img data-lazy="'.$photoThumbFullUrl.'" alt="'.$photoAltText.'" class="showcase-gallery__image">
					</figure>
				</a>';
		}
	
		$pageGalleryView = '<section class="section">
			<div class="container-fluid container-fluid--fw">
				<div class="row justify-content-center">
					<div class="col-12">
						<div class="showcase-gallery">
							<div class="showcase-gallery__carousel">
								'.$pageGalleryView.'
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>';
	}
}
?>