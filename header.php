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
	<style type="text/css">
		.navigation{
			background-color: #8fc533;
		}
		.navigation a.nav-links{
			color:#FFFFFF;
		}
		.site-info{
			background-color: #0F1821;
		}
		.contact-info{
			background-color: #2D3E50;
			color: #7C92A9;
		}
		.copyright-info{
			color:#50575E;
		}
		.content > .res-details{
			color:#B0A9A9;
		}
		.content>.res-details .restaurant-timing {
			color:#959393;
		}
		/* taxonomy css */
		.tag{
			color: #94D5F5;
		}

	</style>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<!--<a class="skip-link screen-reader-text" href="#content"><?php //esc_html_e( 'Skip to content', 'rt-restaurants' );    ?></a>-->

			<header id="masthead" class="site-header section group col span_12_of_12" role="banner">
				<div class="col span_10_of_12">
					<div class="site-branding">
						<div class="site-title col span_5_of_12"><img src="<?php echo get_template_directory_uri() . '/images/logo.png' ?>" /></div>
						<div class="advertisement col span_7_of_12" >
							<?php
							global $wpdb;
							$results = $wpdb->get_results( 'SELECT image_id FROM wp_advertisement_images ORDER BY rand() LIMIT 1', OBJECT );
							$url = wp_get_attachment_image_src( $results[ 0 ]->image_id, true );
							?>
							<img height="100px" width="500px" src="<?php echo $url[ 0 ]; ?>" />
						</div>
					</div><!-- .site-branding -->
				</div>

				<nav class="navigation col span_12_of_12">
					<!-- extra space -->
					<div class="col span_1_of_12"></div>
					<?php
					//wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
					clean_custom_menus();
					?>
					<div class="search-icon col span_1_of_12">
						<img src="<?php echo get_template_directory_uri() . '/images/search-icon.png' ?>" />
					</div>
				</nav>

			</header><!-- #masthead -->

			<div id="content" class="site-content">
