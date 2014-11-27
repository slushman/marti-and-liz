<?php
/**
 * Template Name: Full-width, no sidebar
 * 
 * Description: A full-width template with no sidebar
 *
 * @package Marti & liz
 */

get_header(); ?>

	<div id="primary" class="full-width">
		<main id="main" class="site-main" role="main"><?php

			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'page' );
				
				// If comments are open or have more than one comment, load comment template
				if ( comments_open() || '0' != get_comments_number() ) {
				
					comments_template();
				
				} // comments check

			endwhile; // loop
				
		?></main><!-- .site-main -->
	</div><!-- .full-width --><?php
				
get_footer(); ?>