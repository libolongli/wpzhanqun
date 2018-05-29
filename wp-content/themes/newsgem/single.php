<?php get_header();?>
  <div class="content">
    <div class="container single_post">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="left-bar">
              <div class="entry-post wow fadeInUp">
              <?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content','single');?>
                     <?php do_action('newsgem_author_info');?>
                    <?php do_action( 'newsgem_related_posts' );?>
					 <div class="comment_section wow fadeInUp">
                    <?php if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;?>
                  </div><!--contact_form-->
				<?php endwhile; // End of the loop.?>
               </div><!--entry-post-->
          </div><!--left-bar-->
        </div><!--col-->
        <div class="col-md-4 col-sm-4 col-xs-12">
           <?php get_sidebar();?>
          </div><!--col-->
       </div><!--row-->
   </div><!--content-->
   </div>
<?php get_footer();?>