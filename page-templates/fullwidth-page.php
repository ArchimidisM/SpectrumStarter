<?php
/**
 * Template Name: Fullwidth Page
 * The template for showing the content in a fullwidth style 1170px boxed
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since Spectrum Starter 0.1
 */
get_header(); ?>

<div class="uk-container uk-container-center">
	<div class="uk-grid uk-grid-medium pad-tb-40">

		<div class="uk-width-10-10">

			<?php do_action( 'before_single_page_content_starts' ); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php do_action( 'after_single_page_content_ends' ); ?>
		</div>
	</div> <!-- uk-grid ends here -->
</div><!-- .uk-container-center ends here -->


<?php get_footer(); ?>

