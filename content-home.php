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
			<main id="main" class="site-main" role="main">
				<div class="map_wrap"><?php

					// get_search_and_map();
				
				?></div><!-- .map_wrap -->
				<div class="promo_wrap">
					<h2 class="promo_title"><?php echo get_field( 'promo_title' ); ?></h2>
					<div class="promo" id="promo1"><?php

						$field = get_field( 'promo_1' );  // ACF promo field 3

						if ( ! empty( $field ) ) {

							echo '<img src="' . $field . '" class="promo_img" />';

						}

					?></div>
					<div class="promo" id="promo2"><?php

						$field = get_field( 'promo_2' );  // ACF promo field 3

						if ( ! empty( $field ) ) {

							echo '<img src="' . $field . '" class="promo_img" />';

						}

					?></div>
					<div class="promo" id="promo3"><?php

						$field = get_field( 'promo_3' );  // ACF promo field 3

						if ( ! empty( $field ) ) {

							echo '<img src="' . $field . '" class="promo_img" />';

						}

					?></div>
				</div><!-- .promo_wrap -->
				<div class="news_wrap">
					<h2 class="news_title"><?php echo get_field( 'news_title' ); ?></h2><?php

					$query = new WP_Query( array( 'posts_per_page' => 5 ) );

					if ( $query->have_posts() ) :

						// Start the Loop
						while ( $query->have_posts() ) : $query->the_post();

							get_template_part( 'content', get_post_format() );

						endwhile;

						wp_reset_postdata();

					else :

						get_template_part( 'content', 'none' );

					endif;

					$query = '';

				?></div><!-- .news_wrap -->
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><?php

get_footer();
?>