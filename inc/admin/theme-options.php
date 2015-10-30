<?php
    /**
    *   Theme: Pure Bootstrap
    *   @package Pure Bootstrap
    *   @version Pure Bootstrap 1.1.1
    */

    global $custom_style, $custom_script;

    class ThemeOptions
    {
        /** Holds the values to be used in the fields callbacks */
        private $options;
        public $style;

        // void (string, string)
        public function __construct($st, $sc)
        {
            /** Start up */
            $this->style = $st;
            $this->script = $sc;

            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                foreach ( $_POST as $field => $value ) {
                    if ($field == 'custom-style')  $this->write_custom_file( $this->style,  $value );
                    if ($field == 'custom-script') $this->write_custom_file( $this->script, $value );
                }
            }
            add_action( 'admin_menu', array( $this, 'add_theme_options_page' ) );
            add_action( 'admin_init', array( $this, 'page_init' ) );
        }

        // void (void)
        public function add_theme_options_page()
        {
            /**
             *  Add options page
             *  This page will be under "Settings"
             */
            add_theme_page(
                'Theme Options',
                'Theme Options',
                'manage_options',
                'my-setting-admin',
                array( $this, 'create_theme_admin_page' )
            );
        }

        // string (string)
        public function string_clean( $str )
        {
            /** clean the strings before saving to file */
            $str = str_replace('\"', '"', $str);
            $str = str_replace("\'", "'", $str);
            return $str;
        }

        // string (string)
        public function read_custom_file( $file )
        {
            /** read out the custom file to the textarea */
            return fread( fopen($file, 'r'), filesize($file) );
        }

        // void (string, string)
        public function write_custom_file( $file, $contents )
        {
            /** write the custom file from the textarea */
            copy($file, $file.'.bak');
            file_put_contents( $file, $this->string_clean($contents), LOCK_EX );
        }

        // void (void)
        public function create_theme_admin_page()
        {
            /** Options page callback */
            $this->options = get_option( 'pure_bootstrap_option' );
            ?>
            <style>
                .pbs-ta-container {
                    padding-top: 20px !important;
                    padding-bottom: 40px !important;
                    max-width: 730px !important;
                }
                .pbs-ta-editor {
                    font-family: Consolas,Monaco,monospace !important;
                    font-size: 12px !important;
                    padding-top: 20px !important;
                    margin-bottom: 10px !important;
                    max-width: 730px !important;
                }
            </style>
            <div class="wrap">
                <?php screen_icon(); ?>
                <h2>Theme Options</h2>
                <form method="post" action="options.php">
                <?php
                    // This prints out all hidden setting fields
                    settings_fields( 'pure_bootstrap_option_group' );
                    do_settings_sections( 'my-setting-admin' );
                    submit_button();
                ?>
                </form>
            </div>

            <div class="pbs-ta-container">
                <h3>Custom stylesheet</h3>
                <form method="post" action="<?php get_permalink() ?>">
                    <textarea class="pbs-ta-editor" name="custom-style" cols="100" rows="30"><?php echo $this->read_custom_file( $this->style ) ?></textarea>
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                </form>
            </div>

            <div class="pbs-ta-container">
                <h3>Custom script</h3>
                <form method="post" action="<?php get_permalink() ?>">
                    <textarea class="pbs-ta-editor" name="custom-script" cols="100" rows="30"><?php echo $this->read_custom_file( $this->script ) ?></textarea>
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                </form>
            </div>

            <?php
        }

        // void (void)
        public function page_init()
        {
            /** Register and add settings */
            register_setting(
                'pure_bootstrap_option_group', // Option group
                'pure_bootstrap_option', // Option name
                array( $this, 'sanitize' ) // Sanitize
            );

            add_settings_section(
                'setting_section_id', // ID
                'General Options', // Title
                array( $this, 'print_section_info' ), // Callback
                'my-setting-admin' // Page
            );

            add_settings_field(
                'pure_bootstrap_show_header', // ID
                'Show Header', // Title
                array( $this, 'show_header_callback' ), // Callback
                'my-setting-admin', // Page
                'setting_section_id' // Section
            );
        }

        // array (array)
        public function sanitize( $input )
        {
            /**
             *  Sanitize each setting field as needed
             *  @param array $input Contains all settings fields as array keys
             */
            $new_input = array();
            if ( isset($input['show_header']) ) {
                $new_input['show_header'] = $input['show_header'];
            }

            return $new_input;
        }

        // void (void)
        public function print_section_info()
        {
            /** Print the Section text */
            print '';
        }

        // void (void)
        public function show_header_callback()
        {
            /** Get the settings option array and print one of its values */
            printf(
                '<input type="checkbox" id="show_header" name="pure_bootstrap_option[show_header]" value="%s" %s/>',
                isset( $this->options['show_header'] ) ? 1:0,
                isset( $this->options['show_header'] ) ? 'checked="checked"': ''
            );
        }
    }

    if ( is_admin() ) {
        $theme_options = new ThemeOptions($custom_style, $custom_script);
    }
?>
