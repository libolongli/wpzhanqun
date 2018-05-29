<?php 
/*
Template Name:contact us
*/
get_header();?>
  <div class="content">
    <div class="container">
      <div class="row">
       <?php do_action('newsgem_contactform');?>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <?php get_sidebar();?>
          </div><!--col-->
       </div><!--row-->
   </div><!--content-->
   </div>
   <?php get_footer();?>