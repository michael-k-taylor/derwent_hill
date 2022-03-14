(function ($) {
    'use strict';

    var linked = {};
    qodef.modules.linked = linked;

    linked.qodefInitLinkedImages = qodefInitLinkedImages;


    linked.qodefOnDocumentReady = qodefOnDocumentReady;
    linked.qodefOnWindowResize = qodefOnWindowResize;

    $(document).ready(qodefOnDocumentReady);
    $(window).resize(qodefOnWindowResize);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitLinkedImages();

    }

    /*
       All functions to be called on $(window).scroll() should be in this function
   */
    function qodefOnWindowResize() {
        qodefInitLinkedImages();
    }

    /**
     * Linked Images Shortcode
     */

    function qodefInitLinkedImages() {

        if ($('.qodef-linked-images').length) {

            var holders = $('.qodef-linked-image-holder');
            var adminBarHeight = $('#wpadminbar').length ? $('#wpadminbar').height() : 0;


            holders.each(function () {

                var holder = $(this),
                    imageHolder = holder.find('.qodef-linked-image-image'),
                    fullHeight = $('.qodef-linked-images').data('full-height'),
                    contentMargin = 0;

                if (fullHeight === 'yes') {
                    if(qodef.windowWidth > 1024) {
                        contentMargin = parseInt(holder.closest('.qodef-content').css('margin-top'));
                        var additionalHeight =  contentMargin < 0 ? Math.abs(contentMargin) : 0;

                        imageHolder.height(qodef.windowHeight - qodefGlobalVars.vars.qodefMenuAreaHeight - qodefGlobalVars.vars.qodefLogoAreaHeight - adminBarHeight + additionalHeight);

                    } else {
                        imageHolder.height(qodef.windowHeight - adminBarHeight - 85)
                    }

                }
            });

            $('.qodef-linked-images').css('opacity', 1);
        }
    }

})(jQuery);