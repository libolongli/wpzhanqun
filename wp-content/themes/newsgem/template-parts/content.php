<?php $class="entry-post wow fadeInUp";?>
<div id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
                 <div class="entry-img"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
                 <div class="entry_category"><?php the_category(); ?></div>
                  <div class="entry-info">
              <a href="<?php the_permalink();?>"><?php the_title( sprintf( '<h4 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' ); ?></a>
                   <span class="admin-name"><?php the_author_posts_link() ?></span> <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
                    <a href="<?php comments_link(); ?>">
<span class="entry-comment"><i class="fa fa-comments" aria-hidden="true"></i><?php comments_number(__('0 COMMENTS','newsgem'), __('1 COMMENT', 'newsgem'), __('% Comments', 'newsgem')); ?></span>
    </a>
                    </div>
                     <div class="entry-summary">
                        <?php the_excerpt();?>
                        <?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsgem' ),
							'after'  => '</div>',
						) );
						?>
                        <a href="<?php the_permalink();?>" class="btn"><?php echo  esc_html__( 'READ MORE', 'newsgem' );?></a>
                 </div><!--entry-summary-->
               </div><!--entry-post-->