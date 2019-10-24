"use strict";
$(document).ready(function() {
    $('#testmonials-carousel').owlCarousel({ loop: !1, responsiveClass: !0, nav: !0, navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"], responsive: { 0: { items: 1, nav: !1, dots: !0, margin: 10, }, 600: { items: 1, nav: !1, dots: !0, margin: 15, }, 1000: { items: 1, dots: !1, margin: 40, } } })
    $('#blog-grid-simple').owlCarousel({ loop: !1, responsiveClass: !0, nav: !1, navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"], autoplay: !0, smartSpeed: 950, autoplayTimeout: 1800, responsiveClass: !0, autoplayHoverPause: !1, responsive: { 0: { items: 1, nav: !1, dots: !0, margin: 10, }, 600: { items: 2, nav: !1, dots: !0, margin: 0, }, 1000: { items: 3, dots: !0, margin: 0, } } })
    $('#team-block').owlCarousel({ dots: !0, loop: !1, nav: !1, responsiveClass: !0, smartSpeed: 950, responsive: { 0: { items: 1, margin: 15, dots: !1, }, 600: { items: 1, margin: 0, dots: !1, }, 1000: { items: 2, margin: 0, } } })
    $('#testmonials-modern').owlCarousel({ loop: !1, nav: !1, responsiveClass: !0, responsive: { 0: { items: 1, margin: 15, dots: !1, }, 600: { items: 1, margin: 20, dots: !1, }, 1000: { items: 2, margin: 0, } } })
    $('#testmonials-parallax').owlCarousel({ dots: !1, loop: !1, nav: !1, smartSpeed: 950, responsiveClass: !0, responsive: { 0: { items: 1, margin: 15, dots: !1, }, 600: { items: 1, margin: 0, dots: !1, }, 1000: { items: 1, margin: 0, } } })
    $('#clients').owlCarousel({ 
    	loop: !0, 
    	nav: !1, 
    	dots: true, 
    	autoplay: !0, 
    	smartSpeed: 950, 
    	autoplayTimeout: 2000, 
    	responsiveClass: !0, 
    	autoplayHoverPause: !1, 
    	responsive: { 
    		0: { items: 2, margin: 50, }, 
    		600: { items: 4, margin: 80, }, 
    		1000: { items: 3, margin: 80, },
    		1200: { items: 5, margin: 80, } 
    	} 
    })
    $('.projects_4col').owlCarousel({ loop: !0, nav: !1, dots: !1, autoplay: !0, smartSpeed: 500, autoplayTimeout: 5000, responsiveClass: !0, autoplayHoverPause: !1, responsive: { 0: { items: 1, margin: 0, }, 600: { items: 2, margin: 0, }, 1000: { items: 4, margin: 0, } } })
    $('.carousel-single-item-autoplay').owlCarousel({ dots: !1, loop: !0, nav: !1, responsiveClass: !0, autoplay: !0, smartSpeed: 950, autoplayTimeout: 6000, autoplayHoverPause: !0, responsive: { 0: { items: 1, margin: 30, }, 600: { items: 1, margin: 0, }, 1000: { items: 1, margin: 0, } } })
    $('.carousel-single-item').owlCarousel({ dots: !1, loop: !1, nav: !1, smartSpeed: 950, responsiveClass: !0, responsive: { 0: { items: 1, margin: 30, }, 600: { items: 1, margin: 0, }, 1000: { items: 1, margin: 0, } } })
    $('.gallery-carousel').owlCarousel({ center: !0, stagePadding: 20, smartSpeed: 1100, URLhashListener: !0, startPosition: 'URLHash', autoplay: !0, autoplayTimeout: 3500, loop: !0, nav: !1, responsiveClass: !0, dots: !1, responsive: { 0: { items: 1, margin: 15, }, 600: { items: 1, margin: 15, }, 1000: { items: 2, margin: 30, } } })
    var owl_carousel = $("div.customizable-carousel");
    if (owl_carousel.length > 0) {
        owl_carousel.each(function() {
            var $this = $(this),
                $items = ($this.data('items')) ? $this.data('items') : 1,
                $loop = ($this.attr('data-loop')) ? $this.data('loop') : !0,
                $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : !1,
                $navarrows = ($this.data('nav-arrows')) ? $this.data('nav-arrows') : !1,
                $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : !1,
                $autospeed = ($this.attr('data-autospeed')) ? $this.data('autospeed') : 3500,
                $smartspeed = ($this.attr('data-smartspeed')) ? $this.data('smartspeed') : 950,
                $autohgt = ($this.data('autoheight')) ? $this.data('autoheight') : !1,
                $space = ($this.attr('data-space')) ? $this.data('space') : 15;
            $(this).owlCarousel({ loop: $loop, items: $items, responsive: { 0: { items: $this.data('xs-items') ? $this.data('xs-items') : 1 }, 600: { items: $this.data('sm-items') ? $this.data('sm-items') : 2 }, 1000: { items: $this.data('md-items') ? $this.data('md-items') : 3 }, 1000: { items: $items } }, dots: $navdots, autoplayTimeout: $autospeed, smartSpeed: $smartspeed, autoHeight: $autohgt, margin: $space, nav: $navarrows, navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"], autoplay: $autoplay, autoplayHoverPause: !0 })
        })
    }
    $('.countup').counterUp({ delay: 25, time: 2500 });
    if ($(".swiper-main-slider").length !== 0) { var swiper = new Swiper('.swiper-container', { navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev', }, pagination: { el: '.swiper-pagination', dynamicBullets: !0, }, pagination: '.swiper-pagination', paginationClickable: !0, nextButton: '.swiper-button-next', prevButton: '.swiper-button-prev', spaceBetween: 0, loop: !0, simulateTouch: !0, autoplay: 7000, speed: 1000, onSlideChangeEnd: function(swiper) { $('.swiper-slide').each(function() { if ($(this).index() === swiper.activeIndex) { $(this).find('.slider-content').fadeIn(300) } else { $(this).find('.slider-content').fadeOut(300) } }) } }) }
    if ($(".swiper-main-slider-fade").length !== 0) { var swiper = new Swiper('.swiper-container', { effect: 'fade', navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev', }, pagination: { el: '.swiper-pagination', dynamicBullets: !0, }, pagination: '.swiper-pagination', paginationClickable: !0, nextButton: '.swiper-button-next', prevButton: '.swiper-button-prev', spaceBetween: 0, loop: !0, simulateTouch: !1, autoplay: 7000, speed: 1000, onSlideChangeEnd: function(swiper) { $('.swiper-slide').each(function() { if ($(this).index() === swiper.activeIndex) { $(this).find('.slider-content').fadeIn(300) } else { $(this).find('.slider-content').fadeOut(300) } }) } }) }
    if ($("#swiper-parallax").length !== 0) { var swiper = new Swiper('.swiper-container', { parallax: !0, navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev', }, pagination: { el: '.swiper-pagination', dynamicBullets: !0, }, pagination: '.swiper-pagination', paginationClickable: !0, nextButton: '.swiper-button-next', prevButton: '.swiper-button-prev', spaceBetween: 0, loop: !1, simulateTouch: !0, autoplay: !1, speed: 1000, }) }
    if ($("#rev_slider_24_1").length !== 0) {
        var tpj = jQuery;
        var revapi24;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_24_1").revolution == undefined) { revslider_showDoubleJqueryError("#rev_slider_24_1") } else { revapi24 = tpj("#rev_slider_24_1").show().revolution({ sliderType: "standard", jsFileLocation: "revolution/js/", sliderLayout: "fullscreen", dottedOverlay: "none", delay: 9000, navigation: { keyboardNavigation: "off", keyboard_direction: "horizontal", mouseScrollNavigation: "off", mouseScrollReverse: "default", onHoverStop: "off", bullets: { enable: !0, hide_onmobile: !1, style: "bullet-bar", hide_onleave: !1, direction: "horizontal", h_align: "center", v_align: "bottom", h_offset: 0, v_offset: 50, space: 5, tmp: '' } }, responsiveLevels: [1240, 1024, 778, 480], visibilityLevels: [1240, 1024, 778, 480], gridwidth: [1240, 1024, 778, 480], gridheight: [868, 768, 960, 720], lazyType: "none", shadow: 0, spinner: "off", stopLoop: "off", stopAfterLoops: -1, stopAtSlide: -1, shuffle: "off", autoHeight: "off", fullScreenAutoWidth: "off", fullScreenAlignForce: "off", fullScreenOffsetContainer: "", fullScreenOffset: "60px", hideThumbsOnMobile: "off", hideSliderAtLimit: 0, hideCaptionAtLimit: 0, hideAllCaptionAtLilmit: 0, debugMode: !1, fallbacks: { simplifyAll: "off", nextSlideOnWindowFocus: "off", disableFocusListener: !1, } }) }
            if (revapi24) revapi24.revSliderSlicey()
        })
    }
    $("#navigation1").navigation();
    $("#navigation1").fixed();
    if ($("#nav-transparent").length !== 0) {
        if ($(window).width() > 991) { $("#nav-transparent #main_logo").css("display", "none") } else { $("#nav-transparent #light_logo").css("display", "none") }
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if ($(window).width() > 991) {
                if (scroll > 30) {
                    $(".navigation-fixed-wrapper").addClass("nav-white-bg");
                    $("#nav-transparent #main_logo").css("display", "inline-block");
                    $("#nav-transparent #light_logo").css("display", "none")
                } else {
                    $(".navigation-fixed-wrapper").removeClass("nav-white-bg");
                    $("#nav-transparent #light_logo").css("display", "inline-block");
                    $("#nav-transparent #main_logo").css("display", "none")
                }
            }
        })
    }
    $("#navigation2").navigation({ effect: "slide" });
    $("#navigation3").navigation({ animationOnShow: "zoom-in", animationOnHide: "zoom-out" });
    $("#navigation4").navigation({ overlayColor: "rgba(0,0,0,0.6)" });
    $("#navigation4").fixed({ offset: 20 });
    $("#navigation5").navigation({ hidden: !0 });
    if ($("#navigation-push").length !== 0) {
        if ($(window).width() > 991) {
            $("#navigation-push").find($(".nav-menus-wrapper").addClass("nav-menus-wrapper-open"));
            $("#navigation-push").find($(".nav-menus-wrapper-close-button").hide());
            $("#navigation-push").find($(".small-size-header").hide())
        } else {
            $("#navigation5 #main_logo").clone().appendTo(".small-size-header-logo");
            $("#main_logo").css("display", "none");
            $("#navigation-push").find($(".nav-menus-wrapper").removeClass("nav-menus-wrapper-open"))
        }
    }
    $(".btn-show").on('click', function() { $("#navigation5").data("navigation").toggleOffcanvas() });
    $("#navigation6").navigation({ offCanvasSide: "right" });
    $("#navigation7").navigation();
    if ($(".video-section").length !== 0) { $('.player').mb_YTPlayer() }
    if ($(".main-video-section").length !== 0) { $('#main-video-play').mb_YTPlayer() }
    $('.modal').on('hidden.bs.modal', function() {
        var $this = $(this).find('iframe'),
            tempSrc = $this.attr('src');
        $this.attr('src', "");
        $this.attr('src', tempSrc)
    });
    $('#preloader').fadeOut('normall', function() { $(this).remove() });
    $(window).scroll(function() { if ($(this).scrollTop() > 500) { $(".scroll-to-top").fadeIn(400) } else { $(".scroll-to-top").fadeOut(400) } });
    $(".scroll-to-top").on('click', function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 600)
    });
    if ($('.chart').length > 0) {
        var $pieChart = $('.chart');
        $pieChart.each(function() {
            var $elem = $(this),
                pieChartSize = $elem.attr('data-size') || "120",
                pieChartAnimate = $elem.attr('data-animate') || "2100",
                pieChartWidth = $elem.attr('data-width') || "6",
                pieChartColor = $elem.attr('data-color') || "#2e52c2",
                pieChartTrackColor = $elem.attr('data-trackcolor') || "rgba(0,0,0,0.1)";
            $elem.find('span, i').css({ 'width': pieChartSize + 'px', 'height': pieChartSize + 'px', 'line-height': pieChartSize + 'px' });
            $elem.appear(function() { $elem.easyPieChart({ size: Number(pieChartSize), animate: Number(pieChartAnimate), trackColor: pieChartTrackColor, lineWidth: Number(pieChartWidth), barColor: pieChartColor, scaleColor: !1, lineCap: 'round', onStep: function(from, to, percent) { $elem.find('span.percent').text(Math.round(percent)) } }) })
        })
    };
    new WOW().init()
});
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        margin: 20,
        slideSpeed: 3000,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        responsive: {
            0: {
                items: 1
            },
            960: {
                items: 2
            }
        }
    });
});

$(document).ready(function() {

    // Select and loop the container element of the elements you want to equalise
    $('.row').each(function() {

        // Cache the highest
        var highestBox = 0;

        // Select and loop the elements you want to equalise
        $('.feature-block-2', this).each(function() {

            // If this box is higher than the cached highest then store it
            if ($(this).height() > highestBox) {
                highestBox = $(this).height();
            }

        });

        // Set the height of all those children to whichever was highest 
        $('.feature-block-2', this).height(highestBox);

    });

});

$(document).on('resize', function() {
    setMinHeight();
});
$('.tabs_animate').tabslet({ mouseevent: 'click', attribute: 'href', animation: !0 });
jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
    var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');
    btnUp.on("click", function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) { var newVal = oldValue } else { var newVal = oldValue + 1 }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change")
    });
    btnDown.on("click", function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) { var newVal = oldValue } else { var newVal = oldValue - 1 }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change")
    })
});
$('.close-box').on("click", function() { $(this).parentsUntil('.row').slideToggle(); return !1 });
$(".izimodal").iziModal({ width: 800, top: null, bottom: null, borderBottom: !1, padding: 0, radius: 3, zindex: 999999, iframe: !1, iframeHeight: 400, iframeURL: null, focusInput: !1, group: '', loop: !1, arrowKeys: !0, navigateCaption: !0, navigateArrows: !0, history: !1, restoreDefaultContent: !0, autoOpen: 0, bodyOverflow: !1, fullscreen: !1, openFullscreen: !1, closeOnEscape: !0, closeButton: !0, appendTo: 'body', appendToOverlay: 'body', overlay: !0, overlayClose: !0, overlayColor: 'rgba(0, 0, 0, .7)', timeout: !1, timeoutProgressbar: !1, pauseOnHover: !1, timeoutProgressbarColor: 'rgba(255,255,255,0)', transitionIn: 'comingIn', transitionOut: 'comingOut', transitionInOverlay: 'fadeIn', transitionOutOverlay: 'fadeOut', onFullscreen: function() {}, onResize: function() {}, onOpening: function() {}, onOpened: function() {}, onClosing: function() {}, onClosed: function() {}, afterRender: function() {} });
$(document).on('click', '.trigger', function(event) {
    event.preventDefault();
    $('.izimodal').iziModal('setZindex', 99999999);
    $('.izimodal').iziModal('open', { zindex: 99999999 });
    $('.izimodal').iziModal('open')
});
if ($('.justified_gallery').length > 0) {
    $(".justified_gallery").justifiedGallery();
    var $justifiedgallery = $('.justified_gallery');
    $justifiedgallery.each(function() {
        var $element = $(this),
            rowHeight = $element.attr('data-rowHeight') || "200",
            margins = $element.attr('data-margins') || "10"
        $element.appear(function() { $element.justifiedGallery({ rowHeight: Number(rowHeight), margins: Number(margins), }) })
    })
};
$('.image-popup-gallery').magnificPopup({ type: 'image', closeOnContentClick: !0, closeBtnInside: !1, mainClass: 'mfp-fade', fixedContentPos: !0, image: { verticalFit: !0, }, gallery: { tCounter: '', enabled: !0, navigateByImgClick: !0, preload: [0, 1] } });
$('.image-popup').magnificPopup({ type: 'image', closeOnContentClick: !0, closeBtnInside: !1, mainClass: 'mfp-fade', fixedContentPos: !0, image: { verticalFit: !0, }, });
$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({ closeOnContentClick: !0, closeBtnInside: !1, disableOn: 700, type: 'iframe', mainClass: 'mfp-fade', removalDelay: 160, preloader: !1, });
$('.countdown').countdown($('.countdown').attr("data-enddate")).on('update.countdown', function(event) { $(this).html(event.strftime('' + '<div class="row"><div class="col-md-3 col-sm-6 col-3"><div class="countdown-box">%-D<h6>Day%!d</h6></div></div>' + '<div class="col-md-3 col-sm-6 col-3"><div class="countdown-box">%H<h6>Hours</h6></div></div>' + '<div class="col-md-3 col-sm-6 col-3"><div class="countdown-box">%M<h6>Minutes</h6></div></div>' + '<div class="col-md-3 col-sm-6 col-3"><div class="countdown-box">%S<h6>Seconds</h6></div></div></div>')) });

