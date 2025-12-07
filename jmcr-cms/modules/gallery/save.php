<?php

/** Save Item*/

function saveItem()
{
  global $message, $id, $disableMenu, $moduleSubHeading, $modMsgLabel;
  
  $arrGallery = [];

  $arrGallery['name']                   = validateInput('label');
  $arrGallery['menu_label']             = validateInput('menu_label');
  $arrGallery['show_on_gallery_page']   = (validateInput('show_on_gallery_page') == FLAG_YES) ? FLAG_YES: FLAG_NO;

  if (empty($id)) {
    
    $id = DB::insertRow( $arrGallery, 'gallery' );
  
  } else {

    DB::updateRow( $arrGallery, 'gallery', "WHERE id = '{$id}' LIMIT 1" );
  }

  $arrPhotos = requestVar('photo');

  /** SAVE PHOTOs HERE */

  if(!empty($arrPhotos)){
    
    $arrGalleryPhotoIds = array_column($arrPhotos, 'id');

    $sqlDeletePhotos = "DELETE FROM `gallery_photo` 
			WHERE `id` NOT IN (".implode(',',$arrGalleryPhotoIds).")
			AND `gallery_id` = '{$id}'";
	
    DB::runQuery($sqlDeletePhotos);
    
    foreach ($arrPhotos AS $photo) {
      
      $photoData = [];

      $photoId        = sanitizeVar($photo['id'], FILTER_SANITIZE_NUMBER_INT);
      
      $photoPath      = sanitizeVar($photo['photo_path']);
      $thumbPhotoPath =  sanitizeVar($photo['thumb_photo_path']);

      $photoFullPath  = BASE_PATH.$photoPath;
				
      if (Helper::isFile($photoPath)) {

        $photoExif = getimagesize($photoFullPath);      

        $newHeroThumbPath = Helper::createImageThumb($photoPath, THUMB_WIDTH, THUMB_HEIGHT, $thumbPhotoPath);
        
        $photoData['photo_path']       = $photoPath;
        $photoData['thumb_photo_path'] = $newHeroThumbPath;
        $photoData['photo_width']      = $photoExif[0];;
        $photoData['photo_height']     = $photoExif[1];
        $photoData['caption']          = sanitizeVar($photo['caption']); 						
        $photoData['alt_text']         = sanitizeVar($photo['alt_text']);
        $photoData['video_id']         = sanitizeVar($photo['video_id']); 
        $photoData['rank']             = getNullIfEmpty(sanitizeVar($photo['rank'], FILTER_SANITIZE_NUMBER_INT));        
      }
      
      if (!empty($photoData)) {

        if (empty($photoId)) {

          $photoData['gallery_id']      = $id;
    
          $photoId = DB::insertRow( $photoData, 'gallery_photo' );
          
        } else {
      
          DB::updateRow( $photoData, 'gallery_photo', "WHERE id = '{$photoId}' LIMIT 1" );
          
        }
      }
    }
  } else {
    /** remove all photos from gallery */

    $sqlDeletePhotos = "DELETE FROM `gallery_photo` 
			WHERE `gallery_id` = '{$id}'";

    DB::runQuery($sqlDeletePhotos);
  }

  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";

}


?>