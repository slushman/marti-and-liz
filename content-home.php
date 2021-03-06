<?php
/**
 * Template Name: Home Page, no sidebar
 *
 * Description: The home page with large map, news posts, and promo boxes.
 *
 * @package Marti & liz
 */

get_header();

//$options = 48;

	?><div id="wrap">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main"><?php


				if ( function_exists( 'soliloquy' ) ) { soliloquy( 'home-page', 'slug' ); }

				?><div class="map_wrap"><?php

					echo do_shortcode( '[wpseo_storelocator]' );

				?></div><!-- .map_wrap -->
				<div class="news_wrap">
					<h2 class="news_title"><?php echo get_theme_mod( 'news_title' ); ?></h2><?php

					$query = new WP_Query( array( 'posts_per_page' => 3 ) );

					if ( $query->have_posts() ) :

						// Start the Loop
						while ( $query->have_posts() ) : $query->the_post();

							?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header"><?php

									the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );

								?></header><!-- .entry-header -->

								<div class="entry-summary"><?php

									the_excerpt();

								?></div><!-- .entry-summary -->
							</article><!-- #post-## --><?php

						endwhile;

						wp_reset_postdata();

					else :

						get_template_part( 'content', 'none' );

					endif;

					$query = '';

				?></div><!-- .news_wrap --><?php


			?></main><!-- #main -->
		</div><!-- #primary -->
	</div><?php

get_footer();
?>