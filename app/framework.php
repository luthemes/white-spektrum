<?php
/**
 * Theme framework file.
 *
 * This file is used to create a new application instance and bind items to the
 * container. This is the heart of the application.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

# ------------------------------------------------------------------------------
# Create a new application.
# ------------------------------------------------------------------------------
#
# Creates the one true instance of the Backdrop application. You may access this 
# instance via the `Backdrop\app()` function or `Backdrop\App` static class after 
# the application has booted.

$theme = Backdrop\booted() ? Backdrop\app() : new Backdrop\Core\Application();

# ------------------------------------------------------------------------------
# Register default service providers with the application.
# ------------------------------------------------------------------------------
#
# Before booting the application, add any service providers that are necessary
# for running the theme. Service providers are essentially the backbone of the
# bootstrapping process.

// $theme->provider( Backdrop\Customize\Provider::class );
$theme->provider( Backdrop\Fonts\Provider::class );
$theme->provider( Backdrop\Languages\Provider::class );
$theme->provider( Backdrop\Mix\Provider::class );
$theme->provider( Backdrop\Template\Hierarchy\Provider::class );
$theme->provider( Backdrop\Template\Manager\Provider::class );
$theme->provider( Backdrop\Theme\Provider::class );
$theme->provider( Backdrop\View\Provider::class );

# ------------------------------------------------------------------------------
# Register additional service providers with the application.
# ------------------------------------------------------------------------------
#
# Before booting the application, add any additional service providers that are 
# necessary for running the theme.

$theme->provider( WhiteSpektrum\Provider::class );
$theme->provider( WhiteSpektrum\CleanWP\Provider::class );
$theme->provider( WhiteSpektrum\Customize\Provider::class );
$theme->provider( WhiteSpektrum\FeatureImage\Provider::class );
$theme->provider( WhiteSpektrum\Settings\Provider::class );

# ------------------------------------------------------------------------------
# Perform bootstrap actions.
# ------------------------------------------------------------------------------
#
# Creates an action hook for child themes (or even plugins) to hook into the
# bootstrapping process and add their own bindings before the app is booted by
# passing the application instance to the action callback.

do_action( 'white/spektrum/bootstrap', $theme );

# ------------------------------------------------------------------------------
# Bootstrap the application.
# ------------------------------------------------------------------------------
#
# Calls the application `boot()` method, which launches the application. Pat
# yourself on the back for a job well done.

$theme->boot();