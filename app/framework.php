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

// `Backdrop\booted()` was added on the framework's `develop` branch. If an older copy of the
// framework is loaded first (for example, one bundled with a plugin), fall back to creating a
// new application.
$theme = function_exists( 'Backdrop\booted' ) && Backdrop\booted()
	? Backdrop\app()
	: new Backdrop\Core\Application();

# ------------------------------------------------------------------------------
# Register default service providers with the application.
# ------------------------------------------------------------------------------
#
# Before booting the application, add any service providers that are necessary
# for running the theme. Service providers are essentially the backbone of the
# bootstrapping process.

$theme->provider( Backdrop\Fonts\Provider::class );
$theme->provider( Backdrop\Mix\Provider::class );

# ------------------------------------------------------------------------------
# Register additional service providers with the application.
# ------------------------------------------------------------------------------
#
# Before booting the application, add any additional service providers that are 
# necessary for running the theme.

$theme->provider( WhiteSpektrum\Provider::class );
$theme->provider( WhiteSpektrum\CleanWP\Provider::class );
// Boots the theme's customize component, which extends the framework's
// `Backdrop\Customize\Component`, so `Backdrop\Customize\Provider` isn't registered as well.
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