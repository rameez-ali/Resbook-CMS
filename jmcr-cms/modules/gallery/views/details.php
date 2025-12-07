<?php
/** View for details tab */

$tabDetailsContent = '<table width="100%" border="0"
  cellspacing="0" cellpadding="4" >
    <tr>
      <td width="170"><label for="label">Name:</label></td>
      <td>
        <input name="label" class="textbox" type="text" id="label" placeholder="Give your gallery a name"
         value="'.$itemName.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td width="170">
        <label for="menu_label">Filter:</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="This filter appears on the gallery page when the checkbox is selected."></span>
      </td>
      <td>
        <input name="menu_label" class="textbox" type="text" id="menu_label"
         placeholder="Add a filter on the gallery page"
         value="'.$menuLabel.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td width="170">
        <label for="show_on_gallery_page">Show on gallery page:</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="Select the checkbox to make this gallery appear on the gallery page."></span>
      </td>
      <td>
        <input name="show_on_gallery_page" type="checkbox" id="show_on_gallery_page" value="'.FLAG_YES.'" 
         '.(($itemShowOnGalleryPage === FLAG_YES) ? ' checked="checked"': '').'/>
      </td>
    </tr>
  </table>';

?>