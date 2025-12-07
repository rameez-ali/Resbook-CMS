(function(w, d, $){

  var MC_REQUEST_URL = 'request/newsletter';
  
  w.initNewsletterSignup = function(selector) {

    var jElm = $(selector);

    if (jElm.length) {

      var msgHodler = jElm.find('.newsletter__msg');
      msgHodler.hide();

      var triggerBtn = jElm.find('#newsletter-btn');

      if (triggerBtn.length) {

        triggerBtn.on('click', function(e){            
        
          e.preventDefault();

          var emailAddress =  $.trim(jElm.find('#newsletter-email').val()),
              msg = '',
              msgType = 'newsletter__warning';

          if (emailAddress) {
            
            var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            
            if( emailRegex.test(emailAddress) ) {
              
              $.post(MC_REQUEST_URL, 'action=sign-up&email='+emailAddress, function(response) {
                
                if (response.msg) {
                  
                  msgHodler.removeAttr('class').addClass('newsletter__msg '+response.type).html(response.msg).show();
                
                }

                if (response.isValid) {
                  setTimeout(function(){
                    msgHodler.removeClass(response.type).html('');
                    jElm.find('#newsletter-email').val('');

                  }, 5000);
                }

                return false;

              }, 'json');
            }
            else {
                msg = 'Invalid email address provided.';
            }
          }
          else {
              msg = 'Your email address is required.';

          }

          if (msg) {
              msgHodler.removeAttr('class').addClass('newsletter__msg '+msgType).html(msg).show();
          }

        });
      }
    }
  };  

  initNewsletterSignup('.newsletter');

  $('#newsletter-email').click(function(){
    $("#newsletter-email").css("opacity", "1");
});

})(window, document, jQuery);