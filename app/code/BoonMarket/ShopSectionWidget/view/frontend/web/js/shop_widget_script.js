define([
    'jquery',
    'swiperSlider',
    'jQueryLazyLoad'
], function($, Swiper, Lazy){
    $.widget('shopSectionWidget.shopWidgetScript', {
        options: {
            customUrl: 'ajaxUrl'
        },
        /**
         * Widget initialization
         * @private
         */
        _create: function() {
            this._categorySlider();
            $('.lazy').Lazy();
        },

        _categorySlider: function () {
            let ds = $('.lazy');
            var swiper = new Swiper('.section4__products.active', {
                slidesPerView: 4,
                spaceBetween: 30,
                centeredSlides: true,
                loop: true,
                breakpoints: {
                    300: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    700: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                    1250: {
                        slidesPerView: 5,
                        spaceBetween: 30,
                    },
                    1900: {
                        slidesPerView: 6,
                        spaceBetween: 30,
                    }
                }
            });
            var customUrl = this.options.customUrl;
            $('.section4__categories__cat').on('click', function (){
                console.log(customUrl);
                var catId = $(this).data('catid');
                $('.section4__products').removeClass('active');
                $('.section4__products.prCat_' + catId).addClass('active');
                $('.section4__categories__cat').removeClass('current');
                $(this).addClass('current');
                swiper.destroy( true, true );
                swiper = new Swiper('.section4__products.active', {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    centeredSlides: true,
                    loop: true,
                    breakpoints: {
                        300: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        700: {
                            slidesPerView: 4,
                            spaceBetween: 30,
                        },
                        1250: {
                            slidesPerView: 5,
                            spaceBetween: 30,
                        },
                        1900: {
                            slidesPerView: 6,
                            spaceBetween: 30,
                        }
                    }
                });
                // $.ajax({
                //     url: customUrl,
                //     type: 'post',
                //     dataType: 'json',
                //     cache: false,
                //     data: {
                //         form_key: $.mage.cookies.get('form_key'),
                //         catId: catId
                //     },
                //     success: function(response) {
                //         console.log(response.output);
                //     },
                //     error: function (xhr, status, errorThrown) {
                //         console.log('Error happens. Try again.');
                //     }
                // });
            });
        }
    });

    return $.shopSectionWidget.shopWidgetScript;
});
