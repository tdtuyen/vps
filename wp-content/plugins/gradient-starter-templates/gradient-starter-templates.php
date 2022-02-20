<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}


/*
Plugin Name: 	Starter Templates by Gradient Themes
Description: 	Plugin used to install demo data for themes developed and submitted by Gradient Themes.
Version: 		1.0.5
Author: 		gradientthemes
Author URI: 	www.gradientthemes.com
Tested up to: 	5.8
Text Domain: 	gradient-starter-templates
Generated By: 	http://gradientthemes.com
License:        GPL-2.0+
Domain Path:    /languages
*/

/*Define Constants for this plugin*/
define( 'gradient_starter_templates_VERSION', '1.0.5' );
define( 'gradient_starter_templates_PLUGIN_NAME', 'gradient-starter-templates' );
define( 'gradient_starter_templates_PATH', plugin_dir_path( __FILE__ ) );
define( 'gradient_starter_templates_URL', plugin_dir_url( __FILE__ ) );
define( 'gradient_starter_templates_TEMPLATE_URL', gradient_starter_templates_URL.'includes/demo-data/' );
define( 'gradient_starter_templates_SCRIPT_PREFIX', ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gradient-starter-templates-activator.php
 */
function activate_gradient_starter_templates() {
    require_once gradient_starter_templates_PATH . 'includes/activator.php';
    gradient_starter_templates_Activator::activate();
}


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require gradient_starter_templates_PATH . 'includes/init.php';


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gradient-starter-templates-deactivator.php
 */
function deactivate_gradient_starter_templates() {
    require_once gradient_starter_templates_PATH . 'includes/deactivator.php';
    gradient_starter_templates_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gradient_starter_templates' );
register_deactivation_hook( __FILE__, 'deactivate_gradient_starter_templates' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
if( !function_exists( 'run_gradient_starter_templates')){

    function run_gradient_starter_templates() {

        return gradient_starter_templates::instance();
    }
    run_gradient_starter_templates()->run();
}