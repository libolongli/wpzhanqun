<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
<footer class="footer wow fadeInUp">
     <div class="container">
       <div class="row">
		 <?php dynamic_sidebar( 'footer-widgets' ); ?>
       </div>
     </div>
   </footer>
    <?php endif; ?>
   <?php do_action('newsgem_copyright');?>
    <div class="scrollup" style="bottom:0"><i class="fa fa-angle-up"></i></div>
</div><!--close-wrapper-->
<?php wp_footer();?>
</body>
</html>