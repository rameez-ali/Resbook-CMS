(function(){

	this.Sitemap = function(opts){

        var defaults = {
          generateSitemapTrigger: '.generate-sitemap',
          sitemapDateWrapper: '#sitemap-date',
          actionUrl: jsVars.baseUrl+'ajax/sitemap.php',
          msgElm:'.action-msg',
        };

        this.options = $.extend(true, defaults, opts);
        
    };

    this.Sitemap.prototype.init = function() {

    	var ths = this, options = this.options;

      ths.generateSitemap(options);
      

    };

    this.Sitemap.prototype.generateSitemap = function (options) {
      var ths = this, options = this.options;

      $(options.generateSitemapTrigger).on('click', function() {

        $.post(options.actionUrl, 'action=generate-sitemap', function(response) {

          ths.showFlashMsg( response.msg, response.state );

          if(response.isValid == true && $(options.sitemapDateWrapper).length == true) {
            $(options.sitemapDateWrapper).html('<strong>'+response.updatedOn+'</string>');
          }

        }, 'json');

      });
    };

    this.Sitemap.prototype.showFlashMsg = function(msg, state) {
      var ths = this, options = this.options;

      if( msg && state ) {

          $(options.msgElm).text('').removeAttr('class').addClass(options.msgElm.substr(1)).show().addClass('alert alert-'+state).text(msg);

          setTimeout(function(){
              $(options.msgElm).fadeOut();
          }, 4500);

      }
  };

}());


$(window).on('load', function(){

  var sitemap = new Sitemap({});

  sitemap.init();

});