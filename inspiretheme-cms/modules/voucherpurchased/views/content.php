<?php


$tabDetailsContent = '<h3 class="content-heading">VOUCHER DETAILS : '.$itemDeliveryString.' </h3>
  <table border="0" cellspacing="0" cellpadding="7" class="bordered">
    <thead>
      <tr>
          <th width="" height="30">Name</th>          
          <th width="">Email Address</th>
          <th width="">Phone</th>
          <th width="">Voucher Name</th>
          <th width="">Voucher Price</th>
          <th width="">Qty</th>
          <th width="">Purchase Date</th>
          <th width="">Expiry Date</th>
          
      </tr>
      </thead>
      <tbody>
      <tr>
          <td height="30">'.$itemFirstName.' '.$itemLastName.'</td>
          <td>'.$itemEmail.'</td>
          <td>'.$itemPhone.'</td>
          <td style="line-height:18px;">'.$itemVoucherName.'</td>
          <td style="line-height:18px;">'.$itemVoucherPrice.'</td>
          <td style="line-height:18px;">'.$itemVoucherQty.'</td>
          <td style="line-height:18px;">'.$itemPurchaseDate.'</td>
          <td style="line-height:18px;">'.$itemExpiryDate.'</td>
          
      </tr>
    </tbody>      
  </table>

  <h3 class="content-heading">RECIPIENT DETAILS</h3>
  <table border="0" cellspacing="0" cellpadding="7" class="bordered">
    <thead>
      <tr>
          <th width="200" height="30">Name</th>
          <th width="190">Name on voucher</th>
          <th width="100">Amount</th>
          <th width="400">Message</th>
      </tr>
      </thead>
      <tbody>
      <tr>
          <td height="30">'.$itemRecipientName.'</td>
          <td>'.$itemRecipientVoucherName.'</td>
          <td>'.$itemAmount.'</td>
          <td>'.$itemRecipientMessage.'</td>
      </tr>
    </tbody>      
  </table>
  
  <h3 class="content-heading">DELIVERY DETAILS</h3>
  <table border="0" cellspacing="0" cellpadding="7" class="bordered">
    <thead>
      <tr>
          <th width="160" height="30">Delivery Option</th>
          <th width="250">Delivery EMAIL</th>
          <th width="450">Delivery Post/Courier</th>
      </tr>
      </thead>
      <tbody>
      <tr>
          <td height="30">'.$itemDeliveryOption.'</td>
          <td>'.Helper::mailTo($itemDeliveryEmail).'</td>
          <td>'.$itemDeliveryPost.'</td>
      </tr>
    </tbody>      
  </table>
  
  <h3 class="content-heading">PURCHASED DETAILS</h3>
  <table border="0" cellspacing="0" cellpadding="7" class="bordered">
    <thead>
      <tr>
          <th width="150" height="30">TRANSACTION ID</th>
          <th width="200">TRANSACTION RESPONSE</th>
          <th width="150">TOTAL AMOUNT PAID</th>
          <th width="100">SURCHARGE</th>
          
      </tr>
    </thead>
    <tbody>
      <tr>
          <td height="30">'.$itemTransctionId.'</td>
          <td>'.$itemTransctionRes.'</td>
          <td>'.$totalAmount.'</td>
          <td>'.$itemSurcharge.'</td>
         
      </tr>
    </tbody>      
  </table>

 ';
?>