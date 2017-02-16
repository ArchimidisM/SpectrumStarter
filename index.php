<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since SpectrumStarter 0.1
 */
get_header(); ?>

<div class="uk-container uk-container-center">
  <div class="uk-grid uk-grid-medium pad-tb-40">

    <div class="uk-width-large-7-10 uk-width-medium-7-10 uk-width-small-10-10">

      <?php do_action( 'spectrumstarter_before_index_content_starts' ); ?>

      <?php get_template_part( 'template-parts/content', 'index' ); ?>

      <?php do_action( 'spectrumstarter_after_index_content_ends' ); ?>
    </div>
    <div class="uk-width-large-3-10 uk-width-medium-3-10 uk-width-small-10-10">

      <?php get_sidebar(); ?>

    </div>
  </div> <!-- uk-grid ends here -->
</div><!-- .uk-container-center ends here -->

<?php get_footer(); ?>
