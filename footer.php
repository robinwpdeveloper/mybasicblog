<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer">
			<?php get_sidebar( 'main' ); ?>

			<div class="site-info">
				<?php do_action( 'mybasicblog_credits' ); ?>
				<?php
				if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
				}
				?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mybasicblog' ) ); ?>" class="imprint">
					<?php
					/* translators: %s: WordPress */
					printf( __( 'Proudly powered by %s', 'mybasicblog' ), 'WordPress' );
					?>
				</a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_list_comments( $args ); ?>
	
	<?php 

	wp_footer(); ?>
</body>
</html>
