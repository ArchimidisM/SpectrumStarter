<?php
/**
 * The template for displaying author pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since Spectrum Starter 0.1
 */
get_header(); ?>

<div class="uk-container uk-container-center">
	<div class="uk-grid uk-grid-medium pad-tb-40">

		<div class="uk-width-large-7-10 uk-width-medium-7-10 uk-width-small-10-10">

			<?php do_action('before_general_archive_content_starts'); ?>

			<?php do_action('before_author_content_starts'); ?>

			<?php get_template_part('template-parts/content','author'); ?>

			<?php do_action('after_author_content_ends'); ?>

			<?php do_action('after_general_archive_content_ends'); ?>
		</div>
		<div class="uk-width-large-3-10 uk-width-medium-3-10 uk-width-small-10-10">

			<?php get_sidebar(); ?>

		</div>
	</div> <!-- uk-grid ends here -->
</div><!-- .uk-container-center ends here -->

<?php get_footer(); ?>