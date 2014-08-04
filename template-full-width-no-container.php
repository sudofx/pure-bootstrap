<?php
/**
 * Theme: Pure Bootstrap
 * The full page width template.
 * This is the template that displays all pages by default.
 * Template Name: Full - No Container
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
get_header(); ?>
  <div class="main-content">
    <?php while(have_posts()): the_post() ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php remove_filter ('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  </div>
<?php get_footer(); ?>