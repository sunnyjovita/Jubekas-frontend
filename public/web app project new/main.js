(function ($) {
    $('.banner_slider').owlCarousel({
        items:1,
        loop:true,
        margin:0,
        URLhashListener:true,
        dots:true,
        smartSpeed:2000,
        autoplay:true,
        autoHeight:false,
        startPosition: 'URLHash'
    })

})(jQuery);