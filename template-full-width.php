<?php
/**
 * Theme: Pure Bootstrap
 * The full page width template.
 * This is the template that displays all pages by default.
 * Template Name: Full Width
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
get_header(); ?>
  <div class="container main-content default-page">
    <?php while(have_posts()): the_post() ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="padding-top-20 padding-bottom-20">
          <?php remove_filter ('the_content', 'wpautop'); ?>
          <?php the_content(); ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php get_footer(); ?>