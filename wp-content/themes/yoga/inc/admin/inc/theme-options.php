<?php
/**
 * This function defines the WTO constants
 */
function wto_constants() {

    define( 'WTO_DIR',          trailingslashit( get_template_directory() ) . 'inc/admin' );
    define( 'WTO_URL',          trailingslashit( get_template_directory_uri() ) . 'inc/admin' );

    define( 'WTO_INC_DIR',      trailingslashit( WTO_DIR ) . 'inc' );
    define( 'WTO_JS_DIR',       trailingslashit( WTO_DIR ) . 'js' );
    define( 'WTO_CSS_DIR',      trailingslashit( WTO_DIR ) . 'css' );
    define( 'WTO_IMAGES_DIR',   trailingslashit( WTO_DIR ) . 'images' );
    
    define( 'WTO_JS_URL',       trailingslashit( WTO_URL ) . 'js' );
    define( 'WTO_CSS_URL',      trailingslashit( WTO_URL ) . 'css' );
    define( 'WTO_IMAGES_URL',   trailingslashit( WTO_URL ) . 'images' );

    define( 'WTO_THEME_SETTINGS',           trailingslashit( WTO_DIR ) . 'theme-settings.php' );
    define( 'WTO_THEME_SETTINGS_SAMPLE',    trailingslashit( WTO_DIR ) . 'theme-settings-sample.php' );

    define( 'WTO_FORMS',                    trailingslashit( WTO_INC_DIR ) . 'forms.php' ); 

    define( 'WTO_PAGE_SLUG',                'theme-options' ); 
    define( 'WTO_PAGE_NAME',                __( 'Theme Options', 'wto' ) );   

}
add_action( 'wto_init', 'wto_constants' );


/**
 * Define WTO settings file
 */
function wto_settings_file() {

    if ( file_exists( WTO_THEME_SETTINGS ) ) {
        $theme_settings = WTO_THEME_SETTINGS;
    } else {
        $theme_settings = WTO_THEME_SETTINGS_SAMPLE;
    }

    return $theme_settings;

}


/**
 * Add a "Theme Options" menu to admin bar
 */
function wto_admin_bar_menu() { 
    global $wp_admin_bar, $wpdb;

    if ( !is_super_admin() || !is_admin_bar_showing() || !get_role('editor') )
        return;

    $wp_admin_bar->add_menu( array(
        'id'    => 'wto_theme_options',
        'title' => WTO_PAGE_NAME,
        'href'  => get_option( 'siteurl' ).'/wp-admin/themes.php?page=' . WTO_PAGE_SLUG
    ) );

}
add_action( 'admin_bar_menu', 'wto_admin_bar_menu', 1000 );



/**
 * Load necessary JavaScript and CSS files
 */
function wto_scripts() {

    if ( isset($_GET['page']) && $_GET['page'] == WTO_PAGE_SLUG ) {

        wp_enqueue_media();
        wp_enqueue_style( 'wp-color-picker' );

        wp_enqueue_script( 'wto-admin',         trailingslashit( WTO_JS_URL ) . 'admin.js', array( 'jquery' ) );
        wp_enqueue_script( 'wto-colorpicker',   trailingslashit( WTO_JS_URL ) . 'colorpicker.js', array( 'wp-color-picker' ) );
        wp_enqueue_script( 'wto-upload',        trailingslashit( WTO_JS_URL ) . 'upload.js', array( 'jquery' ) );

        wp_enqueue_style( 'wto-admin',          trailingslashit( WTO_CSS_URL ) . 'admin.css' );

    }

}
add_action('admin_print_scripts', 'wto_scripts');


/**
 * Register WTO Settings.
 */
function wto_register_settings() {

    include wto_settings_file();

    foreach ( $options as $option ) {
        if ( $option['type'] != 'heading' && $option['type'] != 'info' && $option['type'] != 'help' ) {
            if ( ! get_option( $option['id'] ) ) {
                update_option( $option['id'], $option['std'] );
            }
        }
    }


}
add_action( 'after_switch_theme', 'wto_register_settings' );


/**
 * WTO Admin Notice.
 */