function fullScreenHeight() { var element = $(".full-height"); var $minheight = $(window).height(); if ($(".full-height").length > 0) { $(".full-height").css('min-height', $minheight) } else { element.css('min-height', $minheight) } }
if ($(".full-height").length > 0) { fullScreenHeight() }
$('.close-box').on("click", function() { $(this).parentsUntil('#1').slideToggle(); return !1 });
$("#style-switcher a").on("click", function() { $("#style-switcher").toggleClass('opened'); return !1 })
$(".style1").on("click", function() {
    $("#main_styles").attr("href", "css/styles.css");
    $("#navigation_menu").attr("href", "css/navigation.css");
    $("#main_logo").attr("src", "img/logos/logo.png");
    $("#footer_logo").attr("src", "img/logos/logo.png");
    $("#pixel_map").attr("src", "img/content/business/pixel_map.png");
    return !1
});
$(".style2").on("click", function() {
    $("#main_styles").attr("href", "css/styles-2.css");
    $("#navigation_menu").attr("href", "css/navigation-2.css");
    $("#main_logo").attr("src", "img/logos/logo-2.png");
    $("#footer_logo").attr("src", "img/logos/logo-2.png");
    $("#pixel_map").attr("src", "img/content/business/pixel_map_2.png");
    return !1
});
$(".style3").on("click", function() {
    $("#main_styles").attr("href", "css/styles-3.css");
    $("#navigation_menu").attr("href", "css/navigation-3.css");
    $("#main_logo").attr("src", "img/logos/logo-3.png");
    $("#footer_logo").attr("src", "img/logos/logo-3.png");
    $("#pixel_map").attr("src", "img/content/business/pixel_map_3.png");
    return !1
});
$(".style4").on("click", function() {
    $("#main_styles").attr("href", "css/styles-4.css");
    $("#navigation_menu").attr("href", "css/navigation-4.css");
    $("#main_logo").attr("src", "img/logos/logo-4.png");
    $("#footer_logo").attr("src", "img/logos/logo-4.png");
    $("#pixel_map").attr("src", "img/content/business/pixel_map_4.png");
    return !1
});
$(".style5").on("click", function() {
    $("#main_styles").attr("href", "css/styles-5.css");
    $("#navigation_menu").attr("href", "css/navigation-5.css");
    $("#main_logo").attr("src", "img/logos/logo-5.png");
    $("#footer_logo").attr("src", "img/logos/logo-5.png");
    $("#pixel_map").attr("src", "img/content/business/pixel_map_5.png");
    return !1
});
$(".style6").on("click", function() {
    $("#main_styles").attr("href", "css/styles-6.css");
    $("#navigation_menu").attr("href", "css/navigation-6.css");
    $("#main_logo").attr("src", "img/logos/logo-6.png");
    $("#footer_logo").attr("src", "img/logos/logo-6.png");
    $("#pixel_map").attr("src", "img/content/business/pixel_map_6.png");
    return !1
});
$(".style7").on("click", function() {
    $("#main_styles").attr("href", "css/styles-7.css");
    $("#navigation_menu").attr("href", "css/navigation-7.css");
    $("#main_logo").attr("src", "img/logos/logo-7.png");
    $("#footer_logo").attr("src", "img/logos/logo-7.png");
    $("#pixel_map").attr("src", "img/content/business/pixel_map_7.png");
    return !1
});
$(".style8").on("click", function() {
    $("#main_styles").attr("href", "css/styles-8.css");
    $("#navigation_menu").attr("href", "css/navigation-8.css");
    $("#main_logo").attr("src", "img/logos/logo-8.png");
    $("#footer_logo").attr("src", "img/logos/logo-8.png");
    $("#pixel_map").attr("src", "img/content/business/pixel_map_8.png");
    return !1
});
try {
    $('.erreor-box-404').ripples({ resolution: 512, dropRadius: 20, perturbance: 0.04, });
    $('main').ripples({ resolution: 512, dropRadius: 20, perturbance: 0.04, interactive: !1 })
} catch (e) { $('.error').show().text(e) }
$('.js-ripples-disable').on('click', function() {
    $('body, main').ripples('destroy');
    $(this).hide()
});
$('.js-ripples-play').on('click', function() { $('body, main').ripples('play') });
$('.js-ripples-pause').on('click', function() { $('body, main').ripples('pause') });
setInterval(function() {
    var $el = $('main');
    var x = Math.random() * $el.outerWidth();
    var y = Math.random() * $el.outerHeight();
    var dropRadius = 20;
    var strength = 0.04 + Math.random() * 0.04;
    $el.ripples('drop', x, y, dropRadius, strength)
}, 400)