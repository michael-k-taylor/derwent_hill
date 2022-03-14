(function($) {
    'use strict';

    var perspectiveScroll = {};
    qodef.modules.perspectiveScroll = perspectiveScroll;
    perspectiveScroll.qodefInitPerspectiveScroll = qodefInitPerspectiveScroll;

    perspectiveScroll.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitPerspectiveScroll();
    }


    /**
     * Init Perspective Scroll shortcode
     */
    function qodefInitPerspectiveScroll() {
        var perspectiveScroll = $('.qodef-perspective-scroll');
    
        if (perspectiveScroll.length) {
            perspectiveScroll.each(function () {

                if (qodef.windowWidth > 1024) {
                    var thisPerspectiveScroll = $(this),
                        leftImage  = thisPerspectiveScroll.find('.qodef-ps-left-image'),
                        rightImage = thisPerspectiveScroll.find('.qodef-ps-right-image'),
                        bgImage    = thisPerspectiveScroll.find(".qodef-ps-bg-image"),
                        mainText   = thisPerspectiveScroll.find(".qodef-ps-main-text"),
                        bgText     = thisPerspectiveScroll.find(".qodef-ps-bg-text");

                    // Scroll Magic
                    var controller = new ScrollMagic.Controller();

                    // Pin the ScrollMagic scene
                    var mainScene = new ScrollMagic.Scene({
                        triggerElement: '.qodef-ps-pin-scene',
                        triggerHook: 0,
                        duration: '200%'
                    })
                    .setPin('.qodef-ps-pin-scene')
                    .addTo(controller);

                    var scrollAmount = 0,
                        imageScaleAmount,
                        initialized = false,
                        customLandingHeaderExists = false,
                        customLandingHeader = $('.qodef-custom-landing-header');

                    // Landing Custom Header and Landing Elements
                    if (customLandingHeader.length > 0) {
                        customLandingHeaderExists = true;
                        customLandingHeader.css({
                            'position': 'fixed',
                            'top': 0,
                            'left': 0,
                            'pointer-events': 'all',
                            'z-index': 1230,
                            'transition': '.4s'
                        });

                        // Append scroll down indicator
                        thisPerspectiveScroll.append('<div class="qodef-perspective-scroll-down"><div class="qodef-perspective-scroll-down-text">Scroll down</div><div class="qodef-perspective-scroll-down-arrow"></div></div>');   
                        var perspectiveScrollDown = thisPerspectiveScroll.find('.qodef-perspective-scroll-down');
                    }

                    if (customLandingHeaderExists) {
                        thisPerspectiveScroll.addClass('qodef-perspective-scroll-landing-ready');
                    }

                    qodef.window.on('scroll', function() {
                        // Hide and show header and scroll down indicator
                        if (customLandingHeaderExists) {
                            if (qodef.scroll > perspectiveScroll.offset().top + perspectiveScroll.outerHeight() - qodef.windowHeight) {
                                customLandingHeader.css({'opacity': '0', 'pointer-events': 'none'});
                                perspectiveScrollDown.css({'opacity': '0', 'pointer-events': 'none'});
                            } else {
                                customLandingHeader.css({'opacity': '1', 'pointer-events': 'all'});
                                perspectiveScrollDown.css({'opacity': '1', 'pointer-events': 'all'});
                            }
                        }

                        if (qodef.scroll > perspectiveScroll.offset().top + 100 && qodef.scroll < perspectiveScroll.offset().top + 300 && !initialized) {
                            initialized = true;

                            window.addEventListener('wheel', function(e) {
                                var normalize = e.deltaY > 0 ? 1 : -1;
                                var forwards = normalize == -1 ? false : true;
                                
                                if (qodef.body.hasClass('qodef-safari')) {
                                    if (forwards) {
                                        scrollAmount += 3;
                                    } else {
                                        scrollAmount -= 3;
                                    }
                                } else {
                                    if (forwards) {
                                        scrollAmount += 0.5;
                                    } else {
                                        scrollAmount -= 0.5;
                                    }
                                }

                                if (qodef.scroll < perspectiveScroll.offset().top || scrollAmount < 0) {
                                    scrollAmount = 0;
                                }
                                
                                // Image Scaling Coefficient
                                imageScaleAmount = 1 + 0.02 * scrollAmount;

                                if (imageScaleAmount < 1) {
                                    imageScaleAmount = 1;
                                }
        
                                if (imageScaleAmount > 1.1) {
                                    imageScaleAmount = 1.1;
                                }
        
                                leftImage.css({
                                    transform: 'scale('+ imageScaleAmount +')'
                                });

                                rightImage.css({
                                    transform: 'scale('+ imageScaleAmount +')'
                                });

                                bgImage.css({
                                    transform: 'scale('+ imageScaleAmount +')'
                                });

                                bgText.css({
                                    transform: 'scale('+ imageScaleAmount +')'
                                });
            
                            }, {passive: false});
                        }
                    });
                }
                
            });
        }
    }

    
})(jQuery);