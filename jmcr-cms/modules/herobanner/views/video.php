<?php

$heroVideoDetails = $arrItems[HERO_BANNER_TYPE_VIDEO];
$heroVideoPhotoPath = $heroVideoDetails['photo_path'];
$heroVideoThumbPhotoPath = $heroVideoDetails['thumb_photo_path'];
$heroVideoTitle = $heroVideoDetails['title'];
$heroVideoSubTitle = $heroVideoDetails['sub_title'];
$heroVideoAltText = $heroVideoDetails['alt_text'];
$heroVideoButtonText = $heroVideoDetails['button_text'];
$heroVideoButtonUrl = $heroVideoDetails['button_url'];
$heroVideoId = $heroVideoDetails['video_id'];

$heroVideoSrc = (empty($heroVideoId)) ? '' : "https://www.youtube.com/embed/{$heroVideoId}";

$tabVideoContent = '<table>
<tr>
    <td style="width: 260px;">
        <div class="image-preview image-preview-vid'.(($heroVideoId) ? ' selected' : '').'">
            <iframe src="'.$heroVideoSrc.'" class="image-preview-video"></iframe>
        </div>
    </td>
    <td style="vertical-align: top; padding-top: 0; padding-left: 30px;">
        <table>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_youtube_id">Youtube ID</label>
                    <span data-toggle="tooltip"
                        data-placement="right"
                        data-title="The Youtube ID
                        can be found at the end
                        of your video URL. For
                        example, the ID for
                        https://www.youtube.com/watch?v=RInxbh9rzfQ
                        is RInxbh9rzfQ">
                    </span>
                </td>
                <td>
                    <input name="heroshot_youtube_id"
                        id="heroshot_youtube_id"
                        class="textbox" 
                        value="'.$heroVideoId.'" 
                        placeholder="Add a Youtube ID to display your video" style="width: 300px;">
                </td>
            </tr>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_video_title">Title</label>
                </td>
                <td>
                    <input name="heroshot_video_title"
                        id="heroshot_video_title"
                        class="textbox"
                        value="'.$heroVideoTitle.'" 
                        placeholder="Add a title to your video" 
                        style="width: 300px;">
                </td>
            </tr>
            <tr>
                    <td style="width: 175px;">
                        <label for="heroshot_video_sub_title">Subtitle</label>
                    </td>
                    <td>
                        <input name="heroshot_video_sub_title" 
                            id="heroshot_video_sub_title" 
                            class="textbox" 
                            value="'.$heroVideoSubTitle.'" 
                            placeholder="Add a subtitle to your video" 
                            style="width: 300px;">
                    </td>
                </tr>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_video_photo_path">Mobile Image</label>
                    <span data-toggle="tooltip"
                        data-placement="right"
                        data-title="This image
                        replaces your video on
                        mobile devices to
                        improve loading time.">
                    </span>
                </td>
                <td>
                    <input type="text" name="heroshot_video_photo_path"
                        class="textbox" 
                        placeholder="Add a mobile image" 
                        id="heroshot_video_photo_path"
                        value="'.$heroVideoPhotoPath.'" 
                        style="width:300px;" /> 
                    <input name="thumb_heroshot_video_photo_path" type="hidden" value="'.$heroVideoThumbPhotoPath.'" 
                        id="thumb_heroshot_video_photo_path" readonly autocomplete="off">
                    <input type="button" value="browse" onclick="openCKFileBrowser(\'heroshot_video_photo_path\')">
                    <input type="button" value="clear" onclick="clearValue(\'heroshot_video_photo_path\')"><br>
                </td>
            </tr>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_video_alt_text">Alt
                        Text</label>
                    <span data-toggle="tooltip"
                        data-placement="right"
                        data-title="Alt-text describes what your image is so search engines can find it.">
                    </span>
                </td>
                <td>
                    <input name="heroshot_video_alt_text"
                        id="heroshot_video_alt_text"
                        class="textbox" 
                        value="'.$heroVideoAltText.'" 
                        placeholder="Add alt-text to your image" 
                        style="width: 300px;">
                </td>
            </tr>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_video_button_text">Button Text</label>
                    <span data-toggle="tooltip"
                        data-placement="right"
                        data-title="If no text is added here, there won’t be a button displayed on your video.">
                    </span>
                </td>
                <td>
                    <input name="heroshot_video_button_text"
                        id="heroshot_video_button_text"
                        class="textbox"
                        value="'.$heroVideoButtonText.'"
                        placeholder="Add text to add a button" style="width: 300px;">
                </td>
            </tr>
            <tr>
                <td style="width: 175px;">
                    <label for="heroshot_video_button_url">Button URL</label>
                    <span data-toggle="tooltip"
                        data-placement="right"
                        data-title="If no URL is added here, there won\'t be a button displayed on your video.">
                    </span>
                </td>
                <td>
                    <input id="heroshot_video_button_url"
                        name="heroshot_video_button_url"
                        class="textbox"
                        value="'.$heroVideoButtonUrl.'"
                        placeholder="Add a URL to your button" 
                        style="width: 300px;">
                </td>
            </tr>
        </table>
    </td>
</tr>
</table>
';
?>