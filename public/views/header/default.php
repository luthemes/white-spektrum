<?php
/**
 * The header for the theme.
 * 
 * This is the template that displays the head of the theme which includes
 * site title, site description and sometimes, primary navigation and the 
 * custom header markup if exists.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="container" class="site-container">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'white-spektrum' ) ?></a>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php Backdrop\Site\display_title( [ 'class' => 'site-title', 'link_class' => 'site-title-link' ] ); ?>
			<?php Backdrop\Site\display_description( [ 'class' => 'site-description' ] ); ?>
		</div>
		<?php Backdrop\View\display( 'menu', 'primary', [ 'location' => 'primary' ] ); ?>
		<?php the_custom_header_markup(); ?>
	</header>
