<?php
/**
 * CleanWP service provider.
 *
 * Bootstraps the Clean WP component.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

namespace WhiteSpektrum\CleanWP;

use Backdrop\Core\ServiceProvider;

/**
 * CleanWP service provider class.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {

	/**
	 * Binds query component to the container.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register(): void {
		$this->app->singleton( Component::class );
	}

	/**
	 * Bootstrap the query component.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {
		$this->app->resolve( Component::class )->boot();
	}
}