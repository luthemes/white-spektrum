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

use Backdrop\App;
use Backdrop\Contracts\Bootable;
use function Backdrop\Mix\asset;

use WhiteSpektrum\Tools\Collection;
use WhiteSpektrum\Tools\Mod;
use WhiteSpektrum\Template\Footer;

use WP_Customize_Manager;

class Component implements Bootable {

		/**
		 * Array of `Customizable` components bound to the container.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    array
		 */
		protected $components = [];

		/**
		 * Sets up initial object properties.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  array  $components  Array `Customizable` component names.
		 * @return void
		 */
		public function __construct( array $components = [] ) {

			$this->components = $components;
		}

    /**
     * Adds our customizer-related actions to the appropriate hooks.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function boot(): void {

		// Register panels, sections, settings, controls, and partials.
		array_map( function( $callback ) {
			add_action( 'customize_register', [ $this, $callback ] );
		}, [
			'registerPanels',
			'registerSections',
			'registerSettings',
			'registerControls'
		] );

		// Enqueue scripts and styles.
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'controlsEnqueue'] );
		add_action( 'customize_preview_init',             [ $this, 'previewEnqueue' ] );

		add_action('wp_enqueue_scripts', [$this, 'enqueueCustomizerStyles']);
		add_action('wp_enqueue_scripts', [$this, 'enqueueBackgroundStyles']);
	}

		/**
		 * Callback for registering panels.
		 *
		 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#panels
		 * @since  1.0.0
		 * @access public
		 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
		 * @return void
		 */
    public function registerPanels( WP_Customize_Manager $manager ) {
		$panels = [
				'theme_global'  => esc_html__( 'Theme: Global',  'white-spektrum' ),
				'theme_header'  => esc_html__( 'Theme: Header',  'white-spektrum' ),
				'theme_content' => esc_html__( 'Theme: Content', 'white-spektrum' ),
				'theme_footer'  => esc_html__( 'Theme: Footer',  'white-spektrum' )
		];

		foreach ( $panels as $panel => $label ) {
				$manager->add_panel( $panel, [
						'title'    => $label,
						'priority' => 100
				] );
		}

		foreach ( $this->components as $component ) {

			App::resolve( $component )->registerPanels( $manager );
		}
    }

	/**
	 * Callback for registering sections.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
    public function registerSections( WP_Customize_Manager $manager ) {

		$manager->get_section( 'custom_css' )->panel = 'theme_global';
		$manager->get_section( 'title_tagline' )->panel = 'theme_header';
		$manager->get_section( 'title_tagline' )->title = esc_html__( 'Branding', 'white-spektrum' );
		$manager->get_section( 'static_front_page' )->panel = 'theme_content';

		$manager->add_section( 'theme_global_layout', [
			'panel' => 'theme_global',
			'title' => __( 'Layout', 'white-spektrum' ),
			'priority' => 5
		] );

		$manager->add_section( 'theme_content_feature_image', [
			'panel' => 'theme_content',
			'title' => 'Feature Image',
		] );

		$manager->add_section( 'theme_footer_credit', [
			'title' => esc_html__( 'Credit', 'white-spektrum' ),
			'panel' => 'theme_footer'
		] );


		foreach ( $this->components as $component ) {

			App::resolve( $component )->registerSections( $manager );
		}
    }

	/**
	 * Callback for registering controls.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#controls
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
    public function registerSettings( WP_Customize_Manager $manager ) {

		foreach ( $this->components as $component ) {

			App::resolve( $component )->registerSettings( $manager );
		}
	}

    /**
     * Add our controls for customizer.
     *
     * @since  1.0.0
     * @access public
     * @param  WP_Customize_Manager $manager
     * @return void
     */
    public function registerControls( WP_Customize_Manager $manager ) {

		foreach ( $this->components as $component ) {

			App::resolve( $component )->registerControls( $manager );
		}
	}

/**
	 * Register or enqueue scripts/styles for the controls that are output
	 * in the controls frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function controlsEnqueue() {

		wp_enqueue_style( 'white-spektrum-customize-controls', asset( 'assets/css/customize-controls.css' ), [], null );
		wp_enqueue_script( 'white-spektrum-customize-controls', asset( 'assets/css/customize-controls.js' ), null, true );
	}

	/**
	 * Register or enqueue scripts/styles for the live preview frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function previewEnqueue() {

		// Enqueue preview style.
		wp_enqueue_style( 'white-spektrum-customize-preview', asset( 'assets/css/customize-previews.css' ), [], null );

		// Enqueue preview script.
		wp_enqueue_script( 'white-spektrum-customize-preview', asset( 'assets/js/customize-previews.js' ), [ 'customize-preview' ], null, true );
	}


	public function enqueueCustomizerStyles() {

	}
	
	

	public function enqueueBackgroundStyles() {

	}
}