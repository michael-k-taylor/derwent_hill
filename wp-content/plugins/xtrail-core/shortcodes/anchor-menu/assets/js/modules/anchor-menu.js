(function ($) {
	'use strict';

	var anchorMenu = {};
	qodef.modules.anchorMenu = anchorMenu;

    anchorMenu.qodefInitAnchorMenu = qodefInitAnchorMenu;

    anchorMenu.qodefOnWindowLoad = qodefOnWindowLoad;

	$(window).on('load', qodefOnWindowLoad);

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function qodefOnWindowLoad() {
        qodefInitAnchorMenu();
	}

	/*
	 **	Custom Font resizing style
	 */
	function qodefInitAnchorMenu() {
        var anchorMenu = $('.qodef-anchor-menu-outer');

        if (anchorMenu.length){
            anchorMenu.remove();
			$('.qodef-content-inner').append(anchorMenu.css('opacity',1));
			
			//scroll active item logic
			var anchorSections = $('div[data-qodef-anchor]'),
				anchorMenuItems = anchorMenu.find('.qodef-anchor-menu-item');

			if (anchorSections.length && anchorMenuItems.length) {
				anchorMenuItems.first().addClass('qodef-active-item');
				anchorMenuItems.first().find('a').addClass('current');

				$(window).scroll(function(){
					anchorSections.each(function(i){
						var anchorSection = $(this),
							anchorSectionTop = anchorSection.offset().top,
							anchorSectionHeight = anchorSection.outerHeight(),
							offset = qodef.windowHeight/2,
							currentItemIndex;

						if (anchorSectionTop <= qodef.scroll + offset && anchorSectionTop + anchorSectionHeight >= qodef.scroll + offset) {
							if (currentItemIndex !== i) {
								currentItemIndex = i;
								anchorMenuItems.removeClass('qodef-active-item');
								anchorMenuItems.find('a').removeClass('current');
								anchorMenuItems.eq(i).addClass('qodef-active-item');
								anchorMenuItems.eq(i).find('a').addClass('current');
							}
						}
					});
				});
			}
        }
	}

})(jQuery);