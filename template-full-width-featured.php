<?php
/**
 * Theme: Pure Bootstrap
 * The full page width template.
 * This is the template that displays all pages by default.
 * Template Name: Full - Featured Image
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
get_header(); ?>
  <div class="container main-content default-page">
    <?php while(have_posts()): the_post() ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if ( has_post_thumbnail()) : ?>
          <div class="img-thumbnail" style="width: 100%;">
              <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'larger'); ?>
              <div id="featured-image" class="full-width-featured-img img-thumbnail" style="background: url(<?php echo $image_url[0];?>)"></div>
            <?php endif; ?>
          </div>
        <div class="padding-top-20 padding-bottom-20">
          <?php remove_filter ('the_content', 'wpautop'); ?>
          <?php the_content(); ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php get_footer(); ?>