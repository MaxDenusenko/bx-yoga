(function ($) {
    'use strict'

    $(document).ready(function () {
        svg4everybody({})
        $(".gallery-img").fancybox({
            showNavArrows:false,
        });
    })
    $('.select-form').styler();

    $('.mobile-menu').on('click',function() {
        $('.header__nav').slideToggle();
        $('.top').toggleClass('line__top');
        $('.middle').toggleClass('line__middle');
        $('.bottom').toggleClass('line__bottom');
        $('body').toggleClass('overflow');
    })
    $('.label').on('click',function() {
        $('.label').removeClass('active');
        $(this).addClass('active');
    })


})(jQuery)

;(function ($) {
    var sliderAbout = (".swiper-container-about")
    function initSwiper() {
        var screenWidth = $(window).width();
        if(screenWidth < 1181 && sliderAbout == (".swiper-container-about")) {            
            sliderAbout = new Swiper ('.swiper-container-about', {
                slidesPerView: 'auto',
                observer: true,
                observeParents: true,
                navigation: {
                    nextEl: '.swiper-button-next-about',
                    prevEl: '.swiper-button-prev-about',
                }
            });
        } else if (screenWidth > 1181 && sliderAbout != (".swiper-container-about")) {
            sliderAbout.destroy();
            sliderAbout = (".swiper-container-about");
            jQuery('.swiper-wrapper').removeAttr('style');
            jQuery('.swiper-slide').removeAttr('style');            
        }        
    }
    initSwiper();

    if($("#occu")) {
        var top = $("#occu").offset().top;
        $("#to-occu").click(function() {
            event.preventDefault();
            $("body,html").animate({scrollTop: top}, 800);
        });
    }
})(jQuery)