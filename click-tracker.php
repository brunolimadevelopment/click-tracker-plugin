<?php
/**
 * Plugin Name:     Click Tracker
 * Plugin URI:      https://github.com/brunolimadevelopment/click-tracker-plugin
 * Description:     Tracks clicks on a button and stores records in the database.
 * Author:          Bruno Lima
 * Author URI:      https://www.linkedin.com/in/bruno-lima-b6a034177/
 * Text Domain:     click-tracker
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Click_Tracker
 */


// Inclui os arquivos necessários
require_once plugin_dir_path(__FILE__) . 'includes/click-tracker-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-click-tracker.php';
require_once plugin_dir_path(__FILE__) . 'public/click-tracker-shortcode.php';
require_once plugin_dir_path(__FILE__) . 'admin/click-tracker-admin-page.php';

// Ativação e desativação do plugin
register_activation_hook(__FILE__, 'click_tracker_install');
register_uninstall_hook(__FILE__, 'click_tracker_uninstall');
