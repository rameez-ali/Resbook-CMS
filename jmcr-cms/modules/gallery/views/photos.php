<?php

$extraScripts       = (empty($extraScripts)) ? '' : $extraScripts;
$extraStyles        = (empty($extraStyles)) ? '' : $extraStyles;

/** Get gallery photos */

$sql = "SELECT `id`,
  `photo_path`,
  `thumb_photo_path`,
  `photo_width`,
  `photo_height`,
  `caption`,
  `alt_text`,
  `video_id`,
  `rank`
FROM `gallery_photo`
WHERE `gallery_id` = '{$id}'
ORDER By `rank`";

$arrPhotos = DB::fetchAll($sql);

/** View for photos tab */

$galleryItemCount = 1;
$galleryItemList  = "";

$galleryItemList .= '<div class="slides" id="gallery-wrapper">';

if(!empty($arrPhotos)) {     

  foreach ($arrPhotos AS $key => $photo) {
 
    $photoInd       = $photo['id'];
    $photoFullPath  = $photo['photo_path'];
    $photoThumbPath = $photo['thumb_photo_path'];
    $photoCaption   = $photo['caption'];
    $photoVideoId   = $photo['video_id'];
    $photoAltText   = $photo['alt_text'];
    $photoRank      = $photo['rank'];                   
    
    $galleryItemList .= '<div id="photo_'.$key.'" class="gallery-item">
        <div class="col-item col-left">
            <img src="'.$photoFullPath.'" alt="'.$altText .'">
            <input type="hidden" value="'.$photoFullPath.'" name="photo['.$key.'][photo_path]"> 
            <input type="hidden" value="'.$photoThumbPath.'" name="photo['.$key.'][thumb_photo_path]"> 
            <a href="#" class="remove-photo"><i class="fa fa-times"></i> Remove</a> 
        </div>
        <div class="col-item padded">
          <table class="gallery-details" cellpadding="2" cellspacing="2">
            <tr>
              <td><label>Caption:</label></td>
              <td><input type="text" maxlength="150" name="photo['.$key.'][caption]" 
               placeholder="Add a caption to your image" value="'.$photoCaption.'" 
               class="input-fw"></td>
            </tr>
            <tr>
              <td>
                <label>Alt text:</label>
                <span data-toggle="tooltip" data-placement="right" 
                 data-title="Alt-text describes what your image is so search engines can find it."></span>  
              </td>
              <td>
                <input type="text" maxlength="150" name="photo['.$key.'][alt_text]" value="'.$photoAltText.'"
                 class="input-fw" placeholder="Add alt-text to your image"> </td>
            </tr>
            <tr>
              <td width="110">
                <label>Youtube ID:</label>
                <span data-toggle="tooltip" data-placement="right" 
                  data-title="When a Youtube ID is added, the video will appear when the image is clicked. 
                   The Youtube ID can be found at the end of your video URL. 
                   For example, the ID for https://www.youtube.com/watch?v=RInxbh9rzfQ is RInxbh9rzfQ"></span>
              </td>
              <td width="610">
                <input type="text" maxlength="150" name="photo['.$key.'][video_id]" value="'.$photoVideoId.'" 
                 class="input-fw" placeholder="Add a Youtube ID to display your video">
              </td>
            </tr>
            <tr>
              <td>
                <label>Order:</label>
                <span data-toggle="tooltip" data-placement="right" 
                  data-title="Enter a number to change the order of the image in your gallery"></span>
              </td>
              <td>
                <input type="number" name="photo['.$key.'][rank]" value="'.$photoRank .'" 
                 class="input-xxs" maxlength="2" min="1">
                <input type="hidden" name="photo['.$key.'][id]" value="'.$photoInd.'" class="input-xxs"> 
              </td>
            </tr>
          </table>
        </div>
      </div>';
    
    $galleryItemCount++;

  }

}

$galleryItemList .= '</div>';

$galleryItemCount -= 1;

$tabPhotosContent = '<p>
    <strong>Recommend size: 1920x1080px and format: jpg</strong>
  </p>
  <table width="100%" cellpadding="0" cellspacing="0" id="photo-gallery">
    <tr>
      <td>
        <div style="margin-bottom:10px;">
          <a href="#" class="btn btn-primary" id="add-new-photo">
            <i class="glyphicon glyphicon-plus-sign"
             style="vertical-align:text-top;margin:0px 4px 0 0"></i> 
             Add New Photo
          </a>
        </div>
        '.$galleryItemList.'
        <input type="hidden" value="'.$galleryItemCount.'" id="gallery-item-count" />
        <input type="hidden" id="tempPhoto" name="tempPhoto" value="">
      </td>
    </tr>
  </table>';

$tabPhotosContent .='<script id="gallery-tmpl" type="text/html">
    <div id="photo_<%= index %>" class="gallery-item">
      <div class="col-item col-left">
          <img src="<%= itemImg %>" alt="Slide Image 1">
          <input type="hidden" value="<%= itemImg %>" name="photo[<%= index %>][photo_path]">
          <input type="hidden" value="" name="photo[<%= index %>][thumb_photo_path]">  
          <a href="#" class="remove-photo"><i class="fa fa-times"></i> Remove</a> 
      </div>
      <div class="col-item padded">
        <table class="slide-details" cellpadding="2" cellspacing="2">
          <tr>
            <td><label>Caption:</label></td>
            <td><input type="text" maxlength="150" name="photo[<%= index %>][caption]" 
             placeholder="Add a caption to your image" value="" class="input-fw"></td>
          </tr>
          <tr>
            <td>
              <label>Alt text:</label>
              <span data-toggle="tooltip" data-placement="right" 
                data-title="Alt-text describes what your image is so search engines can find it."></span>
            </td>
            <td><input type="text" maxlength="150" name="photo[<%= index %>][alt_text]" 
             placeholder="Add alt-text to your image"
             value="" class="input-fw"></td>
          </tr>
          <tr>
            <td width="110">
              <label>Youtube ID:</label>
              <span data-toggle="tooltip" data-placement="right" 
                data-title="When a Youtube ID is added, the video will appear when the image is clicked. 
                 The Youtube ID can be found at the end of your video URL. 
                 For example, the ID for https://www.youtube.com/watch?v=RInxbh9rzfQ is RInxbh9rzfQ"></span>
            </td>
            <td width="610">
              <input type="text" maxlength="150" name="photo[<%= index %>][video_id]" 
               placeholder="Add a Youtube ID to display your video"
               value="" class="input-fw"></td>
          </tr>
          <tr>
            <td>
              <label>Order:</label>
              <span data-toggle="tooltip" data-placement="right" 
               data-title="Enter a number to change the order of the image in your gallery"></span>
            </td>
            <td>
              <input type="number" name="photo[<%= index %>][rank]" value="" class="input-xxs" maxlength="2" min="1">
              <input type="hidden" name="photo[<%= index %>][id]" value="0" class="input-xxs"> 
            </td>
          </tr>
        </table>
      </div>
    </div>
  </script>'; 

$modBaseDirPath  = ADMIN_BASE_URL.'/'.MODULES_DIR.'/'.$do;

/** load gallery script & style */
$extraStyles  .= '<link href="'.$modBaseDirPath.'/assets/css/gallery.css?v=1" rel="stylesheet">';
$extraScripts .= '<script src="'.$modBaseDirPath.'/assets/js/gallery.js?v=1"></script>';
?>