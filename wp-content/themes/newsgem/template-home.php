<?php 
/*Template Name:home*/
get_header();?>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="banner">
      <?php do_action('newsgem_slider_ticker');?>
  </div><!--banner-->
          <div class="left-bar">
            <div class="main-posts row">
                <?php do_action( 'newsgem_feature_news_first' ); ?>
                <?php do_action( 'newsgem_feature_news_second' ); ?>
            </div><!--main-posts-->
             <?php  if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
				<?php endif; ?>   
            <div class="main-posts row">
             <?php do_action('newsgem_feature_news_secondsecion');?>
            </div><!--main-posts-->
            <?php do_action('newsgem_feature_fullnews');?>
           </div><!--left-bar-->
        </div><!--col-->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <?php get_sidebar();?>
          </div><!--col-->
       </div><!--row-->
   </div><!--content-->
   </div>
   <?php get_footer();?>
   <div class="scrollup" style="bottom:0"><i class="fa fa-angle-up"></i></div>
</div><!--close-wrapper-->
<?php wp_footer();?>
</body>
</html>