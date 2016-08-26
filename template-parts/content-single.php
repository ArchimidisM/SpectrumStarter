<?php
/**
 * The template part used for displaying the single post's content.
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
					<?php the_post_thumbnail( 'post-featured-image', array(
							'alt' => get_the_title() . ' featured image'
						)
					); ?>
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
					<?php the_title(); ?>
				</h1>

				<?php the_content(); ?>

				<?php
				if ( has_tag() ):
					echo '<span class="fa fa-tag"></span>' . ' ' . get_the_tag_list( ' ', ' ,', ' ' );
				endif;
				?>

				<?php do_action( 'before_single_comment_starts' ); ?>

			</div><!-- .post-content ends here -->


			<?php
			/* The comments template */
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>

			<?php do_action( 'after_single_comment_ends' ); ?>

		</div><!-- .blog-single-entry ends here -->


	<?php endwhile; ?>


<?php else: // no posts available. ?>

	<div class="no-posts-found">
		<h4><?php echo __( 'No posts were found', 'spectrumstarter' ); ?></h4>
	</div>

<?php endif; ?>

