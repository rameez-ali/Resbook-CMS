(function(w, d){
	"use strict";

	var IG_REQUEST_URL = 'request/instagram',
			IG_ITEM_LIMIT  = 6;

 w.InstagramGrid = function() {

	var igItemsView = '';

		$.post( IG_REQUEST_URL, 'action=fetch-igfeed',
		function(response) {

			if(response.isValid) {
				var igItems = response.items;
				if( igItems.length ) {
					_.each(igItems, function( item , index){

						if (index < IG_ITEM_LIMIT) {
							var igMediaType			 		= item.media_type,
							igMediaImage				= (igMediaType == 'VIDEO') ? item.thumbnail_url : item.media_url,
							igMediaUrl 	 				= item.media_url,
							postCaption   			= item.caption;

						igItemsView += '<a href="'+igMediaUrl+'" rel="ugc" '+
								'class="instagram__link instagram__link--cover swipebox" data-category="Instagram" title="'+postCaption+'"'+
								'data-action="Image Link" data-name="Instagram Photo">'+
								'<img class="instagram__img" src="'+ igMediaImage +'" alt="'+postCaption+'">'+
								'</a>';
						}					
					});
					$('#instagram-grid').html(igItemsView);
				}
			}			
		}, 'json');
	};

	if($('#instagram-grid').length) {
		/** get instagram photos */
		InstagramGrid();
	}

}(window, document))