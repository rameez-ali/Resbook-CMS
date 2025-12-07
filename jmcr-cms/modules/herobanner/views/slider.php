<?php
$speedDropdownView = '<select style="width:100px;" name="slideshow_speed" class="textbox" id="slideshow_speed">';

for ($k = 3; $k <= 10; $k++) {
    

    $optionValue = ($k * 1000);
    $optionLabel = "{$k} Seconds";

    $optionIsSelected = ($optionValue == $slideshowSpeed) ? " selected" : '';

    $speedDropdownView .= '<option value="'.$optionValue.'" '.$optionIsSelected.'>'.$optionLabel.'</option>';
}

$speedDropdownView .= '</select>';

$tabSliderContent = '
<table>
    <tr>
        <td style="width: 150px;">
            <label for="slideshow_speed">Slideshow Speed</label>
            <span data-toggle="tooltip" data-placement="right" data-title="Sets how long a slide stays before moving to the next slide. The minimum speed is 3 seconds and the maximum is 10 seconds."></span>
        </td>
        <td>
            '.$speedDropdownView.'
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="1">&nbsp;</td>
    </tr>
    <tr>
        <td style="width: 150px;">
            <label for="is_gallery">Gallery Banner:</label>
        </td>
        <td>
            <input type="checkbox" name="is_gallery" id="is_gallery" value="1" '.(isset($isGallery) && $isGallery ? 'checked' : '').'>
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="1">&nbsp;</td>
    </tr>
</table>
<div class="clearfix"></div>
<div class="slideshow-wrapper">
    <div class="sortable"></div>
    <script type="text/html" id="slide-tmpl">
        <% if (slide) { %>
        <div class="sortable__item<%= ((isHidden === true) ? \' hidden\' : \'\') %>">
            <h6 class="sortable__item-title">Slide <%= (i+1) %></h6>
            <div class="sortable__image-wrap<%= ((slide.photo_path) ? \' selected\' : \'\') %>" style="background-image: url(<%= slide.photo_path %>)">
                <div class="sortable__item-handler"></div>
                <button class="default-btn sortable__add-btn"
                 type="button" 
                 data-add-index="<%= i %>"
                 onclick="openCKFileBrowser(\'slide-image-<%= i %>\')">
                    <i class="fa fa-plus"></i>
                </button>
                <button class="default-btn sortable__edit-btn"
                 type="button" 
                 data-edit-index="<%= i %>">
                    <i class="fa fa-edit"></i>
                </button>
                <button class="default-btn sortable__remove-btn" type="button" data-delete-index="<%= i %>">
                    <i class="fa fa-trash-o"></i>
                </button>
                <input type="hidden" id="slide-image-<%= i %>" name="slide-image[]" class="slide-image" value="<%= slide.photo_path %>">
                <input type="hidden" name="slide-rank[<%= i %>]" class="slide-rank" value="<%= (i+1) %>">
                <input type="hidden" name="slide-index[]" class="slide-index" value="<%= i %>">
            </div>
        </div>
        <% } %>
    </script>
</div>

<div class="clearfix" style="margin-top: 30px;">
    <button class="default-btn add-btn hidden" type="button">Add more slides</button>
</div>
<div class="text-center">
    <p>We recommend a jpg image in 1920x1080 pixels size for home page and 1920x560 pixels for internal pages</p>
</div>

<script type="text/html" id="slide-modal-tmpl">
<div class="modal fade modal--herobanner" id="modal-slide-details" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Slide <%= (index+1) %></h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td style="width: 260px;">
                            <div class="image-preview slide-modal-image <%= ((photo_path) ? \' selected\' : \'\') %>" 
                             style="background-image: url(<%= photo_path %>)">
                                <button class="default-btn" onclick="openCKFileBrowser(\'slide-image\')">
                                    <% if (photo_path) { %>
                                    <i class="fa fa-edit"></i> Change image
                                    <% } else { %>
                                        <i class="fa fa-plus"></i> Add image
                                    <% } %>
                                </button>
                                <input type="hidden" name="slide-image" id="slide-image" value="<%= photo_path %>">
                                <input type="hidden" name="slide-index"  value="<%= index %>">
                            </div>
                            <div class="image-preview__text">
                                
                                <p>We recommend a jpg image in 1920x860 pixels size</p>
                            </div>
                        </td>
                        <td style="vertical-align: top; padding-left:30px;">
                            <table>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="slide-title">Title:</label>
                                    </td>
                                    <td>
                                        <input name="slide-title"
                                         id="slide-title"
                                         class="textbox"
                                         placeholder="Add a title to your image"
                                         value="<%= title %>"
                                         style="width: 300px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="slide-subtitle">Subtitle:</label>
                                    </td>
                                    <td>
                                        <input name="slide-subtitle"
                                         id="slide-subtitle"
                                         class="textbox" 
                                         placeholder="Add a subtitle to your image" 
                                         value="<%= sub_title %>"
                                         style="width:300px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="slide-alt-text">Alt Text:</label>
                                        <span data-toggle="tooltip"
                                            data-placement="right"
                                            data-title="Alt-text describes
                                            what your image is so search
                                            engines can find it.">
                                        </span>
                                    </td>
                                    <td>
                                        <input name="slide-alt-text"
                                         id="slide-alt-text"
                                         class="textbox"
                                         placeholder="Add alt-text to your image"
                                         value="<%= alt_text %>"
                                         style="width:300px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="slide-button-text">Button Text:</label>
                                        <span data-toggle="tooltip"
                                            data-placement="right"
                                            data-title="If no text is
                                            added here, there won’t
                                            be a button displayed on
                                            your image.">
                                        </span>
                                    </td>
                                    <td>
                                        <input name="slide-button-text"
                                         id="slide-button-text"
                                         class="textbox" placeholder="Add text to add a button"
                                         value="<%= button_text %>"
                                         style="width: 300px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="slide-button-url">Button URL:</label>
                                        <span data-toggle="tooltip"
                                            data-placement="right"
                                            data-title="If no URL is added here, there won\'t be a button displayed on your image.">
                                        </span>
                                    </td>
                                    <td>
                                        <input id="slide-button-url" name="slide-button-url"
                                         class="textbox"
                                         placeholder="Add a URL to your button"
                                         value="<%= button_url %>"
                                         style="width:300px;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="default-btn" data-dismiss="modal">Close</button>
                <button type="button" class="default-btn" id="slide-modal-save-btn" data-index="<%= index %>">Save changes</button>
            </div>
        </div>
    </div>
</div>
</script>
';


?>