function wto_admin_notice() {

    if ( isset( $_GET['page'] ) && $_GET['page'] == WTO_PAGE_SLUG ) {

        // Settings saved message
        if ( isset( $_GET['saved'] ) && $_GET['saved'] == 'true' ) {
            printf( '<div class="updated"><p><strong>%1$s</strong></p></div>',
                __( 'Settings Saved!', 'wto' )
            );
        }

    }

}
add_action( 'admin_notices', 'wto_admin_notice' );


/**
 * Init WTO Page.
 */
function wto_page_init() { 

    // Include the theme settings
    include wto_settings_file();

    // Define the current tab
    $current_tab = ( isset( $_GET[ 'tab' ] ) ) ? $_GET[ 'tab' ] : $options[0]['tab'];

    // If the current user can manage options and the page is the options page
    // Save, Reset, Backup and Restore is possible
    if ( current_user_can( 'manage_options' ) && isset( $_GET['page'] ) && $_GET['page'] == WTO_PAGE_SLUG ) {

        // Save Options
        if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {

            foreach ( $options as $option ) {

                if ( $option['type'] != 'heading' && $option['type'] != 'info' && $option['type'] != 'help' ) {

                    if ( isset( $_POST[$option['id']] ) ) {

                        if ( ! is_array( $_POST[$option['id']] ) ) {
                            $the_value = stripslashes( $_POST[$option['id']] );
                        } else {
                            $the_value = serialize( $_POST[$option['id']] );
                        }

                        update_option( $option['id'], $the_value );

                    } else {

                        delete_option( $option['id'] );
                        
                    }


                }

            }

            // Redirect to the theme options page
            wp_redirect( admin_url( 'themes.php?page='. WTO_PAGE_SLUG .'&tab='. $current_tab .'&saved=true' ) );
            die;

        }

     }


    // Generate the theme options menu
    $options_page = add_theme_page(
        WTO_PAGE_NAME,
        WTO_PAGE_NAME,
        'edit_themes',
        WTO_PAGE_SLUG,
        'wto_html_output',
        false,
        30
    );

    add_action( 'load-' . $options_page, 'wto_help_tab' );

}
add_action( 'admin_menu', 'wto_page_init' );


/**
 * TOF Help Page.
 */
function wto_help_tab () {

    global $options_page;

    $screen = get_current_screen();

    // Include the theme settings file
    include wto_settings_file();

    foreach ( $options as $option ) {
        if ( $option['type'] == 'help' ) {
            $screen->add_help_tab( array(
                'id'        => sanitize_title( $option['title'] ),
                'title'     => esc_attr( $option['title'] ),
                'content'   => $option['content']
            ) );           
        }
    }

}


/**
 * WPshed TOF HTML Output.
 */
function wto_html_output() {

    $tabs = '';

    // Include the theme settings file
    include wto_settings_file();

    // Include the options machine to populate the setting fields
    include WTO_FORMS;

?>

    <div class="wrap">

        <h2><?php echo $theme_name; ?></h2>

        <?php $current_tab = ( isset( $_GET[ 'tab' ] ) ) ? $_GET[ 'tab' ] : $options[0]['tab']; ?>
        <h2 class="nav-tab-wrapper">
            <?php

            foreach ( $options as $option ) {
                if ( $option['type'] == 'heading' ) {
                    $tab_class = ( $option['tab'] == $current_tab ) ? 'nav-tab-active' : '';
                    echo '<a href="?page='. WTO_PAGE_SLUG .'&tab='. $option['tab'] .'" class="nav-tab '. $tab_class .'">'. $option['title'] .'</a>'."\n";
                }
            }

            ?>
            
        </h2>

        <form method="post" id="wto-form" enctype="multipart/form-data">
            
            <table class="form-table">
                <tbody>

                    <input type="hidden" name="action" value="save" />                    
                    <?php echo $tabs; ?>
       
                    <tr valign="top">
                    <th scope="row"></th>
                    <td><input type="submit" class="button-primary" value="<?php _e( 'Save All Changes', 'wto' ); ?>" /></td>
                    </tr>
            
                </tbody>
            </table>
        </form>

    </div><!-- .wrap -->


    <?php

}

/**
 * Run the wto_init hook.
 */
do_action( 'wto_init' );
