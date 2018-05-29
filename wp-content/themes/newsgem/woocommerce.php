<?php get_header();?>
  <div class="content">
    <div class="container blog-post">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="left-bar">
           <?php if (have_posts()): woocommerce_content(); endif; ?>
          </div><!--left-bar-->
        </div><!--col-->
     </div><!--row-->
   </div><!--content-->
   </div>
   <?php get_footer();?>