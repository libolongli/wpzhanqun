jQuery(document).ready(function(e){jQuery(".navbar.fixed .nav>ul").addClass("main-list"),jQuery("body").addClass("menu-canvas-off"),jQuery("body").prepend('<div class="mobile-menu"></div>'),jQuery(".main-list").clone().appendTo(".mobile-menu")

,jQuery(".header .img-logo").clone().appendTo(".mobile-menu"),jQuery(".mobile-menu .img-logo").insertBefore(".mobile-menu .main-list"),jQuery(".mobile-menu ul.main-list > li").find("ul").before('<span class="dropdown"><i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></div>'),jQuery(".mobile-menu").prepend('<div class="cross"><span class="layer one">&nbsp;</span><span class="layer two">&nbsp;</span></div>'),jQuery(".header .img-logo").find("ul").before('<span class="dropdown"><i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></div>'),jQuery(".mobile-menu").prepend('<div class="cross"><span class="layer one">&nbsp;</span><span class="layer two">&nbsp;</span></div>'),jQuery(".header .nav")

.after('<div class="toggle-mobile"><span class="layer one">&nbsp;</span><span class="layer two">&nbsp;</span><span class="layer three">&nbsp;</span></div>'),jQuery(".dropdown").click(function(e){jQuery(this).toggleClass("open"),jQuery(this).next("ul").slideToggle()}),jQuery(document).ready(function(e){var n=!0;jQuery(".toggle-mobile").click(function(){jQuery(".mobile-menu").toggleClass("show-menu"),jQuery(".wrapper").addClass("move-to-right"),jQuery("body").addClass("menu-canvas"),n=!1}),jQuery(".mobile-menu").click(function(){n=!1})

,jQuery("html,.mobile-menu>ul li a,.cross,.img-logo a").click(function(){n&&(jQuery(".mobile-menu").removeClass("show-menu"),jQuery(".wrapper").removeClass("move-to-right"),jQuery("body").removeClass("menu-canvas")),n=!0})})})

.ready(function(e) {

         var n = !0;

         jQuery(".toggle-mobile").click(function() {
             jQuery(".mobile-menu").toggleClass("show"), jQuery(".site-overlay").toggleClass("overlay-show"),jQuery(".toggle-mobile").toggleClass("open"), n = !1
         }), jQuery(".mobile-menu").click(function() {
             n = !1
         }), jQuery("html,.site-overlay,.mobile-menu li a").click(function() {
             n && (jQuery(".mobile-menu").removeClass("show"),jQuery(".toggle-mobile").removeClass("open"),jQuery(".site-overlay").removeClass("overlay-show")), n = !0

         })

		 jQuery(".cross").click(function(){
    jQuery(".toggle-mobile").removeClass("open");

});

})

// search toggle here

jQuery('.search .search-btn').click(function(){ jQuery('.navbar .search').toggleClass('select-input'); });
// Recommended menu



/* header sticky */

jQuery(function(jQuery) {
    jQuery(window).scroll(function() {
        jQuery(window).scroll(function() {
            var r = jQuery(window).scrollTop();
            r >= 210 ? jQuery('.navbar.fixed').addClass('sticky') : jQuery('.navbar.fixed').removeClass('sticky');

        });

    });

});

var owl = jQuery('.top-Stories-slider');
    owl.owlCarousel({
     margin:30,
     loop: true,
	 dots:false,
	 autoPlay: true,
	 nav:true,
	 smartSpeed:600,
     responsive: {
                   1000: {
            items: 1
        }
      }
  })


/*  blinking loader here */

jQuery(function() {
  jQuery('#blinking').vTicker();
});

/* bottom to top scroll */

jQuery(document).ready(function () {
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 800) {
            jQuery('.scrollup').fadeIn();
        } else {
            jQuery('.scrollup').fadeOut();
        }
    });
    jQuery('.scrollup').click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});

/* slider-1 */

var owl = jQuery('#slider-home');
    owl.owlCarousel({
     loop:true,
	 dots:false,
	 autoPlay:true,
	 nav:true,
	 items:1,
    smartSpeed:600,

 })



