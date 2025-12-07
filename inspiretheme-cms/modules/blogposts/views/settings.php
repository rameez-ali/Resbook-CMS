<?php

/** BLOG PPOSTS Module - Settings Tab */

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

/** Authors dropdown */
$sqlAuthorList = "SELECT `user_id` AS ind, 
  TRIM(CONCAT(`user_fname`, ' ', `user_lname`)) AS label
FROM `cms_users`
WHERE `user_fname` != ''
ORDER BY label";

$authorList = createItemList($sqlAuthorList, $itemUpdatedBy);

$tabSettingsContent = '
  <table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="180">
        <label for="heading">Heading:</label>
      </td>
      <td>
        <input type="text" name="heading" id="heading" value="'.$itemHeading.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td><label for="page_url">URL</label></td>
      <td>
        <input name="url" type="text" id="page_url" value="'.$itemUrl.'" data-cvalue="'.$itemUrl.'"
         data-type="mod" style="width:300px;" class="item-url" />
        <span id="page_url_msg" style="margin-left:10px;" class="text-danger"></span>
      </td>
    </tr>
    <tr>
      <td><label for="author">Author:</label></td>
      <td>
          <select name="author" id="author" style="width:300px;">
              <option value="">-- select --</option>
              '.$authorList.'
          </select>
      </td>
    </tr>
    <tr>
      <td><label for="posted_on">Posted On:</label></td>
      <td><input name="posted_on" type="text" id="posted_on" value="'.$itemPostedOn.'" style="width:300px;" /></td>
    </tr>
    <tr>
      <td width="150">
        <label for="is_featured">Is Featured:</label
      </td>
      <td>
        <input name="is_featured" type="checkbox" id="is_featured" value="'.FLAG_YES.'" 
         '.(($itemIsFeatured === FLAG_YES) ? ' checked="checked"' : '').'/>
      </td>
    </tr>
    <tr>
      <td>
        <label for="slideshow_id">Hero Banner:</label>
      </td>
      <td>'.$selectSlideshowView.'</td>
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
          <small>Recommended size: 367px x250px</small>
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

  $extraScripts .= "<script>
    $('#posted_on').datepicker({
        dateFormat:'dd/mm/yy',
        changeYear:true,
        changeMonth:true
    });
    
    $('#heading').on('change', function(){
        $('#page_url').val(convertToSlug($(this).val()));
    });
    
    function convertToSlug(Text)
    {
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g,'')
            .replace(/ +/g,'-')
            ;
    }
  </script>";
