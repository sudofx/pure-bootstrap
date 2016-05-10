<?php
    /**
    *   Theme: Pure Bootstrap
    *   @package Pure Bootstrap
    *   @version Pure Bootstrap 1.1.1
    */

    class FacebookAlbum
    {
        public function __construct()
        {
            add_shortcode( 'fb-album', array( $this, 'fb_album_shortcode') );
        }

        // array (array)
        public function get_photos( $atts )
        {
            $photos = array();
            $data = false;
            $atts = shortcode_atts( array(
                'token' => '',
                'album' => '',
                'limit' => 24,
                'reverse' => false
            ), $atts );

            $fields = 'photos.limit('.$atts['limit'].'){name,width,height,link,images}';
            $url = 'https://graph.facebook.com/v2.6/'.$atts['album'].'/?fields='.urlencode($fields).'&access_token='.$atts['token'];

            $data = file_get_contents( $url );
            if ($data)
            {
                $dataArr = json_decode($data, true);
                $photos = $dataArr['photos']['data'];

                /** reverse the array */
                if ($atts['reverse'])
                    $photos = array_reverse($photos);
            }
            return $photos;
        }

        // string (array, string)
        public function process_data( $photos, $html )
        {
            $num = 1;
            if (count($photos))
            {
                $page_id = get_the_ID();
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
                    $html = $html.'<a href="'.$link.'"><div data-toggle="tooltip" title="'.$alt.'" id="thumb-'.$page_id.'-'.$num.'" class="fb-thumbnail" style="background: url('.$img.') no-repeat center center; background-size: cover;"></div></a>';
                    $num++;
                }
            }
            return $html;
        }

        // string (array)
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
