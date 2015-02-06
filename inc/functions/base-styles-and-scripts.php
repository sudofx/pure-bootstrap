<?php
/**
 * Theme: Pure Bootstrap
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */

  /* Que third party scripts and stylesheets */
  function third_party_scripts() {
    
    global $theme_dir_uri, $custom, $custom_dir_name, $custom_dir, $use_cdn;

    $custom_bootstrap_stylesheet  = $custom.'.bootstrap.css';
    $custom_bootstrap_script      = $custom.'.bootstrap.js';
    $bs_style                     = $theme_dir_uri . '/css/bootstrap.min.css';
    $bs_script                    = $theme_dir_uri . '/js/bootstrap.min.js';
    $animate_style                = $theme_dir_uri . '/css/animate.min.css';
    $fa_style                     = $theme_dir_uri . '/css/font-awesome.min.css';
    $plugins_script               = $theme_dir_uri . '/js/plugins.min.js';
    $scroll_script                = $theme_dir_uri . '/js/jquery.scrollSections.min.js';

    /** CDNS */
    $cdn_bs_style       = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css';
    $cdn_bs_script      = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js';
    $cdn_animate_style  = '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css';
    $cdn_fa_style       = '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css';

    /** set $use_cdn in custom_functions.php */
    if ($use_cdn) {
      $bs_style       = $cdn_bs_style;
      $bs_script      = $cdn_bs_script;
      $animate_style  = $cdn_animate_style;
      $fa_style       = $cdn_fa_style;
    }

    /* Custom bootstrap */
    if ( file_exists($custom_dir.'/'.$custom_bootstrap_stylesheet) )
      wp_enqueue_style( 'custom-bootstrap-stylesheet', $theme_dir_uri . '/' . $custom_dir_name . '/' . $custom_bootstrap_stylesheet, false  );
    else
      wp_enqueue_style( 'bootstrap-stylesheet', $bs_style, false );

    if ( file_exists($custom_dir.'/'.$custom_bootstrap_script) )
      wp_enqueue_script( 'custom-bootstrap-script', $theme_dir_uri . '/' . $custom_dir_name . '/' . $custom_bootstrap_script, array('jquery') );
    else
      wp_enqueue_script( 'bootstrap-script', $bs_script, array('jquery') );

    
    wp_enqueue_style( 'animate-stylesheet', $animate_style, false );
    wp_enqueue_style( 'font-awesome-stylesheet', $fa_style, false );
    
    if (is_page_template('template-full-width-no-nav.php')) {
      wp_enqueue_script( 'plugins-script', $plugins_script, array('jquery') );
      wp_enqueue_script( 'scrollSections-script', $scroll_script, array('jquery') );
    }
  }

  /* Que theme base scripts and stylesheets */
  function base_scripts() {
    global $theme_dir_uri;
    wp_enqueue_script( 'base-script', $theme_dir_uri . '/js/base.min.js', array('jquery') );
  }

  // Add IE8 conditional html5shiv.js and respond.js to header.
  function add_ie_html5_shim () {
    global $theme_dir_uri;
    echo '<!--[if lt IE 9]><script type="text/javascript" src="'. $theme_dir_uri .'/js/html5shiv.min.js"></script><script type="text/javascript" src="'. $theme_dir_uri .'/js/respond.min.js"></script><![endif]-->';
  }

  if (function_exists('add_action')) {
    add_action( 'wp_head', 'add_ie_html5_shim');
    add_action( 'wp_enqueue_scripts', 'third_party_scripts' );
    add_action( 'wp_enqueue_scripts', 'base_scripts' );
  }

?>