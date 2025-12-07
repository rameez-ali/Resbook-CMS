(function(w, d, $){
 
  w.changeCompBtnState =  function( ) {

    var tcEl    = $('#tc');
    var agEl    = $('#age-limit');
    var hasTcEl = (tcEl.length == 1);
    var hasAgEl = (agEl.length == 1);
    var compBtn = $('#form-submit-btn');
    var enableBtn = false;

    compBtn.addClass('disabled').attr('disabled', 'disabled');

    if( hasTcEl && hasAgEl && tcEl.is(':checked') && agEl.is(':checked') ) {

        enableBtn = true;

    } else if( hasTcEl && !hasAgEl && tcEl.is(':checked') ) {

        enableBtn = true;

    } else if( !hasTcEl && hasAgEl && agEl.is(':checked') ) {

        enableBtn = true;

    }

    if( enableBtn ) {
        compBtn.removeClass('disabled').removeAttr('disabled');
    }
  }

  w.initDateControl = function(field, opts) {

    fieldElm = $('.'+field);

    if(fieldElm.length) {

        fieldElm.each(function(index) {

            var filedId = $(this).attr('id'),
                field   = document.getElementById( filedId );

            $(field).attr({autocomplete: 'off', readonly: true});

            new Pikaday({
                field: field,
                format: 'DD/MM/YYYY',
                minDate: new Date()
            });

        });
    }
  };

  initDateControl('date-control');

  $('.trigger-tc-modal').on('click', function(e){
    e.preventDefault();

    $('#tc-modal').modal('show');

  });

  $('#tc, #age-limit').on('change', changeCompBtnState);

  $('.accept-tc').on('click', function(e){
      e.preventDefault();
      $('#tc').attr({disabled: false, checked: true})
      changeCompBtnState();
  })

})(window, document, jQuery);