<?php
/**
 * Theme: Pure Bootstrap
 * Theme functions file
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
  
  /** custom folder */
  $custom                 = 'custom';
  $custom_dir_name        = '@' . $custom;
  $custom_dir             = get_template_directory() . '/' . $custom_dir_name;
  /** file name only */
  $custom_style_file      = $custom.'.css';
  $custom_script_file     = $custom.'.js';
  $custom_functions_file  = $custom.'_functions.php';
  /** full path and file */
  $custom_style           = $custom_dir . '/'. $custom_style_file;
  $custom_script          = $custom_dir . '/'. $custom_script_file;
  $custom_functions       = $custom_dir . '/'. $custom_functions_file;

  /** theme options */
  include('inc/admin/admin-theme-options.php');

  /** base theme functions */
  include('inc/functions/overides.php');
  include('inc/functions/base.php');
  include('inc/functions/custom.php');

  /** custom navwalker for bootstrap navbar */
  require_once('inc/wp_bootstrap_navwalker.php');

  /** shortcodes
  ========================================================================== */

  /**
   * Facebook album shortcode examples:
   * [fb-album album=156033841132513 limit=20]
   * [fb-album album=156033841132513 limit=20 reverse=true]
   */
  include('inc/functions/fb-album.php');

  /**
   * Will add more options later.
   *
   * Contact Form shortcode examples:
   * [contact] (sent to default wp-admin)
   * [contact email=user@example.com]
   */
  include('inc/functions/contact-form.php');

  /** menus and widgets */
  include('inc/functions/menus.php');
  include('inc/functions/widgets.php');

  /** If no featured image is set, get the theme image placeholder */
  function get_thumbnail_or_placeholder() {
    $featured_image = get_template_directory_uri() . '/img/featured-placeholder.jpg';
    if ( has_post_thumbnail()) the_post_thumbnail('large', array('class' => 'img-responsive'));
    else echo '<img src="'.$featured_image.'" alt="no featured image" class="img-responsive">';
  }

  function fullscreen_nav() {
    include('inc/fullscreen-navbar.php');
  }

  function show_header() {
    return get_option( 'pure_bootstrap_option', 'show_header' );
  }

?>