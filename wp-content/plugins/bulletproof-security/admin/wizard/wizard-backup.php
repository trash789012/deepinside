<?php
// Direct calls to this file are Forbidden when core files are not present 
if ( ! current_user_can('manage_options') ) { 
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
}
	
// Get Real IP address - USE EXTREME CAUTION!!!
function bpsPro_get_real_ip_address_wizard() {
	
	if ( is_admin() && wp_script_is( 'bps-accordion', $list = 'queue' ) && current_user_can('manage_options') ) {
	
		if ( isset($_SERVER['HTTP_CLIENT_IP'] ) ) {
			$ip = esc_html($_SERVER['HTTP_CLIENT_IP']);
			
		} elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			$ip = esc_html($_SERVER['HTTP_X_FORWARDED_FOR']);
			
		} elseif ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
			$ip = esc_html($_SERVER['REMOTE_ADDR']);
			
		}
	return $ip;
	}
}	

// Create a new Deny All .htaccess file ONLY on page load with users current IP address to allow the root-htaccess-file.zip file to be downloaded
// Create a new Deny All .htaccess file if IP address is not current
function bpsPro_Wizard_deny_all() {

	if ( isset( $_POST['Submit-Setup-Wizard-Preinstallation'] ) || isset( $_POST['Submit-Setup-Wizard'] ) || isset( $_POST['Submit-Net-JTC'] ) || isset( $_POST['Submit-Net-LSM'] ) || isset( $_POST['Submit-Wizard-GDMW'] ) || isset( $_POST['Submit-Wizard-cURL-Options'] ) ) {
		return;
	}

	if ( is_admin() && wp_script_is( 'bps-accordion', $list = 'queue' ) && current_user_can('manage_options') ) {
		
		$Apache_Mod_options = get_option('bulletproof_security_options_apache_modules');
		
		if ( $Apache_Mod_options['bps_apache_mod_ifmodule'] == 'Yes' ) {	
	
			$denyall_content = "# BPS mod_authz_core IfModule BC\n<IfModule mod_authz_core.c>\nRequire ip ". bpsPro_get_real_ip_address_wizard()."\n</IfModule>\n\n<IfModule !mod_authz_core.c>\n<IfModule mod_access_compat.c>\n<FilesMatch \"(.*)\$\">\nOrder Allow,Deny\nAllow from ". bpsPro_get_real_ip_address_wizard()."\n</FilesMatch>\n</IfModule>\n</IfModule>";
	
		} else {
		
			$denyall_content = "# BPS mod_access_compat\n<FilesMatch \"(.*)\$\">\nOrder Allow,Deny\nAllow from ". bpsPro_get_real_ip_address_wizard()."\n</FilesMatch>";		
		}		
		
		$create_denyall_htaccess_file = WP_PLUGIN_DIR . '/bulletproof-security/admin/wizard/.htaccess';
		$check_string = @file_get_contents($create_denyall_htaccess_file);
		
		if ( ! file_exists($create_denyall_htaccess_file) ) { 

			$handle = fopen( $create_denyall_htaccess_file, 'w+b' );
    		fwrite( $handle, $denyall_content );
    		fclose( $handle );
		}			
		
		if ( file_exists($create_denyall_htaccess_file) && ! strpos( $check_string, bpsPro_get_real_ip_address_wizard() ) ) { 
			$handle = fopen( $create_denyall_htaccess_file, 'w+b' );
    		fwrite( $handle, $denyall_content );
    		fclose( $handle );
		}
	}
}
bpsPro_Wizard_deny_all();

// Zip Root htaccess file: If ZipArchive Class is not available use PclZip
function bps_zip_root_htaccess_file() {
	// Use ZipArchive
	if ( class_exists('ZipArchive') ) {

		$zip = new ZipArchive();
		$filename = WP_PLUGIN_DIR . '/bulletproof-security/admin/wizard/root-htaccess-file.zip';
	
		if ( $zip->open($filename, ZIPARCHIVE::CREATE) !== TRUE ) {
    		exit("Error: Cannot Open $filename\n");
		}

		$zip->addFile(ABSPATH . '.htaccess', ".htaccess");
		$zip->close();

	return true;

	} else {

		// Use PclZip
		define( 'PCLZIP_TEMPORARY_DIR', WP_PLUGIN_DIR . '/bulletproof-security/admin/wizard/' );
		require_once( ABSPATH . 'wp-admin/includes/class-pclzip.php');
	
		if ( ini_get( 'mbstring.func_overload' ) && function_exists( 'mb_internal_encoding' ) ) {
			$previous_encoding = mb_internal_encoding();
			mb_internal_encoding( 'ISO-8859-1' );
		}
  		
		$archive = new PclZip(WP_PLUGIN_DIR . '/bulletproof-security/admin/wizard/root-htaccess-file.zip');
		$v_list = $archive->create(ABSPATH . '.htaccess', PCLZIP_OPT_REMOVE_PATH, ABSPATH);
  	
	return true;

		if ( $v_list == 0 ) {
			die("Error : ".$archive->errorInfo(true) );
		return false;	
		}
	}
}

