<?php
/**
 * Theme: Pure Bootstrap
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */

  // delay feed update
  function publish_later_on_feed($where) {
    global $wpdb;
    if (is_feed()) {
      // timestamp in WP-format
      $now = gmdate('Y-m-d H:i:s');
      // value for wait; + device
      $wait = '5'; // integer
      // http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_timestampdiff
      $device = 'MINUTE'; // MINUTE, HOUR, DAY, WEEK, MONTH, YEAR
      // add SQL-sytax to default $where
      $where .= " AND TIMESTAMPDIFF($device, $wpdb->posts.post_date_gmt, '$now') > $wait ";
    }
    return $where;
  }
 
  /* Add feautured image support to theme */
  if (function_exists('add_theme_support')) { add_theme_support('post-thumbnails'); }

  /* Delay xml feed update after new posts */
  if (function_exists('add_filter')) { add_filter('posts_where', 'publish_later_on_feed'); }

  // Add a larger thumbnail
  if (function_exists('add_image_size')) { add_image_size( 'larger', 1920, 1080, true ); }

  /** http://codex.wordpress.org/Function_Reference/wpautop
    * Changes double line-breaks in the text into HTML paragraphs (<p>...</p>).
    * WordPress uses it to filter the content and the excerpt.
    *
    * ( CURENTLY DISABLED )
  */
  /*
  if ( function_exists('remove_filter') ) {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
  }
  */

?>