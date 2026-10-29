<?php
/**
 * Customize component.
 *
 * Integrates the theme's layouts into the customizer.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

namespace WhiteSpektrum\Customize\Layout;
use WhiteSpektrum\Customize\Customizable;
use WP_Customize_Manager;
use WhiteSpektrum\Tools\Collection;
use WhiteSpektrum\Tools\Mod;
use WhiteSpektrum\Template\Footer;
use Backdrop\Customize\Controls\RadioImage;

class Customize extends Customizable {

	/**
	 * Houses the collection of patterns.
	 *
	 * @since  2.2.0
	 * @access protected
	 * @var    Pattern\Patterns
	 */
	protected $layouts;

	/**
	 * Registers customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {
        
        $manager->add_section( 'theme_content_global_layout', [
            'title' => __( 'Global Layout', 'white-spektrum' ),
            'panel' => 'theme_content'
        ] );
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

        $manager->add_setting( 'theme_content_global_layout' , [
			'default'           => 'left-sidebar',
			'sanitize_callback' => 'WhiteSpektrum\Customize\Sanitize::layouts',
        ] );
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

		// `%1$s` is replaced with the parent theme URI by the control.
		$args = [
			'choices' => [
				'left-sidebar'  => [
					'url'   => '%1$s/public/images/2cl.png',
					'label' => esc_html__( 'Left Sidebar', 'white-spektrum' ),
				],
				'right-sidebar' => [
					'url'   => '%1$s/public/images/2cr.png',
					'label' => esc_html__( 'Right Sidebar', 'white-spektrum' ),
				],
			],
		];

		$manager->add_control( new RadioImage( $manager, 'theme_content_global_layout', array_merge( $args, [
			'description' => esc_html__( 'General Layout applies to all layouts that supports in this theme.', 'white-spektrum' ),
			'section'  => 'theme_content_global_layout',
			'settings' => 'theme_content_global_layout',
		] ) ) );
	}

	/**
	 * Registers customizer partials.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPartials( WP_Customize_Manager $manager ) {

	}
}