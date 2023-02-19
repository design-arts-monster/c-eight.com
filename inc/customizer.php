<?php
/**
 * whitebase Theme Customizer
 *
 * @package c-eight.com
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function whitebase_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'whitebase_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'whitebase_customize_partial_blogdescription',
			)
		);
	}

	//SNS項目を作成
	$wp_customize->add_section( 'mytheme_sns' , array(
		'title' => 'SNS',
	) );

	//SNSの設定（データベースに設定を追加）
	$wp_customize->add_setting( 'mytheme_options[sns_line]', array(
		'type' => 'option',
		'transport' => 'postMessage',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'mytheme_options[sns_twitter]', array(
		'type' => 'option',
		'transport' => 'postMessage',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'mytheme_options[sns_facebook]', array(
		'type' => 'option',
		'transport' => 'postMessage',
		'sanitize_callback' => 'esc_url_raw'
	) );

	//項目内のラベルなどの設定と、紐付け
	$wp_customize->add_control( 'mytheme_set_sns_line', array(
		'label' => 'LINE URL',
		'section' => 'mytheme_sns',
		'settings' => 'mytheme_options[sns_line]',
		'type' => 'url',
	) );
	$wp_customize->add_control( 'mytheme_set_sns_twitter', array(
		'label' => 'Twitter URL',
		'section' => 'mytheme_sns',
		'settings' => 'mytheme_options[sns_twitter]',
		'type' => 'url',
		) );
	$wp_customize->add_control( 'mytheme_set_sns_facebook', array(
		'label' => 'Facebook URL',
		'section' => 'mytheme_sns',
		'settings' => 'mytheme_options[sns_facebook]',
		'type' => 'url',
		) );
}
add_action( 'customize_register', 'whitebase_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function whitebase_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function whitebase_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whitebase_customize_preview_js() {
	wp_enqueue_script( 'whitebase-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _C_EIGHT_VERSION, true );
}
add_action( 'customize_preview_init', 'whitebase_customize_preview_js' );

/**
 * SNS Follow
 */
