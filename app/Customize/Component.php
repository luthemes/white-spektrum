<?php
/**
 * Customize component.
 *
 * Integrates the theme's settings into the customizer.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

namespace WhiteSpektrum\Customize;

use Backdrop\Customize\Component as BaseComponent;
use WP_Customize_Manager;

use function Backdrop\Mix\asset;

/**
 * Handles setting up everything we need for the customizer.
 *
 * The framework's `Backdrop\Customize\Component` registers the `Theme: Global`, `Theme: Header`,
 * `Theme: Content` and `Theme: Footer` panels, moves the core sections into them, registers the
 * `radio-image` control type and calls each customizable component. This class adds the theme's
 * own sections and its customizer controls script.
 *
 * @link   https://developer.wordpress.org/themes/customize-api
 * @since  1.0.0
 * @access public
 */
class Component extends BaseComponent {

	/**
	 * Adds our customizer-related actions to the appropriate hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {

		parent::boot();

		add_action( 'customize_controls_enqueue_scripts', [ $this, 'controlsEnqueue' ] );
	}

	/**
	 * Registers the theme's sections after the framework's.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager $manager Instance of the customize manager.
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {

		parent::registerSections( $manager );

		$manager->add_section( 'theme_content_feature_image', [
			'panel' => 'theme_content',
			'title' => __( 'Feature Image', 'white-spektrum' ),
		] );

		$manager->add_section( 'theme_footer_credit', [
			'title' => esc_html__( 'Credit', 'white-spektrum' ),
			'panel' => 'theme_footer',
		] );
	}

	/**
	 * Enqueues the scripts and styles for the controls frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function controlsEnqueue() {

		wp_enqueue_style( 'white-spektrum-customize-controls', asset( 'assets/css/customize-controls.css' ), [], null );
		wp_enqueue_script( 'white-spektrum-customize-controls', asset( 'assets/js/customize-controls.js' ), [ 'customize-controls' ], null, true );
	}
}
