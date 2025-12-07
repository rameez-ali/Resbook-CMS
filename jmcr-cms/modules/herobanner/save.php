<?php

/** Save Item*/

function saveItem()
{
  $arrHeroBanner = [];
  global $message, $do, $id, $disableMenu, $moduleSubHeading, $modMsgLabel;

  $untitledStr = 'Untitled';

  $actual_link = ADMIN_BASE_URL.'/index.php?do='.$do.'&action=edit&id='.$id;

  $slideshowSpeed = validateInput('slideshow_speed', FILTER_VALIDATE_INT);
  $isGallery = validateInput('is_gallery', FILTER_VALIDATE_INT);
  $isGallery = $isGallery !== null ? $isGallery : 0;

  $heroBannerName = validateInput('name');
  $heroBannerName = $heroBannerName ?: $untitledStr;

  $heroBannerActiveType = validateInput('active_type');
  
  $photoPath        = validateInput('photo_path');
  $thumbPhotoPath   = validateInput('thumb_photo_path');

  $newHeroThumbPath = Helper::createImageThumb($photoPath, LOGO_WIDTH, LOGO_HEIGHT, $thumbPhotoPath);
  

  /** SAVE HERO BANNER DATA */
  $arrHeroBanner['name']            = $heroBannerName;
  $arrHeroBanner['photo']           = $photoPath;
  $arrHeroBanner['thumb_photo']     = $newHeroThumbPath;
  $arrHeroBanner['active_type']     = (empty($heroBannerActiveType)) ? HERO_BANNER_TYPE_IMAGE : $heroBannerActiveType;
  $arrHeroBanner['slideshow_speed'] = ((empty($slideshowSpeed)) ? 2000 : $slideshowSpeed);
  $arrHeroBanner['is_gallery']      = $isGallery;

  if (empty($id)) {
    $id = DB::insertRow($arrHeroBanner, 'hero_banner');
  } else {
    DB::updateRow( $arrHeroBanner, 'hero_banner', "WHERE id = '{$id}' LIMIT 1" );
  }

  if ($heroBannerName === $untitledStr) {
    DB::updateRow([
      'name' => "{$untitledStr} {$id}"
    ], 
    'hero_banner', 
    "WHERE id = '{$id}'");
  }

  /** SAVE HERO BANNER - HEROSHOT DATA */
  $heroshotPhotoPath = validateInput('hero_banner_photo');

  $thumbHeroshotPhotoPath = '';
  $newHeroBannerThumbPath   = Helper::createImageThumb($heroshotPhotoPath, BANNER_THUMB_WIDTH, BANNER_THUMB_HEIGHT, $thumbHeroshotPhotoPath);

  $heroshotButtonUrl = validateInput('heroshot_button_url', FILTER_VALIDATE_URL);

  $heroshotPhotoDetails = @getimagesize(BASE_PATH.$heroshotPhotoPath);

  if (empty($heroshotButtonUrl)) {

    $heroshotButtonUrl = validateInput('heroshot_button_url');

  }


  $arrHeroshot = [];

  $arrHeroshot['photo_path']    = (empty($heroshotPhotoDetails)) ? null : $heroshotPhotoPath;
  $arrHeroshot['thumb_photo_path']    = (empty($heroshotPhotoDetails)) ? null : $newHeroBannerThumbPath;
  $arrHeroshot['photo_width']   = (empty($heroshotPhotoDetails[0])) ? 0 : $heroshotPhotoDetails[0];
  $arrHeroshot['photo_height']  = (empty($heroshotPhotoDetails[1])) ? 0 : $heroshotPhotoDetails[1];
  $arrHeroshot['title']         = validateInput('heroshot_title');
  $arrHeroshot['sub_title']     = validateInput('heroshot_sub_title');
  $arrHeroshot['alt_text']      = validateInput('heroshot_alt_text');
  $arrHeroshot['button_text']   = validateInput('heroshot_button_text');
  $arrHeroshot['button_url']    = $heroshotButtonUrl;

  $bannerHeroshotId = DB::fetchValue("SELECT `id` 
    FROM `hero_banner_item`
    WHERE `hero_banner_id` = '{$id}'
      AND `type` = '".HERO_BANNER_TYPE_IMAGE."'
    LIMIT 1");

if (!empty($heroshotPhotoPath)) {
    if (empty($bannerHeroshotId)) {
  
      $arrHeroshot['type']           = HERO_BANNER_TYPE_IMAGE;
      $arrHeroshot['hero_banner_id'] = $id;
    
      DB::insertRow($arrHeroshot, 'hero_banner_item');
    
    } else {
      DB::updateRow( $arrHeroshot, 'hero_banner_item', "WHERE id = '{$bannerHeroshotId}' LIMIT 1" );
    }
} elseif ($heroBannerActiveType == HERO_BANNER_TYPE_IMAGE) {
    echo "<script type='text/javascript'>alert('Please select image');</script>";
    echo "<script type='text/javascript'>document.location.href='{$actual_link}';</script>";
}
  

  /** SAVE HERO BANNER - VIDEO DATA */
	$heroshotVideoPhotoPath = validateInput('heroshot_video_photo_path');
  $thumbHeroshotPhotoPath = validateInput('thumb_heroshot_video_photo_path');
  $newHeroBannerThumbPath   = Helper::createImageThumb($heroshotVideoPhotoPath, BANNER_THUMB_WIDTH, BANNER_THUMB_HEIGHT, $thumbHeroshotPhotoPath);

  $heroshotVideoButtonUrl = validateInput('heroshot_video_button_url', FILTER_VALIDATE_URL);

  $heroshotVideoPhotoDetails = @getimagesize(BASE_PATH.$heroshotVideoPhotoPath);

  if (empty($heroshotVideoButtonUrl)) {

    $heroshotVideoButtonUrl = validateInput('heroshot_video_button_url');

  }
  

  $arrVideo = [];

  $heroBannerVideoId = validateInput('heroshot_youtube_id');

  $arrVideo['photo_path']    = (empty($heroshotVideoPhotoDetails)) ? null : $heroshotVideoPhotoPath;
  $arrVideo['thumb_photo_path']    = (empty($heroshotVideoPhotoDetails)) ? null : $newHeroBannerThumbPath;
  $arrVideo['photo_width']   = (empty($heroshotVideoPhotoDetails[0])) ? 0 : $heroshotVideoPhotoDetails[0];
  $arrVideo['photo_height']  = (empty($heroshotVideoPhotoDetails[1])) ? 0 : $heroshotVideoPhotoDetails[1];
  $arrVideo['title']         = validateInput('heroshot_video_title');
  $arrVideo['sub_title']      = validateInput('heroshot_video_sub_title');
  $arrVideo['alt_text']      = validateInput('heroshot_video_alt_text');
  $arrVideo['button_text']   = validateInput('heroshot_video_button_text');
  $arrVideo['video_id']      = $heroBannerVideoId;
  $arrVideo['button_url']    = $heroshotVideoButtonUrl;

  $bannerVideoId = DB::fetchValue("SELECT `id` 
    FROM `hero_banner_item`
    WHERE `hero_banner_id` = '{$id}'
      AND `type` = '".HERO_BANNER_TYPE_VIDEO."'
    LIMIT 1");

  if (!empty($heroBannerVideoId)) {
      if (empty($bannerVideoId)) {
      $arrVideo['type']           = HERO_BANNER_TYPE_VIDEO;
      $arrVideo['hero_banner_id'] = $id;
    
      DB::insertRow($arrVideo, 'hero_banner_item');
    } else {
      DB::updateRow($arrVideo, 'hero_banner_item', "WHERE id = '{$bannerVideoId}' LIMIT 1");
    }
  } elseif ($heroBannerActiveType == HERO_BANNER_TYPE_VIDEO) {
      echo "<script type='text/javascript'>alert('Please Put Youtube ID');</script>";
      echo "<script type='text/javascript'>document.location.href='{$actual_link}';</script>";
  }

  /** SAVE HERO BANNER - SLIDESHOW DATA */

  runQuery("DELETE FROM `hero_banner_item` 
    WHERE `hero_banner_id` = '{$id}' 
    AND `type` = '".HERO_BANNER_TYPE_SLIDER."'");
  
  $slides = $_SESSION['hero_slides'];

  if (!empty($slides)) {

    $c = 1;
    
    foreach ($slides as $i => $slide) {

      $thumbHeroshotPhotoPath = '';
      $newHeroBannerThumbPath   = Helper::createImageThumb($slide['photo_path'], BANNER_THUMB_WIDTH, BANNER_THUMB_HEIGHT);

      $heroSlide = [];
      $heroSlideshowImage =  $slide['photo_path'];
      $heroSlide['photo_path']    = $heroSlideshowImage;
      $heroSlide['thumb_photo_path']    = (empty($newHeroBannerThumbPath)) ? null : $newHeroBannerThumbPath;
      $heroSlide['button_url']    = $slide['button_url'];
      $heroSlide['title']         = $slide['title'];
      $heroSlide['sub_title']     = $slide['sub_title'];
      $heroSlide['alt_text']      = $slide['alt_text'];
      $heroSlide['button_text']   = $slide['button_text'];
   
      $slideDetails = @getimagesize(BASE_PATH.$heroSlide['photo_path']);

      if (!empty($slideDetails)) {
        $heroSlide['photo_width']     = (empty($slideDetails[0])) ? 0 : $slideDetails[0];
        $heroSlide['photo_height']    = (empty($slideDetails[1])) ? 0 : $slideDetails[1];
        $heroSlide['hero_banner_id']  = $id;
        $heroSlide['rank']            = $_POST['slide-rank'][$i];
        $heroSlide['type']            = HERO_BANNER_TYPE_SLIDER;

        DB::insertRow($heroSlide, 'hero_banner_item');
    
        $c++;
      }
      
      if (empty($heroSlideshowImage) && $heroBannerActiveType == HERO_BANNER_TYPE_SLIDER && $i == 0) {
        echo "<script type='text/javascript'>alert('Please Select at least one Item');</script>";
        echo "<script type='text/javascript'>document.location.href='{$actual_link}';</script>";
        break;
      }
    }
    
  } 

  unset($_SESSION['hero_slides']);
  $_SESSION['hero_slides'] = [];

  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";

}


?>