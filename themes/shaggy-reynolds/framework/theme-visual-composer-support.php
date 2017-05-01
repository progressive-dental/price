<?php

add_action( 'vc_before_init', 'progressive_integrate_VC' );
//add_action( 'wp_enqueue_scripts', 'remove_visual_composer_stylesheets' );

require_once ( FRAMEWORK_ROOT . '/vc/pd-card.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-comparison.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-media-object.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-section-header.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-counters.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-testimonial.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-sponsors.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-sponsor.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-masthead.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-masthead-headline.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-parrallax-image-or-video-bg.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-staff-card.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-media.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-implant.php' );

function progressive_integrate_VC() {

    $row_atts = array(
      array(
        'type' => 'dropdown',
        'heading' => 'Vertical Align?',
        'param_name' => 'valign',
        'weight' => '2',
        'value' => array(
          "No" => "",
          "Yes" => "valign"
        )
      )
    );

    $open_on_create = array(
      'show_settings_on_create' => true
    );

    $text_atts = array(
      array(
        'type' => 'dropdown',
        'heading' => 'Text align',
        'param_name' => 'align_text',
        "value" => array(
          "Default" => "",
          "Center" => "text-center",
          "Left" => "text-left",
          "Right" => "text-right"
        )
      )
    );

    $btn_atts = array(
      array(
        'type' => 'dropdown',
        'heading' => __( 'Color', 'js_composer' ),
        'description' => __( 'Select button display color.', 'js_composer' ),
        'param_name' => 'color',
        // partly compatible with btn2, need to be converted shape+style from btn2 and btn1
        'value' => array(
          __( 'Select', 'js_composer' ) => '',
          __( 'Primary', 'js_composer' ) => 'primary',
          __( 'Secondary', 'js_composer' ) => 'secondary',
          __( 'Tertiary', 'js_composer' ) => 'tertiary',
          __( 'Accent', 'js_composer' ) => 'accent',
          __( 'Accent Dark', 'js_composer' ) => 'accent-dark',
          __( 'Light', 'js_composer' ) => 'light',
          __( 'Tint', 'js_composer' ) => 'tint',
          __( 'Default', 'js_composer' ) => 'default',
        ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Size', 'js_composer' ),
        'param_name' => 'size',
        'description' => __( 'Select button display size.', 'js_composer' ),
        'weight' => 1,
        // compatible with btn2, default md, but need to be converted from btn1 to btn2
        'std' => 'medium',
        'value' => array(
          'Small' => 'small',
          'Normal' => 'medium',
          'Large' => 'Large',
          'Full' => 'full',
        ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Ghost', 'js_composer' ),
        'param_name' => 'ghost',
        'description' => __( 'Select to ghost the button.', 'js_composer' ),
        // compatible with btn2, default md, but need to be converted from btn1 to btn2
        'std' => 'no',
        'value' => array(
          'No' => 'no',
          'Yes' => 'yes',
        ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Is this a popup video?', 'js_composer' ),
        'param_name' => 'popup_video',
        'value' => array(
          'No' => '',
          'Yes' => 'yes',
        ),
      )
    );

    vc_add_params( 'vc_row', $row_atts );
    vc_add_params( 'vc_column_text', $text_atts );
    vc_map_update( 'vc_section', $open_on_create );
    vc_remove_param( 'vc_btn', 'style' );
    vc_remove_param( 'vc_btn', 'gradient_color_1' );
    vc_remove_param( 'vc_btn', 'gradient_color_2' );
    vc_remove_param( 'vc_btn', 'gradient_custom_color_1' );
    vc_remove_param( 'vc_btn', 'gradient_custom_color_2' );
    vc_remove_param( 'vc_btn', 'custom_background' );
    vc_remove_param( 'vc_btn', 'custom_text' );
    vc_remove_param( 'vc_btn', 'outline_custom_color' );
    vc_remove_param( 'vc_btn', 'outline_custom_hover_background' );
    vc_remove_param( 'vc_btn', 'outline_custom_hover_text' );
    vc_remove_param( 'vc_btn', 'gradient_text_color' );
    vc_remove_param( 'vc_btn', 'size' );


    vc_remove_param( 'vc_section', 'video_bg' );
    vc_remove_param( 'vc_section', 'video_bg_url' );
    vc_remove_param( 'vc_section', 'video_bg_parallax' );
    vc_remove_param( 'vc_section', 'parallax' );
    vc_remove_param( 'vc_section', 'parallax_image' );
    vc_remove_param( 'vc_section', 'parallax_speed_video' );
    vc_remove_param( 'vc_section', 'parallax_speed_bg' );
    vc_remove_param( 'vc_section', 'css' );
    vc_remove_param( 'vc_section', 'full_width' );
    vc_remove_param( 'vc_section', 'full_height' );
    vc_remove_param( 'vc_section', 'content_placement' );
    vc_remove_param( 'vc_section', 'css_animation' );
    vc_remove_param( 'vc_section', 'disable_element' );

    vc_remove_param( 'vc_row', 'css' );
    vc_remove_param( 'vc_row', 'gap' );
    vc_remove_param( 'vc_row', 'row_stretch' );
    vc_remove_param( 'vc_row', 'css_animation' );
    vc_remove_param( 'vc_row', 'video_bg_parallax' );
    vc_remove_param( 'vc_row', 'video_bg' );
    vc_remove_param( 'vc_row', 'video_bg_url' );
    vc_remove_param( 'vc_row', 'content_placement' );
    vc_remove_param( 'vc_row', 'equal_height' );
    vc_remove_param( 'vc_row', 'full_height' );
    vc_remove_param( 'vc_row', 'full_width' ); 
    vc_remove_param( 'vc_row', 'columns_placement' );
    vc_remove_param( 'vc_row', 'parallax' );
    vc_remove_param( 'vc_row', 'parallax_speed_bg' );
    vc_remove_param( 'vc_row', 'parallax_image' );
    vc_remove_param( 'vc_row', 'parallax_speed_video' );
    vc_remove_param( 'vc_row', 'disable_element' );

    vc_remove_param( 'vc_column', 'css' );
    vc_remove_param( 'vc_column', 'css_animation' );
    
    vc_remove_param( 'vc_tta_section', 'add_icon-true' );
    vc_remove_param( 'vc_tta_accordion', 'css' );
    vc_remove_param( 'vc_tta_accordion', 'style' );
    vc_remove_param( 'vc_tta_accordion', 'shape' );
    vc_remove_param( 'vc_tta_accordion', 'color' );
    vc_remove_param( 'vc_tta_accordion', 'spacing' );
    vc_remove_param( 'vc_tta_accordion', 'gap' );
    vc_remove_param( 'vc_tta_accordion', 'c_align' );
    vc_remove_param( 'vc_tta_accordion', 'no_fill' );
    vc_remove_param( 'vc_tta_accordion', 'autoplay' );
    vc_remove_param( 'vc_tta_accordion', 'collapsible_all' );
    vc_remove_param( 'vc_tta_accordion', 'c_icon' );
    vc_remove_param( 'vc_tta_accordion', 'c_position' );
    vc_remove_param( 'vc_tta_accordion', 'css_animation' );

    vc_remove_param( 'vc_column_text', 'css' );
    vc_remove_param( 'vc_column_text', 'css_animation' );

    vc_add_params( 'vc_btn', $btn_atts );


    vc_remove_element( 'vc_wp_meta' );
    vc_remove_element( 'vc_wp_search' );
    vc_remove_element( 'vc_wp_recent_comments' );
    vc_remove_element( 'vc_wp_calendar' );
    vc_remove_element( 'vc_wp_pages' );
    vc_remove_element( 'vc_masonry_grid' );
    vc_remove_element( 'vc_masonry_media_grid' );
    vc_remove_element( 'vc_line_chart' );
    vc_remove_element( 'vc_round_chart' );
    vc_remove_element( 'vc_pie' );
    vc_remove_element( 'vc_flickr' );
    vc_remove_element( 'vc_pinterest' );
    vc_remove_element( 'vc_googleplus' );
    vc_remove_element( 'vc_facebook' );
    vc_remove_element( 'vc_tweetmeme' );

    vc_remove_element( 'vc_tta_pageable' );
    vc_remove_element( 'vc_tta_tabs' );
    vc_remove_element( 'vc_tta_tour' );
    vc_remove_element( 'vc_cta' );
    vc_remove_element( 'vc_empty_space' );
    vc_remove_element( 'vc_message' );
    vc_remove_element( 'vc_posts_slider' );
    vc_remove_element( 'vc_progress_bar' );
    vc_remove_element( 'vc_separator' );

    vc_remove_element( 'vc_text_separator' );
    vc_remove_element( 'vc_toggle' );
    vc_remove_element( 'vc_progress_bar' );
    vc_remove_element( 'vc_custom_heading' );

    vc_remove_element( 'vc_basic_grid' );
    vc_remove_element( 'vc_masonry_grid' );
    vc_remove_element( 'vc_masonry_media_grid' );
    vc_remove_element( 'vc_media_grid' );

    vc_remove_element( 'vc_wp_categories' );
    vc_remove_element( 'vc_wp_archives' );
    vc_remove_element( 'vc_wp_posts' );
    vc_remove_element( 'vc_wp_text' );
    vc_remove_element( 'vc_wp_custommenu' );
    vc_remove_element( 'vc_wp_tagcloud' );
    vc_remove_element( 'vc_wp_recentcomments' );
    vc_remove_element( 'vc_wp_rss' );
    vc_remove_element( 'vc_gallery' );

}



function remove_visual_composer_stylesheets() {
  wp_dequeue_style( 'js_composer_front' );
  wp_deregister_style( 'js_composer_front' );
}
