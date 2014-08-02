<?php
/**
 * Theme: Pure Bootstrap
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
  
  if ( function_exists('register_nav_menus') ) {
    /* Menu options for the theme */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'pure-bootstrap' ),
        'foot' => __( 'Footer Menu', 'pure-bootstrap' ),
        'fullscreen-nav' => __( 'Fullscreen Menu', 'pure-bootstrap' )
    ) );
  }
  
?>