<?php

/*

Plugin Name: Tixio Price Table

 */

if (!defined('ABSPATH')) {
	exit;
}

define('WCC__FILE__', __FILE__);
define('WCC_PLUGIN_BASE', plugin_basename(WCC__FILE__));
define('WCC_PATH', plugin_dir_path(WCC__FILE__));
define('WCC_URL', plugins_url('/', WCC__FILE__));
define('WCC_MODULES_PATH', plugin_dir_path(WCC__FILE__) . '/modules');
define('WCC_TEMPLATE_URL', WCC_URL . 'templates/');
define('WCC_ASSETS_URL', WCC_URL . 'assets/');

// -------------------------------------------------------------------------------
//  Adding assets
// -------------------------------------------------------------------------------

add_action('admin_enqueue_scripts', 'wcc_admin_scripts');

function wcc_admin_scripts() {
	// -------------------------------------------------------------------------------
	// bulk script blueprint
	// -------------------------------------------------------------------------------

	function addBulkLocalScripts($filePathArray, $version, $inFooter) {

		foreach ($filePathArray as $name => $file) {

			$path = WCC_ASSETS_URL . $file[0];
			$extension = pathinfo($path, PATHINFO_EXTENSION);
			$dependency;

			isset($file[1]) ?
				$dependency = $file[1] :
				$dependency = array();

			if ($extension === 'js') {
				wp_enqueue_script(
					$name,
					$path,
					$dependency,
					$version,
					$inFooter
				);
			} else {
				wp_enqueue_style(
					$name,
					$path,
					$dependency,
					$version,
					$inFooter
				);
			}
		}
	}

	// -------------------------------------------------------------------------------
	// Add stylesheets
	// -------------------------------------------------------------------------------

	$inFooter = false;
	$version = '1.0';
	$filePathArray = [
		'bootstrap' => ['bootstrap/css/bootstrap.min.css'],
		'main'      => ['admin/css/main.css'],
	];

	addBulkLocalScripts($filePathArray, $version, $inFooter);

	// -------------------------------------------------------------------------------
	// Add footer scripts
	// -------------------------------------------------------------------------------
	// wp_enqueue_script( 'vue-js', 'https://cdn.jsdelivr.net/npm/vue@2' );

	$inFooter = true;
	$version = '1.0';
	$filePathArray = [

		'price-table-data'     => ['admin/js/vue/data/fields.js'],
		'apiHandler'   => ['admin/js/api/apiHandler.js'],
		'vue-js'       => ['admin/js/lib/vue.js'],
		'vue-data'     => ['admin/js/vue/data.js'],
		'vue-methods'  => ['admin/js/vue/methods.js'],
		'vue-settings' => ['admin/js/vue/settings.js'],
		'main'         => ['admin/js/main.js', array('jquery')],
		// 'bootstrap'    => ['bootstrap/js/bootstrap.min.js'],

	];

	addBulkLocalScripts($filePathArray, $version, $inFooter);


	// -------------------------------------------------------------------------------
	// add localized data - WP REST API
	// -------------------------------------------------------------------------------

	wp_localize_script('apiHandler', 'WP_API', array(
		'nonce'         => wp_create_nonce('wp_rest'),
		'endpoint' => rest_url() . 'wp/v2',
	));

	// -------------------------------------------------------------------------------
	// add localized data - post type
	// -------------------------------------------------------------------------------

	$args = array(
		'public'   => true,
		'_builtin' => false,
	);

	$output = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'
	$post_types = get_post_types($args, $output, $operator);

	wp_localize_script('vue-data', 'WP_LOCAL', array(
		'postTypes' 	=> $post_types,
	));
}

function wcc_add_public_scripts() {
	$plugin_url = plugin_dir_url(__FILE__);
	wp_enqueue_style('wcc_public_style', $plugin_url . 'assets/public/css/main.css');
}
add_action('wp_enqueue_scripts', 'wcc_add_public_scripts');


// -------------------------------------------------------------------------------
// register admin menus
// -------------------------------------------------------------------------------

add_action('admin_menu', 'wcc_admin_menu');

function wcc_admin_menu() {

	$menu_name = 'Price Table';

	add_menu_page($menu_name, $menu_name, 'manage_options', 'price_table_admin', function () {
		require WCC_PATH . 'templates/price_table_admin.php';
	}, 'dashicons-tickets');

	function price_table_admin() {
		require WCC_PATH . 'templates/price_table_admin.php';
	}
}
/**
 * File includes
 */
// includes

// add a link to the WP Toolbar

function wpb_custom_toolbar_link($wp_admin_bar) {
	$args = array(
		'id'    => 'codatowp',
		'title' => 'Sync with Coda',
		'href'  => '#',
		'meta'  => array(
			'class' => 'codatowp',
			'title' => 'Search codatowp Tutorials',
		),
	);
	$wp_admin_bar->add_node($args);
}

// add_action('admin_bar_menu', 'wpb_custom_toolbar_link', 999);

function tixio_price_table_func(): string {
	ob_start();
	// home_features_tab_css();

	require WCC_PATH . 'templates/price_table_public.php';

	// output tab script
	home_features_tab_js();

	$content = ob_get_clean();
	return $content;
}


add_shortcode('tixio_price_table', 'tixio_price_table_func');
