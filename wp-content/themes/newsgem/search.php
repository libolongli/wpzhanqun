<?php get_header();?>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="left-bar">
            <div class="search-post">
<h1 class="search-title"><?php printf( esc_html__( 'Search Results for: %s', 'newsgem' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                 <?php if ( have_posts() ) : ?>
           <?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content','search');
			endwhile;
		    //bignews_numeric_posts_nav();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;?> 
            </div><!--search_post-->
          </div><!--left-bar-->
        </div><!--col-->
       <div class="col-md-4 col-sm-4 col-xs-12">
            <?php get_sidebar();?>
          </div><!--col-->
       </div><!--row-->
   </div><!--content-->
   </div>
<?php get_footer();?>