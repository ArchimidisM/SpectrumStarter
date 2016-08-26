<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
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

			<?php do_action('before_archive_content_starts'); ?>

			<?php get_template_part('template-parts/content','archive'); ?>

			<?php do_action('after_archive_content_ends'); ?>

			<?php do_action('after_general_archive_content_ends'); ?>
		</div>
		<div class="uk-width-large-3-10 uk-width-medium-3-10 uk-width-small-10-10">

			<?php get_sidebar(); ?>

		</div>
	</div> <!-- uk-grid ends here -->
</div><!-- .uk-container-center ends here -->

<?php get_footer(); ?>
