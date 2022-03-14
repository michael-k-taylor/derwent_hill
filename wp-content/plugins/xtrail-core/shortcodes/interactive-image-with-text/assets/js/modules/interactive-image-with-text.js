(function($) {
    'use strict';

    var interactiveImageWithText = {};
    qodef.modules.interactiveImageWithText = interactiveImageWithText;

    interactiveImageWithText.qodefInitInteractiveImageWithText = qodefInitInteractiveImageWithText;
    interactiveImageWithText.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitInteractiveImageWithText();
    }

    /**
     * Init Pie Chart shortcode
     */
    function qodefInitInteractiveImageWithText() {
        var interactiveImageWithTextHolder = $('.qodef-interactive-image-with-text');

        if (interactiveImageWithTextHolder.length) {
            interactiveImageWithTextHolder.each(function () {
                var interactiveSeparator = $(this).find('.qodef-iiwt-separator'),
                    interactiveText = $(this).find('.qodef-iiwt-text-text'),
                    separatorHeight = (interactiveSeparator.length) ? interactiveSeparator.height() : 0,
                    interactiveTextHeight = (interactiveText.length) ? interactiveText.height() : 0,
                    interactiveTextMargin = (interactiveText.length) ? parseInt(interactiveText.css('margin-top')) : 0;

                var negativeMargins = (separatorHeight + interactiveTextHeight + interactiveTextMargin) / 2;

                $(this).find('.qodef-iiwt-content-inner').css('margin-top', negativeMargins + 'px');
                $(this).find('.qodef-iiwt-content-inner').css('margin-bottom', -1 * negativeMargins + 'px');
            })
        }
    }

})(jQuery);