<?php
/**
 * Theme: Pure Bootstrap
 * The full page width template.
 * This is the template that displays all pages by default.
 * Template Name: Full - No Navigation
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
get_header(); ?>
  <?php fullscreen_nav(); ?>
  <div class="main-content no-nav">
    <div class="nav-menu">
      <i id="show-nav" class="fa fa-bars text-primary"></i>
    </div>
    <?php while(have_posts()): the_post() ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php remove_filter ('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  </div>
<?php get_footer(); ?>