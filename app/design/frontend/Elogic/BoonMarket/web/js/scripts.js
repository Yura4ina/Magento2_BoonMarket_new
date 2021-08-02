define([
    'jquery'
    ], function ($){
    $.widget('boonMarket.scripts', {
        // options:{
        // },
        /**
         * Widget initialization
         * @private
         */
        _create: function() {
            // this._animateHeaderLinks();
            this._closeSuccessMessage();
        },

        _closeSuccessMessage: function () {
           $(document).on('click', '.close-message-success', function (){
               $('.message-success.success.message').addClass('close');
               setTimeout(() => $('.message-success.success.message').remove(), 2000);
               console.log('closeSuccessMessage');
           });
        },
        _animateHeaderLinks: function () {

            const anchors = document.querySelectorAll(this.options.selector)

            for (let anchor of anchors) {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    const blockID = anchor.getAttribute('href').substr(1);

                    document.getElementById(blockID).scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                })
            }
        }
    });

    return $.boonMarket.scripts;
});

