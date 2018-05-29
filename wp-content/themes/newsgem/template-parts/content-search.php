<?php $post_classes=array('entry-post wow fadeInUp animated');?>
<div id="post-<?php the_ID(); ?>" <?php  post_class($post_classes); ?>>
                <div class="entry-img">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
                  <div class="entry-info">
                   <a href="<?php the_permalink();?>"><h4 class="entry-title"><?php the_title();?></h4></a>
                     <?php the_author_posts_link() ?> <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
                    <a href="<?php comments_link(); ?>"> <span class="entry-comment"> <i class="fa fa-comments" aria-hidden="true"></i><?php comments_number(esc_html__('0 COMMENTS','newsgem'), esc_html__('1 COMMENT', 'newsgem'), esc_html__('% Comments', 'newsgem')); ?></span></a>
                  </div>
                     <div class="entry-summary">
                       <?php the_excerpt();?>
                 </div><!--entry-summary-->
               </div><!--entry-post-->    