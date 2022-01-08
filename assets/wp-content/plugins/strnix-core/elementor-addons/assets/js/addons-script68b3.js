(function ($) {
    "use strict";
    var strnixSlider = function ($scope, $) {
        if ($('.strnix-carousel').length) {
                $(".strnix-carousel").each(function (index) {
                var $owlAttr = {navText: [ '<span class="icon fa fa-angle-left"></span>', '<span class="icon fa fa-angle-right"></span>' ]},
                $extraAttr = $(this).data("options");
                $.extend($owlAttr, $extraAttr);
                $(this).owlCarousel($owlAttr);
            });
        }
        //MixitUp Gallery Filters
            if($('.filter-list').length){
                $('.filter-list').mixItUp({});
            }
    }
    var tabsBoc = function ($scope, $) {
     	if($('.tabs-box').length){
            $('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
                e.preventDefault();
                var target = $($(this).attr('data-tab'));
                
                if ($(target).is(':visible')){
                    return false;
                }else{
                    target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
                    $(this).addClass('active-btn');
                    target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
                    target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
                    $(target).fadeIn(300);
                    $(target).addClass('active-tab');
                }
            });
        }   
    }
    
    var countBox = function ($scope, $) {
        if($('.count-box').length){
            $('.count-box').appear(function(){
        
                var $t = $(this),
                    n = $t.find(".count-text").attr("data-stop"),
                    r = parseInt($t.find(".count-text").attr("data-speed"), 10);
                    
                if (!$t.hasClass("counted")) {
                    $t.addClass("counted");
                    $({
                        countNum: $t.find(".count-text").text()
                    }).animate({
                        countNum: n
                    }, {
                        duration: r,
                        easing: "linear",
                        step: function() {
                            $t.find(".count-text").text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $t.find(".count-text").text(this.countNum);
                        }
                    });
                }
                
            },{accY: 0});
        }
    }
    
    var mesonaRid = function ($scope, $) {
        	
            function enableMasonry() {
                if($('.masonry-container').length){
            
                    var winDow = $(window);
                    // Needed variables
                    var $container=$('.masonry-container');
            
                    $container.isotope({
                        itemSelector: '.masonry-item',
                        masonry: {
                            columnWidth : '.masonry-item'
                        },
                        animationOptions:{
                            duration:500,
                            easing:'linear'
                        }
                    });
                }
            }
            
            enableMasonry();

            /* ==========================================================================
   When document is Resized, do
            ========================================================================== */
                
                $(window).on('resize', function() {
                    enableMasonry();
                });	

            /* ==========================================================================
            When document is loading, do
            ========================================================================== */
                
                $(window).on('load', function() {
                    enableMasonry();
                });	

            
    }
    var accordionBox = function ($scope, $) {
        if($('.accordion-box').length){
            $(".accordion-box").on('click', '.acc-btn', function() {
                
                var outerBox = $(this).parents('.accordion-box');
                var target = $(this).parents('.accordion');
                
                if($(this).hasClass('active')!==true){
                    $(outerBox).find('.accordion .acc-btn').removeClass('active');
                }
                
                if ($(this).next('.acc-content').is(':visible')){
                    return false;
                }else{
                    $(this).addClass('active');
                    $(outerBox).children('.accordion').removeClass('active-block');
                    $(outerBox).find('.accordion').children('.acc-content').slideUp(300);
                    target.addClass('active-block');
                    $(this).next('.acc-content').slideDown(300);	
                }
            });	
        }
           
    }
    // var lazyImage = function ($scope, $) {
        
    // }
    
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/history_area__o.default', strnixSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/banner_slider__o.default', strnixSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/sponsors_area__o.default', strnixSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/services_area__o.default', strnixSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/programs_area__o.default', strnixSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/review_area__o.default', strnixSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/react_project_area__o.default', strnixSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/react_project_area__o.default', tabsBoc);
        elementorFrontend.hooks.addAction('frontend/element_ready/counter_area__o.default', countBox);
        elementorFrontend.hooks.addAction('frontend/element_ready/react_project_area__o.default', mesonaRid);
        elementorFrontend.hooks.addAction('frontend/element_ready/faq_area__o.default', accordionBox);
    });
})(jQuery);