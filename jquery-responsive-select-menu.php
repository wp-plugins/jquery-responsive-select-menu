<?php
/**
 * Plugin Name: jQuery Responsive Select Menu
 * Plugin URI:  http://mightyminnow.com
 * Description: The jQuery Responisve Select Menu plugin replaces the default WordPress navigation menu(s) with a dropdown &lt;select&gt; on mobile devices.
 * Version:     1.2
 * Author:      MIGHTYminnow
 * Author URI:  http://mightyminnow.com
 * License:     GPLv2+
 */

// Definitions
define( 'PLUGIN_NAME', 'jQuery Responsive Select Menu' );

// Includes
require_once dirname( __FILE__ ) . '/admin.php';

/**
 * Loads text domain for internationalization
 *
 * @package jQuery Responsive Select Menu
 * @since   1.0
 */
function jrsm_init() {

    // Load plugin text domain
    load_plugin_textdomain( 'jrsm', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_init', 'jrsm_init' );

/**
 * Enqueues required scripts & styles, and passes PHP variables to jQuery file
 *
 * @package jQuery Responsive Select Menu
 * @since   1.0
 */
function jrsm_scripts() {

	// Make sure jQuery is included
	wp_enqueue_script('jquery');
    
	// Include JRSM jQuery
    wp_enqueue_script( 'jrsm-jquery', plugins_url( '/jrsm-jquery.js', __FILE__ ), array( 'jquery' ), '1.0', false );

    // Add PHP plugin variables to the $params[] array to pass to jQuery
	$params = array (
		'containers' => get_option( 'jrsm-containers' ),
		'width' => get_option( 'jrsm-width' ),
		'firstItem' => get_option( 'jrsm-first-term' ),
		'indent' => get_option( 'jrsm-sub-item-spacer' ),
		'showCurrentPage' => get_option( 'jrsm-show-current-page' ),
		'hideEmptyLinks' => get_option( 'jrsm-hide-empty-links' )
	);

	// Pass PHP variables to jQuery script
	wp_localize_script( 'jrsm-jquery', 'php_params', $params );

	// Load custom CSS file
	wp_enqueue_style( 'jrsm-css', plugin_dir_url( __FILE__ ) . 'jrsm.css' );

	// Append custom CSS based on plugin settings
	$containers = str_replace(', ', ',', get_option( 'jrsm-containers' ) );
    if ( !empty( $containers ) ) {
        // Get menu <ul>'s inside container(s)
        $containers = explode( ',', $containers );
        foreach( $containers as &$container ) {
        	$container = '.jquery ' . $container . ' ul';
        }
        $containers = implode( ', ', $containers );
		$width = get_option( 'jrsm-width' );

		$css = "
		@media (max-width: {$width}px) {
			
			{$containers} {
				display: none !important;
			}

			.jquery-responsive-select-menu {
				display: inline-block;
		    	max-width: 100%;
			}

		}";

		wp_add_inline_style( 'jrsm-css', $css );
    }

}
add_action( 'wp_enqueue_scripts', 'jrsm_scripts', 0 );