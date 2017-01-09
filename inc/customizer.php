<?php
/**
 * Marti & Liz Theme Customizer
 *
 * @package Marti & Liz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @uses 	get_setting()
 */
function marti_and_liz_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

} // marti_and_liz_customize_register()
add_action( 'customize_register', 'marti_and_liz_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @uses 	wp_enqueue_script()
 * @uses 	get_template_directory_uri()
 */
function marti_and_liz_customize_preview_js() {

	wp_enqueue_script( 'marti_and_lizcustomizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

} // marti_and_liz_customize_preview_js()
add_action( 'customize_preview_init', 'marti_and_liz_customize_preview_js' );
