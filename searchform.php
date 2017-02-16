<?php
/**
 * Template for displaying search forms in SpectrumStarter
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since SpectrumStarter 0.1
 */
?>
<form class="uk-form search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<fieldset data-uk-margin>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'spectrumstarter' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'spectrumstarter' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="uk-button search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'spectrumstarter' ); ?></span></button>
	</fieldset>

</form>