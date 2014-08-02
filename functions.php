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

  /** admin settings */
  include('inc/admin/admin-custom-editor.php');

  /** base theme functions */
  include('inc/func-overides.php');
  include('inc/func-custom-functions.php');
  include('inc/func-base.php');
  include('inc/func-custom.php');

  /** custom navwalker for bootstrap navbar */
  require_once('inc/wp_bootstrap_navwalker.php');

  /** shortcodes
  ========================================================================== */

  /**
   * Facebook album shortcode examples:
   * [fb-album album=156033841132513 limit=20]
   * [fb-album album=156033841132513 limit=20 reverse=true]
   */
  include('inc/func-fb-album.php');

  /**
   * Will add more options later.
   *
   * Contact Form shortcode examples:
   * [contact] (sent to default wp-admin)
   * [contact email=user@example.com]
   */
  include('inc/func-contact-form.php');

  /** menus and widgets */
  include('inc/func-menus.php');
  include('inc/func-widgets.php');

?>