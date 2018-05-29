<?php
function newsgem_better_comments( $comment, $args, $depth ) {
	global $post;
	$author_id = $post->post_author;
	//$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments. ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'newsgem' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :
		// Proceed with normal comments. ?>
	<li id="li-comment-<?php comment_ID(); ?>">
      <div class="comment-body"> 
        <div class="avter-dp"><?php echo get_avatar( $comment, 60 ); ?></div>
        <div class="comment-text"> 
          <cite class="commentmeauthor"><?php esc_html(comment_author_link()); ?> 
		  <?php $posted_on = sprintf( esc_html( 'Posted on %1$s at %2$s', 'newsgem' ), get_comment_date(), get_comment_time() );printf( '<a href="%1$s">%2$s</a>', esc_url( get_comment_link() ), $posted_on );?></cite>  <?php edit_comment_link( wp_kses_post( esc_html__( 'Edit', 'newsgem' )), '<span class="edit-link">', '</span>' ); ?>       
           <?php comment_text(); ?>
            <?php comment_reply_link( array_merge( $args, array(
			'reply_text' => esc_html__( 'Reply', 'newsgem' ),
			'depth'      => $depth,
			'max_depth'	 => $args['max_depth'] )
			) ); ?>
          </div>
        </div>
         <?php if ( '0' == $comment->comment_approved ) : ?>
			<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'newsgem' ); ?></p>
		<?php endif; ?>
	<?php
	break;
	endswitch; // End comment_type check.
}