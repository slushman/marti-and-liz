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
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="/wp-content/themes/marti-and-liz/icons/favicon.ico" type="image/x-icon" />
<!-- Apple Touch Icons -->
<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="/wp-content/themes/marti-and-liz/icons/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/marti-and-liz/icons/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/marti-and-liz/icons/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/themes/marti-and-liz/icons/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="60x60" href="/wp-content/themes/marti-and-liz/icons/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon" sizes="120x120" href="/wp-content/themes/marti-and-liz/icons/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="76x76" href="/wp-content/themes/marti-and-liz/icons/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/marti-and-liz/icons/apple-touch-icon-152x152.png" />
<!-- Windows 8 Tile Icons -->
	<meta name="msapplication-square70x70logo" content="/wp-content/themes/marti-and-liz/iconssmalltile.png" />
<meta name="msapplication-square150x150logo" content="/wp-content/themes/marti-and-liz/iconsmediumtile.png" />
<meta name="msapplication-wide310x150logo" content="/wp-content/themes/marti-and-liz/iconswidetile.png" />
<meta name="msapplication-square310x310logo" content="/wp-content/themes/marti-and-liz/iconslargetile.png" /><?php

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
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>