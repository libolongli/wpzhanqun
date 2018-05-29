<?php the_content();?>
<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsgem' ),
				'after'  => '</div>',
			) );
		?>