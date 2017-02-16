<?php
/**
 * The template part used for displaying the single page's content.
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since SpectrumStarter 0.1
 */
if ( have_posts() ): ?>

	<?php while ( have_posts() ): the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-single-entry' ); ?>>

			<?php if ( has_post_thumbnail() ): ?>
				<div class="post-image">

					<?php

					if ( is_page_template( 'page-templates/fullwidth-page.php' ) ):
						the_post_thumbnail( 'spectrumstarter-post-featured-fw-image', array(
                                'alt'=>get_the_title().__(' featured image','spectrumstarter')
							)
						);
					else:
						the_post_thumbnail( 'spectrumstarter-post-featured-image', array(
                                'alt'=>get_the_title().__(' featured image','spectrumstarter')
							)
						);
					endif;
					?>

				</div>
			<?php endif; // if has a featured image or not ?>

			<div class="post-content">

				<h1 class="post-title">
					<?php the_title(); ?>
				</h1>

				<?php the_content(); ?>

			</div><!-- .post-content ends here -->
            <div id="main-entry-link-pages">
                <?php wp_link_pages(); ?>
            </div>
		</div><!-- .blog-single-entry ends here -->

		<?php wp_link_pages(); ?>

	<?php endwhile; ?>


<?php else: // no posts available. ?>

	<div class="no-posts-found">
		<h4><?php echo esc_attr(__( 'No posts were found', 'spectrumstarter' )); ?></h4>
	</div>

<?php endif; ?>

