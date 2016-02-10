<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package The WP Theme

 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'the-wp' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
        <?php
        if ( get_theme_mod('logo' , get_template_directory_uri() . '/images/the-wp-example-logo.png') ) {
        ?>
            <div class="header-logo-image">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img src="<?php echo esc_url( get_theme_mod('logo' , get_template_directory_uri() . '/images/logo.png') ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
            </div><!-- #header-logo-image -->
        <?php
        } else {
        ?>
        	<div class="header-text">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            	<span class="site-description"><?php bloginfo('description'); ?></span>
        	</div>

        <?php
        }
        ?>
            <div class="header-search">
            	<?php if ( get_theme_mod('show_search' , 1) ) get_search_form(); ?>
            	<div class="header-description">
                	<?php
					$address = esc_attr (get_theme_mod( 'address', 'Massachusetts Ave, Cambridge, MA, USA' ));
					$mail = esc_attr (get_theme_mod( 'mail', 'info@example.com' ));
					$phone = esc_attr (get_theme_mod( 'phone', '+1 617-253-1000' ));
					
					if ($phone) echo '<div class="cp"><i class="fa fa-phone"></i>'.$phone.'</div>';
					if ($mail) echo '<div class="cm"><i class="fa fa-envelope-o"></i>'.$mail.'</div>';
					if ($address) echo '<div class="ca"><i class="fa fa-map-marker"></i>'.$address.'</div>';
					
					the_wp_social_links ();
					?>
                </div>
            </div>    
            <div class="clear"></div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
    
    <nav id="site-navigation" class="main-navigation <?php if((is_home())or(is_single())or(is_search())or(is_archive())){echo 'mr';}?>" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Menu', 'the-wp' ); ?></button>
        <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
        
        <div class="clear"></div>
        <div class="nav-foot"></div>
    </nav><!-- #site-navigation -->
    
<?php
if( get_theme_mod( 'enable_slider' ) ) {
	if ( is_front_page() ) {
?>
		<div class="site-slider"><div class="inner">
<?php
		the_wp_slider();
?>
		<div class="clear"></div></div></div>
<?php
	}
}
?>

	<div id="content" class="site-content">