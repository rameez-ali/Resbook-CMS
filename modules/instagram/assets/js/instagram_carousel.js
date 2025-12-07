(function(w, d, $){
	"use strict";

	var IG_REQUEST_URL = 'request/instagram';

	w.InstagramCarousel = function() {
	
		var igItemsView = '';

		$.post( IG_REQUEST_URL, 'action=fetch-igfeed',
		 function(response) {

			if(response.isValid) {
				var igItems = response.items;
				if( igItems.length ) {
					_.each(igItems, function( item ){
						var igMediaType			 		= item.media_type,
								igMediaImage				= (igMediaType == 'VIDEO') ? item.thumbnail_url : item.media_url,
								igMediaUrl 	 				= item.media_url,
								postCaption   			= item.caption;
						igItemsView += '<a href="'+igMediaUrl+'" rel="ugc" '+
								'class="instagram__link instagram__link--cover swipebox" data-category="Instagram" title="'+postCaption+'"'+
								'data-action="Image Link" data-name="Instagram Photo">'+
								'<img class="instagram__img" data-lazy="'+ igMediaImage +'" alt="'+postCaption+'">'+
								'</a>';
					});
					$('#instagram-carousel').slick('slickAdd', igItemsView);
				}
			}			
		}, 'json');
	};

		
	if($('#instagram-carousel').length) {
		/** get instagram photos */
		$(window).on('load', function() {

			$('#instagram-carousel').slick({
				// lazyLoad: 'progressive',
				centerMode: false,
				slidesToShow: 3,
				adaptiveHeight:false,
				mobileFirst:true,
				prevArrow: '<a href="#" class="instagram__nav instagram__nav--prev"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
				nextArrow: '<a href="#" class="instagram__nav instagram__nav--next"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg></a>',
				responsive: [						
					{
						breakpoint: 520,
						settings: {
						slidesToShow: 2,
						}
					},
					{
						breakpoint: 768,
						settings: {
						slidesToShow: 3,
						}
					},								
					{
						breakpoint: 1023,
						settings: {
							slidesToShow: 4,
						}
					},
					{
						breakpoint: 1400,
						settings: {
							slidesToShow: 5,
						}
					},
					{
						breakpoint: 1600,
						settings: {
							slidesToShow: 6,
						}
					},
				]
			});
			InstagramCarousel();
		});
	}

}(window, document, jQuery))