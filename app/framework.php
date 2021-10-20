<?php
/**
 * Initiator ( framework.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package     Initiator
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Create a new framework instance
 *
 * This will create an instance of the framework allowing you to initialize the theme.
 */
$white_spektrum = new Benlumia007\Backdrop\Framework();

/**
 * Register default providers
 */
$white_spektrum->provider( Benlumia007\Backdrop\FontAwesome\Provider::class );
$white_spektrum->provider( Benlumia007\Backdrop\GoogleFonts\Provider::class );
$white_spektrum->provider( Benlumia007\Backdrop\Template\Hierarchy\Provider::class );
$white_spektrum->provider( Benlumia007\Backdrop\Template\Manager\Provider::class );
$white_spektrum->provider( Benlumia007\Backdrop\Template\View\Provider::class );

/**
 * Register provider for the theme
 */
$white_spektrum->provider( WhiteSpektrum\Admin\Provider::class );
$white_spektrum->provider( WhiteSpektrum\Customize\Layouts\Provider::class );
$white_spektrum->provider( WhiteSpektrum\Menu\Provider::class );
$white_spektrum->provider( WhiteSpektrum\Sidebar\Provider::class );

/**
 * Boot the Framework
 */
$white_spektrum->boot();