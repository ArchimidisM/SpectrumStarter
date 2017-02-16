<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element.
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since Spectrumναι Starter 0.1
 */
 ?>
 <!DOCTYPE html>
 <html <?php language_attributes(); ?> class="no-js">
 <head>

 	<meta charset="<?php bloginfo( 'charset' ); ?>">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="profile" href="http://gmpg.org/xfn/11">
 	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
 	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 	<?php endif; ?>

 	<?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>

   <div class="uk-container uk-container-center">
     <div class="uk-grid uk-grid-medium">
       <div class="uk-width-10-10">



         <div id="mobile-menu" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
           <?php
           $main_menu_args = array(
             'location'=>'primary',
             'fallback_cb' => false,
             'menu_class'  => 'mobile-navigation',
             'container'   => false
           );
           wp_nav_menu($main_menu_args);
           ?>
            </div>
         </div><!-- #offcanvas mobile nav ends here -->

         <?php do_action('spectrumstarter_before_site_header'); ?>

         <header class="site-header" id="main-site-header">

           <?php do_action('spectrumstarter_before_site_header_inside'); ?>

                <div class="uk-grid">
                  <div class="uk-width-large-3-10 uk-width-medium-3-10 uk-width-small-5-10">

                    <?php get_template_part('template-parts/logo'); ?>

                  </div>
                  <div class="uk-width-large-7-10 uk-width-medium-7-10 uk-width-small-5-10">

                    <?php get_template_part('template-parts/main-navigation'); ?>

                  </div>
                </div>

            <?php do_action('spectrumstarter_spectrumstarter_after_site_header_inside'); ?>

         </header>

         <?php do_action('spectrumstarter_after_site_header'); ?>


       </div><!-- .uk-width-10-10 ends here -->

        <?php get_template_part('template-parts/header-image'); // get header image if any ?>

      </div><!-- uk-grid ends here-->
    </div><!--.uk-container ends here -->
