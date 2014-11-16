<?php
/**
 * The template for displaying a single SimpleMap Location
 *
 * @package Marti & Liz
 */

get_header();
$postmeta = get_metadata( 'post', get_the_ID() );
global $simple_map;

	?><div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?php

		while ( have_posts() ) : the_post();

			?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="store-info">
					<div class="store-location"><?php

						the_title( '<h1 class="store-name">', '</h1>' );

						echo $postmeta['location_address'][0] . '<br />' . $postmeta['location_address2'][0];
						echo $postmeta['location_city'][0] . ', ' . $postmeta['location_state'][0] . ' ' . $postmeta['location_zip'][0] . '<br />';
						echo '<span class="telephone">' . get_svg( 'telephone' ) . '</span><a href="tel:' . $postmeta['location_phone'][0] . '" title="Call the ' . get_the_title() . ' store">' . $postmeta['location_phone'][0] . '</a>';

						//pretty( $postmeta );

					?></div>
					<div class="entry-content">
						<h3>Hours</h3><?php
					
						echo get_field( 'store_hours' );

						//pretty( $postmeta );
										
					?></div><!-- .entry-content -->
				</div>
				<div class="store-map">
					<iframe width="100%" height="450" frameborder="0" style="border:0"
						src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCGoLIeI3HPQWUMaJS1J-MxPPT_ydQYTbU&q=Marti+and+Liz+Shoes+<?php 

							$opts = array( 'address', 'address2', 'city', 'state', 'zip' );

							foreach ( $opts as $opt ) {

								$check = 'location_' . $opt;

								if ( ! empty( $postmeta[$check][0] ) ) {

									echo urlencode( $postmeta[$check][0] ) . '+';

								}

							} // foreach
						?>">
					</iframe>
				</div><!-- .store-map -->

				<div class="store-news">
					<h2>Store News</h2><?php

					$store_posts = get_category_posts( '"' . get_the_slug( get_the_ID() ) . '"', 5 );

					if ( 0 < $store_posts->found_posts ) {

						echo '<div class="posts_wrap">';

						while ( $store_posts->have_posts() ) : $store_posts->the_post();

							get_template_part( 'content', 'excerpt' );

						endwhile; // posts loop

						wp_reset_postdata();

						echo '</div><!-- .posts_wrap -->';

					} // enpty check

				?></div>

				<div class="store-photos">
					<h2>Store Photos</h2><?php

					the_content();

				?></div>
			</article><!-- #post-## --><?php

		endwhile; // end of the loop.

		?></main><!-- #main -->
	</div><!-- #primary --><?php

get_footer();
?>