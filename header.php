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
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('title'); ?></title>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
<!-- Pure Bootstrap WordPress theme by CornDog Computers -->
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<?php if ( show_header() ): ?>
<div id="header">
  <div class="container">
    <div id="headerimg">
      <h1>
        <a href="<?php echo get_option('home'); ?>" class="site-title"><?php bloginfo('name'); ?></a><span class="description site-slogan"> <?php bloginfo('description'); ?> </span>
      </h1>
    </div>
  </div>
  <style>
    .navbar-brand { display: none !important; }
  </style>
</div>
<?php endif ?>

<nav class="navbar navbar-default" role="navigation">
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
  </div>
</nav>

<div id="container">


