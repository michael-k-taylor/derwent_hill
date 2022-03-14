(function($) {
	'use strict';
	
	var eventList = {};
	qodef.modules.eventList = eventList;

	eventList.qodefIniteventList = qodefIniteventList;


	eventList.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefIniteventList();
        qodefChequeredEventTitleHover();
	}

	/*
	 **	Init Event List shortcode
	 */
	function qodefIniteventList(){
		var holder = $('.qodef-event-list-holder.qodef-event-list-five-columns');

		if(holder.length){
			holder.each(function() {
				var thisHolder 		= $(this),
					items = thisHolder.find('.qodef-event-list-item-holder'),
					itemImageSrc;

					if(qodef.windowWidth > 1024) {
						qodef.body.append('<div class="qodef-event-list-follow-image-holder"><img src=""></div>');
						var followImageHolder = $('.qodef-event-list-follow-image-holder'),
							followImageHolderImage = followImageHolder.find('img'),
							followImageHolderThreshold = qodef.windowWidth - followImageHolder.outerWidth() - 50,
							xPos,
							eventXDiff;

						followImageHolder.css('width', items.outerWidth());
						followImageHolder.css('height', items.outerHeight());

						qodef.body.mousemove(function( event ) {
							eventXDiff = event.clientX - followImageHolderThreshold;
							if (event.clientX > followImageHolderThreshold) {
								xPos = event.clientX - eventXDiff - eventXDiff/6;
							} else {
								xPos = event.clientX;
							}
							followImageHolder.css({
								top: event.clientY,
								left: xPos
							});
							
						});

						items.on('mouseenter', function() {
								$(this).addClass('qodef-event-list-item-hover');
								itemImageSrc = $(this).find('.qodef-event-list-item-image-inner img').attr('src');
								followImageHolderImage.attr('src', itemImageSrc);
								followImageHolder.css('opacity', 1);
							}
						);

						items.on('mouseleave', function(){
								$(this).removeClass('qodef-event-list-item-hover');
								followImageHolder.css('opacity', 0);
							}
						);
					}
			});
		}
	}

    function qodefChequeredEventTitleHover() {

        var listPost = $('.qodef-event-list-item-holder');
        var qodefTitleHoverClass = function(title, image) {
            title.on('mouseover', function() {
                image.addClass('qodef-hovered');
            });

            title.on('mouseout', function() {
                image.removeClass('qodef-hovered');
            });
        };

        if(listPost.length) {
            listPost.each( function() {
                var thisPost = $(this);
				var title = thisPost.find('.qodef-event-list-item-title a');
				var image = thisPost.find('.qodef-event-list-item-image-inner');

				qodefTitleHoverClass(title, image);
            });
        }
    }

})(jQuery);