<?php

$tabDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="130">
        <label for="name">Name:</label>
      </td>
      <td>
        <input type="text" name="name" id="name" value="'.$itemName.'" style="width:350px;" maxlength="50"/>
      </td>
    </tr>
    <tr>
      <td>
        <label for="url">URL:</label>
      </td>
      <td>
        <input type="text" name="url" id="url" value="'.$itemUrl.'" style="width:350px;"/>
      </td>
    </tr>
    <tr>
      <td>
        <label for="title">Title:</label>
      </td>
      <td>
        <input type="text" name="title" id="title" value="'.$itemTitle.'" style="width:350px;" maxlength="100"/>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="icon_cls">Icon:</label>
      </td>
      <td>
        <input style="width:350px;" name="icon_cls" id="icon_cls" value="'.$itemIconClass.'" 
        class="icon-picker" type="text" readonly/>
        <span class="input-group-addon icon-picker-addon"></span>
        <input type="button" value="clear" onclick="clearValue(\'icon_cls\')"><br>
      </td>
    </tr> 
    <tr>
      <td valign="top"><label for="icon_image_path">Icon Image:</label></td>
      <td>
          <input name="icon_image_path" type="text" value="'.$itemIconImgPath.'" 
           style="width:350px;" id="icon_image_path" readonly autocomplete="off">
          <input type="button" value="browse" onclick="openCKFileBrowser(\'icon_image_path\')"> 
          <input type="button" value="clear" onclick="clearValue(\'icon_image_path\')"><br>
          <p class="form-field-note">
            (Recommend size: 40x40 px and format: png) 
          </p>
      </td>
    </tr> 
  </table>';


$modBaseDirPath  = ADMIN_BASE_URL.'/'.MODULES_DIR.'/'.$do;

//  Init tags plugin
$extraStyles  .= '<link href="'.$modBaseDirPath.'/assets/css/fontawesome/fontawesome.css" rel="stylesheet">';
$extraStyles  .= '<link href="'.$modBaseDirPath.'/assets/css/fontawesome/brands.css" rel="stylesheet">';
$extraStyles  .= '<link href="'.$modBaseDirPath.'/assets/css/fontawesome-iconpicker.css" rel="stylesheet">';
$extraScripts .= '<script src="'.$modBaseDirPath.'/assets/js/fontawesome-iconpicker.js"></script>';

$extraScripts .= '<script>
    $(".icon-picker").iconpicker({
      icons: [
        { title: "fab fa-facebook", searchTerms: ["facebook-official" ]}, 
        { title: "fab fa-facebook-f", searchTerms: [ "facebook" ]}, 
        { title: "fab fa-facebook-messenger", searchTerms: ["facebook"]}, 
        { title: "fab fa-facebook-square", searchTerms: ["facebook" ]},
        { title: "fab fa-instagram", searchTerms: ["instagram"]},
        { title: "fa-brands fa-tiktok", searchTerms: ["tiktok" ]},
        { title: "fab fa-twitter", searchTerms: [ "tweet" ]}, 
        { title: "fab fa-twitter-square", searchTerms: [ "tweet" ]},
        { title: "fa-brands fa-x-twitter", searchTerms: [ "tweet" ]},
        { title: "fab fa-youtube", searchTerms: [ "video", "film", "youtube-play", "youtube-square" ]}, 
        { title: "fab fa-youtube-square", searchTerms: ["youtube"]},
        { title: "fab fa-google", searchTerms: ["google"]},
        { title: "fab fa-google-plus", searchTerms: [ "google-plus-circle", "google-plus-official" ]}, 
        { title: "fab fa-google-plus-g", searchTerms: [ "social network", "google-plus" ]}, 
        { title: "fab fa-google-plus-square", searchTerms: [ "social network" ]},
        { title: "fab fa-flickr", searchTerms: ["flickr"]},        
        { title: "fab fa-pinterest", searchTerms: ["pinterest"]}, 
        { title: "fab fa-pinterest-p", searchTerms: ["pinterest"]}, 
        { title: "fab fa-pinterest-square", searchTerms: ["pinterest"]}, 
        { title: "fab fa-linkedin-in", searchTerms: ["linkedin"]}, 
        { title: "fab fa-linkedin", searchTerms: ["linkedin"]}, 
        { title: "fab fa-vimeo", searchTerms: ["vimeo"]}, 
        { title: "fab fa-vimeo-square", searchTerms: ["vimeo"]}, 
        { title: "fab fa-vimeo-v", searchTerms: [ "vimeo" ]},
        { title: "fab fa-500px", searchTerms: [ "500px" ]},
      ],
      selectedCustomClass: "label label-success"
    });
  </script>';

?>