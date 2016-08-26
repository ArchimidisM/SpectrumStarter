<?php
/**
 * The template part used for displaying a header image if the user sets one in the theme customizer.
 * @link https://codex.wordpress.org/Function_Reference/get_header_image
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since Spectrum Starter 0.1
 */

do_action('before_header_image');

if(get_header_image() != ''): // has a header image ?>
<div class="uk-width-10-10">
  <div class="site-header-image-container">

  <img class="header-image" src="<?php echo get_header_image(); ?>" height="<?php echo get_custom_header()->height ; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo __('Header Image','spectrumstarter'); ?>"/>

  </div>

</div>
<?php endif;

do_action('after_header_image');