// If there is additional code in the root htaccess file besides just the standard WP Rewrite code then display message, forum link and download button.
// return if the BULLETPROOF string is found in the root htaccess file.
// Note: Using (\w|\d|\W|\D){1,} causes XAMPP to crash
function bpsPro_root_precheck_download() {

	if ( isset( $_POST['Submit-Setup-Wizard-Preinstallation'] ) || isset( $_POST['Submit-Setup-Wizard'] ) ) {
		return;
	}

	//$root_htaccess_file = ABSPATH . 'test.htaccess';
	$root_htaccess_file = ABSPATH . '.htaccess';
	$get_root_contents = @file_get_contents($root_htaccess_file);
	$bps_topDiv = '<div id="message" class="updated" style="margin-left:220px;background-color:#dfecf2;border:1px solid #999;-moz-border-radius-topleft:3px;-webkit-border-top-left-radius:3px;-khtml-border-top-left-radius:3px;border-top-left-radius:3px;-moz-border-radius-topright:3px;-webkit-border-top-right-radius:3px;-khtml-border-top-right-radius:3px;border-top-right-radius:3px;-webkit-box-shadow: 3px 3px 5px -1px rgba(153,153,153,0.7);-moz-box-shadow: 3px 3px 5px -1px rgba(153,153,153,0.7);box-shadow: 3px 3px 5px -1px rgba(153,153,153,0.7);"><p>';
	$bps_bottomDiv = '</p></div>';

	if ( strpos( $get_root_contents, "BULLETPROOF" ) ) {
		return;
	}

	if ( ! is_multisite() ) {

		$wp_single_default = '/[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}(\s*|){1,}#\sBEGIN\sWordPress\s*<IfModule\smod_rewrite\.c>\s*RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule(.*)\s*<\/IfModule>\s*#\sEND\sWordPress(\s*|){1,}[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}/';
	
		$wp_single_default_no_code_top = '/#\sBEGIN\sWordPress\s*<IfModule\smod_rewrite\.c>\s*RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule(.*)\s*<\/IfModule>\s*#\sEND\sWordPress(\s*|){1,}[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}/';
	
		$wp_single_default_no_code_bottom = '/[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}(\s*|){1,}#\sBEGIN\sWordPress\s*<IfModule\smod_rewrite\.c>\s*RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule(.*)\s*<\/IfModule>\s*#\sEND\sWordPress(\s*|){1,}/';

		if ( preg_match( $wp_single_default, $get_root_contents, $matches ) || preg_match( $wp_single_default_no_code_top, $get_root_contents, $matches ) || preg_match( $wp_single_default_no_code_bottom, $get_root_contents, $matches ) ) {

			// zip root htaccess file, display message with forum link and download button.
			bps_zip_root_htaccess_file();
			
			echo $bps_topDiv;
			$text = '<font color="green"><strong>'.__('Custom additional htaccess code was found in your current root htaccess file. Your root htaccess file has been backed up and zipped in this zip file: /bulletproof-security/admin/wizard/root-htaccess-file.zip. Click the Download Root htaccess File button to download your root-htaccess-file.zip file to your computer.', 'bulletproof-security').'<br>'.__('Click this forum link: ', 'bulletproof-security').'<a href="http://forum.ait-pro.com/forums/topic/setup-wizard-root-htaccess-file-backup/" target="_blank" style="text-decoration:underline;">'.__('Setup Wizard Root htaccess File Backup', 'bulletproof-security').'</a>'.__(' for help information about what this means and what to do.', 'bulletproof-security').'</strong></font><br><div style="width:170px;font-size:1em;text-align:center;margin:10px 0px 0px 0px;padding:4px 6px 4px 6px;background-color:#e8e8e8;border:1px solid gray;"><a href="'.plugins_url( '/bulletproof-security/admin/wizard/root-htaccess-file.zip' ).'" style="font-size:1em;font-weight:bold;text-decoration:none;">'.__('Download Root htaccess File', 'bulletproof-security').'</a></div>';
			echo $text;
			echo $bps_bottomDiv;			
		}

	} else {
		
		// WP 3.5+ Subfolder & Subdomain Sites
		$subfolder_subdomain35 = '/[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}(\s*|){1,}RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*#\sadd(.*)wp-admin\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule((.*)\s*){3}RewriteRule\s\.\s(.*)index\.php\s\[L\](\s*|){1,}[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}/';		

		$subfolder_subdomain35_no_code_top = '/RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*#\sadd(.*)wp-admin\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule((.*)\s*){3}RewriteRule\s\.\s(.*)index\.php\s\[L\](\s*|){1,}[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}/';				

		$subfolder_subdomain35_no_code_bottom = '/[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}(\s*|){1,}RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*#\sadd(.*)wp-admin\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule((.*)\s*){3}RewriteRule\s\.\s(.*)index\.php\s\[L\](\s*|){1,}/';

		// WP 3.4 or older Subfolder
		$subfolder34 = '/[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}(\s*|){1,}#\sBEGIN\sWordPress\s*RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*#\suploaded(.*)\s*RewriteRule(.*)\s*#\sadd(.*)\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule((.*)\s*){4}#\sEND\sWordPress(\s*|){1,}[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}/';
	
		$subfolder34_no_code_top = '/#\sBEGIN\sWordPress\s*RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*#\suploaded(.*)\s*RewriteRule(.*)\s*#\sadd(.*)\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule((.*)\s*){4}#\sEND\sWordPress(\s*|){1,}[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}/';

		$subfolder34_no_code_bottom = '/[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}(\s*|){1,}#\sBEGIN\sWordPress\s*RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*#\suploaded(.*)\s*RewriteRule(.*)\s*#\sadd(.*)\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule((.*)\s*){4}#\sEND\sWordPress(\s*|){1,}/';

		// WP 3.4 or older Subdomain
		$subdomain34 = '/[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}(\s*|){1,}#\sBEGIN\sWordPress\s*RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*#\suploaded(.*)\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule((.*)\s*){4}#\sEND\sWordPress(\s*|){1,}[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}/';

		$subdomain34_no_code_top = '/#\sBEGIN\sWordPress\s*RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*#\suploaded(.*)\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule((.*)\s*){4}#\sEND\sWordPress(\s*|){1,}[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}/';	
	
		$subdomain34_no_code_bottom = '/[a-zA-Z0-9\#\^\/\$\:\.\[\]\<\>\*\=\%\{\}_\-\(\)\,\;@\\\\|\?\'\"\&\+\!]{1,}(\s*|){1,}#\sBEGIN\sWordPress\s*RewriteEngine\sOn\s*RewriteBase(.*)\s*RewriteRule(.*)\s*#\suploaded(.*)\s*RewriteRule(.*)\s*RewriteCond((.*)\s*){2}RewriteRule((.*)\s*){4}#\sEND\sWordPress(\s*|){1,}/';	
	
		if ( preg_match( $subfolder_subdomain35, $get_root_contents, $matches ) || preg_match( $subfolder_subdomain35_no_code_top, $get_root_contents, $matches ) || preg_match( $subfolder_subdomain35_no_code_bottom, $get_root_contents, $matches ) || preg_match( $subfolder34, $get_root_contents, $matches ) || preg_match( $subfolder34_no_code_top, $get_root_contents, $matches ) || preg_match( $subfolder34_no_code_bottom, $get_root_contents, $matches ) || preg_match( $subdomain34, $get_root_contents, $matches ) || preg_match( $subdomain34_no_code_top, $get_root_contents, $matches ) || preg_match( $subdomain34_no_code_bottom, $get_root_contents, $matches ) ) {

			// zip root htaccess file, display message with forum link and download button.
			bps_zip_root_htaccess_file();
			
			echo $bps_topDiv;
			$text = '<font color="green"><strong>'.__('Custom additional htaccess code was found in your current root htaccess file. Your root htaccess file has been backed up and zipped in this zip file: /bulletproof-security/admin/wizard/root-htaccess-file.zip. Click the Download Root htaccess File button to download your root-htaccess-file.zip file to your computer.', 'bulletproof-security').'<br>'.__('Click this forum link: ', 'bulletproof-security').'<a href="http://forum.ait-pro.com/forums/topic/setup-wizard-root-htaccess-file-backup/" target="_blank" style="text-decoration:underline;">'.__('Setup Wizard Root htaccess File Backup', 'bulletproof-security').'</a>'.__(' for help information about what this means and what to do.', 'bulletproof-security').'</strong></font><br><div style="width:170px;font-size:1em;text-align:center;margin:10px 0px 0px 0px;padding:4px 6px 4px 6px;background-color:#e8e8e8;border:1px solid gray;"><a href="'.plugins_url( '/bulletproof-security/admin/wizard/root-htaccess-file.zip' ).'" style="font-size:1em;font-weight:bold;text-decoration:none;">'.__('Download Root htaccess File', 'bulletproof-security').'</a></div>';
			echo $text;
			echo $bps_bottomDiv;			
		}
	}
}

?>