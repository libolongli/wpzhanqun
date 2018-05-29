<?php get_header();?>
  <div class="content">
    <div class="container blog-post">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="left-bar">
                <?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
<?php endwhile; // End of the loop. ?>
          </div><!--left-bar-->
        </div><!--col-->
     </div><!--row-->
   </div><!--content-->
   </div>
<?php get_footer();?>