(function($) {
    "use strict";

    $(window).on('load', qodefOnWindowLoad);

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefDisplayCalendar();
    }

    var qodefDisplayCalendar = function () {
        if($('.qodef-booked-calendar').length) {
            $('.qodef-booked-calendar').css({
                'visibility' : 'visible',
                'opacity' : '1'
            })
        }
    }

})(jQuery);
// qodef-booked-calendar