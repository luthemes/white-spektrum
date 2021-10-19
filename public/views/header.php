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
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="container" class="site-container">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'white-spektrum' ) ?></a>
	<header id="header" class="site-header">
		<div class="site-branding">
			<?php Benlumia007\Backdrop\Theme\Site\display_site_title(); ?>
			<?php Benlumia007\Backdrop\Theme\Site\display_site_description(); ?>
		</div>
		<?php Benlumia007\Backdrop\Theme\Menu\display( 'menu', [ 'primary' ] ); ?>
		<?php the_custom_header_markup(); ?>
	</header>
