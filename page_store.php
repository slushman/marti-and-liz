<?php
/**
 * Template Name: Store Page
 * 
 * Description: A full-width template with no sidebar
 *
 * @package Marti & liz
 */

get_header(); ?>

		<div id="wrap">

			<div id="content" class="full-width"><?php

			while ( have_posts() ) : the_post();

				?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header"><?php

						the_title( '<h1 class="entry-title">', '</h1>' );
					
					?></header><!-- .entry-header -->

					<div class="entry-content"><?php
						
						the_content();
						
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:','marti-and-liz'),
							'after'  => '</div>',
						) );
					
					?></div><!-- .entry-content -->

					<footer class="entry-footer"><?php

						edit_post_link( __( 'Edit','marti-and-liz'), '<span class="edit-link">', '</span>' );
					
					?></footer><!-- .entry-footer -->
				</article><!-- #post-## --><?php
				
				// If comments are open or have more than one comment, load comment template
				if ( comments_open() || '0' != get_comments_number() ) {
				
					comments_template();
				
				} // comments check

			endwhile; // loop
				
			?></div><!-- // #content --><?php
				
get_footer(); ?>