<?php
/** Settings tab content */

/** generate parent page list */
require_once __DIR__ . '/generate_parent_list.php';

/** Filter Category Selection */
$selectPreFilterCatView = '';
$filterPreSelCatSQL = 'SELECT ac.`id` AS ind, 
pmd.`name` AS label
FROM `accommodation_category` ac
    LEFT JOIN `page_meta_data` pmd
    ON(ac.`page_meta_data_id` = pmd.`id`)
WHERE pmd.`status` = "A"
ORDER BY pmd.`name`';

$selectPreFilterCatView = '<select name="prefilter_catid" id="prefilter_catid" 
   style="width:250px">
    <option value="">Please Select Pre Filter Category</option>
    '.createItemList($filterPreSelCatSQL, $itemPreFilterCatId).'
  </select>';

/** slideshow dropdown */
$selectSlideshowView = '';
$selectPageSlideshowView = '';

$SlideshowQuery = "SELECT `id` AS ind, 
    `name` AS label
  FROM `hero_banner`
  WHERE `name` != ''
  ORDER BY `name`";

$selectSlideshowView = '<select name="slideshow_id" id="slideshow_id" 
   style="width:250px">
    <option value="">Please Select Hero Banner</option>
    '.createItemList($SlideshowQuery, $pageSlideshowId).'
  </select>';

  $selectPageSlideshowView = '<select name="slideshow_page_id" id="slideshow_page_id" 
   style="width:250px">
    <option value="">Please Select Page Hero Banner</option>
    '.createItemList($SlideshowQuery, $slideshowPageId).'
  </select>';
/** gallery dropdown */

$galleryQuery = "SELECT `id` AS ind, 
    `name` AS label
  FROM `gallery`
  WHERE `name` != ''
  ORDER BY `name`";

$selectGalleryView = '<select name="gallery_id" id="gallery_id" 
   style="width:250px">
    <option value="">Please Select Gallery</option>
    '.createItemList($galleryQuery, $pageGalleryId).'
  </select>';

/** Template dropdown */
$selectTemplateView = getTemplateList($pageTemplateId);
    
if ($id == 1) { 

  $pageUrlView = '<td></td>
    <td>
      <input name="url" type="hidden" id="page_url" 
       value="'.$pageUrl.'" data-cvalue="'.$pageUrl.'" data-type="gp">
      <span id="page_url_msg" class="text-danger"></span>
    </td>';

} else { 
    
  $pageUrl = rtrim((string) $pageUrl, '/');

  $pageUrlView = '<td>
      <label for="page_url">URL</label>
      <span data-toggle="tooltip" data-placement="right" 
         data-title="The URL is automatically created based on your CMS name.
          If you need to edit this URL, please ensure that you use lowercase letters
           and separate words using hyphens (-) instead of spaces. "></span>
    </td>
    <td>
      <input name="url" type="text" id="page_url" 
       value="'.$pageUrl.'" data-cvalue="'.$pageUrl.'"
       data-type="gp" style="width:250px;" class="item-url" />
      <span id="page_url_msg" style="margin-left:10px;"
       class="text-danger"></span>
    </td>';

}    

/** Form dropdown */
$sql = "SELECT `id` AS ind, `name` AS label
  FROM `form`
  WHERE `status` = 'A'
  AND `xml_data` != ''
  ORDER BY `name`";

  $formsDropdown = '<select name="form_id" id="form_id" style="width:250px"><option value="">-- select --</option>';
  $formsDropdown .= createItemList($sql, $formId);
  $formsDropdown .= '</select>';

$tabSettingsContent = '<table width="100%" border="0"
   cellspacing="0" cellpadding="6">
    <tr>'.$pageUrlView.'</tr>
    <tr>
      <td width="170">
        <label for="name">CMS Label:</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="The name of your pages as it appears in the CMS."></span>
      </td>
      <td>
        <input type="text" name="name" id="name"
         value="'.$pageName.'"style="width:250px;"/></td>
    </tr>
    <tr>
      <td>
        <label for="menu_label">Menu Label:</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="The name of your pages as it appears in your website navigation."></span>
      </td>
      <td>
        <input type="text" name="menu_label" id="menu_label"
         value="'.$pageMenuLabel.'" style="width:250px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="footer_menu">Footer Menu:</label>
      </td>
      <td>
        <input type="text" name="footer_menu" id="footer_menu"
         value="'.$pageFooterMenu.'" style="width:250px;" />
      </td>
    </tr>
    <tr>'.$parentPageList.'</tr>
    <tr>
      <td>
        <label for="slideshow_id">Hero Banner:</label>
      </td>
      <td>'.$selectSlideshowView.'</td>
    </tr>
    <tr>
    <td>
      <label for="slideshow_page_id">Page Banner:</label>
    </td>
    <td>'.$selectPageSlideshowView.'</td>
    </tr>
    <tr>
      <td>
        <label for="gallery_id">Gallery:</label>
      </td>
      <td>'.$selectGalleryView.'</td>
    </tr>
    <tr>
    <td>
      <label for="form_id">Form:</label>
    </td>
    <td>'.$formsDropdown.'</td>
  </tr>
    <tr>
      <td>
        <label for="template_id">Template:</label>
      </td>
      <td>'.$selectTemplateView.'</td>
    </tr>
    <tr>
    <td>
      <label for="external_url">External Url:</label>
    </td>      
    <td><input type="text" name="external_url" id="external_url"
       value="'.$pageExternalUrl.'" style="width:250px;" />
       </td>
    </tr>
    <tr>
      <td>
        <label for="prefilter_catid">Filter Category Selection:</label>
      </td>
      <td>'.$selectPreFilterCatView.'</td>
    </tr>
  </table>';

?>