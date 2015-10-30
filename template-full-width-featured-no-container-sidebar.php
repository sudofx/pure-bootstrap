<?php
/**
  * Theme: Pure Bootstrap
  * The full page width template.
  * This is the template that displays all pages by default.
  * Template Name: Full - Featured Image No Container (sidebar)
  *
  * @package Pure Bootstrap
  * @version Pure Bootstrap 1.1.1
  */
get_header(); ?>
    <div class="main-content">
        <?php while(have_posts()): the_post() ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( has_post_thumbnail()) : ?>
                    <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'larger'); ?>
                    <div id=<?php echo '"featured-image-' . get_post_thumbnail_id($post->ID) .'"' ?> class="full-width-featured-img-no-container" style="background: url(<?php echo $image_url[0];?>)">
                        <div class="featured-img-block" style="display: none;"></div>
                    </div>
                <?php endif; ?>
                <?php remove_filter ('the_content', 'wpautop'); ?>
                <div class="col-sm-9 col-md-9">
                        <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
