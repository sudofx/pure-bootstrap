<?php
/**
 * Theme: Pure Bootstrap
 * The page template.
 * This is the template that displays all pages by default.
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
get_header(); ?>
  <div class="container main-content  default-page">
    <div id="content" class="col-sm-9 col-md-9">
      <?php while(have_posts()): the_post() ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php if ( has_post_thumbnail()) : ?>
            <div class="img-thumbnail">
              <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
            </div>
          <?php endif; ?>
          <div class="padding-top-20 padding-bottom-20">
            <?php the_content(); ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>