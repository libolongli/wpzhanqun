<?php $class="entry-post wow fadeInUp";?>
<div id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
<div class="entry-info">
                  <div class="entry_category"><?php the_category(); ?></div>
                 <h4 class="entry-title"><?php the_title();?></h4>
                   <span class="admin-name"><?php the_author_posts_link() ?> </span><span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
                     <a href="<?php comments_link(); ?>">
<span class="entry-comment"><i class="fa fa-comments" aria-hidden="true"></i><?php comments_number(esc_html__('0 COMMENTS','newsgem'), esc_html__('1 COMMENT', 'newsgem'), esc_html__('% Comments', 'newsgem')); ?></span>
    </a>
                    </div>
                     <div class="entry-img"><?php the_post_thumbnail();?></div>
                     <div class="entry-summary">
                       <?php the_content();?>
                    <div class="tag">
                     <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?> 
                   </div> 
                  </div><!--entry-summary-->
                  <div class="pagination wow fadeInUp">
                     <?php the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'newsgem' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'newsgem' ) . '</span> ' .
						'<p>%title</p>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'newsgem' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'newsgem' ) . '</span> ' .
						'<p>%title</p>',
				) );
?>
                  </div><!--pagination-->                  
</div>