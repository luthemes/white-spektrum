<?php
/**
 * Theme mods settings Config.
 *
 * Defines the default theme mods for the theme. Child themes can overwrite this
 * with a `config/settings-mod.php` file for changing the defaults.
 *
 * Configs are loaded early in the load process. If a default value requires PHP
 * code to execute, use a closure. It will be invoked at an appropriate time when
 * all functions/variables are set up and available for use.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

use function Backdrop\Theme\is_classicpress;

return [

	# ----------------------------------------------------------------------
	# Global layout.
	# ----------------------------------------------------------------------
	#
	# Handles the global theme layout mods.

	// Set the default layout.
	'layout' => 'full',

	# ----------------------------------------------------------------------
	# Header.
	# ----------------------------------------------------------------------
	#
	# Handles various header mods.

	'theme_header_custom_logo' => false,

	// Branding separator (see `config/character-entities.php` for options).
	'branding_sep' => '&#183;',


	# ----------------------------------------------------------------------
	# Footer.
	# ----------------------------------------------------------------------
	#
	# Handles various footer mods.

	// Whether to show a random powered by quote by default. If set to `false`,
	// the `footer_credit` value will be used.
	'theme_footer_powered_by' => false,

	// Default footer credit text.
	'theme_footer_custom_credit' => function() {
		$year = gmdate( 'Y' ); // Get the current year
		$copyright = sprintf( __( "&#169; %1\$s. %2\$s.", 'white-spektrum' ), $year, Backdrop\Theme\Site\render_home_link() );

		if ( is_classicpress() ) {
			$footer_text = sprintf( __( "Powered by %1\$s and %2\$s.", 'white-spektrum' ), Backdrop\Theme\Site\render_cp_link(), Backdrop\Theme\Site\render_theme_link() );
		} else {
			$footer_text = sprintf( __( "Powered by %1\$s and %2\$s.", 'white-spektrum' ), Backdrop\Theme\Site\render_wp_link(), Backdrop\Theme\Site\render_theme_link() );
		}

		return $copyright . ' <br /> ' . $footer_text;
	},

	'featured_image_size' => 'white-spektrum-landscape-medium'
];