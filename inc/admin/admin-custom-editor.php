<?php
/**
 * Theme: Pure Bootstrap
 *
 * Custom editor for wordpress admin.
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
  
  global $custom_style, $custom_script;

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    foreach ( $_POST as $field => $value ) {
      if ($field == 'custom-style')  write_custom_file( $custom_style,  $value );
      if ($field == 'custom-script') write_custom_file( $custom_script, $value );
    }
  }

  /** initialize the page... bitches */
  function theme_options_init() {
    register_setting(
      'pure_bootstrap_custom_editor_options',
      'pure_bootstrap_custom_editor_theme_options'
    );
  }

  /** add theme page to the admin section */
  function theme_options_add_page() {
    add_theme_page(
      __( 'Theme Options',  'pure-bootstrap' ),
      __( 'Theme custom files',  'pure-bootstrap'),
      'edit_theme_options', 'theme_options',
      'theme_options_do_page'
    );
  }

  /** clean the strings before saving to file */
  function string_clean( $str ) {
    $str = str_replace('\"', '"', $str);
    $str = str_replace("\'", "'", $str);
    return $str;
  }

  /** read out the custom file to the textarea */
  function read_custom_file( $file ) {
    return fread( fopen($file, 'r'), filesize($file) );
  }

  /** write the custom file from the textarea */
  function write_custom_file( $file, $contents ) {
    copy($file, $file.'.bak');
    file_put_contents( $file, string_clean($contents), LOCK_EX );
  }

  /** write the custom file from the textarea */
  function theme_options_do_page() {
    
    global $custom_style, $custom_script;

    echo '
    <style>
      .container {
        padding-top: 20px !important;
        padding-bottom: 40px !important;
        max-width: 730px !important;
      }
      .textarea-editor {
        font-family: Consolas,Monaco,monospace !important;
        font-size: 12px !important;
      }
    </style>
    <div class="bootstrap-wrapper">
      <h1>Pure Boostrap theme options</h1>

      <!-- start style editor -->
      <div class="container">
        <h3>
          Custom stylesheet
        </h3>
        <form method="post" action="' . get_permalink() . '">
          <div>
            <textarea class="textarea-editor" name="custom-style" cols="100" rows="30">
'. read_custom_file( $custom_style ) .'
            </textarea>
          </div>
          <div>
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Update File">
          </div>
          
        </form>
        
      </div> <!-- end style editor -->

      <!-- start script editor -->
      <div class="container">
        <h3>
          Custom script
        </h3>
        <form method="post" action="' . get_permalink() . '">
          <div>
            <textarea class="textarea-editor" name="custom-script" cols="100" rows="30">
'. read_custom_file( $custom_script ) .'
            </textarea>
          </div>
          <div>
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Update File">
          </div>
        </form>
      </div> <!-- end script editor -->
    </div>
';
  }

  add_action('admin_init', 'theme_options_init');
  add_action('admin_menu', 'theme_options_add_page');

?>