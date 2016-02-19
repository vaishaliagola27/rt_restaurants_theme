<?php

/**
 * rt-restaurants Theme Customizer.
 *
 * @package rt-restaurants
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rt_restaurants_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'theme_colors_section', array(
	    'title' => __( 'Theme Colors', 'rt-restaurants' ),
	    'priority' => 30,
	) );

	$args = array(
	    array(
		"setting" => "navigation_font_color_setting",
		"default" => "#FFFFFF",
		"transport" => "refresh",
		"title" => "navigation_font_color",
		"label" => "Navigation Menu Font Color",
		"theme" => "rt-restaurants",
	    ),
	    array(
		"setting" => "navigation_color_setting",
		"default" => "#8fc533",
		"transport" => "refresh",
		"title" => "navigation_bg_color",
		"label" => "Navigation Background Color",
		"theme" => "rt-restaurants",
	    ),
	    array(
		"setting" => "footer_website_info_setting",
		"default" => "#0F1821",
		"transport" => "refresh",
		"title" => "footer_website_info_color",
		"label" => "Footer -> Website Info Section Background",
		"theme" => "rt-restaurants",
	    ),
	    array(
		"setting" => "footer_contact_info_setting",
		"default" => "#2d3e50",
		"transport" => "refresh",
		"title" => "footer_contact_info_color",
		"label" => "Footer -> Contact Info Section Background",
		"theme" => "rt-restaurants",
	    ),
	    array(
		"setting" => "footer_contact_info_font_setting",
		"default" => "#7C92A9",
		"transport" => "refresh",
		"title" => "footer_contact_info_font_color",
		"label" => "Footer -> Contact Info Font Color",
		"theme" => "rt-restaurants",
	    ),
	    array(
		"setting" => "copyright_font_setting",
		"default" => "#50575E",
		"transport" => "refresh",
		"title" => "copyright_font_color",
		"label" => "Footer -> Copyright Font Color",
		"theme" => "rt-restaurants",
	    ),
	    array(
		"setting" => "main_content_font_setting",
		"default" => "#B0A9A9",
		"transport" => "refresh",
		"title" => "main_content_font_color",
		"label" => "Main Content Font Color",
		"theme" => "rt-restaurants",
	    ),
	    array(
		"setting" => "timig_font_setting",
		"default" => "#959393",
		"transport" => "refresh",
		"title" => "timing_font_color",
		"label" => "Restaurant Timing Font Color",
		"theme" => "rt-restaurants",
	    ),
	    array(
		"setting" => "tag_font_setting",
		"default" => "#94D5F5",
		"transport" => "refresh",
		"title" => "tag_font_color",
		"label" => "Restaurant Tags Font Color",
		"theme" => "rt-restaurants",
	    )
	);
	foreach ( $args as $value ) {
		$wp_customize->add_setting( $value[ 'setting' ], array(
		    'default' => $value[ 'default' ],
		    'transport' => $value[ 'transport' ],
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $value[ 'title' ], array(
		    'label' => __( $value[ 'label' ], $value[ 'theme' ] ),
		    'section' => 'theme_colors_section',
		    'settings' => $value[ 'setting' ],
		) ) );
	}
}

add_action( 'customize_register', 'rt_restaurants_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rt_restaurants_customize_preview_js() {
	wp_enqueue_script( 'rt_restaurants_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

add_action( 'customize_preview_init', 'rt_restaurants_customize_preview_js' );
