define([
    'jquery',
    'swiperSlider'
], function($, Swiper){
    $.widget('sec6SlWidget.sec6SlWidgetScript', {

        /**
         * Widget initialization
         * @private
         */
        _create: function() {
            this._sec6SliderInit();
        },

        _sec6SliderInit: function () {
            var swiper = new Swiper('.section6__slider', {
                slidesPerView: 1,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        }
    });

    return $.sec6SlWidget.sec6SlWidgetScript;
});
