(function(w, d, $) {
  
//   $('#vendor_sales_reference_id').on("cut copy paste",function(e) {
//     e.preventDefault();
//  });

 function numberWithCommas(number) {
  var parts = number.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  return parts.join(".");
}

 $(document).on('click', '#udateContract',function(e) { 
  var productBasePrice = $('#product_price').val().replace(/,/g, '');  
  var rpAmount = parseFloat(productBasePrice * 0.1);
  var totalRPAmount = parseFloat(parseFloat(productBasePrice) + parseFloat(rpAmount));
  var totalRPAmount = totalRPAmount.toFixed(2);
  var totalRPAmount = numberWithCommas(totalRPAmount);
  var currencyShown = $( "#contract_currency1 option:selected" ).text(); 
  if(currencyShown == 'AUD' || currencyShown == 'NZD' ||currencyShown == 'USD' ||currencyShown == 'CAD'){
    var currPay1Symbol = '$';
  }else {
    var currPay1Symbol = '';
  }
  $('.modal-title #popup1_currency').text(currencyShown);
  $('.modal-body #total_baseandrefundamount').text(currPay1Symbol + totalRPAmount);
  $('#updateContractModalPopup').modal('show');

 });

  $(document).on('click', '#createContract',function(e) { 
    
    if( !$('#contract_title').val() || 
    !$('#vendor_sales_reference_id').val() || 
    !$('#product_price').val() ||     
    !$('#customer_first_name').val() || 
    !$('#customer_last_name').val() || 
    !$('#insurance_end_date').val() || 
    $('input[type=radio][name=product_code]:checked').length == 0 ) {
      
      alert('All fields are mandatory.');

    } else if (parseFloat($('#product_price').val()) <= 0 ) {
      alert('Total Price of Booking should be greater than zero.');
    } else {
          
        var prodBasePrice = parseFloat($('#product_price').val());
        var prodBasePrice = prodBasePrice.toFixed(2);
        var prodBasePrice = numberWithCommas(prodBasePrice);

        var rpAmount = parseFloat($('#product_price').val() * 0.1);
        var rpAmount = rpAmount.toFixed(2);        
        var rpAmount = numberWithCommas(rpAmount);

        var totalBaseAmount = parseFloat(parseFloat($('#product_price').val()) + parseFloat(parseFloat($('#product_price').val() * 0.1)));//
        var totalBaseAmount = totalBaseAmount.toFixed(2);
        var totalBaseAmount = numberWithCommas(totalBaseAmount);

        var currencyonCreate = $( "#contract_currency option:selected" ).text(); //get currency
        if(currencyonCreate == 'AUD' || currencyonCreate == 'NZD' ||currencyonCreate == 'USD' ||currencyonCreate == 'CAD'){
          var currSymbol = '$';
        }else {
          var currSymbol = '';
        }

        $('.modal-body #CCProductPrice').text(currSymbol + prodBasePrice);  //not working create popup
        $('.modal-body #CCRPAmount').text(currSymbol + rpAmount);
        $('.modal-body #CCTotalAmount').text(currSymbol + totalBaseAmount);
        $('.modal-body #oncreate_currency').text(currencyonCreate);//show currency
        $('#createContractModalPopup').modal('show');

    }

  });

  $(document).on('click', '#preview_update',function(e) { 
   
    var totalAmount         = $('#total_amount').text();
    var totalCoveredAmount  = $('#total_coveredamount').text();
    var totalCoverageAmount = $('#total_baseandrefundamount').text();
    var addedvalue = $('#addmore_amount').val();

    var currencyShown = $( "#contract_currency1 option:selected" ).text();
    $('#popup2_currency').text(currencyShown);
    if(currencyShown == 'AUD' || currencyShown == 'NZD' ||currencyShown == 'USD' ||currencyShown == 'CAD'){
      var currPay2Symbol = '$';
    }else {
      var currPay2Symbol = '';
    }
    var oldtotal = parseFloat(totalAmount) - parseFloat(totalCoveredAmount);
    

    // //calculation Total Coverage Amount
    var productBasePrice = totalAmount.replace(/,/g, '');
    productBasePrice  =  productBasePrice.replace('$','');    
    var rpAmount = parseFloat(productBasePrice * 0.1);
    
    var totalRPAmount = parseFloat(parseFloat(productBasePrice) + parseFloat(rpAmount));
    var totalRPAmount = totalRPAmount.toFixed(2);
    var totalRPAmount = numberWithCommas(totalRPAmount);
    $('.modal-body #ctotal_baseandrefundamount').text(currPay2Symbol + totalRPAmount);
    ///////

    if(totalCoveredAmount == null){totalCoveredAmount = 0}
      totalCoveredAmount = totalCoveredAmount.replace('$',''); 
      totalCoveredAmount  =  totalCoveredAmount.replace(/,/g, '');

    var totalMaxpaylimit = (parseFloat(parseFloat(productBasePrice) + parseFloat(rpAmount))) - parseFloat(totalCoveredAmount);
    
    if( !$('#addmore_amount').val()) {

      $('#addmore_amount_error').text( "Add Amount" );

    }  else if(totalMaxpaylimit < addedvalue) {
      $('#addmore_amount_error').text( "Amount exceeds " +totalMaxpaylimit + " remaining balance" );
    } else {
      
      $('#addmore_amount_error').text("");
      $('#updateContractModalPopup').modal('hide');
      var prodBasePrice = $('#addmore_amount').val();
      prodBasePrice = prodBasePrice.replace(/,/g, ''); 
      var addMoreAmount       = $('#addmore_amount').attr('value');
      var notes               = $('#addmore_notes').val();
      $('#ctotal_amount').text(totalAmount);
      //$('#ccurrent_coveredamount').text(totalCoveredAmount + addMoreAmount);
      
      // //calculation of new amount Coverage 
      var gtotal = parseFloat(prodBasePrice) + parseFloat(totalCoveredAmount);
      var gtotal = gtotal.toFixed(2);
      var gtotal = numberWithCommas(gtotal);

      var remainingBalance = (parseFloat(parseFloat(productBasePrice) + parseFloat(rpAmount)))- (parseFloat(prodBasePrice) + parseFloat(totalCoveredAmount));
      var remainingBalance = remainingBalance.toFixed(2);
      var remainingBalance = numberWithCommas(remainingBalance);

      prodBasePrice = parseFloat(prodBasePrice);
      prodBasePrice = prodBasePrice.toFixed(2);
      $('#caddmore_amount').text(currPay2Symbol + numberWithCommas(prodBasePrice));
      $('#caddmore_notes').text(notes);
      $('#cnew_amountcovered').text(currPay2Symbol + gtotal);
      $('#cnew_amountcovered').val($('#current_coveredamount').attr('value') + $('#addmore_amount').attr('value'));
      $('#cremaining_balance').text(currPay2Symbol + remainingBalance);     
      $('#updateConfirmContractModalPopup').modal('show');
    }

  });
  $(document).on('click', '.payment-save',function(e) {
    $('.payment-save').addClass('disabled');
   });

})(window, document, jQuery);