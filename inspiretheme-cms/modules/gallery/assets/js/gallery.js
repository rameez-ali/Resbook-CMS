(function(){
  
  this.Gallery = function(opts){

    var defaults = {
        galleryTabWrapper: '#photo-gallery',
        galleryWrapper: '#gallery-wrapper',
        galleryItemWrapper: '.gallery-items',
        galleryItem: '.gallery-item',
        itemCounter : '#gallery-item-count',
        btnNew: '#add-new-photo',
        newPhotoElm: 'tempPhoto',
        msgElm:'.action-msg',
        msgElmPage: 'page-action-msg',
        removeBtn:'.remove-photo',

    };

    this.options = $.extend(true, defaults, opts);
    
  };

  this.Gallery.prototype.init = function() {
    this.addPhoto();
    this.setPhoto();
    this.removePhoto();
  };

  this.Gallery.prototype.addPhoto = function() {
    var ths = this, options = ths.options;
    
    $(options.galleryTabWrapper).on('click', options.btnNew, function(e){
      e.preventDefault();
      openCKFileBrowser(options.newPhotoElm);
     
    });
  }; 

  this.Gallery.prototype.setPhoto = function() {
    var ths = this, options = ths.options;
    
    var tempPhotoElm = '#'+options.newPhotoElm;

    $(options.galleryTabWrapper).on('change', tempPhotoElm, function(){
      var itemsWrapper = $(options.galleryWrapper),
        item = itemsWrapper.find('.slide'),
        itemImg = $(tempPhotoElm).val();

      var _tmpl = _.template( $('#gallery-tmpl').html() );
      var itemIndex = parseInt($(options.itemCounter).val()) + 1;
      
      $(options.itemCounter).val(itemIndex);
      
      itemsWrapper.append(_tmpl({'index':itemIndex, 'itemImg':itemImg}));

    });
  }; 

  this.Gallery.prototype.removePhoto = function() {
    var ths = this, options = ths.options;
    
    $(options.galleryWrapper).on('click', options.removeBtn, function(){
      
      var self = $(this),
          grandParent  = self.parents(options.galleryWrapper),
          parent = self.parents(options.galleryItem);

      parent.animate({height:0}, {duration:350, complete:function() {
        parent.remove();
      }});
    });
  }; 

}());

$(window).on('load', function(){

    var gallery = new Gallery({});

    gallery.init();

});

