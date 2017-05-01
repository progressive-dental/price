<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "progressive";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'progressive',
        'display_name' => 'Theme Options',
        'display_version' => '1.0.0',
        'page_slug' => 'road_runner',
        'page_title' => 'Theme Options',
        'update_notice' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Theme Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Header', 'progressive' ),
        'id'     => 'basic',
        'desc'   => __( 'Fields for the themes header', 'progressive' ),
        'icon'   => 'el el-home',
        'fields' => array(

            array(
                'id'        => 'top-bar-section',
                'type'      => 'section',
                'title'     => 'Top Bar Options',
                'subtitle'  => 'These options edit the themes top bar.',
                'indent'    => true
            ),
            array(
                'id'        => 'enable-new-patient-number',
                'type'      => 'switch',
                'title'     => 'Enable new patient number?',
                'default'   => false,
            ),
            
            array(
                'id'       => 'top-new-patient-text',
                'type'     => 'text',
                'default'  => 'NEW PATIENT:',
                'title'    => __( 'Custom Location Text', 'progressive' ),
                'required' => array('enable-new-patient-number','equals','1')
            ),
            array(
                'id'       => 'top-new-patient-number',
                'type'     => 'text',
                'default'  => '123.123.1234',
                'title'    => __( 'Custom Location Number', 'progressive' ),
                'required' => array('enable-new-patient-number','equals','1')
            ),
            array(
                'id'        => 'enable-current-patient-number',
                'type'      => 'switch',
                'title'     => 'Enable current patient number?',
                'default'   => false,
            ),
            array(
                'id'       => 'top-current-patient-text',
                'type'     => 'text',
                'default'  => 'CURRENT PATIENT:',
                'title'    => __( 'Current Location Text', 'progressive' ),
                'required' => array('enable-current-patient-number','equals','1')
            ),
            array(
                'id'       => 'top-current-patient-number',
                'type'     => 'text',
                'default'  => '123.123.1234',
                'title'    => __( 'Current Location Number', 'progressive' ),
                'required' => array('enable-current-patient-number','equals','1')
            ),
            array(
                'id'        => 'nav-bar-section',
                'type'      => 'section',
                'title'     => 'Navigation Bar Options',
                'subtitle'  => 'These options edit the themes navigation bar.',
                'indent'    => true
            ),
            array(
                'id'        => 'nav-logo',
                'type'      => 'media',
                'title'     => 'Logo',
            ),
            array(
                'id'        => 'header-scripts-section',
                'type'      => 'section',
                'title'     => 'Inline scripts & Styles',
                'subtitle'  => 'These options add inline scripts & styles to the header.',
                'indent'    => true
            ),
            array(
                'id'        => 'header-scripts',
                'type'      => 'textarea',
                'title'     => 'Header scripts',
            ),
            array(
                'id'        => 'header-styles',
                'type'      => 'textarea',
                'title'     => 'Header styles',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer', 'progressive' ),
        'id'     => 'footer',
        'desc'   => __( 'Fields for the themes footer', 'progressive' ),
        'icon'   => 'el el-website',
        'fields' => array(
            array(
                'id'        => 'footer-logo',
                'type'      => 'media',
                'title'     => 'Logo',
            ),
            array(
                'id'        => 'social-list-section',
                'type'      => 'section',
                'title'     => 'Social Icons',
                'subtitle'  => 'These options edit the social icons.',
                'indent'    => true
            ),
            array(
                'id'        => 'enable-facebook',
                'type'      => 'switch',
                'title'     => 'Enable Facebook?',
                'default'   => false,
            ),
            array(
                'id'        => 'facebook-link',
                'type'      => 'text',
                'title'     => 'Facebook URL',
                'required' => array('enable-facebook','equals','1')
            ),
            array(
                'id'        => 'enable-twitter',
                'type'      => 'switch',
                'title'     => 'Enable Twitter?',
                'default'   => false,
            ),
            array(
                'id'        => 'twitter-link',
                'type'      => 'text',
                'title'     => 'Twitter URL',
                'required' => array('enable-twitter','equals','1')
            ),
            array(
                'id'        => 'enable-youtube',
                'type'      => 'switch',
                'title'     => 'Enable Youtube?',
                'default'   => false,
            ),
            array(
                'id'        => 'youtube-link',
                'type'      => 'text',
                'title'     => 'Youtube URL',
                'required' => array('enable-youtube','equals','1')
            ),
            array(
                'id'        => 'footer-scripts-section',
                'type'      => 'section',
                'title'     => 'Inline scripts & Styles',
                'subtitle'  => 'These options add inline scripts & styles to the Footer.',
                'indent'    => true
            ),
            array(
                'id'        => 'footer-scripts',
                'type'      => 'textarea',
                'title'     => 'Footer scripts',
            ),
            array(
                'id'        => 'footer-styles',
                'type'      => 'textarea',
                'title'     => 'Footer styles',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'progressive' ),
        'id'     => 'general',
        'desc'   => __( 'General theme options.', 'progressive' ),
        'icon'   => 'el el-dashboard',
        'fields' => array(

            array(
                'id'        => 'favicon',
                'type'      => 'media',
                'title'     => 'Favicon',
            ),

    )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Theme Colors ( Beta )', 'progressive' ),
        'id'     => 'colors',
        'desc'   => __( 'Theme color options.', 'progressive' ),
        'icon'   => 'el el-brush',
        'fields' => array(
            array(
                'id'        => 'theme-color',
                'type'      => 'color',
                'title'     => 'Theme color',
                'desc'      => 'Used for theme-color and msapplication-TileColor.'
            ),
            array(
                'id'        => 'base-color-section',
                'type'      => 'section',
                'title'     => 'Base colors [DEV]',
                'desc'      => 'Dont use yet',
                'indent'    => true
            ),
            array(
                'id'        => 'primary-color',
                'type'      => 'color',
                'title'     => 'Primary color',
            ),
            array(
                'id'        => 'secondary-color',
                'type'      => 'color',
                'title'     => 'Secondary color',
            ),
            array(
                'id'        => 'tertiary-color',
                'type'      => 'color',
                'title'     => 'Tertiary color',
            ),
            array(
                'id'        => 'tint-color',
                'type'      => 'color',
                'title'     => 'Tint color',
            ),
            array(
                'id'        => 'accent-color',
                'type'      => 'color',
                'title'     => 'Accent color',
            ),
            array(
                'id'        => 'body-color-section',
                'type'      => 'section',
                'title'     => 'Body colors [DEV]',
                'desc'      => 'Dont use yet',
                'indent'    => true
            ),
            array(
                'id'        => 'text-color',
                'type'      => 'color',
                'title'     => 'Text color',
            ),
            array(
                'id'        => 'background-color',
                'type'      => 'color',
                'title'     => 'Background color',
            ),
        )
    ) );

    // Redux::setSection( $opt_name, array(
    //     'title' => __( 'Header', 'progressive' ),
    //     'id'    => 'header',
    //     'desc'  => __( 'Basic fields as subsections.', 'progressive' ),
    //     'icon'  => 'el el-home'
    // ) );

    // Redux::setSection( $opt_name, array(
    //     'title'      => __( 'Text', 'progressive' ),
    //     'desc'       => __( 'For full documentation on this field, visit: ', 'progressive' ) . '<a href="http://docs.reduxframework.com/core/fields/text/" target="_blank">http://docs.reduxframework.com/core/fields/text/</a>',
    //     'id'         => 'opt-text-subsection',
    //     'subsection' => true,
    //     'fields'     => array(
    //         array(
    //             'id'       => 'text-example',
    //             'type'     => 'text',
    //             'title'    => __( 'Text Field', 'progressive' ),
    //             'subtitle' => __( 'Subtitle', 'progressive' ),
    //             'desc'     => __( 'Field Description', 'progressive' ),
    //             'default'  => 'Default Text',
    //         ),
    //     )
    // ) );

    /*
     * <--- END SECTIONS
     */
