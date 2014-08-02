<?php
/**
 * Theme: Pure Bootstrap
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */

  function fb_album_shortcode( $atts ) {
    $atts = shortcode_atts( array(
      'album' => '',
      'limit' => 24,
      'reverse' => False
    ), $atts );

    $url = 'http://graph.facebook.com/'.$atts['album'].'/photos?limit='.$atts['limit'];
    $data = file_get_contents( $url );
    $dataArr = json_decode($data, true);
    $photos = $dataArr['data'];
    $html = '';
    if ( count($photos) ) {

      if ($atts['reverse']) $photos = array_reverse($photos);
      $html = $html.'<div id="fb-album-id-'.$atts['album'].'" class="fb-album text-center">';
        foreach($photos as $d) {
          $photo  = 10;
          $img    = $d['images'][$photo]['source'];
          $link   = $d['link'];
          $alt    = $d['name'];

          while (!isset($img)) {
            $photo = $photo-1;
            $img = $d['images'][$photo]['source'];
          }
          $photo = 10;
          $html = $html.'<a href="'.$link.'"><div data-toggle="tooltip" title="'.$alt.'" class="fb-thumbnail" style="background: url('.$img.') no-repeat center center; background-size: cover;"></div></a>';
        }
      $html = $html.'</div>';
      return $html;
    }
  }

  if ( function_exists( 'add_shortcode' ) ) {
    add_shortcode( 'fb-album', 'fb_album_shortcode' );
  }
?>