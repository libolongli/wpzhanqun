jQuery(document).ready(function($){
   
   /*Slider for third block*/
   $('.blockSlider').bxSlider({
        slideWidth: 200,
        minSlides: 5,
        maxSlides: 5,
        slideMargin: 10,
        ticker: true,
        speed: 50000,
        tickerHover: true,
        useCSS: false
       
   });
   
   /*youtube list*/
   $('.list-thumb').click(function(){
        var thumbIdattr = $(this).attr('id');
        var thumbId = thumbIdattr.split('-');
        $('.list-thumb').removeClass('active');
        $(this).addClass('active');
        $('.video-frame').hide();
        $('#ytvideo-'+thumbId[1]).show();
   });
   
   /*Block Carousel */
   
    $('.block-Carousel').bxSlider({
      minSlides: 1,
      maxSlides: 3,
      moveSlides: 1,
      slideWidth: 240,
      pager: false,
      nextText: '<i class="fa fa-chevron-right"></i>',
      prevText: '<i class="fa fa-chevron-left"></i>',
      slideMargin: 10
    });

});

/* Content refresh */
