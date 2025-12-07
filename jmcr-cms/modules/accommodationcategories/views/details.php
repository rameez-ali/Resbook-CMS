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
      <td><label for="currency_code">Currency Code:</label></td>
      <td>
        <input type="text" name="currency_code" id="currency_code" value="'.$itemCurrencyCode.'" style="width:100px;"
        maxlength="20"/>
      </td>
    </tr>
    
    
    <tr>
      <td><label for="is_featured">Iframe Code:</label></td>
      <td><textarea name="iframe_code_accomm"  id="iframe_code_accomm"
        style="width:600px; height:130px;resize:none;">'.$itemIframe_code_accomm.'</textarea>
      </td>
    </tr>
  </table>';

?>