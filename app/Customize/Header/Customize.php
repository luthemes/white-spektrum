<?php
/**
 * Customize component.
 *
 * Integrates the theme's header into the customizer.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

namespace WhiteSpektrum\Customize\Header;
use WhiteSpektrum\Customize\Customizable;
use WP_Customize_Manager;
use WP_Customize_Color_Control;
use WhiteSpektrum\Tools\Collection;
use WhiteSpektrum\Tools\Mod;
use WhiteSpektrum\Template\Footer;

class Customize extends Customizable {

	/**
	 * Registers customizer panels.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPanels( WP_Customize_Manager $manager ) {}

	/**
	 * Registers customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {
        $manager->get_section( 'colors' )->panel = 'theme_header';
        $manager->get_section( 'header_image' )->panel = 'theme_header';

    }

	/**
	 * Registers customizer settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSettings( WP_Customize_Manager $manager ) {
        $manager->get_setting( 'header_textcolor' )->transport = 'postMessage';
		$manager->get_setting( 'header_textcolor' )->priority = 5;


    }

	/**
	 * Registers customizer controls.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {

    }

	/**
	 * Registers customizer partials.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPartials( WP_Customize_Manager $manager ) {}

	/**
	* Registers JSON for the customize controls script via `wp_localize_script()`.
	* Objects added to the collection should implement the `JsonSerializable`
	* interface.
	*
	* @since  1.0.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function controlsJson( Collection $json ) {}

	/**
	* Registers JSON for the customize preview script via `wp_localize_script()`.
	* Objects added to the collection should implement the `JsonSerializable`
	* interface.
	*
	* @since  1.0.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function previewJson( Collection $json ) {}
}