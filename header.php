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
global $post;
$page_slug = $post->post_name;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri();?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri();?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri();?>/favicon-16x16.png">
	<link rel="manifest" href="<?= get_template_directory_uri();?>/site.webmanifest">
	<link rel="mask-icon" href="<?= get_template_directory_uri();?>/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--Nav and Showcase-->
<div class="showcase" id="<?php echo is_home() ? 'home' : $page_slug;?>">

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
