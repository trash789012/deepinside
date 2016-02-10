<?php
/**
 * Hooks the Custom Internal CSS to head section
 *
 * @package The WP Theme
 */
function the_wp_custom_css() {

	$the_wp_internal_css = '';
	// primary colors
	$primary_color = esc_attr( get_theme_mod( 'primary_color', '#333333' ) );	
	if( $primary_color != '#333333' ) {
		$the_wp_internal_css .= '
		blockquote, pre {border-left:2px solid '.$primary_color.';}
		
		a:hover, a:focus, a:active,
		.entry-content a,
		.entry-title,
		.entry-title a,
		.pagination .nav-links a:hover,
		.pagination .current,
		.wp-pagenavi span.current,
		.widget-area .widget-title{color:'.$primary_color.';}
		
		.widget-area .widget-title span {border-color:'.$primary_color.';}
		
		#controllers a:hover, #controllers a.active{
			background-color:'.$primary_color.';
			color:'.$primary_color.';
		}
		
		#slider-title a,
		#commentform input ~ span,
		#commentform textarea ~ span,
		button,input[type="button"],input[type="reset"],input[type="submit"]
			{background:'.$primary_color.';}';
	}
	// Site Title & Tagline Colors
	if ( get_theme_mod( 'title_color', false ) ) 
		$the_wp_internal_css .= 'header .site-title a {color:'. esc_attr( get_theme_mod( 'title_color' ) ) .';}';
	if ( get_header_textcolor() )
		$the_wp_internal_css .= 'header .site-description {color:#'.esc_attr(get_header_textcolor()).';}';
	
	// Colors: Header Contact Info
	if ( get_theme_mod( 'address_color', false ) )
		$the_wp_internal_css .= '.header-description div.ca {color:'.
								esc_attr( get_theme_mod( 'address_color' ) ) .';}';
	if ( get_theme_mod( 'mail_color', false ) )
		$the_wp_internal_css .= '.header-description div.cm {color:'.
								esc_attr( get_theme_mod( 'mail_color' ) ) .';}';
	if ( get_theme_mod( 'phone_color', false ) )
		$the_wp_internal_css .= '.header-description div.cp {color:'.
								esc_attr( get_theme_mod( 'phone_color' ) ) .';}';
	
	// Header Image
	$header_image = get_header_image();
	if( $header_image != '' ) {
		$the_wp_internal_css .= '
		header.site-header{background-image:url('.$header_image.');}';
	}
	
	if( !empty( $the_wp_internal_css ) ) {
		?>
		<style type="text/css"><?php echo $the_wp_internal_css; ?></style>
		<?php
	}
}
add_action('wp_head', 'the_wp_custom_css');
 
?>