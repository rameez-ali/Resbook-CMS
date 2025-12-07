(function(w, d, $){

  // DEFINE GLOBAL FUNCTIONS, VARIABLES & CONSTANTS

  /**
   * @param string id, HTML attribute id of element
   *   
   * @return void
   */

  w.openCKFileBrowser = function(id) {

    var elm = document.getElementById(id);

    if (!elm) return false;

    CKFinder.modal({
      skin: 'jquery-mobile',
      chooseFiles: true,
      width: 1200,
      height: 700,
      onInit: function(finder) {
        finder.on('files:choose', function(evt) {
          var file = evt.data.files.first();
          elm.value = file.getUrl();
          $(elm).trigger('change');
        });

        finder.on('file:choose:resizedImage', function(evt) {
          elm.value = evt.data.resizedUrl;
          $(elm).trigger('change');
        });
      }
    });
  }




  // -------------------- End Global Methods ----------------------------

  function initNavFilter() {
    jQuery.expr[':'].Contains = function(a, i, m) { 
      return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0; 
    };

    $('#filter-nav').on('keyup change', function(){
      var self = $(this),
      value = self.val();
      if (value) {
        $('.main-nav ul li').hide();
        $('.main-nav ul li:Contains('+value+')').show();
        $('#search-btn').addClass('searching');
        $('#search-btn i').removeClass('fa-search').addClass('fa-times');
      } else {
        $('.main-nav ul li').show();
        $('#search-btn').removeClass('searching');
        $('#search-btn i').removeClass('fa-times').addClass('fa-search');
      }
    });

    $('#search-btn').on('click', function(){
      var self = $(this);
      boolCls = 'searching';
      if (self.hasClass(boolCls)) {
        $('#filter-nav').val('');
        $('.main-nav ul li').show();
        $('#search-btn').removeClass('searching');
        $('#search-btn i').removeClass('fa-times').addClass('fa-search');
      }
    });
  }

  function highlightSelectedRow() {
    $('.checkall').on('change', function(){
      var self = $(this),
          isChecked = self.is(':checked');

      if (isChecked) {
        self.parents('tr').addClass('selected');
      } else {
        self.parents('tr').removeClass('selected');
      }
    });
  }

  function checkCharLen(sel) {
    $(sel).on('keyup', function(){
      var self = $(this),
          maxChars = parseInt(self.prop('maxlength')),
          currentChars = parseInt(self.val().length);
      
      self.siblings('span.text-muted').find('em').text(' - '+currentChars+' character'+((currentChars > 1) ? 's' : '')+' typed');
      
    }).trigger('keyup');
  }

  function validateUrl() {
    $('.item-url').keyup(function(e){
      var val = $(this).val();
      var type = $(this).data('type');
      var pid  = $('#page_parentid').val();

      var params = 'action=check-url';
          params += '&url='+val;
          params += '&currUrl='+$(this).data('cvalue');
          params += '&type='+type;
          params += '&pid='+pid;

      $.post(jsVars.baseUrl+'/ajax/service.php',params,function(data){
        var message     = data.message;
        var valid       = data.valid;

        if (!valid) {
          $('#page_url_msg').html(message);
          $('#pg-save').removeAttr('onclick').css({'opacity':0.5});
          $('#pg-save').unbind('click');
        } else {
          $('#page_url_msg').html('');
          $('#pg-save').bind('click', function(){
            submitForm('save', 1);
          });
          $('#pg-save').css({'opacity':1});
        }
      }, 'json');
    });
  
    $('#page_parentid').on('change',function(){
      $('.item-url').trigger('keyup');
    });
  }

  function highlightSelected() {

    $(d).on('change', '.selection-box .do-sel', function(){

      var self          = $(this),
        grandParent     = self.parents('.selection-box');
        parent          = self.parents('li'),
        checkedSiblings = grandParent.find('.do-sel:checked');

      if (self.is(':checked')) {
        parent.addClass('isel');
      } else {
        parent.removeClass('isel');
      }

      if(checkedSiblings.length == 1) {
        if(checkedSiblings.find('.main-sel:checked').length == 0) {
          checkedSiblings.first().parents('.isel').find('.main-sel').prop('checked', true);
        }
      } else if( checkedSiblings.length == 0 ) {
        grandParent.find('.main-sel').prop('checked', false);
      }

    });
  }

  function animateMessageBox() {
    if ($('.alert.page').length) {
      setTimeout(function(){
        $('.alert.page').fadeOut(400, function(){
          $(this).remove();
        });
      }, 10000);
    }
  }
  
  function init() {

    initNavFilter();
    checkCharLen('.check-max');
    validateUrl();
    animateMessageBox();
    highlightSelected();
    highlightSelectedRow();
  }


  $(window).on('load', init);


})(window, document, jQuery);