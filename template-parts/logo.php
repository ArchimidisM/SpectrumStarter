<?php
/**
 * The template part used for getting the logo or the website's name
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since Spectrum Starter 0.1
 */

if(get_custom_logo()):

  the_custom_logo();

else: ?>

  <a class="site-title" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <?php echo esc_html(get_bloginfo('name')); ?>
  </a><!-- .site-title ends here -->

  <p class="site-subtitle">
    <?php echo esc_html(get_bloginfo('description')); ?>
  </p><!-- .site-subtitle ends here -->

<?php endif; ?>
