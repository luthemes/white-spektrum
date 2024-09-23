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
			'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::layouts',
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

		$args = [
			'type'        => 'radio-image',
			'choices'     => [
				'left-sidebar'  => get_theme_file_uri( 'public/images/2cl.png' ),
				'right-sidebar' => get_theme_file_uri( 'public/images/2cr.png' ),
			]
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