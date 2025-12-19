<?php
/**
 * Scripts Execute on Plugin Uninstall
 */

defined ( 'ABSPATH' ) || exit;

$clear_data_on_uninstall = get_option ( 'wpce_clear_data_on_uninstall' );

if ( $clear_data_on_uninstall == 'yes' ) {
	global $wpdb;
	include_once dirname ( __FILE__ ) . '/includes/class-wpce-install.php';
	
	// Drop Tables
	WPCE_Install::drop_tables ();
	
	// Delete Options
	WPCE_Install::drop_options ();
	$wpdb->query ( "DELETE FROM {$wpdb->options} WHERE `option_name` LIKE 'wpce_%';" );
	$wpdb->query ( "DELETE FROM {$wpdb->options} WHERE `option_name` LIKE 'widget_wpce_%';" );
	
	// Delete Posts + Meta Data
	$wpdb->query ( "DELETE FROM {$wpdb->posts} WHERE `post_type` IN ( 'wpce' );" );
	$wpdb->query ( "DELETE meta FROM {$wpdb->postmeta} meta LEFT JOIN {$wpdb->posts} posts ON posts.`ID` = meta.`post_id` WHERE posts.`ID` IS NULL;" );
	
	// Delete User Meta Data
	$wpdb->query ( "DELETE FROM {$wpdb->usermeta} WHERE `meta_key` LIKE 'wpce_%';" );
	
	// Clear Cached Data
	wp_cache_flush ();
}