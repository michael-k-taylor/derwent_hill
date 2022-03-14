(function ($) {
        'use strict';

        var callToAction = {};
        qodef.modules.callToAction = callToAction;

        callToAction.qodefInitCountdownClose = qodefInitCountdownClose;


        callToAction.qodefOnDocumentReady = qodefOnDocumentReady;

        $(document).ready(qodefOnDocumentReady);

        /*
         All functions to be called on $(document).ready() should be in this function
         */
        function qodefOnDocumentReady() {
            qodefInitCountdownClose();
        }

        /**
         * Countdown Shortcode
         */
        function qodefInitCountdownClose() {
            var callToActionCloseButtons = $('.qodef-call-to-action-close');

            if (callToActionCloseButtons.length) {
                callToActionCloseButtons.on('click', function () {
                        var closestHolder = $(this).closest('.qodef-call-to-action-holder');
                        closestHolder.addClass('qodef-call-to-action-holder-hidden');
                    }
                );

            }

        }
    }

)(jQuery);