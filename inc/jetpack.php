<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Marti & Liz
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 * 
 * @uses 	add_theme_support()
 */
function marti_and_lizjetpack_setup() {

	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

} // marti_and_lizjetpack_setup()
add_action( 'after_setup_theme', 'marti_and_lizjetpack_setup' );
