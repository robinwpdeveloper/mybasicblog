<?php
/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
			// Start the loop.
			while ( have_posts() ) :
				the_post();
				?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php mybasicblog_post_nav(); ?>
				<?php //comments_template(); ?>
				<?php comment_form(); ?>
				<?php paginate_comments_links(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>