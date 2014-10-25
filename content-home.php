<?php
/**
 * @package Marti & Liz
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"><?php
		
		the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );

	?></header><!-- .entry-header -->

	<div class="entry-content"><?php
	
		the_content();
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:','marti-and-liz'),
			'after'  => '</div>',
		) );
	
	?></div><!-- .entry-content -->
</article><!-- #post-## -->