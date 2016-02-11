<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rt-restaurants
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
		<div id="page" class="site">
			<!--<a class="skip-link screen-reader-text" href="#content"><?php //esc_html_e( 'Skip to content', 'rt-restaurants' );  ?></a>-->

			<header id="masthead" class="site-header section group col span_12_of_12" role="banner">
				<div class="site-branding">
					<h1 class="site-title col span_5_of_12"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Luxury Restaurants</a></h1>
					<div class="advertisement col span_6_of_12" >
						ADVERTISEMENT
					</div>
				</div><!-- .site-branding -->

				<nav class="navigation col span_12_of_12">
					<!-- extra space -->
					<div class="col span_1_of_12"></div>
					<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
					clean_custom_menus();
					?>
					<div class="search-icon col span_1_of_12">
						<img src="<?php echo get_template_directory_uri().'/images/search-icon.png'?>" />
					</div>
				</nav>
				
			</header><!-- #masthead -->

			<div id="content" class="site-content">
