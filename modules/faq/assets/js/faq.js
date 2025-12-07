(function(w, d, $){
 
  w.initAccordion = function(elm){

    var itemElm       = $(elm),
        itemBodyElm   = '.faq__body',
        itemLink      = '.faq__link',

        iconExpand    = 'arrow-down',
        iconCollapse  = 'arrow-up',
        defaultState  = (typeof jsVars.faq !== "undefined")? jsVars.faq.defaultState: '';

    if(itemElm.length) {
      itemElm.find(itemBodyElm).hide();

      if(defaultState == true) {
        $(elm+':eq(0)').find(itemBodyElm).show();    
        $(elm+':eq(0)').addClass('active');
        $(elm+'.active').find(itemLink).addClass('active');
        $(elm+'.active').find('i').removeClass(iconExpand).addClass(iconCollapse);
      }
      
      itemElm.on('click', itemLink , function(e){
        e.preventDefault();

        var self      = $(this),
            parentElm = self.parents(elm),
            targetElm = self.attr('href');    
        
        var isOpen = parentElm.hasClass('active');
        
        if(isOpen) {
          
          parentElm.removeClass('active');
          $(targetElm).slideUp();
          self.find('i').removeClass(iconCollapse).addClass(iconExpand);
          
        } else {

          itemElm.removeClass('active');
          itemElm.find(itemLink).removeClass('active');
    
          parentElm.addClass('active');

          $(targetElm).slideDown();

          $(itemBodyElm).not(targetElm).slideUp();

          itemElm.find('i').removeClass(iconCollapse).addClass(iconExpand);     
          self.find('i').removeClass(iconExpand).addClass(iconCollapse);
        }

      });
    }
  }

  initAccordion('.faq-accordion .faq');

})(window, document, jQuery);