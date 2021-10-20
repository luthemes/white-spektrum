<?php
/**
 * White Spektrum ( functions.php )
 *
 * @package   White Spektrum
 * @copyright Copyright (C) 2014-2020. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://benjlu.com )
 */

/**
 * Table of Content
 *
 * 1.0 - Compatibility Check
 * 2.0 - Backdrop Core
 */

/**
 * 1.0 - Compatibility Check
 */
add_action( 'after_switch_theme', function() {
	if ( version_compare( $GLOBALS['wp_version'], '4.9', '<' ) || version_compare( PHP_VERSION, '5.6', '<' ) ) {
		switch_theme( get_option( 'theme_switched' ) );

		add_action( 'admin_notices', function() { ?>
			<div class="error">
				<p>
					<?php if ( version_compare( $GLOBALS['wp_version'], '4.9', '<' ) ) {
						printf( 
							esc_html__( 'White Spektrum requires at least WordPress version %1$s. You are currently running %2$s. Please upgrade and try again.', 'white-spektrum' ),
							'4.9',
							$GLOBALS['wp_version'],
						
						);
					} elseif ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
						printf(
							esc_html__( 'White Spektrum requires at least PHP version %1$s. You are currently running %2$s. Please upgrade and try again.', 'white-spektrum' ),
							'5.6',
							PHP_VERSION,
						);
					} ?>
				</p>
			</div>	
		<?php } );
	}
	return false;
} );

/**
 * 2.0 - Backdrop Core
 */
if ( file_exists( get_parent_theme_file_path( '/vendor/autoload.php' ) ) ) {
	require_once get_parent_theme_file_path( '/vendor/autoload.php' );
}