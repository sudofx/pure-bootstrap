<?php
/**
 * Theme: Pure Bootstrap
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */

  // If no featured image is set, get the theme image placeholder
  function get_thumbnail_or_placeholder() {
    $featured_image = get_template_directory_uri() . '/img/featured-placeholder.jpg';
    if ( has_post_thumbnail()) the_post_thumbnail('large', array('class' => 'img-responsive'));
    else echo '<img src="'.$featured_image.'" alt="no featured image" class="img-responsive">';
  }

  function fullscreen_nav() {
    include('fullscreen-navbar.php');
  }



?>