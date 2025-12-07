(function(w, d, $){

  $(window).on('load resize',function(){
      
    matchChildHeight({
      parentSel : '.quicklinks' , 
      childSel : '.ql__card .ql__card__inner .ql__card__content .ql__card__content-inner',
      breakPoint: 768});

    matchChildHeight({
      parentSel : '.quicklinks' , 
      childSel : '.ql__card .ql__card__inner',
      breakPoint: 768});

     
    matchElmHeight('.quicklinks .ql__icon .ql__icon__text');

    matchChildHeight({
      parentSel : '.ql-icon-wrapper' , 
      childSel : '.ql__icon .ql__icon__inner .ql__icon__content .ql__icon__heading',
      breakPoint: 768});

    matchChildHeight({
      parentSel : '.ql-icon-wrapper' , 
      childSel : '.ql_tile .ql_tile_inner .ql_tile_content .ql_tile_desc',
      breakPoint: 768});
    
      

  }).trigger('resize');

})(window, document, jQuery);