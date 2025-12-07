<?php
$voucherSectionContent = '';
$voucherDetailView    = '';
$errorCls             = ' has-error';

global $lastNameErrorMsg, $firstNameErrorMsg, $emailAddressErrorMsg, $nameErrorMsg,
$deliveryEmailErrorMsg, $deliveryAddressErrorMsg, $deliverTypeErrorMsg, $deliveryEmailErrorCls, $deliveryAddressErrorCls, $checkedEmail;

$voucherDetails = DB::fetchAll("SELECT v.`id`,`amount`,pmd.`menu_label`,`photo_path`,`short_description`,`description`
  FROM `voucher` v
  LEFT JOIN `page_meta_data` pmd
  ON (pmd.`id` = v.`page_meta_data_id`)
  WHERE pmd.`status` = 'A'
  AND v.`amount` != ''
  ORDER BY pmd.`rank`");



foreach($voucherDetails as $voucherDetail) {

  $voucherDetailView .= '
  <div class="voucher-list-item col-md-6 col-lg-4">
      <div class="voucher-wrap">
        <img src="'.$voucherDetail['photo_path'].'"  class="voucher-photo" alt="'.basename($voucherDetail['photo_path']).'" />
        <span class="price-box">$<span class="vc-price">'.$voucherDetail['amount'].'</span><small></small></span>
        
        <div class="bottom-content">
          <p class="v-title">'.$voucherDetail['menu_label'].'</p>
          <p class="v-dec">'.$voucherDetail['short_description'].'</p>
          <div class="act-button vc-h-info">
            <p class="productname" id="'.$voucherDetail['id'].'">'.$voucherDetail['menu_label'].'</p>
            <p class="price">'.$voucherDetail['amount'].'</p>
            <a href="#!" class="btn btn--white btn--sm" data-toggle="modal" data-target="#voucher-detail-modal-'.$voucherDetail['id'].'">Read more</a>
            <a href="#!" class="btn btn--sm btn--primary btn--sm btn-add-cart " data-name="vc-'.$voucherDetail['id'].'" data-title="'.$voucherDetail['menu_label'].'" data-price="'.$voucherDetail['amount'].'">ADD TO CART</a>
          </div>
        </div>
      </div>

      <div class="modal fade voucher-detail-modal" id="voucher-detail-modal-'.$voucherDetail['id'].'" tabindex="-1" role="dialog" aria-labelledby="voucher-detail-modalLabel">
      <div class="modal-dialog modal-lg" role="document" id="voucher_detailmodal">
        <div class="modal-content">
          
          <div class="modal-body py-0 ">
              <div class="row">
                <div class="voucher-detail-photo col-lg-5" style="background-image:url('.$voucherDetail['photo_path'].');"></div>
                <div class="col-lg-7">
                  <div class="modal-content-wrapper">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="27.823" height="24.823" viewBox="0 0 27.823 24.823">
                      <g id="Group_2926" data-name="Group 2926" transform="translate(-122.589 -103.589)">
                          <g id="ic-actions-menu" transform="translate(124 105)">
                              <line id="Line_556" data-name="Line 556" x2="25" y2="22" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                              <line id="Line_557" data-name="Line 557" y1="22" x2="25" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                          </g>
                      </g>
                  </svg></button>

                      <h4>'.$voucherDetail['menu_label'].'</h4>
                      <p class="price-box">$'.$voucherDetail['amount'].'<small></small></p>
                      <hr>
                      
                      '.$voucherDetail['description'].'
                     

                      <div class="button-block w-100 vc-h-info text-right ">
                      <p class="productname" id="'.$voucherDetail['id'].'">'.$voucherDetail['menu_label'].'</p>
                      <p class="price">'.$voucherDetail['amount'].'</p>
                        <a href="#!" class="btn btn--primary btn-add-cart" data-name="vc-'.$voucherDetail['id'].'" data-title="'.$voucherDetail['menu_label'].'" data-price="'.$voucherDetail['amount'].'">Add To Cart</a>
                      </div>

                  </div>
                </div>
              </div>
          </div>
        
          
        </div>
      </div>
    </div>


    </div>
  ';
}

$firstNameErrorCls        = isset($firstNameError) ? $errorCls : '';
$nameErrorCls        = isset($nameError) ? $errorCls : '';
$lastNameErrorCls         = isset($lastNameError) ? $errorCls : '';
$emailAddressErrorCls     = isset($emailAddressError) ? $errorCls : '';
$subjectErrorCls          = isset($subjectError) ? $errorCls : '';
$messageErrorCls          = isset($messageError) ? $errorCls : '';
$voucherAmountErrorCls    = isset($voucherAmountError) ? $errorCls : '';
$deliverTypeCls           = isset($deliverTypeError) ? $errorCls : '';
$deliveryAddressCls      = isset($deliveryAddressError) ? $errorCls : '';
$deliveryEmailCls      = isset($deliveryEmailError) ? $errorCls : '';
$termConditionErrorCls      = isset($termConditionError) ? $errorCls : '';
$checkedPost              = '';

if(!empty($deliverType) && $deliverType == 'Email') {
  $checkedEmail = 'checked';
} elseif (!empty($deliverType) && $deliverType == 'Post') {
  $checkedPost = 'checked';
}

$voucherCartView = '

<a href="#!" class="btn btn--primary btn-cart-view">Cart(<span class="total-count"></span>) <i class="fas fa-shopping-cart"></i></a>
<div class="vc-cart-slider">
    
    <div class="vc-cart-slider-wrapper">
        <a class="vc-btn-close"><svg xmlns="http://www.w3.org/2000/svg" width="27.823" height="24.823" viewBox="0 0 27.823 24.823">
        <g id="Group_2926" data-name="Group 2926" transform="translate(-122.589 -103.589)">
            <g id="ic-actions-menu" transform="translate(124 105)">
                <line id="Line_556" data-name="Line 556" x2="25" y2="22" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                <line id="Line_557" data-name="Line 557" y1="22" x2="25" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
            </g>
        </g>
    </svg></a> 
        <h3 class="cart-title">Your Cart</h3>

     
        <div id="carttable">
            <p class="alert alert-info no-vc-msg">Please add voucher in cart.</p>
        </div>

        <table class="show-cart table">
          
        </table>
         <div class="total-cart-wrapper" style="display: none;">Total Amount: $<span class="total-cart">0</span>NZD</div>
        
      <hr>
   
          <div class="d-none">x<span id="itemsquantity">0</span></div>
          <div class="d-none">Total: $<span id="total">0</span>NZD</div>
       

        
      <div class="cart-buttons">  
        
        <button id="checkout" class="btn btn--primary btn-block btn-buy-now">Buy Now</button>
        <button id="emptycart" class="btn btn--ghost btn-block clear-cart">Clear Cart</button>
      </div>

       
    </div>
    <div class="overlap-box"></div>

  </div>
';

$voucherListView = '



<div class="voucher-list row" style="display: none;">
    
    '.$voucherDetailView.'

</div>
';

$voucherManualView = '
<div class="manual-voucher-list" style="display: none;">



    <div class="select-amt-block">

    <a>$<span>'.$voucherAmt.'</span></a>

       
    </div>
    

    <p class="divider-or">OR</p>

    <div class="amt-form">
      <div class="form__group ">
        <div class="input-group">
          <div class="input-group-addon"><i class="fas fa-dollar-sign"></i></div>
          <input type="number" value="" placeholder="Enter your gift amount" id="gift-amount" class="form-control" name="voucher-cust-amount" tabindex="1" min="0">
          <div class="input-group-addon clr-box" style="display: none;"><a class=""><i class="fas fa-times"></i></a></div>
        </div>
      </div>

      <div class="form__group">
        <div class="input-group">
          <div class="input-group-addon"><i class="fas fa-gift"></i></div>
          <input type="text" value="" placeholder="Add a title for your voucher" class="form-control" id="voucher-title" name="voucher-title" tabindex="1" maxlength="40">          
        </div>
        <span class="text-muted"><small style="font-size:11px;">Up to 40 characters (including spaces)<em></em></small></span>
      </div>

      <div class="button-block vc-h-info mnl-amt">
        <p class="productname"></p>
        <p class="price"></p>
     
        <a href="#!" class="btn btn--primary btn-add-cart btn-disable"  data-name="" data-title="" data-price="">Add To Cart</a>
        
      </div>
    </div>

    </div> 
';



$voucherBuyNow = '
<div class="container-flud" id="voucherList2" style="display: none;">
    <div class="container" >
    <h3>Buy your Voucher</h3>
    <label class="text-center text-danger">All the checkout fields are mandatory</label>
   
    

       <form action="'.$voucherPageFullUrl.'" method="post" role="form" class="voucher__form" id="basic-form">
            <div class="row align-items-start">
             <div class="col-md-7 col-lg-8">
            
            <h5>Your Details</h5>
            <div class="row-adjust">
              <div class="row">
                  <div class="col-lg-6 form__group'.$firstNameErrorCls.'">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fas fa-user"></i></div>
                      <input type="text" id="first-name" value="'.$firstName.'" placeholder="First Name" class="form-control" name="first-name" tabindex="1" >
                    </div>
                    '.$firstNameErrorMsg.'
                  </div>
                  <div class="col-lg-6 form__group'.$lastNameErrorCls.'">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fas fa-user"></i></div>
                      <input type="text" id="last-name" value="'.$lastName.'" placeholder="Last Name"  class="form-control" name="last-name" tabindex="2">
                    </div>
                    '.$lastNameErrorMsg.'
                  </div>
                  <div class="col-lg-6 form__group'.$emailAddressErrorCls.'">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fas fa-envelope"></i></div>
                      <input type="email" id="email-address" value="'.$emailAddress.'" placeholder="Email Address" 
                        class="form-control" name="email-address" tabindex="3">
                    </div>
                      '.$emailAddressErrorMsg.'
                  </div>
                  <div class="col-lg-6 form__group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fas fa-phone"></i></div>
                      <input type="number" id="phone-number" class="form-control" value="'.$phoneNumber.'" name="phone-number" placeholder="Phone Number" 
                      tabindex="4">
                    </div>
                  </div>
              </div>
            </div>
            
            <h5>Recipient’s Details</h5>
            <div class="row-adjust">
              <div class="row">
                  <div class="col-lg-6 form__group '.$nameErrorCls.'">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fas fa-user"></i></div>
                      <input id="name" class="form-control" placeholder="Name" value="'.$name.'" name="name" tabindex="5">
                    </div>
                    '.$nameErrorMsg.'
                  </div>
                  <div class="col-lg-6 form__group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fas fa-gift"></i></div>
                      <input id="voucher_name" class="form-control" placeholder="Name on Voucher" value="'.$voucherName.'" name="voucher_name" tabindex="5">
                    </div>
                  </div>
                  <div class="col-12 form__group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fas fa-quote-left"></i></div>
                      <textarea name="message" id="message" placeholder="Message on Voucher" class="form-control" tabindex="6" rows="6">'.$message.'</textarea>
                    </div>
                  </div>
              </div>
            </div>

            <h5>Delivery Details</h5>
            <div class="row-adjust">
                <div class="row">
                    <p><strong>How would you like your voucher delivered?</strong></p>
                    <div class="form__group'.$deliveryEmailErrorCls.''.$deliveryAddressErrorCls.' '.$deliverTypeCls.' deliverTypeCls">

                    <input type="radio" name="deliver-type" value="Email" '.$checkedEmail.'> <label class="form__label">Email</label>
                    <p class="divider-or">OR</p>
                    <input type="radio" name="deliver-type" value="Post" '.$checkedPost.'> <label class="form__label">Post/Courier</label>

                      <div class="input-group email-group">
                        <div class="input-group-addon"><i class="fas fa-envelope"></i></div>
                        <input type="email" id="delivery-email" value="'.$deliveryEmail.'" placeholder="Enter recipient’s email" 
                          class="form-control" name="delivery-email" tabindex="3">
                      </div>

                      <div class="input-group post-group">
                        <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                        <input type="text" id="delivery-address" value="'.$deliveryAddress.'" placeholder="Enter recipient’s address" 
                          class="form-control" name="delivery-address" tabindex="3">
                      </div>
                      
                      '.isset($deliveryEmailErrorMsg).'
                      '.isset($deliveryAddressErrorMsg).'
                      '.isset($deliverTypeErrorMsg).'
                    </div>
                </div>
            </div>

          </div>

          <div class="col-md-5 col-lg-4 vc-sidebar">
            
              <div class="vc-sidebar-wrap">
                <h5>Your Purchase</h5>
                <div class="vc-cart-item-box">

                <table class="show-cart table">
          
              </table>
                
                </div>

                


                <div class="form__group '.$termConditionErrorCls.'">
                  <label class="form__label mt-3 surcharge">'.$voucherSurchargeText.'</label><br/>
                  <div class="d-flex mt-2">
                    <input type="checkbox" name="term-condition" id="vc-privacy"  />
                    <label class="form__label termscondition" for="vc-privacy" >I have read and agree to the <a href="#terms" data-toggle="modal" data-target="#terms">Terms and Conditions</a></label>
                  </div>
                  '.$termConditionErrorMsg.'
                </div>
                <hr>
                <div class="w-100 d-flex total_details justify-content-between">
                  <span>Total</span>
                  <span>$<span class="total-cart"></span><small>NZD</small></span>

                  <input type="hidden" id="voucher-cust-amount" value="'.$voucherCustAmount.'"  name="voucher-cust-amount" tabindex="1">
                </div>
                <div class="form__group">
                  <button type="submit" class="btn btn--primary btn--form btn-disable" name="continue" value="1" tabindex="8">CONFIRM & PAY</button>
                  <a href="#!" class="btn btn--ghost btn-block back-to-vc">Back</a>
                </div>
        
        
                 
            </div>

          </div>
      </div>

      <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="modal-label">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="modal-label">Terms and Conditions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                '.$voucherTerms.'
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn--primary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
    </div>

      </form>
    </div>

</div>
';

$voucherFormView = '  


<div class="container-flud " id="voucherList1" >
    <div class="container">
    
      <h3 class="text-center voucher_subtitle">Choose your Preference</h3>

      <div class="choose-voucher-tab">

      <div class="choose-voucher-item">
        <a class="ch-vh"><i class="fas fa-gift"></i> <span>Choose a voucher</span></a>
        <p>Choose one of the vouchers we’ve created for you!</p>
      </div>
        
        <span>OR</span> 
        
        <div class="choose-voucher-item">
        <a class="ch-amt"><i class="fas fa-dollar-sign"></i> <span>Enter a Gift Amount</span></a>
        <p>Select a custom amount for your voucher</p>
      </div>
        
      </div>

      <div id="alerts"></div>
      '.$voucherListView.'
      '.$voucherManualView.'
    </div>
</div>

'.$voucherBuyNow.'

<section class="section">
  <div class="container">
    <div class="row justify-content-center" style="background: #F5F5F5;">
      <div class="col-12 col-md-8 col-lg-8">
        '.$voucherCartView.'
        '.$voucherFormView.'    
      </div>                    
    </div>
  </div>
</section>';

