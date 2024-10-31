<?php
/**
 * Plugin Name:         Osom Block Visibility
 * Plugin URI:          https://osompress.com/plugins/osom-block-visibility/
 * Description:         Adds a toggle to blocks that allows you to hide the content on mobile or desktop devices.
 * Version:             1.0.1
 * Requires at least:   6.3
 * Requires PHP:        7.4
 * Author:              OsomPress
 * Author URI:          https://osompress.com/
 * License:             GPLv2
 * License URI:         https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:         osom-block-visibility
 * Domain Path:         /languages
 *
 * @package osom-block-visibility
 */

defined( 'ABSPATH' ) || exit;

add_action( 'enqueue_block_editor_assets', 'osom_block_visibility_enqueue_block_editor_assets' );
/**
 * Enqueue Editor scripts and styles.
 */
function osom_block_visibility_enqueue_block_editor_assets() {
	$plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
	$plugin_url  = untrailingslashit( plugin_dir_url( __FILE__ ) );
	$asset_file  = include untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/build/index.asset.php';

	wp_enqueue_script(
		'osom-block-visibility-editor-scripts',
		$plugin_url . '/build/index.js',
		$asset_file['dependencies'],
		$asset_file['version']
	);

	wp_set_script_translations(
		'osom-block-visibility-editor-scripts',
		'osom-block-visibility',
		$plugin_path . '/languages'
	);

	wp_enqueue_style(
		'osom-block-visibility-editor-styles',
		$plugin_url . '/build/editor.css'
	);
}

add_filter( 'register_block_type_args', 'osom_add_block_attributes', 9999, 2 );
/**
 * Add block visibility attributes.
 */
function osom_add_block_attributes( $args, $blockName ) {

	$block_attributes = array(
		'HideOnMobile'    => array(
			'type'    => 'boolean',
			'default' => false,
		),
		'HideOnDesktop'   => array(
			'type'    => 'boolean',
			'default' => false,
		),
		'HideToLogged'    => array(
			'type'    => 'boolean',
			'default' => false,
		),
		'HideToNotLogged' => array(
			'type'    => 'boolean',
			'default' => false,
		),
	);

	// Combine the existing attributes with the new attributes
	$args['attributes'] = array_merge( isset( $args['attributes'] ) ? $args['attributes'] : array(), $block_attributes );

	return $args;
}

add_filter( 'render_block', 'osom_block_visibility_render_block', 10, 2 );
/**
 * Control the block visibility depending on the device.
 */
function osom_block_visibility_render_block( $block_content, $block ) {

	if ( wp_is_mobile() && isset( $block['attrs']['HideOnMobile'] ) && true === $block['attrs']['HideOnMobile'] ) {
		return '';
	}

	if ( ! wp_is_mobile() && isset( $block['attrs']['HideOnDesktop'] ) && true === $block['attrs']['HideOnDesktop'] ) {
		return '';
	}

	if ( is_user_logged_in() && isset( $block['attrs']['HideToLogged'] ) && true === $block['attrs']['HideToLogged'] ) {
		return '';
	}

	if ( ! is_user_logged_in() && isset( $block['attrs']['HideToNotLogged'] ) && true === $block['attrs']['HideToNotLogged'] ) {
		return '';
	}

	return $block_content;
}

add_filter( 'rest_pre_dispatch', 'osom_conditionally_remove_attributes', 10, 3 );
/**
 * Fix REST API issue with blocks rendered server-side.
 */
function osom_conditionally_remove_attributes( $result, $server, $request ) {
	if ( strpos( $request->get_route(), '/wp/v2/block-renderer' ) !== false ) {
		if ( isset( $request['attributes'] ) && isset( $request['attributes']['HideOnDesktop'] ) ) {
			$attributes = $request['attributes'];
			unset( $attributes['HideOnDesktop'] );
			$request['attributes'] = $attributes;
		}
		if ( isset( $request['attributes'] ) && isset( $request['attributes']['HideToLogged'] ) ) {
			$attributes = $request['attributes'];
			unset( $attributes['HideToLogged'] );
			$request['attributes'] = $attributes;
		}
	}
	return $result;
}
