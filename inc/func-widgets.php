<?php
/**
 * Theme: Pure Bootstrap
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */

  if ( function_exists('register_sidebar') ) {
    /* First Sidebar widget */
    register_sidebar(array(
      'name' => 'First Right Sidebar',
      'id' => 'first-right-sidebar',
      'description' => 'The top bar',
      'before_widget' => '<div>',
      'after_widget' => '</div>'
    ));
    /* Second Sidebar widget */
    register_sidebar(array(
      'name' => 'Second Right Sidebar',
      'id' => 'second-right-sidebar',
      'description' => 'The second top bar',
      'before_widget' => '<div>',
      'after_widget' => '</div>'
    ));
    /* First footer widget */
    register_sidebar( array(
      'name' => 'Footer Widget Section 1',
      'id' => 'footer-widget-section-1',
      'description' => 'Appears in the footer area',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="footer-widget-title">',
      'after_title' => '</h3>',
    ) );
    /* Second footer widget */
    register_sidebar( array(
      'name' => 'Footer Widget Section 2',
      'id' => 'footer-widget-section-2',
      'description' => 'Appears in the footer area',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="footer-widget-title">',
      'after_title' => '</h3>',
    ) );
    /* Third footer widget */
    register_sidebar( array(
      'name' => 'Footer Widget Section 3',
      'id' => 'footer-widget-section-3',
      'description' => 'Appears in the footer area',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="footer-widget-title">',
      'after_title' => '</h3>',
    ) );
    /* Fourth footer widget */
    register_sidebar( array(
      'name' => 'Footer Widget Section 4',
      'id' => 'footer-widget-section-4',
      'description' => 'Appears in the footer area',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="footer-widget-title">',
      'after_title' => '</h3>',
    ) );

    /** add support for shortcodes in widgets */
    add_filter( 'widget_text', 'shortcode_unautop');
    add_filter( 'widget_text', 'do_shortcode', 11);
  }
  
?>