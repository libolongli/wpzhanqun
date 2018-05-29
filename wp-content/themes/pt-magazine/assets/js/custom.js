( function( $ ) {

	$(document).ready(function($){

		jQuery(".search-holder .search-style-two").hide();

		jQuery(".search-btn").click(function(e) {
		          
		        var parent_element = $(this).parent();
		        
		        parent_element.children('.search-holder .search-style-two').slideToggle();
		       
		        parent_element.toggleClass('open');

		        e.preventDefault();
		        
		});
		
		
		jQuery('#main-nav').meanmenu({
		    meanMenuContainer: '.main-navigation-holder',
		    meanScreenWidth:"1050"
		});

		/* slick slider starts */

		$('.main-slider').slick();

		$('#recent-news').slick({
		    autoplay: true,
		    autoplaySpeed: 3000,
		    dots: false,
		    slidesToShow: 1,
		    slidesToScroll: 1,
		    vertical: true,
		    arrows:false,
		    adaptiveHeight: true,
		});

		// Go to top.
		var $scroll_obj = $( '#btn-scrollup' );
		
		$( window ).scroll(function(){
			if ( $( this ).scrollTop() > 100 ) {
				$scroll_obj.fadeIn();
			} else {
				$scroll_obj.fadeOut();
			}
		});

		$scroll_obj.click(function(){
			$( 'html, body' ).animate( { scrollTop: 0 }, 600 );
			return false;
		});

		//sticky sidebar

		var main_body_ref = $("body");
		
		if( main_body_ref.hasClass( 'global-sticky-sidebar' ) ){
			$( '#primary, #sidebar-primary' ).theiaStickySidebar();
		}

	});

	/* Side bar custom tabs */

	$(".pane-tab-side").hide();
	$(".pane-tab-side.active").show();


	$(".tabbed-news-side li a").click(function(e){
		
		if($(this).parent().hasClass("active")) {
			return false;
		}

		$(".tabbed-news-side li").removeClass("active");


		var parent = $(this).parent();

		if(!parent.hasClass("active")){
			parent.addClass("active");
		}

		e.preventDefault();

		$(".content-tab-side .pane-tab-side.active").removeClass("active").hide();
		
		var tab_id = $(this).attr('href');
		//alert(tab_id);
		$(".content-tab-side "+tab_id).addClass("active").show();

	});

} )( jQuery );