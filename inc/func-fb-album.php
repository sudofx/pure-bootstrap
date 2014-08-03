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
      $photos = [];
      $data = false;
      $atts = shortcode_atts( array(
        'album' => '',
        'limit' => 24,
        'reverse' => False
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

    public function process_data( $photos, $html )
    {
      if (count($photos))
      {
        foreach($photos as $d)
        {
          $photo  = 10;
          $img    = $d['images'][$photo]['source'];
          $link   = $d['link'];
          $alt    = $d['name'];
          while (!isset($img))
          {
            $photo = $photo-1;
            $img = $d['images'][$photo]['source'];
          }
          $photo = 10;
          $html = $html.'<a href="'.$link.'"><div data-toggle="tooltip" title="'.$alt.'" class="fb-thumbnail" style="background: url('.$img.') no-repeat center center; background-size: cover;"></div></a>';
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