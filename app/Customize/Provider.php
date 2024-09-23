<?php
/**
 * Backdrop Core ( src/Tools/ServiceProvider.php )
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

/**
 * Define namespace
 */
namespace WhiteSpektrum\Customize;

use WhiteSpektrum\Customize\Layout;
use Backdrop\Core\ServiceProvider;
use ReflectionException;

class Provider extends ServiceProvider {

    /**
     * Registration callback that adds a single instance of the customize
     * object to the container.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function register(): void {

        $this->app->singleton( Component::class, function() {

			return new Component( [
                FeatureImage\Customize::class,
                Footer\Customize::class,
                Header\Customize::class,
                Layout\Customize::class
			] );
		} );
    }

    /**
     * Boots the customize component by firing its hooks in the `boot()` method.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function boot(): void {

        $this->app->resolve( Component::class )->boot();
    }
}