(function ($) {
    'use strict';

    var productList = {};
    qodef.modules.productList = productList;

    productList.qodefInitProductListHoverAnimation = qodefInitProductListHoverAnimation;

    productList.qodefOnWindowLoad = qodefOnWindowLoad;

    $(window).on('load', qodefOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
        qodefInitProductListHoverAnimation();
    }

    function qodefInitProductListHoverAnimation() {
        var productListHolder = $('.qodef-pl-holder');

        if(productListHolder.hasClass('qodef-info-below-image')) {
            var productListItem = $('.qodef-pli');

            if (productListItem.length) {
                productListItem.each(function () {
                    var thisProductListItem = $(this),
                        productListImage = thisProductListItem.find('.qodef-pli-image img'),
                        productListText = thisProductListItem.find('.qodef-pli-text');

                    thisProductListItem.on({
                        mouseenter: function () {
                            productListImage.css('transform', 'scale(1.03');
                        }, mouseleave: function () {
                            productListImage.css('transform', 'scale(1)');
                        }
                    });
                    thisProductListItem.on({
                        mouseenter: function () {
                            productListText.css('opacity', '1');
                        }, mouseleave: function () {
                            productListText.css('opacity', '0');
                        }
                    });
                });
            }
        }
    }

})(jQuery);