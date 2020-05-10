<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gsen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--Nav and Showcase-->
<div class="showcase" id="<?php echo "$id";?>">

<!--Header-->
	<header id="header" class="top">
		<div class="header-container">
	<!--logo-->
			<div class="logo">
				<a href="<?= home_url();?>">
					<img src="<?= get_template_directory_uri();?>/assests/images/new-logogsen.svg" alt="">
				</a>
			</div>
	<!--Menu-->
			<nav class="main_nav">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
			<!--Mobile Menu-->
			<div class="mobile-container">
				<div class="menu" id="bar1"></div>
				<div class="menu" id="bar2"></div>
				<div class="menu" id="bar3"></div>
			</div>
		</div>
	</header><!-- #masthead -->
