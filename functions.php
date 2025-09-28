<?php
if ( ! function_exists( 'zummo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Zummo 1.0
 */
function zummo_setup() {
	// Add HTML5 support.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	// Add automatic <title> tag support.
	add_theme_support( 'title-tag' );

	// Enable featured images.
	add_theme_support( 'post-thumbnails' );

	// Enable post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Enable block editor styles.
	add_theme_support( 'wp-block-styles' );

	// Load translations inside the correct hook.
	load_theme_textdomain( 'zummo', get_template_directory() . '/languages' );

	// Enable custom editor styles.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
}
endif;
add_action( 'after_setup_theme', 'zummo_setup' );

/**
 * Enqueue theme styles and scripts.
 */
function zummo_enqueue_styles_and_scripts() {
	wp_enqueue_style( 'normalize-css', get_template_directory_uri() . '/assets/css/normalize.css', array(), '1.0' );
	wp_enqueue_style( 'zummo-blocks-style', get_template_directory_uri() . '/assets/css/block.css', array(), '1.0' );
	wp_enqueue_style( 'style-css', get_stylesheet_uri() );
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'zummo_enqueue_styles_and_scripts' );

/**
 * Include theme files.
 */
require_once get_template_directory() . '/inc/core/init.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/get-started/get-started.php';

/**
 * Customizer upsell section.
 */
if ( class_exists( 'WP_Customize_Section' ) ) {
	class Zummo_Upsell_Section extends WP_Customize_Section {
		public $type = 'zummo-upsell';
		public $button_text = '';
		public $url = '';
		public $background = '';
		public $text_color = '';
		protected function render() {
			$background = ! empty( $this->background ) ? esc_attr( $this->background ) : '#0758b3';
			$text_color = ! empty( $this->text_color ) ? esc_attr( $this->text_color ) : '#fff';
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="zummo_upsell_section accordion-section control-section control-section-<?php echo esc_attr( $this->id ); ?> cannot-expand">
				<h3 class="accordion-section-title" style="border:0;color:#fff;background:<?php echo esc_attr( $background ); ?>;">
					<?php echo esc_html( $this->title ); ?>
					<a href="<?php echo esc_url( $this->url ); ?>" class="button button-secondary alignright" target="_blank" style="margin-top:-4px;"><?php echo esc_html( $this->button_text ); ?></a>
				</h3>
			</li>
			<?php
		}
	}
}

/**
 * Admin notice: Get Started.
 */
function zummo_admin_notice() {
	$meta           = get_option( 'zummo_admin_notice' );
	$current_screen = get_current_screen();

	if ( ! $meta && ! is_network_admin() && current_user_can( 'manage_options' ) && $current_screen->base !== 'appearance_page_zummo-guide-page' ) {
		?>
		<div class="notice notice-success is-dismissible">
			<h1><?php esc_html_e( 'Thanks for choosing Zummo!', 'zummo' ); ?></h1>
			<p><?php esc_html_e( 'Unlock exclusive features, advanced customization options, and premium support to take your site to the next level.', 'zummo' ); ?></p>
			<div style="display:flex;">
				<p><a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=zummo-guide-page' ) ); ?>"><?php esc_html_e( 'Get Started', 'zummo' ); ?></a></p>
				<p><a href="?zummo-dismissed" class="button button-secondary"><?php esc_html_e( 'Dismiss', 'zummo' ); ?></a></p>
			</div>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'zummo_admin_notice' );

/**
 * Handle admin notice dismissal.
 */
function zummo_notice_dismissed() {
	if ( isset( $_GET['zummo-dismissed'] ) ) {
		update_option( 'zummo_admin_notice', true );
	}
}
add_action( 'admin_init', 'zummo_notice_dismissed' );

/**
 * Update admin notice option.
 */
function zummo_update_admin_notice() {
	if ( isset( $_GET['zummo_admin_notice'] ) && '1' === $_GET['zummo_admin_notice'] ) {
		update_option( 'zummo_admin_notice', true );
	}
}
add_action( 'admin_init', 'zummo_update_admin_notice' );

/**
 * Reset admin notice when the theme is activated.
 */
add_action( 'after_switch_theme', function () {
	update_option( 'zummo_admin_notice', false );
} );

/**
 * Theme resource links.
 */
define( 'ZUMMO_BUY_NOW',  'https://effethemes.com/themes/zummo-wordpress-theme/' );
define( 'ZUMMO_PRO_DEMO', 'https://preview.effethemes.com/zummo-wordpress-theme/' );
define( 'ZUMMO_REVIEW',   'https://wordpress.org/support/theme/zummo/reviews/#new-post' );
define( 'ZUMMO_SUPPORT',  'https://wordpress.org/support/theme/zummo' );
