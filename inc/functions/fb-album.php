<?php
/**
 * Theme: Pure Bootstrap
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
  
  class FacebookAlbum
  { 

    public function __construct()
    {
      add_shortcode( 'fb-album', array( $this, 'fb_album_shortcode') );
    }

    public function get_photos( $atts )
    {
      $photos = array();
      $data = false;
      $atts = shortcode_atts( array(
        'album' => '',
        'limit' => 24,
        'reverse' => false
      ), $atts );

      $url = 'http://graph.facebook.com/'.$atts['album'].'/photos?limit='.$atts['limit'];
      $data = file_get_contents( $url );
      if ($data)
      {
        $dataArr = json_decode($data, true);
        $photos = $dataArr['data'];

        /** reverse the array */
        if ($atts['reverse'])
          $photos = array_reverse($photos);
      }
      return $photos;
    }

    public function format_string_for_html( $str )
    {
      $st r= str_replace( "&", "&amp;", $str );
      return $str;
    }
    public function process_data( $photos, $html )
    {
      $num = 1;
      if (count($photos))
      {
        $page_id = get_the_ID();
        foreach($photos as $d)
        {
          $photo  = 10;
          $img    = format_string_for_html( $d['images'][$photo]['source'] );
          $link   = format_string_for_html( $d['link'] );
          $alt    = format_string_for_html( $d['name'] );
          while (!isset($img))
          {
            $photo = $photo-1;
            $img = format_string_for_html( $d['images'][$photo]['source'] );
          }
          $photo = 10;
          $html = $html.'<a href="'.$link.'"><div data-toggle="tooltip" title="'.$alt.'" id="thumb-'.$page_id.'-'.$num.'" class="fb-thumbnail" style="background: url('.$img.') no-repeat center center; background-size: cover;"></div></a>';
          $num++;
        }
      }
      return $html;
    }

    public function fb_album_shortcode( $atts )
    {
      $html = '<div id="fb-album-id-'.$atts['album'].'" class="fb-album text-center">';
      $photos = $this->get_photos( $atts );
      $html = $this->process_data( $photos, $html );
      return $html.'</div>';
    }
  }
  

  $fb_album = new FacebookAlbum();
?>