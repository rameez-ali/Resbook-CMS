<?php
/** Experiences Module - Settings Tab */

/** slideshow dropdown */
$selectSlideshowView = '';

$SlideshowQuery = "SELECT `id` AS ind, 
    `name` AS label
  FROM `hero_banner`
  WHERE `name` != ''
  ORDER BY `name`";

$selectSlideshowView = '<select name="slideshow_id" id="slideshow_id" 
   style="width:300px">
    <option value="">Please Select Hero Banner</option>
    '.createItemList($SlideshowQuery, $itemSlideshowId).'
  </select>';

/** gallery dropdown */

$galleryQuery = "SELECT `id` AS ind, 
    `name` AS label
  FROM `gallery`
  WHERE `name` != ''
  ORDER BY `name`";

$selectGalleryView = '<select name="gallery_id" id="gallery_id" 
   style="width:300px">
    <option value="">Please Select Gallery</option>
    '.createItemList($galleryQuery, $itemGalleryId).'
  </select>';

$partnersChecked = ($itemShowPartners == 'Y') ? 'checked' : '';

$tabSettingsContent = '
  <table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="180">
        <label for="page_url">URL</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="The URL is automatically created based on your CMS name.
          If you need to edit this URL, please ensure that you use lowercase letters
           and separate words using hyphens (-) instead of spaces. "></span>
      </td>
      <td>
        <input name="url" type="text" value="'.$itemUrl.'" data-cvalue="'.$itemUrl.'"
         data-type="mod" style="width:300px;" class="item-url" />
        <span id="page_url_msg" style="margin-left:10px;" class="text-danger"></span>
      </td>
    </tr>
    <tr>
      <td width="180">
        <label for="name">CMS Name:</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="The name of your '.$moduleLabel.' as it appears in the CMS."></span>
      </td>
      <td>
        <input type="text" name="name" id="name" value="'.$itemName.'"style="width:300px;"/></td>
    </tr>
    <tr>
      <td>
        <label for="menu_label">Navigation Name:</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="The name of your '.$moduleLabel.' as it appears in your website navigation."></span>
      </td>
      <td>
        <input type="text" name="menu_label" id="menu_label" value="'.$itemMenuLabel.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="heading">Heading:</label>
      </td>
      <td>
        <input type="text" name="heading" id="heading" value="'.$itemHeading.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="slideshow_id">Hero Banner:</label>
      </td>
      <td>'.$selectSlideshowView.'</td>
    </tr>
    <tr>
      <td>
        <label for="gallery_id">Gallery:</label>
      </td>
      <td>'.$selectGalleryView.'</td>
    </tr>
    <tr>
      <td><label for="photo_path">Image:</label></td>
      <td>
          <input name="photo_path" type="text" value="'.$itemPhotoPath.'" 
           style="width:300px;" id="photo_path" readonly autocomplete="off">
          <input name="thumb_photo_path" type="hidden" value="'.$itemPhotoThumbPath.'" 
           id="thumb_photo_path" readonly autocomplete="off">
          <input type="button" value="browse" onclick="openCKFileBrowser(\'photo_path\')"> 
          <input type="button" value="clear" onclick="clearValue(\'photo_path\')"><br>
          <small>Recommended size: 450px x250px</small>
      </td>
    </tr>
    <tr>
      <td><label for="photo_alt_text">Image Alt Text:</label></td>
      <td>
        <input type="text" name="photo_alt_text" id="photo_alt_text" value="'.$itemPhotoAltText.'" style="width:300px;"
         maxlength="125"/>
      </td>
    </tr>
    <tr>
      <td><label for="booking_url">Booking URL:</label></td>
      <td>
        <input type="text" name="booking_url" id="booking_url" value="'.$itemBookingUrl.'" style="width:300px;"/>
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="introduction">Introduction:</label></td>
      <td>
        <textarea name="introduction" id="introduction" style="width:550px;min-height:100px;resize:none;" 
         class="check-max" maxlength="250">'.$itemIntroduction.'</textarea>
        <br><span class="text-muted"><small>Max 250 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="short_description">Short Description:</label></td>
      <td>
        <textarea name="short_description" id="short_description" style="width:550px;min-height:80px;resize:none;" 
         class="check-max" maxlength="80">'.$itemShortDescription.'</textarea>
        <br><span class="text-muted"><small>Max 80 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
  </table>';