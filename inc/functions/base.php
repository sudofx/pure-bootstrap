<?php
/**
 * Theme: Pure Bootstrap
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */

  /* Que third party scripts and stylesheets */
  function third_party_scripts() {
    
    $custom           = 'custom';
    $custom_dir_name  = '@' . $custom;
    $custom_dir       = get_template_directory() . '/' . $custom_dir_name;

    $theme_dir = get_template_directory_uri();
    $custom_bootstrap_stylesheet  = $custom.'.bootstrap.css';
    $custom_bootstrap_script      = $custom.'.bootstrap.js';

    /* Custom bootstrap */
    if ( file_exists($custom_dir.'/'.$custom_bootstrap_stylesheet) )
      wp_enqueue_style( 'custom-bootstrap-stylesheet', $theme_dir . '/' . $custom_dir_name . '/' . $custom_bootstrap_stylesheet, false  );
    else
      wp_enqueue_style( 'bootstrap-stylesheet', $theme_dir . '/css/bootstrap.min.css', false, '3.2.0'  );

    if ( file_exists($custom_dir.'/'.$custom_bootstrap_script) )
      wp_enqueue_script( 'custom-bootstrap-script', $theme_dir . '/' . $custom_dir_name . '/' . $custom_bootstrap_script, array('jquery') );
    else
      wp_enqueue_script( 'bootstrap-script', $theme_dir . '/js/bootstrap.min.js', array('jquery'), '3.2.0' );

    
    wp_enqueue_style( 'animate-stylesheet', $theme_dir . '/css/animate.min.css', false, '3.1.0' );
    wp_enqueue_style( 'font-awesome-stylesheet', $theme_dir . '/css/font-awesome.min.css', false, '4.1.0' );
    
    if (is_page_template('template-full-width-no-nav.php')) {
      wp_enqueue_script( 'plugins-script', $theme_dir . '/js/plugins.min.js', array('jquery') );
      wp_enqueue_script( 'scrollSections-script', $theme_dir . '/js/jquery.scrollSections.min.js', array('jquery'), '0.4.3' );
    }
  }

  /* Que theme base scripts and stylesheets */
  function base_scripts() {
    $theme_dir = get_template_directory_uri();
    wp_enqueue_script( 'base-script', $theme_dir . '/js/base.min.js', array('jquery') );
  }

  // Add IE8 conditional html5shiv.js and respond.js to header.
  function add_ie_html5_shim () {
    $theme_dir = get_template_directory_uri();
    echo '<!--[if lt IE 9]><script type="text/javascript" src="'. $theme_dir .'/js/html5shiv.min.js"></script><script type="text/javascript" src="'. $theme_dir .'/js/respond.min.js"></script><![endif]-->';
  }

  if (function_exists('add_action')) {
    add_action( 'wp_head', 'add_ie_html5_shim');
    add_action( 'wp_enqueue_scripts', 'third_party_scripts' );
    add_action( 'wp_enqueue_scripts', 'base_scripts' );
  }

?>