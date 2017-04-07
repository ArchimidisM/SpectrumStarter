<?php
/**
 * Spectrum Starter functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Spectrum_Starter
 * @since Spectrum Starter 0.1
 */

if ( ! function_exists( 'spectrumstarter_theme_setup' ) ):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 * Create your own spectrumstarter_theme_setup() function to override in a child theme.
	 * @since Spectrum Starter 0.1
	 */

	function spectrumstarter_theme_setup() {

		/*
		* This manages the content width.
		*/

		if ( ! isset( $content_width ) ) {
			$content_width = 688;
		}

		load_theme_textdomain( 'spectrumstarter', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'spectrumstarter-post-featured-image', 800, 533, true );
		add_image_size( 'spectrumstarter-post-featured-fw-image', 1130, 650, true );

		/*
		 * Enable HTML5 support for the native WordPress galleries
		 */

		add_theme_support( 'html5', array( 'gallery', 'caption' ) );

		/*
		 * Enable support for custom background image for the theme.
		 *
		 * @link https://codex.wordpress.org/Custom_Backgrounds
		 * @since Spectrum Starter 0.1
		 */
		$spectrumstarter_bg_defaults = array(
			'default-color'    => 'eeeeee',
			'default-image'    => '',
			'wp-head-callback' => 'spectrumstarter_bg_callback',
		);
		add_theme_support( 'custom-background', $spectrumstarter_bg_defaults );

		/*
		 * Enable support for custom header image for the theme.
		 *
		 * @link https://codex.wordpress.org/Custom_Headers
		 * @since Spectrum Starter 0.1
		 */
		$spectrumstarter_header_defaults = array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => '1130',
			'height'                 => '480',
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-header', $spectrumstarter_header_defaults );

		/*
		 * Enable support for custom logo.
		 *
		 *  @since Spectrum Starter 0.1
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 240,
			'flex-height' => true,
		) );

		/*
		 * Enable support for navigation menu creation
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
		 */
		register_nav_menus( array(
			'primary' => __( 'Main Navigation', 'spectrumstarter' ),
		) );

	}
endif; // spectrumstarter_theme_setup
add_action( 'after_setup_theme', 'spectrumstarter_theme_setup' );


if ( ! function_exists( 'spectrumstarter_bg_callback' ) ):

	/**
	 * This function is a callback function for the background support we declared in the theme setup hook.
	 * @since Spectrum Starter 0.1
	 */

	function spectrumstarter_bg_callback() {
        $background = esc_url(get_background_image());
        $color = get_theme_mod('background_color', get_theme_support('custom-background', 'default-color'));
        $color = esc_attr($color); // added this
        if (!$background && !$color)
            return;
        $style = $color ? "background-color: #$color;" : '';

        if ($background) {
            $image = " background-image: url('$background');";

            $repeat = get_theme_mod('background_repeat', get_theme_support('custom-background', 'default-repeat'));
            if (!in_array($repeat, array('no-repeat', 'repeat-x', 'repeat-y', 'repeat')))
                $repeat = 'repeat';
            $repeat = " background-repeat: $repeat;";

            $position = get_theme_mod('background_position_x', get_theme_support('custom-background', 'default-position-x'));
            if (!in_array($position, array('center', 'right', 'left')))
                $position = 'left';
            $position = " background-position: top $position;";

            $attachment = get_theme_mod('background_attachment', get_theme_support('custom-background', 'default-attachment'));
            if (!in_array($attachment, array('fixed', 'scroll')))
                $attachment = 'scroll';
            $attachment = " background-attachment: $attachment;";

            $style .= $image . $repeat . $position . $attachment;
        }
		?>
		<style type="text/css" id="custom-background-css">
			body.custom-background {
			<?php echo trim( $style ); ?>
			}
		</style>
		<?php
	}
endif;

if ( ! function_exists( 'spectrumstarter_body_class_manipulator' ) ):

	/**
	 * This function here adds more class in the body class of the main document.
	 * @since Spectrum Starter 0.1
	 */

	function spectrumstarter_body_class_manipulator( $classes ) {

		$current_id = get_queried_object_id();
		$classes[]  = 'object-id-' . $current_id;

		return $classes;

	}
endif;
add_filter( 'body_class', 'spectrumstarter_body_class_manipulator' );

if ( ! function_exists( 'spectrumstarter_styles_loader' ) ):
	/**
	 * This function registers and enqueues all the stylesheet files,fonts, icons etc of the theme.
	 * @since Spectrum Starter 0.1
	 */

	function spectrumstarter_styles_loader() {

		wp_enqueue_style( 'uikit', get_template_directory_uri() . '/css/UIkit/uikit.min.css', '', '', 'all' ); // UIkit framework
		wp_enqueue_style( 'spectrumstarter-merriweather-font', get_template_directory_uri() . '/fonts/Merriweather/stylesheet.css', '', '', 'all' ); // Merrriweather font.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/FontAwesome/css/font-awesome.min.css', '', '', 'all' ); // Font Awesome font.


		wp_enqueue_style( 'spectrumstarter-main-styles', get_stylesheet_uri(), '', '', 'all' ); // Main styles, styles.css file
		wp_enqueue_style( 'spectrumstarter-responsive-styles', get_template_directory_uri() . '/css/responsive.css', '', '', 'all' ); // Responsive stylesheet for the theme & Print.

		wp_enqueue_style( 'spectrumstarter-default-skin', get_template_directory_uri() . '/css/default-skin.css', '', '', 'all' ); // Default skin CSS styles, colors etc.
	}
endif;
add_action( 'wp_enqueue_scripts', 'spectrumstarter_styles_loader' );

if ( ! function_exists( 'spectrumstarter_scripts_loader' ) ):
	/**
	 * This function registers and enqueues all the js scripts needed for the theme.
	 * @since Spectrum Starter 0.1
	 */

	function spectrumstarter_scripts_loader() {

		if ( is_singular() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'jquery-uikit', get_template_directory_uri() . '/js/UIkit/uikit.min.js',array('jquery'), '', true ); // UIkit framework js
	}
endif;
add_action( 'wp_enqueue_scripts', 'spectrumstarter_scripts_loader' );

if ( ! function_exists( 'spectrumstarter_register_widgets' ) ):

	/**
	 * This function registers the widget areas that will be used by the theme.
	 * @since SpectrumStarter 0.1
	 */

	function spectrumstarter_register_widgets() {

		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'spectrumstarter' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'This is the main blog sidebar. You can add widgets to it by dragging and dropping them from the Widgets admin screen.', 'spectrumstarter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s no-print">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	}
endif;
add_action( 'widgets_init', 'spectrumstarter_register_widgets' );



if ( ! function_exists( 'spectrumstarter_get_archive_title' ) ):

	/**
	 * This function gets the title of the category/tag/search/archive which is shown at the moment.
	 * We hook this function on the generic hook for all of our archive pages.
	 * spectrumstarter_before_general_archive_content_starts
	 * @since SpectrumStarter 0.1
	 */

	function spectrumstarter_get_archive_title() {

		$title = '';

		if(is_archive()):
            $title = get_the_archive_title();
		endif;

		echo '<h2 class="single-archive-title">' . $title . '</h2>';
	}
endif;
add_action( 'spectrumstarter_before_general_archive_content_starts', 'spectrumstarter_get_archive_title' );