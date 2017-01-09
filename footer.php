<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Marti & Liz
 */

		?></div><!-- #content -->
	</div><!-- #wrap -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-wrap">

			<div class="footer-left"><?php

				dynamic_sidebar( 'footer-left' );

			?></div><!-- .footer_left -->
			<div class="site-info"><?php

				printf( __( '<div class="copyright">&copy %1$s <a href="%2$s" title="Login">Beaty Shoes</a></a></div>', 'marti-and-liz' ), date( 'Y' ), get_admin_url() );
				echo '1151 Taylor Place<br />Jamestown, TN 38556<br />';
				printf( __( '<a href="tel:%1$s">%1$s</a>' , 'marti-and-liz' ), '(931) 879-8476' );
				printf( __( '<br /><a href="%1$s">Terms & Conditions</a>', 'marti-and-liz' ), get_site_url() . '/web-site-terms-conditions-use' );

			?></div><!-- .site-info -->
			<div class="footer-right"><?php

				get_template_part( 'menu', 'social' );

			?></div><!-- .site-info -->

		</div><!-- .footer-wrap -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>