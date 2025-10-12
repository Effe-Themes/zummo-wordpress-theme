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
    $meta = get_option('zummo_admin_notice');
    $current_screen = get_current_screen();

    if(!$meta && !is_network_admin() && current_user_can('manage_options') && $current_screen->base !== 'appearance_page_zummo-guide-page') {
        ?>
        <div class="notice notice-success zummo-pro-promotion is-dismissible" style="border-left: 4px solid #2271b1; padding: 15px 20px; position: relative;">
            <style>
                .zummo-pro-promotion {
                    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                    border-radius: 8px;
                    margin: 15px 0;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                }
                .zummo-pro-promotion h1 {
                    color: #1e293b;
                    margin: 10px 0 15px;
                    font-size: 24px;
                    font-weight: 700;
                }
                .zummo-pro-promotion p {
                    font-size: 16px;
                    line-height: 1.6;
                    margin-bottom: 15px;
                    color: #475569;
                }
                .zummo-pro-promotion .stars {
                    font-size: 22px;
                    color: #f59e0b;
                    margin-bottom: 5px;
                }
                .zummo-pro-promotion .features-list {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 12px;
                    margin: 15px 0;
                }
                .zummo-pro-promotion .feature-item {
                    display: flex;
                    align-items: center;
                    font-size: 14px;
                }
                .zummo-pro-promotion .feature-icon {
                    color: #10b981;
                    margin-right: 8px;
                    font-weight: bold;
                }
                .zummo-pro-promotion .cta-buttons {
                    display: flex;
                    gap: 10px;
                    margin-top: 20px;
                    flex-wrap: wrap;
                }
                .zummo-pro-promotion .button-primary {
                    background: #10b981;
                    border-color: #10b981;
                    padding: 10px 20px;
                    font-weight: 600;
                    border-radius: 4px;
                    box-shadow: 0 2px 5px rgba(16, 185, 129, 0.3);
                }
                .zummo-pro-promotion .button-primary:hover {
                    background: #059669;
                    border-color: #059669;
                    transform: translateY(-1px);
                    box-shadow: 0 4px 8px rgba(16, 185, 129, 0.4);
                }
                @media (max-width: 768px) {
                    .zummo-pro-promotion .features-list {
                        grid-template-columns: 1fr;
                    }
                    .zummo-pro-promotion .cta-buttons {
                        flex-direction: column;
                    }
                }
            </style>
            
            <div class="stars">⭐⭐⭐⭐⭐</div>
            
            <h1><?php esc_html_e('Unlock the Full Power of Zummo!', 'zummo'); ?></h1>
            
            <p>You're using the <strong>free version</strong> of Zummo. Upgrade to <strong>Zummo PRO</strong> and unlock exclusive features that will transform your website!</p>
            
            <div class="features-list">
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Advanced customization options</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Premium blocks and templates</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Priority customer support</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Regular updates and new features</span>
                </div>
            </div>
            
            <div class="cta-buttons">
                <a class="button button-primary" href="<?php echo esc_url( ZUMMO_BUY_NOW ); ?>" target="_blank">
                    <?php esc_html_e('Upgrade to PRO Now', 'zummo'); ?>
                </a>
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
