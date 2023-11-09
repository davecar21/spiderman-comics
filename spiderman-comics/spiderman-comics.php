<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Spiderman_Comics
 *
 * @wordpress-plugin
 * Plugin Name:       Spiderman Comics
 * Description:       Lists the comics that feature Spider-Man (Peter Parker) and whose issues in series only start in 2022. Show both the title and the image of the comic.
 * Version:           1.0.0
 * Author:            Davecar
 * Author URI:        https://github.com/davecar21
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       spiderman-comics
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SPIDERMAN_COMICS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-spiderman-comics-activator.php
 */
function activate_spiderman_comics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-spiderman-comics-activator.php';
	Spiderman_Comics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-spiderman-comics-deactivator.php
 */
function deactivate_spiderman_comics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-spiderman-comics-deactivator.php';
	Spiderman_Comics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_spiderman_comics' );
register_deactivation_hook( __FILE__, 'deactivate_spiderman_comics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-spiderman-comics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_spiderman_comics() {

	$plugin = new Spiderman_Comics();
	$plugin->run();

}
run_spiderman_comics();
