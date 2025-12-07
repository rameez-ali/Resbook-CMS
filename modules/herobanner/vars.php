<?php

$sqlHeroDetailsExt = ($heroBannerType != HERO_BANNER_TYPE_SLIDER) ? ' LIMIT 1' : '';

$sqlHeroDetails = "SELECT `id`,
    `photo_path`,
    `thumb_photo_path`,
    `photo_width`,
    `photo_height`,
    `title`,
    `sub_title`,
    `alt_text`,
    `button_text`,
    `button_url`,
    `video_id`,
    `type`,
    `rank`,
    `hero_banner_id`
  FROM `hero_banner_item`
  WHERE `hero_banner_id` = '{$heroBannerId}'
  AND `type` = '{$heroBannerType}'
  ORDER BY `rank`
  {$sqlHeroDetailsExt}";

// var_dump($heroBannerType);die('ggg');
if ($heroBannerType == HERO_BANNER_TYPE_SLIDER ) {

  $arrHeroBannerItem = DB::fetchAll($sqlHeroDetails);

} else {

  $arrHeroBannerItem = DB::fetchRow($sqlHeroDetails);

  /** Get heroshot or video info */
  $itemTitle 				= $arrHeroBannerItem['title'];
  $itemSubtitle 		= $arrHeroBannerItem['sub_title'];
  $itemAltText 			= $arrHeroBannerItem['alt_text'];
  $itemButtonText 	= $arrHeroBannerItem['button_text'];
  $itemButtonUrl 		= $arrHeroBannerItem['button_url'];

  $itemPhotoPath 		= $arrHeroBannerItem['photo_path'];
  $itemThumbPhotoPath = $arrHeroBannerItem['thumb_photo_path'];
  $itemWidth 				= $arrHeroBannerItem['photo_width'];
  $itemHeight 			= $arrHeroBannerItem['photo_height'];

  $itemVideoId 		  = $arrHeroBannerItem['video_id'];
  $itemPhotoPath    = (empty($itemPhotoPath)) ? '' : Helper::getFullUrl($itemPhotoPath);
  $itemThumbPhotoPath    = (empty($itemThumbPhotoPath)) ? '' : Helper::getFullUrl($itemThumbPhotoPath);
}