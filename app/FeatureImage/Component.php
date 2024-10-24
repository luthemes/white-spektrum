<?php
/**
 * Image Size Component.
 *
 * Manages the image size component.
 *
 * @package   Exhale
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2019 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://themehybrid.com/themes/exhale
 */

namespace WhiteSpektrum\FeatureImage;

use WP_Customize_Manager;

use Backdrop\App;
use Backdrop\Contracts\Bootable;
use WhiteSpektrum\Tools\Config;
use WhiteSpektrum\Tools\Mod;

/**
 * Image size component class.
 *
 * @since  1.0.0
 * @access public
 */
class Component implements Bootable {

	/**
	 * Houses the `Sizes` collection.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    Sizes
	 */
	protected $sizes;

	/**
	 * Creates the component object.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  Sizes  $sizes
	 * @return void
	 */
	public function __construct( Sizes $sizes ) {
        
		$this->sizes = $sizes;
	}

	/**
	 * Bootstraps the component.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {

		// Run registration on the `init` hook.
		add_action( 'init', [ $this, 'register' ], 5 );

		// Register default sizes.
		add_action( 'white/spektrum/image/size/register', [ $this, 'registerDefaultSizes' ] );

		// Filter the image size names in the editor.
		// add_filter( 'image_size_names_choose', [ $this, 'imageSizeNamesChoose' ] );
	}

	/**
	 * Runs the register action and adds image sizes to WordPress.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		// Hook for registering custom image sizes.
		do_action( 'white/spektrum/image/size/register', $this->sizes );

		// Registers image sizes with WordPress.  Note that the
		// `post-thumbnail` size should be properly register with the
		// `set_post_thumbnail_size()` function.
		foreach ( $this->sizes->all() as $size ) {

			if ( 'post-thumbnail' === $size->name() ) {
				set_post_thumbnail_size( $size->width(), $size->height(), $size->crop() );
			} else {
				add_image_size( $size->name(), $size->width(), $size->height(), $size->crop() );
			}
		}
	}

	/**
	 * Registers the theme's default image sizes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  Sizes  $sizes
	 * @return void
	 */
	public function registerDefaultSizes( Sizes $sizes ) {

		foreach ( Config::get( 'image-sizes' ) as $name => $options ) {
			
			$sizes->add( $name, $options );
		}
	}
}