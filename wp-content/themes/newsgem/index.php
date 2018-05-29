<?php get_header();?>
  <div class="content">
    <div class="container blog-post">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="left-bar">
               <?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content');
				?>
			<?php endwhile; ?>
			<?php the_posts_pagination(array(
								    'prev_text' => esc_html__( 'Prev', 'newsgem' ),
								    'next_text' => esc_html__( 'Next', 'newsgem' ),
								)); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
          </div><!--left-bar-->
        </div><!--col-->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <?php get_sidebar();?>
          </div><!--col-->
     </div><!--row-->
   </div><!--content-->
   </div>
   <?php get_footer();?>