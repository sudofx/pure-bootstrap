<?php
/**
 * Theme: Pure Bootstrap
 * The template for displaying the header.
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php bloginfo('title'); ?> | <?php
  if (!is_front_page()) echo single_post_title();
  else bloginfo('description');
?></title>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
<!-- Pure Bootstrap WordPress theme by CornDog Computers -->
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if ( show_header() ): ?>
<header id="header">
  <div class="container">
    <div id="headerimg">
      <h1>
        <a href="<?php echo get_option('home'); ?>" class="site-title"><?php bloginfo('name'); ?></a>
      </h1>
      <div class="description site-slogan" style="display: none;">
        <?php bloginfo('description'); ?>
      </div>
    </div>
  </div>
  <style>
    .navbar-brand { display: none }
  </style>
</header>
<?php endif ?>

<?php if ( show_header() ): ?>
  <div id="nav-container" class="container">
    <nav class="navbar navbar-default" role="navigation">
<?php else: ?>
    <nav class="navbar navbar-default" role="navigation">
<?php endif ?>
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand site-title" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
      <div class="description site-slogan" style="display: none;">
        <?php bloginfo('description'); ?>
      </div>
    </div>
    <?php
      wp_nav_menu( array(
        'menu'              => 'primary',
        'theme_location'    => 'primary',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'navbarCollapse',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker())
      );
    ?>
  </div>
</nav>

<?php if ( show_header() ): ?>
  </div>
<?php endif ?>

<div id="container">


