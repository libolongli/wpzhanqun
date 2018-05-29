<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
  <header class="header">
    <div class="top-bar">
      <div class="container">
        <div class="row">
           <?php do_action( 'newsgem_bracking' ); ?>
          <div class="col-md-4 col-sm-12 col-xs-12">
          <?php do_action( 'newsgem_author_social' ); ?>
          </div>
        </div>
      </div>
    </div><!--top-bar-->
    <div class="main-bar">
      <div class="container">
        <div class="row">
              <?php do_action( 'newsgem_logo' ); ?>
              <?php do_action( 'newsgem_headerads' ); ?>       
        </div>
      </div>
    </div><!--main-bar-->
    <div class="navbar">
      <div class="container">
        <nav class="nav">
     <?php wp_nav_menu( array('theme_location'=>'primary','container' => '', 'container_class' => '', 'container_id' => '', 'menu_class'=>'','depth'=> 0)); ?> 
          <?php do_action( 'newsgem_searchform' ); ?>
        </nav><!--close-nav-->
      </div>
    </div><!--navbar-->
    <div class="navbar fixed">
      <div class="container">
        <nav class="nav">
     <?php wp_nav_menu( array('theme_location'=>'primary','container' => '', 'container_class' => '', 'container_id' => '', 'menu_class'=>'','depth'=> 0)); ?> 
          <?php do_action( 'newsgem_searchform' ); ?>
        </nav><!--close-nav-->
      </div>
    </div><!--navbar fixed-->
  </header><!--close-header-->