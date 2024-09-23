<?php
/**
 * Settings Provider.
 *
 * Bootstraps the settings component.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

namespace WhiteSpektrum\Settings;

use Backdrop\Core\ServiceProvider;
use WhiteSpektrum\Settings\Admin\OptionsPage;
use WhiteSpektrum\Settings\Admin\Views\Views;

/**
 * Settings provider class.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {

	/**
	 * Binds settings component to the container.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register(): void {

		$this->app->singleton( Views::class );

		$this->app->singleton( OptionsPage::class, function() {

			return new OptionsPage(
				'white-spektrum-settings',
				$this->app->resolve( Views::class ),
				[
					'label'      => __( 'Settings', 'white-spektrum' ),
					'capability' => 'edit_theme_options'
				]
			);
		} );
	}

	/**
	 * Bootstrap the settings component.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {

		if ( is_admin() ) {
			$this->app->resolve( OptionsPage::class )->boot();
		}
	}
}