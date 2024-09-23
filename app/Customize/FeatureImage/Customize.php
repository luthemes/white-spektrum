<?php
/**
 * Customize component.
 *
 * Integrates the theme's Feature Image into the customizer.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

namespace WhiteSpektrum\Customize\FeatureImage;
use WhiteSpektrum\Customize\Customizable;
use WP_Customize_Manager;
use WhiteSpektrum\Tools\Collection;
use WhiteSpektrum\Tools\Config;
use WhiteSpektrum\Tools\Mod;
use WhiteSpektrum\FeatureImage\Sizes;

class Customize extends Customizable {

	/**
	 * Registers customizer sections.
	 *
	 * @since  2.1.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {

	}

	/**
	 * Registers customizer settings.
	 *
	 * @since  2.1.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSettings( WP_Customize_Manager $manager ) {

        // Add a setting for the feature image size.
        $manager->add_setting( 'theme_content_feature_image', array(
        'default'   => Mod::fallback( 'featured_image_size' ),
        ) );
	}

	/**
	 * Registers customizer controls.
	 *
	 * @since  2.1.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {

        $choices = [ '' => '' ];

        foreach ( Config::get( 'image-sizes' ) as $name => $size ) {
            $choices[ $name ] = $size['label'];
        }

        // Add a control for the feature image size.
        $manager->add_control( 'theme_content_feature_image', array(
            'label'    => __( 'Feature Image Size', 'white-spektrum' ),
            'section'  => 'theme_content_feature_image',
            'settings' => 'theme_content_feature_image',
            'type'     => 'select',
            'choices'  => $choices,
        ) );
	}

	/**
	 * Registers customizer partials.
	 *
	 * @since  2.1.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPartials( WP_Customize_Manager $manager ) {

	}

	/**
	* Registers JSON for the customize controls script via `wp_localize_script()`.
	*
	* @since  2.1.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function controlsJson( Collection $json ) {

	}

	/**
	* Registers JSON for the customize preview script via `wp_localize_script()`.
	*
	* @since  2.1.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function previewJson( Collection $json ) {

	}
}