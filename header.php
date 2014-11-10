<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Marti & Liz
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php

wp_head();

?></head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content','marti-and-liz'); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_svg( 'logo' ); ?></a>
			</h1>
			<div class="brands">
				<p class="left">Beaty Shoes<br />Becky's Shoes</p>
				<p class="right">Hyder's Shoes<br />Jay's Shoes</p>
			</div><!-- .brands -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu','marti-and-liz'); ?></button><?php

				wp_nav_menu( array( 'theme_location' => 'primary' ) );
		
		?></nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="wrap">
		<div id="content" class="site-content">