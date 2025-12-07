<?php

/** Accommodation Module - Accommodation Details Tab */

$tabDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td><label for="from_price">From Price & Caption:</label></td>
      <td>
        <input type="text" name="from_price" id="from_price" value="'.$itemFromPrice.'" style="width:100px;"/>
        <input type="text" name="from_price_caption" id="from_price_caption" value="'.$itemFromPriceCaption.'"
        style="width:250px;" maxlength="50"/>
      </td>
    </tr>
    <tr>
    <td><label for="show_poa">Show POA:</label></td>
    <td>
        <input name="show_poa" type="checkbox" id="show_poa" value="'.FLAG_YES.'" 
         '.(($itemShowPOA === FLAG_YES) ? ' checked="checked"' : '').'/>
      </td>
    </tr>
    <tr>
      <td><label for="currency_code">Currency Code:</label></td>
      <td>
        <input type="text" name="currency_code" id="currency_code" value="'.$itemCurrencyCode.'" style="width:100px;"
        maxlength="20"/>
      </td>
    </tr>
    <tr>
      <td width="180"><label for="guests">Max Guests:</label></td>
      <td>
        <input type="number" name="guests" id="guests" value="'.$itemGuests.'" 
         style="width:100px;" maxlength="2" min="1"/>
      </td>
    </tr>
    <tr>
      <td><label for="beds">No of Beds:</label></td>
      <td>
        <input type="number" name="beds" id="beds" value="'.$itemBeds.'" style="width:100px;" maxlength="2" min="1"/>
      </td>
    </tr>
    <tr>
      <td><label for="bathrooms">No of Bathrooms:</label></td>
      <td>
        <input type="number" name="bathrooms" id="bathrooms" value="'.$itemBathrooms.'" style="width:100px;" maxlength="2" min="1"/>
      </td>
    </tr>
    <tr>
      <td><label for="room_size">Room Size:</label></td>
      <td>
        <input type="number" name="room_size" id="room_size" value="'.$itemRoomsize.'" 
         style="width:100px;" maxlength="3" min="1"/> (In "square meters") 
      </td>
    </tr>
    <tr>
    <td><label for="room_resbook_id">Resbook Room Id:</label></td>
    <td>
      <input type="text" name="room_resbook_id" id="room_resbook_id" value="'.$itemRoomResbookID.'"
      style="width:100px;" maxlength="50"/>
    </td>
  </tr>
    <tr>
      <td valign="top"><label for="button_text">Button Label:</label></td>
      <td>
        <input name="button_text" type="text" value="'.$itemButtonText.'" style="width:356px;" id="button_text" 
         maxlength="15">
        <p class="form-field-note">
         (Leave empty to have a default button text to "More") 
        </p>
      </td>
    </tr>
    <tr>
    <td><label for="is_featured">Is Featured:</label></td>
    <td>
        <input name="is_featured" type="checkbox" id="is_featured" value="'.FLAG_YES.'" 
         '.(($itemIsFeatured === FLAG_YES) ? ' checked="checked"' : '').'/>
      </td>
  </tr>
  </table>';

?>