(function (w, d, $) {

    var prevArrowCls = 'showcase-gallery__carousel-nav showcase-gallery__carousel-nav--prev',
        nextArrowCls = 'showcase-gallery__carousel-nav showcase-gallery__carousel-nav--next';

    initSlickCarousel('.showcase-gallery__carousel', {
        lazyLoad: 'ondemand',
        autoplay: true,
        centerMode: false,
        slidesToShow: 1,
        autoplaySpeed: 2000,
        mobileFirst: true,
        dots: false,
        arrows: true,
        prevArrow: '<a href="#" class="' + prevArrowCls + '"><i class="fas fa-angle-left"></i></a>',
        nextArrow: '<a href="#" class="' + nextArrowCls + '"><i class="fas fa-angle-right"></i></a>',
        responsive: [
            {
                breakpoint: 767,
                settings: { slidesToShow: 2 }
            }, {
                breakpoint: 1024,
                settings: { slidesToShow: 4 }
            }
        ]
    });

    initSlickCarousel('.accommodation-gallery__carousel', {
        lazyLoad: 'ondemand',
        autoplay: true,
        centerMode: false,
        slidesToShow: 1,
        autoplaySpeed: 3000,
        mobileFirst: true,
        dots: false,
        arrows: true,
        prevArrow: '<a href="#" class="accommodation-gallery__carousel-nav accommodation-gallery__carousel-nav--prev"><i class="fas fa-angle-left"></i></a>',
        nextArrow: '<a href="#" class="accommodation-gallery__carousel-nav accommodation-gallery__carousel-nav--next"><i class="fas fa-angle-right"></i></a>',
        responsive: [
            {
                breakpoint: 991,
                settings: { slidesToShow: 2 }
            }
        ]
    });

    initShuffle('.gallery-shuffle', '.gallery-item', '.filters__btn', 'filters__btn--active');

})(window, document, jQuery);