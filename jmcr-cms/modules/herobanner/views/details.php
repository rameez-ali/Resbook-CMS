<?php

$heroPhotoDetails = $arrItems[HERO_BANNER_TYPE_IMAGE];
$heroPhotoPath = $heroPhotoDetails['photo_path'];
$heroPhotoTitle = $heroPhotoDetails['title'];
$heroPhotoSubTitle = $heroPhotoDetails['sub_title'];
$heroPhotoAltText = $heroPhotoDetails['alt_text'];
$heroPhotoButtonText = $heroPhotoDetails['button_text'];
$heroPhotoButtonUrl = $heroPhotoDetails['button_url'];

$tabDetailsContent = '
<table>
    <tr>
        <td style="width: 260px;">
            <div class="image-preview hero-photo'.((empty($heroPhotoPath)) ? '' : ' selected').'"
             style="background-image: url('.$heroPhotoPath.');">
                <button class="default-btn default-btn-add" type="button" onclick="openCKFileBrowser(\'hero_banner_photo\')">
                    <i class="fa fa-plus"></i> 
                    Add image
                </button>
                <button class="default-btn default-btn-edit" type="button" onclick="openCKFileBrowser(\'hero_banner_photo\')">
                    <i class="fa fa-edit"></i> 
                    Change image
                </button>
                <input type="hidden" id="hero_banner_photo" name="hero_banner_photo" value="'.$heroPhotoPath.'">
            </div>
            <div class="image-preview__text">
                <p>We recommend a jpg image in 1920x1080 pixels size for home page and 1920x560 pixels for internal pages</p>
            </div>
        </td>
        <td style="vertical-align: top; padding-left: 30px;">
            <table>
                <tr>
                    <td style="width: 175px;">
                        <label for="heroshot_title">Title:</label>
                    </td>
                    <td>
                        <input name="heroshot_title" id="heroshot_title" 
                         class="textbox" 
                         placeholder="Add a title to your image" 
                         value="'.$heroPhotoTitle.'" 
                         style="width: 300px;">
                    </td>
                </tr>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_sub_title">Subtitle:</label>
                </td>
                <td>
                    <input name="heroshot_sub_title" id="heroshot_sub_title" 
                     class="textbox" 
                     placeholder="Add a subtitle to your image" 
                     value="'.$heroPhotoSubTitle.'" 
                     style="width:300px;">
                </td>
            </tr>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_alt_text">Alt Text:</label>
                    <span data-toggle="tooltip" data-placement="right" 
                     data-title="Alt-text describes what your image is 
                     so search engines can find it.">
                    </span>
                </td>
                <td>
                    <input name="heroshot_alt_text" id="heroshot_alt_text" 
                     class="textbox" 
                     placeholder="Add alt-text to your image" 
                     value="'.$heroPhotoAltText.'" 
                     style="width:300px;">
                </td>
            </tr>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_button_text">Button Text:</label>
                    <span data-toggle="tooltip" 
                     data-placement="right" 
                     data-title="If no text is added here, there won\'t be a 
                     button displayed on your image.">
                    </span>
                </td>
                <td>
                    <input name="heroshot_button_text"
                     id="heroshot_button_text" 
                     class="textbox" 
                     placeholder="Add text to add a button" 
                     value="'.$heroPhotoButtonText.'" 
                     style="width: 300px;">
                </td>
            </tr>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_button_url">Button URL:</label>
                    <span data-toggle="tooltip" 
                     data-placement="right" 
                     data-title="If no URL is added here, there won\'t be a button displayed on your image.">
                    </span>
                </td>
                <td>
                    <input id="heroshot_button_url" 
                     name="heroshot_button_url" 
                     class="textbox" placeholder="Add a URL to your button" 
                     value="'.$heroPhotoButtonUrl.'" 
                     style="width: 300px;">
                </td>
            </table>
        </td>
    </tr>
</table>';
?>