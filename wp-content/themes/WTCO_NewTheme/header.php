<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<body <?php body_class(); ?>>
	<?php do_action( 'wp_body_open' ); ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

			<a class="skip-link sr-only sr-only-focusable"
				href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

			<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

				<?php if ( 'container' == $container ) : ?>
					<div class="container">
				<?php endif; ?>
				<a class="navbar-brand js-scroll-trigger" href="#page-top">
					<?php if ( ! has_custom_logo() ) { ?>
						<?php bloginfo( 'name' ); ?>
					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->
				</a>
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
						data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
						aria-label="Toggle navigation">
						Menu
						<i class="fas fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav text-uppercase ml-auto">
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="#services">Services</a>
							</li>
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="#about">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="#team">Team</a>
							</li>
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
							</li>
						</ul>
					</div>
					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
					<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>

			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->