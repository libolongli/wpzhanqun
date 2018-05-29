<?php
/**
 * The template for displaying all single posts.
 *
 * @package SportsMag
 */

get_header(); 
global $post;
wp_reset_postdata();
$sportsmag_show_breadcrumbs = of_get_option( 'show_hide_breadcrumbs', '1' );
$sportsmag_post_template_value = of_get_option( 'global_post_template', 'single' );
$sportsmag_post_template = get_post_meta( $post->ID, 'accesspress_mag_post_template_layout', true );
if( $sportsmag_post_template == 'global-template' || empty($sportsmag_post_template) ){
    $sportsmag_content_value = $sportsmag_post_template_value;
} 
else {
    $sportsmag_content_value = $sportsmag_post_template;
}
do_action( 'sportsmag_before_body_content' );
?>

<div class="apmag-container">
    <?php
        if ( (function_exists( 'accesspress_mag_breadcrumbs' ) && $sportsmag_show_breadcrumbs == 1 ) ) {
    	    accesspress_mag_breadcrumbs();
        }
    ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', $sportsmag_content_value ); ?>
            <?php 
                $sportsmag_show_author_box = of_get_option( 'show_author_box' );
                if( $sportsmag_show_author_box == 1 ) {
            ?>
            <div class="author-metabox">
                <?php
                    $sportsmag_author_id = $post->post_author;
                    $sportsmag_author_avatar = get_avatar( $sportsmag_author_id, '106' );
                    $sportsmag_author_nickname = get_the_author_meta( 'display_name' );                
                ?>
                <div class="author-avatar">
                    <a class="author-image" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo $sportsmag_author_avatar; ?></a>
                </div>
                <div class="author-desc-wrapper">                
                    <a class="author-title" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo esc_attr( $sportsmag_author_nickname ); ?></a>
                    <div class="author-description"><?php echo get_the_author_meta('description');?></div>
                    <a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) );?>" target="_blank"><?php echo esc_url( get_the_author_meta( 'user_url' ) );?></a>
                </div>
            </div><!--author-metabox-->
            <?php } ?>

			<?php 
                $sportsmag_show_post_navigation = of_get_option( 'show_post_nextprev' );
                if( $sportsmag_show_post_navigation != '0' ){ accesspress_mag_post_navigation(); }
             ?>

			<?php
                // If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
            
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
    $sportsmag_global_sidebar= of_get_option( 'global_post_sidebar', 'right-sidebar' );
    $sportsmag_post_sidebar = get_post_meta( $post->ID, 'accesspress_mag_sidebar_layout', true );
    if( $sportsmag_post_sidebar == 'global-sidebar' || empty( $sportsmag_post_sidebar ) ){
        $sportsmag_sidebar_option = $sportsmag_global_sidebar;
    } else {
        $sportsmag_sidebar_option = $sportsmag_post_sidebar;
    }
    if( $sportsmag_sidebar_option != 'no-sidebar' ){
        $sportsmag_option_value = explode( '-', $sportsmag_sidebar_option ); 
        get_sidebar( $sportsmag_option_value[0] );
    }
 ?>
</div>
<?php do_action( 'sportsmag_after_body_content' ); ?>
<?php get_footer(); ?>