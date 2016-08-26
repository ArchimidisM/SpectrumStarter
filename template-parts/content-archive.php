<?php
/**
 * The template part used for displaying the archive page's content.
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since SpectrumStarter 0.1
 */
if ( have_posts() ): ?>

	<?php while ( have_posts() ): the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-single-entry archive-entry' ); ?>>

			<?php if ( has_post_thumbnail() ): ?>
				<div class="post-image">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'post-featured-image', array(
								'alt'=>get_the_title().' featured image'
							)
						); ?>
					</a>
				</div>
			<?php endif; // if has a featured image or not ?>

			<div class="post-content">
				<div class="post-meta">
					<time class="post-date">
						<?php echo get_the_time( get_option( 'date_format' ) ); ?>
					</time><!-- .post-date ends here-->

					<span class="post-comments">
              <?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'spectrumstarter' ), number_format_i18n( get_comments_number() ) ); ?>
            </span><!-- .post-comments end here -->

					<span class="post-author">
              <?php echo __( 'Written by ', 'spectrumstarter' ); ?><?php the_author_posts_link(); ?>
            </span><!-- .post-author ends here -->

					<div class="post-categories uk-float-right">
						<?php echo get_the_category_list( ',', '', get_the_ID() ); ?>
						<a href="#" title="<?php echo __( 'View posts from this category', 'spectrumstarter' ); ?>" class="post-category">
						</a>
					</div><!-- .post-categories ends here -->

				</div>
				<h1 class="post-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h1>

				<?php the_excerpt(); ?>

				<div class="post-read-more clearfix">
					<a class="read-more-btn" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php echo __( 'Read More', 'spectrumstarter' ); ?>
					</a>
				</div>
			</div><!-- .post-content ends here -->

		</div><!-- .blog-single-entry ends here -->

	<?php endwhile; ?>

	<!-- The posts pagination -->
	<?php the_posts_pagination( array(
		'screen_reader_text' => __( ' ', 'spectrumstarter' ),
		'mid_size'           => 3,
		'prev_text'          => __( 'Older', 'spectrumstarter' ),
		'next_text'          => __( 'Newer', 'spectrumstarter' ),
	) ); ?>


<?php else: // no posts available. ?>

	<div class="no-posts-found">
		<h4><?php echo  __('No posts were found','spectrumstarter'); ?></h4>
	</div>

<?php endif; ?>
