<?php
/**
 * The homepage template file.
 *
 * @package Marti & Liz
 */

get_header();

$options = 48;

	?><div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="map_wrap"><?php

				// get_search_and_map();

			?></div><!-- .map_wrap -->
			<div class="promo_wrap">
				<h2 class="promo_title"><?php echo get_field( 'promo_title', $options ); ?></h2>
				<div class="promo" id="promo1"><?php

					$field = get_field( 'promo_1', $options );  // ACF promo field 3

					if ( ! empty( $field ) ) {

						echo '<img src="' . $field . '" class="promo_img" />';

					}

				?></div>
				<div class="promo" id="promo2"><?php

					$field = get_field( 'promo_2', $options );  // ACF promo field 3

					if ( ! empty( $field ) ) {

						echo '<img src="' . $field . '" class="promo_img" />';

					}

				?></div>
				<div class="promo" id="promo3"><?php

					$field = get_field( 'promo_3', $options );  // ACF promo field 3

					if ( ! empty( $field ) ) {

						echo '<img src="' . $field . '" class="promo_img" />';

					}

				?></div>
			</div><!-- .promo_wrap -->
			<div class="news_wrap">
				<h2 class="news_title"><?php echo get_field( 'news_title', $options ); ?></h2><?php

				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'home' );

					endwhile;

				else :

					get_template_part( 'content', 'none' );

				endif;

			?></div><!-- .news_wrap -->
		</main><!-- #main -->
	</div><!-- #primary --><?php

get_footer();
?>