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

						//pretty( $postmeta );

						the_title( '<h1 class="store-name">', '</h1>' );

						if( function_exists( 'wpseo_local_show_address' ) ) { 

							$params['echo']  			= TRUE;
							$params['hide_name'] 		= TRUE;
							$params['show_country'] 	= FALSE;

							wpseo_local_show_address( $params ); 

						}

						/*echo $postmeta['_wpseo_business_address'][0];
						echo $postmeta['_wpseo_business_city'][0] . ', ' . $postmeta['_wpseo_business_state'][0] . ' ' . $postmeta['_wpseo_business_zipcode'][0] . '<br />';
						echo '<a href="tel:' . $postmeta['location_phone'][0] . '" title="Call the ' . get_the_title() . ' store"><span class="telephone">' . get_svg( 'telephone' ) . '</span>' . $postmeta['location_phone'][0] . '</a>';
*/
						//pretty( $postmeta );

					?></div>
					<div class="entry-content">
						<h3>Hours</h3><?php

						if( function_exists( 'wpseo_local_show_opening_hours' ) ) { 

							wpseo_local_show_opening_hours( array( 'echo' => true ) );  

						}
					
						//echo get_field( 'store_hours' );

						//pretty( $postmeta );
										
					?></div><!-- .entry-content -->
				</div>
				<div class="store-map"><?php
				
					if( function_exists( 'wpseo_local_show_map' ) ) {
						
						$params['echo'] 			= TRUE;
						$params['height'] 			= '450px';
						$params['id'] 				= get_the_ID();
						$params['show_route'] 		= FALSE;
						$params['show_route_label'] = FALSE;
						$params['width'] 			= '450px';
						$params['zoom']				= 14;
						
						wpseo_local_show_map( $params );
					
					}

				?></div><!-- .store-map -->

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