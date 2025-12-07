$(document).ready(function() {
  // $("#basic-form").validate();

  if($('.show-cart tr').length > 0) {
          
    $('.no-vc-msg').hide();
    $('.total-cart-wrapper').show();
    $('.btn-buy-now').removeClass('btn-disable');
  } else {

    $('.no-vc-msg').show();
    $('.total-cart-wrapper').hide();
    $('.btn-buy-now').addClass('btn-disable');
    

  }

});

function ManualAmount() {

   var gamtval = $('#gift-amount').val();
   var gtitelval = $('#voucher-title').val();

    if( gamtval === '') {

        //alert('Add Voucher Amount');

    } else if ( gtitelval === '') {

       // alert('Add Voucher Name');
       
    } else {
        var rndInt =  Math.floor((Math.random() * 115490) + 1);
        var vcName = $('#voucher-title').val();
        var vcAmt = $('#gift-amount').val();
        
      
        $(".mnl-amt .btn-add-cart").attr('data-name', 'vc-'+rndInt).attr('data-title',vcName).attr('data-price',vcAmt);
        $('.btn-add-cart').removeClass('btn-disable');
    }
} 

    $(".choose-voucher-item a").click(function () {
		//$(this).siblings().removeClass("active");
        $(this).parent().siblings().find("a").removeClass("active");
		$(this).toggleClass("active");
	});

    $(".ch-vh").click(function () {
		$(".voucher-list").toggle();
		$(".manual-voucher-list").hide();
	});

    $(".ch-amt").click(function () {
		$(".voucher-list").hide();
		$(".manual-voucher-list").toggle();
	});

    $(document.body).on('click', '.select-amt-block a' ,function(){
   // $(".select-amt-block a").click(function () {
		$(this).siblings().removeClass("active");
		$(this).toggleClass("active");
		$("#gift-amount").val($(this).children('span').text()).prop('disabled', true);
		$('.clr-box').show();

        ManualAmount();
	});

	$(".clr-box a").click(function () {

        $('.select-amt-block a').removeClass("active");
        $("#gift-amount").val('').prop('disabled', false);
        $(this).parent().hide();
        $(".mnl-amt .btn-add-cart").attr('data-name','').attr('data-title','').attr('data-price','');
        $('.btn-add-cart').addClass('btn-disable');
        
	});


	$(".vc-btn-close").click(function () {
		$(".vc-cart-slider").removeClass("vc-cart-show");
	});

	//$(".clear-cart-item").click(function () {
	$(document.body).on('click', '.clear-cart-item' ,function(){
		$(this).closest('.vc-cart-item').remove();
	});

	$(".btn-add-cart").click(function (e) {
	//$(document.body).on('click', '.btn-add-cart' ,function(e){
            
       $(".vc-cart-slider").addClass('vc-cart-show');			
			$('.no-vc-msg').hide();
      $('.total-cart-wrapper').show();
      $('.btn-buy-now').removeClass('btn-disable');
      $(".voucher-detail-modal").modal('hide');

	});

  $(".btn-cart-view").click(function (e) {
    //$(document.body).on('click', '.btn-add-cart' ,function(e){
              
         $(".vc-cart-slider").toggleClass('vc-cart-show');

         if($('.show-cart tr').length > 0) {
          
          $('.no-vc-msg').hide();
          $('.total-cart-wrapper').show();
          $('.btn-buy-now').removeClass('btn-disable');
        } else {
      
          $('.no-vc-msg').show();
          $('.total-cart-wrapper').hide();
          $('.btn-buy-now').addClass('btn-disable');
          
      
        }
   
    });

    

	$(".btn-buy-now").click(function () {
        
        $("#voucherList1").hide();
        $(".vc-cart-slider").removeClass("vc-cart-show");
        $("#voucherList2").show();
        var voucherPrice = $('.vc-sidebar .total-cart').text();
        $(".vc-total-amt").text(voucherPrice);
        //$('#voucher-cust-amount').val(voucherPrice);
	});

  $(".back-to-vc").click(function () {
		$("#voucherList1").show();
		$("#voucherList2").hide();
      
	});

  


    $(document).ready(function(){

        $( "#voucher-title" ).keypress(function() {
            ManualAmount(); 
        });

        $( "#gift-amount" ).keypress(function() {
            ManualAmount(); 
        });

        $("#gift-amount").keypress(function(event) {
          if ( event.which == 45 || event.which == 189 ) {
            event.preventDefault();
           }
        });        

        $("#voucher-title").focusout(function(){
            ManualAmount(); 
        });

        $("#gift-amount").focusout(function(){
            ManualAmount();
        });

    
        
        $(".select-amt-block").html(function(_, html) {
            return  html.replace(/(,)/g, '</span></a><a>$<span>')
        });
        

     

    // Form Validation Start        
        $("#vc-privacy").click(function(e) {

              var first_name = $('#first-name').val();
              var last_name = $('#last-name').val();
              var emailv = $('#email-address').val();
              var b_phone = $('#phone-number').val();
              var v_client = $('#name').val();
              var v_name = $('#voucher_name').val();
              var v_message = $('#message').val();
              var d_email = $('#delivery-email').val();
              var d_adress = $('#delivery-address').val();
            
              $(".error").remove();
          
              if (first_name.length < 1) {
                $('#first-name').parent().after('<p class="error text-danger">This field is required</p>');
              }else {
                
                var regEx = /^[a-zA-Z\_]+$/;
                var validFname = regEx.test(first_name);                
                if(!validFname){
                  $('#first-name').parent().after('<p class="error text-danger">Enter valid First Name</p>');
                } 
              }
              if (last_name.length < 1) {
                $('#last-name').parent().after('<p class="error text-danger">This field is required</p>');
              }else {
                
                var regEx = /^[a-zA-Z\_]+$/;
                var validLname = regEx.test(last_name);                
                if(!validLname){
                  $('#last-name').parent().after('<p class="error text-danger">Enter valid Last Name</p>');
                } 
              }
              if (b_phone.length < 1) {
                $('#phone-number').parent().after('<p class="error text-danger">This field is required</p>');
              }else {                
                if(b_phone < 999999){
                  $('#phone-number').parent().after('<p class="error text-danger">Enter a  Valid phone number</p>');
                }                  
              }
              if (v_client.length < 1) {
                $('#name').parent().after('<p class="error text-danger">This field is required</p>');
              }
              if (v_name.length < 1) {
                $('#voucher_name').parent().after('<p class="error text-danger">This field is required</p>');
              }
              if (v_message.length < 1) {
                $('#message').parent().after('<p class="error text-danger">This field is required</p>');
              }
            
              if (emailv.length < 1) {
                $('#email-address').parent().after('<p class="error text-danger">This field is required</p>');
              } else {
                var regEx =  /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                var validEmail = regEx.test(emailv);
                if (!validEmail) {
                  $('#email-address').parent().after('<p class="error text-danger">Enter a valid email</p>');
                }
              }



              if (d_adress.length == '' && d_email.length == '') {

                $('.deliverTypeCls').parent().after('<p class="error text-danger">This field is required</p>');
                
              } else if(d_email.length > 1){

                  var regEx =  /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                  var validEmail = regEx.test(d_email);
                  if (!validEmail) {
                    $('.deliverTypeCls').parent().after('<p class="error text-danger">Enter a valid email</p>');
                  }
              
              }  else if (d_adress.length < 1) {
                $('.deliverTypeCls').parent().after('<p class="error text-danger">This field is required</p>');
              }

             
          
            
              if ($(".error").length){
               
                $('.btn--form').addClass('btn-disable');
                $("#vc-privacy").prop('checked', false);

              } else {

                  if ($(this).is(":checked")) {
                      $('.btn--form').removeClass('btn-disable');
                  } else {
                      $('.btn--form').addClass('btn-disable');
                  }

              }
          
      

        });

        // Form Validation End

        if($("#success-clearcart").length == 1) {
          shoppingCart.clearCart();
          $('.no-vc-msg').show();
          $('.btn-buy-now').addClass('btn-disable');
          displayCart();
        }
    });
   
    


    



    // ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];
    
    // Constructor
    function Item(name, price, count, title) {
      this.name = name;
      this.price = price;
      this.count = count;
      this.title = title;
    }
    
    // Save cart
    function saveCart() {
      sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }
    
      // Load cart
    function loadCart() {
      cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }
    if (sessionStorage.getItem("shoppingCart") != null) {
      loadCart();
      $('.total-cart-wrapper').show();
      $('.btn-buy-now').removeClass('btn-disable');
    }
    
  
    // =============================
  // Public methods and propeties
  // =============================
  var obj = {};
  
  // Add to cart
  obj.addItemToCart = function(name, price, count, title) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart[item].count ++;
        saveCart();
        return;
      }
    }
    var item = new Item(name, price, count, title);
    cart.push(item);

    saveCart();
  }
  // Set count from item
  obj.setCountForItem = function(name, count) {
    for(var i in cart) {
      if (cart[i].name === name) {
        cart[i].count = count;
        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function(name) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart[item].count --;
          if(cart[item].count === 0) {
            cart.splice(item, 1);
          }
          break;
        }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function(name) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function() {
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function() {
    var totalCount = 0;
    for(var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function() {
    var totalCart = 0;
    for(var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = {};
      for(p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();
  
  
  // *****************************************
  // Triggers / Events
  // ***************************************** 
  // Add item

 
 
  
  //$('.btn-add-cart').click(function(event) {
  //  $(".btn-add-cart").on('click',function(event) {
  $(document).on('click', '.btn-add-cart', function(event){

    if($('.show-cart tr').length > 0) {
      
      $('.total-cart-wrapper').show();
      $('.no-vc-msg').hide();
      $('.btn-buy-now').removeClass('btn-disable');

      if($('.full-cart-msg').length === 0) {
        $( "#carttable" ).after( "<p class='full-cart-msg text-danger'>Your cart is full. Only one voucher can be purchased at a time.</p>" );
      }
     // alert('Your cart is full. Only one voucher can be purchased at a time.');
    }else{
      
      event.preventDefault();
      var name = $(this).attr('data-name');
      var price = Number($(this).attr('data-price'));
      var title = $(this).attr('data-title');
     // console.log(name);
      shoppingCart.addItemToCart(name, price, 1, title);
      displayCart();

    }
    
     
      
      
  });
    
  
  // Clear items
  $('.clear-cart').click(function() {
    shoppingCart.clearCart();
    $('.full-cart-msg').remove();
    $('.total-cart-wrapper').hide();
    $('.no-vc-msg').show();
    $('.btn-buy-now').addClass('btn-disable');
    displayCart();
  });

  if($("#success-clearcart").length == 1) {
    shoppingCart.clearCart();
    $('.full-cart-msg').remove();
    $('.total-cart-wrapper').hide();
    $('.no-vc-msg').show();
    $('.btn-buy-now').addClass('btn-disable');
    displayCart();
  }
  
  function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for(var i in cartArray) {
      output += "<tr>"
        + "<td class='pl-0'>" + cartArray[i].title + "<input type='hidden' name='vci-title-"+[i]+"' value='"+ cartArray[i].title +"' /><br><a class='delete-item' data-name=" + cartArray[i].name + ">Remove</a></td>" 
       // + "<td>(" + cartArray[i].price + ")</td>"
 
       
    //  + "<td>" + cartArray[i].total + "</td>" 
    //    + " = " 
        + "<td class='text-right pr-0'>" + cartArray[i].total + "<input type='hidden' name='vci-price-"+[i]+"' value='"+ cartArray[i].total +"' />"
       // + "<div class='input-group'><a class='minus-item input-group-addon' data-name=" + cartArray[i].name + ">-</a><input type='hidden' name='vci-qty-"+[i]+"' value='"+ cartArray[i].count +"' /><span data-name='" + cartArray[i].name + "'>" + cartArray[i].count + "</span><a class='plus-item  input-group-addon' data-name=" + cartArray[i].name + ">+</a></div>"
        +"</td>" 
        +  "</tr>";
    }
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('#voucher-cust-amount').val(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
  }
  
  
  // Delete item button

  $('.show-cart').on("click", ".delete-item", function(event) {
    var name = $(this).data('name');
    $('.full-cart-msg').remove();
    shoppingCart.removeItemFromCartAll(name);
    $('.total-cart-wrapper').hide();
    $('.no-vc-msg').show();
    $('.btn-buy-now').addClass('btn-disable');
    displayCart();
  })


// -1
$('.show-cart').on("click", ".minus-item", function(event) {
  var name = $(this).data('name');
  shoppingCart.removeItemFromCart(name);
  displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function(event) {
  var name = $(this).data('name')
  shoppingCart.addItemToCart(name);
  displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function(event) {
   var name = $(this).data('name');
   var count = Number($(this).val());
    shoppingCart.setCountForItem(name, count);
    displayCart();
});

displayCart();




	  