<?php
/**
 * Plugin Name: WPCE - WooCommerce Parts Compatibility Editor
 * Description: A WooCommerce addon which helps you to create unlimited product finders in a single website.
 * Version: 3.6
 * Author: The WP Instinct Team
 * Author URI: http://wpinstinct.com/
 * Text Domain: wpce
 */
 
defined ( 'ABSPATH' ) || exit;

if ( ! class_exists ( 'Woo_Parts_Compatibility_Editor' ) ) :

	/**
	 * Main Class
	 */
	final class Woo_Parts_Compatibility_Editor {
		
		/**
		 * @var string
		 */
		public $version = '3.6';

		/**
		 * @var The Single Instance of Class
		 */
		protected static $_instance = null;

		/**
		 * Main Instance
		 */
		public static function instance () {
			if ( is_null ( self::$_instance ) ) {
				self::$_instance = new self ();
			}
			
			return self::$_instance;
		}

		/**
		 * Constructor
		 */
		public function __construct () {
			
			// Return if WooCommerce plugin is not activate
			if ( ! function_exists ( 'is_plugin_active' ) ) {
				include_once ( ABSPATH . 'wp-admin/includes/plugin.php' );
			}
			
			if ( ! (
				in_array ( 'woocommerce/woocommerce.php', apply_filters ( 'active_plugins', get_option( 'active_plugins' ) ) )
				||
				is_plugin_active ( 'woocommerce/woocommerce.php' )
				||
				is_plugin_active_for_network ( 'woocommerce/woocommerce.php' )
			) ) {
				return;
			}
			
			$this->define_constants ();
			$this->includes ();
			$this->init_hooks ();
		}


		/**
		 * Define Constants
		 */
		private function define_constants () {
			define ( 'WPCE_PLUGIN_FILE', __FILE__ );
			define ( 'WPCE_PLUGIN_BASENAME', plugin_basename ( __FILE__ ) );
			define ( 'WPCE_PLUGIN_VERSION', $this->version );
			define ( 'WPCE_PLUGIN_URL', untrailingslashit ( plugins_url( '/', __FILE__ ) ) );
			define ( 'WPCE_PLUGIN_PATH', untrailingslashit ( plugin_dir_path( __FILE__ ) ) );
		}
		
		/**
		 * Include Required Core Files
		 */
		private function includes () {
			include_once ( 'lib/wpce-cookies.php' );
			include_once ( 'lib/wpce-core-functions.php' );
			include_once ( 'lib/wpce-db-functions.php' );
			
			include_once ( 'includes/class-wpce-install.php' );
			include_once ( 'includes/class-wpce-post-types.php' );
			include_once ( 'includes/class-wpce-ajax.php' );
			include_once ( 'includes/class-wpce-orders.php' );
			
			if( is_admin () ) {
				include_once ( 'includes/admin/class-wpce-admin-assets.php' );
				include_once ( 'includes/admin/class-wpce-admin-settings.php' );
				include_once ( 'includes/admin/class-wpce-admin-post-types.php' );
				include_once ( 'includes/admin/class-wpce-admin-terms-list.php' );
				include_once ( 'includes/admin/class-wpce-admin-terms-metabox.php' );
				include_once ( 'includes/admin/class-wpce-admin-importer.php' );
			} else {
				include_once ( 'includes/class-wpce-frontend-assets.php' );
				include_once ( 'includes/class-wpce-search.php' );
				include_once ( 'includes/class-wpce-product-validator.php' );
				include_once ( 'includes/class-wpce-product-tab.php' );
			}
			
			include_once ( 'includes/shortcodes/class-wpce-shortcode-filter.php' );
			include_once ( 'includes/shortcodes/class-wpce-shortcode-user-searches.php' );
			include_once ( 'includes/shortcodes/class-wpce-shortcode-product-tab-terms.php' );
			
			add_action ( 'woocommerce_loaded', array ( $this, 'include_woo_dependent_files' ) );
		}
		
		/**
		 * Include WooCommerce Dependent Required Core Files
		 */
		public function include_woo_dependent_files () {
			include_once ( 'includes/widgets/class-wpce-widget-filter.php' );
			include_once ( 'includes/widgets/class-wpce-widget-user-searches.php' );
		}
		
		/**
		 * Action Hooks and Filters
		 */
		private function init_hooks () {
			// Quick Links to Plugins List Page
			add_filter ( 'plugin_action_links_' . WPCE_PLUGIN_BASENAME, array ( 'WPCE_Install', 'quick_links' ) );
			
			// On Plugin Activation Actions
			register_activation_hook ( __FILE__, array ( 'WPCE_Install', 'install' ) );
			add_action ( 'init', array ( $this, 'init' ), 0 );
		}
		
		/**
		 * Init Localisation Files
		 */
		public function init () {
			$this->load_plugin_textdomain ();
		}
		
		/**
		 * Load Localisation Files
		 */
		public function load_plugin_textdomain () {
			load_plugin_textdomain ( 'wpce', false, plugin_basename( dirname( __FILE__ ) ) . '/i18n/languages' );
		}

	}

endif;

$GLOBALS['wpce'] = Woo_Parts_Compatibility_Editor::instance ();