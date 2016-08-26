<?php
/**
 * The template part used for getting the main navigation
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since SpectrumStarter 0.1
 */
$main_menu_args = array(
  'location'=>'primary',
  'fallback_cb' => false,
  'menu_class'  => 'main-navigation border-radius-5',
  'container'   => false
);
wp_nav_menu($main_menu_args);
?>
<!-- Toggle for the mobile menu -->
<a href="#mobile-menu" id="mobile-menu-toggle" data-uk-offcanvas title="<?php echo __('Open the menu','spectrumstarter'); ?>">
   <span class="fa fa-3x fa-bars"></span>
</a>
