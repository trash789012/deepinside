<?php
/*
Plugin Name: BulletProof Security
Plugin URI: http://forum.ait-pro.com/read-me-first/
Text Domain: bulletproof-security
Domain Path: /languages/
Description: <strong>Feature Highlights:</strong> Setup Wizard &bull; .htaccess Website Security Protection (Firewalls) &bull; Security Logging|HTTP Error Logging &bull; DB Backup &bull; DB Table Prefix Changer &bull; Login Security & Monitoring &bull; Idle Session Logout (ISL) &bull; Auth Cookie Expiration (ACE) &bull; UI Theme Skin Changer &bull; System Info: Extensive System, Server and Security Status Information &bull; FrontEnd|BackEnd Maintenance Mode
Version: .53.2
Author: AITpro | Edward Alexander
Author URI: http://forum.ait-pro.com/read-me-first/
*/

/*  Copyright (C) 2010-2016 Edward Alexander | AITpro.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// BPS variables
define( 'BULLETPROOF_VERSION', '.53.2' );
$bps_last_version = '.53.1';
$bps_version = '.53.2';
$bps_readme_install_ver = '3';
$aitpro_bullet = '<img src="'.plugins_url('/bulletproof-security/admin/images/aitpro-bullet.png').'" style="padding:0px 3px 0px 3px;" />';

// Load BPS Global class - not doing anything with this Class in BPS Free
//require_once( WP_PLUGIN_DIR . '/bulletproof-security/includes/class.php' );

add_action( 'init', 'bulletproof_security_load_plugin_textdomain' );

// Load i18n Language Translation
function bulletproof_security_load_plugin_textdomain() {
	load_plugin_textdomain('bulletproof-security', FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
}

// BPS upgrade functions
require_once( WP_PLUGIN_DIR . '/bulletproof-security/includes/functions.php' );
	remove_action('wp_head', 'wp_generator');
// General functions
require_once( WP_PLUGIN_DIR . '/bulletproof-security/includes/general-functions.php' );
// BPS Login Security
require_once( WP_PLUGIN_DIR . '/bulletproof-security/includes/login-security.php' );
// BPS DB Backup
require_once( WP_PLUGIN_DIR . '/bulletproof-security/includes/db-security.php' );
// Idle Session Logout (ISL)
$BPS_ISL_options = get_option('bulletproof_security_options_idle_session');
if ( $BPS_ISL_options['bps_isl'] == 'On' ) {
require_once( WP_PLUGIN_DIR . '/bulletproof-security/includes/idle-session-logout.php' );
}

// If in WP Admin Dashboard
if ( is_admin() ) {
    
require_once( WP_PLUGIN_DIR . '/bulletproof-security/admin/includes/admin.php' );
	
	register_activation_hook(__FILE__, 'bulletproof_security_install');
	register_deactivation_hook(__FILE__, 'bulletproof_security_deactivation');
    register_uninstall_hook(__FILE__, 'bulletproof_security_uninstall');

	add_action( 'admin_init', 'bulletproof_security_admin_init' );
    add_action( 'admin_menu', 'bulletproof_security_admin_menu' );
}

// "Settings" link on Plugins Options Page 
function bps_plugin_actlinks( $links, $file ) {
static $this_plugin;
	if ( ! $this_plugin ) 
		$this_plugin = plugin_basename(__FILE__);
	if ( $file == $this_plugin ) {
		$links[] = '<br><a href="'.admin_url( 'admin.php?page=bulletproof-security/admin/wizard/wizard.php' ).'" title="'.esc_attr( 'BPS Setup Wizard' ).'">'.__('Setup Wizard', 'bulletproof-security').'</a>';
		$links[] = '<br><a href="'.admin_url( 'plugins.php?page=bulletproof-security/admin/includes/uninstall.php' ).'" title="'.esc_attr( 'Select an uninstall option for BPS plugin deletion' ).'">'.__('Uninstall Options', 'bulleproof-security').'</a>';
		
	}
	return $links;
}

add_filter( 'plugin_action_links', 'bps_plugin_actlinks', 10, 2 );

// Add links on plugins page
function bps_plugin_extra_links( $links, $file ) {
static $this_plugin;
	if ( ! current_user_can('install_plugins') )
		return $links;
	if ( ! $this_plugin ) 
		$this_plugin = plugin_basename(__FILE__);
	if ( $file == $this_plugin ) {
		$links[] = '<a href="http://forum.ait-pro.com/forums/topic/plugin-conflicts-actively-blocked-plugins-plugin-compatibility/" title="BulletProof Security Forum" target="_blank">'.__('Forum - Support', 'bulleproof-security').'</a>';
		$links[] = '<a href="http://affiliates.ait-pro.com/po/" title="Upgrade to BPS Pro" target="_blank">'.__('Upgrade', 'bulleproof-security').'</a>';
		$links[] = '<a href="http://www.ait-pro.com/bulletproof-security-pro-flash/bulletproof.html" title="BulletProof Security Flash Movie" target="_blank">'.__('Flash Movie', 'bulleproof-security').'</a>';
	}
	return $links;
}

add_filter( 'plugin_row_meta', 'bps_plugin_extra_links', 10, 2 );

?>