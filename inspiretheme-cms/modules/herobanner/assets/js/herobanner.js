(function(w, d, $) {

  var REQUEST_URI = jsVars.baseUrl+'modules/herobanner/ajax/herobanner.php';

  var _slideTmpl = _.template($('#slide-tmpl').html());
  var $slideContainer = $('.slideshow-wrapper .sortable');
  var slideModal;

  function getSlides() {
    var params = 'action=get-slides';
        params += '&id='+$('#hero-banner-id').val();

    $.get(REQUEST_URI, params, getSlidesView, 'json');
  }

  function getSlidesView(data) {
    var compiledView = '';
    
    _.each(data, function(slide, i){
      compiledView += _slideTmpl({
        slide: slide, 
        isHidden: false,
        i: i
      });
    });

    $slideContainer.html(compiledView);
    $slideContainer.sortable('refresh');
    toggleAddSlideButton();

  }

  function enableSorting() {
    $slideContainer.sortable({
      placeholder: "sortable__item",
      handle: '.sortable__item-handler',
      tolerance: 'pointer',
      connectWith: $slideContainer,
      update: function(event, ui) {

        var $slides =  $('.sortable__item');

        $slides.each(function(i, slide){

          var $slide = $(slide);
          var rank = (i+1);

          $slide.find('.sortable__item-title').text('Slide '+rank);
          $slide.find('.slide-rank').val(rank);
        });
      }
    });
  }

  
  function setImage(el, parentEl, callback) {
    $(d).on('change', el, function(){
      var $this = $(this);
      var val = $this.val();
      var index = $this.parents(parentEl).find('.slide-index').val();

      $this.parents(parentEl).css('background-image', 'url(' + val + ')').addClass('selected');

      if (typeof callback === 'function') {
        callback.call(null, index, val);
      }
    });
  }

  function launchModal(index) {
    index = parseInt(index);

    if (isNaN(index)) return false;

    var modalSel = '#modal-slide-details';
    var _modalTmpl = _.template($('#slide-modal-tmpl').html());
    var params = 'action=get-slide-data';
        params += '&index=' + index;

    $.get(REQUEST_URI, params, function(data){

      if (data) {
        var compiledModalView = _modalTmpl(data);

        $('body').append(compiledModalView);

        slideModal = $(modalSel).on('hidden.bs.modal', function(){
          removeTempData();
          $(modalSel).remove();
        }).modal({
          show: true,
          backdrop: 'static'
        })
      }

    }, 'json');
  }

  function toggleAddSlideButton() {
    var block = 'add-btn';
    var toggleBlock = 'hidden';
    var $el = $('.'+block);
    var totalSlidesWithImg = $('.sortable__image-wrap.selected').size();

    if (totalSlidesWithImg > 5 && totalSlidesWithImg < 21) {
      $el.removeClass(toggleBlock);
    } else {
      $el.addClass(toggleBlock);
    }

  }

  // Action methods

  function addSlide() {
    $(d).on('click', '.add-btn', function(e){
      e.preventDefault();

      $.post(REQUEST_URI, 'action=add-new-slide', function(response){
        if (response.isValid) {
          var compiledView = _slideTmpl({
            slide: response.slideData, 
            i: response.index,
            isHidden: true
          });

          $slideContainer.append(compiledView);
          $slideContainer.sortable('refresh');
          launchModal(response.index);
        }
      }, 'json');
    });
  }

  function addSlideImg(index, imgPath) {
    
    if (index) {
      var params = 'action=add-slide';
          params += '&index='+index;
          params += '&img-src='+imgPath;

      $.post(REQUEST_URI, params, function(response){
        if (response.isValid) {
          launchModal(index);
          toggleAddSlideButton();
        }
      }, 'json');
    }

  }

  function editSlideDetails() {
    $(d).on('click', '.sortable__edit-btn', function(e){
      e.preventDefault();

      var $this = $(this);
      var index = $this.data('edit-index');
      
      launchModal(index);
    });
  }

  function removeSlide() {
    $(d).on('click', '.sortable__remove-btn', function(e){
      e.preventDefault();
      var $this = $(this);
      var $parent = $this.parents('.sortable__item');
      var index = $(this).data('delete-index');
      var params = 'action=remove-slide';
          params += '&index=' + index;
      
      if (confirm('Are you to remove this slide?')) {
        $.post(REQUEST_URI, params, function(response){
          if (response.isValid == true) {
            

            if (response.removeView == true) {
              $parent.fadeOut(600, function(){
                $(this).remove();
                toggleAddSlideButton();
                $slideContainer.sortable('refresh');
              })
            } else {
              $parent.find('.sortable__image-wrap').removeClass('selected')
              .css('background-image', 'none');
              $parent.find('.slide-image').val('');
              toggleAddSlideButton();
            }

          }
        }, 'json');
      }

    });
  }

  function removeTempData() {
    var params = 'action=remove-temp-data';
    $.post(REQUEST_URI, params, function(response){
      
    }, 'json');
  }

  function saveSlideDetails() {
    $(d).on('click', '#slide-modal-save-btn', function(e){
      e.preventDefault();
      var $this = $(this);
      var index = $(this).data('index');
      var params = 'action=save-slide-details';
          params += '&' + $('#modal-slide-details input').serialize();

      $.post(REQUEST_URI, params, function(response){
        if (response.isValid == true) {
          var el = $('#slide-image-' + index);
          el.val(response.data.photo_path);
          el.parents('.sortable__image-wrap').addClass('selected').css('background-image', 'url(' + response.data.photo_path + ')')
          slideModal.modal('hide');
          $($('.sortable__item').get(index)).removeClass('hidden');
          toggleAddSlideButton();
          $slideContainer.sortable('refresh');
        }
      }, 'json');
    });
  }

  function loadVideo() {
    $(d).on('change', '#heroshot_youtube_id', function(){
      var $this = $(this);
      var val = $(this).val();
      var src = '';

      if (val) {
        src = 'https://www.youtube.com/embed/'+val;
        $('.image-preview-vid').addClass('selected');
      } else {
        $('.image-preview-vid').removeClass('selected');
      }

      $('.image-preview-video').attr('src', src);

    })
  }

  function init() {
    enableSorting();
    getSlides();
    setImage('.slide-image', '.sortable__image-wrap', addSlideImg);
    setImage('#slide-image', '.slide-modal-image');
    setImage('#hero_banner_photo', '.hero-photo');
    addSlide();
    editSlideDetails();
    removeSlide();
    saveSlideDetails();
    loadVideo();
  }
  

  $(window).on('load', init);

})(window, document, jQuery);