<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "global_variable";

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'redux_demo',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    );

    

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */
    Redux::setSection($opt_name, array(
        'title' => 'Header options',
        'id'    => 'header_area',
        'icon'  => 'el el-home-alt',
        'desc'  => 'This is your website header options with sticky menu',
        'fields'=> array(
            array(
                'id'        => 'header_font_size',
                'title'     => 'Font Size',
                'desc'      => 'Header menu items font size ( require type PX )',
                'type'      => 'text',
                'default'   => '15px'
            ),
            array(
                'id'        => 'header_logo_size',
                'title'     => 'Logo Size',
                'desc'      => 'Header logo size ( require type PX )',
                'type'      => 'text',
                'default'   => '220px'
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'id'            => 'header_color',
        'title'         => 'Color',
        'desc'          => 'All header color options',
        'subsection'    => true,
        'fields'        => array(
            array(
                'id'        => 'header_text_color',
                'title'     => 'Header font color change :',
                'type'      => 'color',
                'default'   => '#ffffff'
            ),
            array(
                'id'        => 'sticky_header_text_color',
                'title'     => 'Sticky header font color change :',
                'type'      => 'color',
                'default'   => '#333'
            ),
            array(
                'id'        => 'header_text_active_color',
                'title'     => 'Header active font color change :',
                'type'      => 'color',
                'default'   => '#000'
            ),
            array(
                'id'        => 'header_dot_effect_color',
                'title'     => 'Header dot effect color change :',
                'type'      => 'color',
                'default'   => '#1EBBA3'
            ),
            array(
                'id'        => 'header_bg_color',
                'title'     => 'Header background color change :',
                'type'      => 'color',
                'default'   => 'transparent'
            ),
            array(
                'id'        => 'sticky_bg_color',
                'title'     => 'Sticky header background color change :',
                'type'      => 'color',
                'default'   => '#ffffff'
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'id'        => 'header_logo',
        'title'     => 'Logo options',
        'icon'      => 'el el-smiley',
        'desc'      => 'All logo options in thie website',
        'fields'    => array(
            array(
                'id'    => 'header_logo_1',
                'title' => 'Upload Logo in header :',
                'type'  => 'media'
                
            ),
            array(
                'id'    => 'header_logo_2',
                'title' => 'Upload Logo for sticky background :',
                'type'  => 'media'
            ),
            array(
                'id'    => 'header_logo_3',
                'title' => 'Upload Logo for footer widget :',
                'type'  => 'media'
            ),
            array(
                'id'    => 'alt',
                'title' => 'All Alternative text for your logo :',
                'type'  => 'text',
                'default'=> 'Logo'
            )
        )

    ));

    // for contact form add
    Redux::setSection($opt_name, array(
        'id'        => 'contact_section',
        'title'     => 'Get in touch',
        'icon'      => 'el el-envelope',
        'desc'      => 'Add all contect form section options here',
        'fields'    => array(
            array(
                'id'    => 'contact_form_7',
                'title' => 'Contact from',
                'subtitle'  => 'Add contact form short code for the contact module.',
                'default'   => 'Add your contact form short code here',
                'type'      => 'editor'
            )
        )
    ));