<?php
/**
 * Initiator ( functions-scripts.php )
 *
 * @package     Initiator
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace WhiteSpektrum;

use function Backdrop\Mix\asset;

/**
 * Enqueue Scripts and Styles
 *
 * @since  1.0.0
 * @access public
 * @return void
 *
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
add_action( 'wp_enqueue_scripts', function() {

	// Rather than enqueue the main style.css stylesheet, we are going to enqueue screen.css.
	wp_enqueue_style( 'white-spektrum-screen', asset( 'assets/css/screen.css' ), null, null );

	// Enqueue theme scripts
	wp_enqueue_script( 'white-spektrum-app', asset( 'assets/js/app.js' ), [ 'jquery' ], null, true );

	// Enqueue Navigation.
	wp_enqueue_script( 'white-spektrum-navigation', asset( 'assets/js/navigation.js' ), null, null, true );
	wp_localize_script( 'white-spektrum-navigation', 'whiteSpektrumScreenReaderText', [
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'white-spektrum' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'white-spektrum' ) . '</span>',
	] );

	// Load WordPress' comment-reply script where appropriate.
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

add_action( 'wp_enqueue_scripts', function() {
	$global_layout = get_theme_mod( 'theme_global_layout', 'full' );

	$images = get_theme_mod( 'theme_content_feature_image', 'white-spektrum-landscape-medium' );
	$custom_css = "
		.layout-wide .site-header .branding-navigation {
			margin: 0 auto;
			max-width: 1170px;
		}
	";

    switch ($images) {
        case 'white-spektrum-landscape-medium':
            $custom_css = "
                .post-thumbnail .size-white-spektrum-landscape-medium {
					border-radius: 0.5rem;
					box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
					display: block;
					margin: 1.125rem auto;
					max-width: 100%;
                }
            ";
            break;
        case 'white-spektrum-landscape-large':
            $custom_css = "
                .post-thumbnail .size-white-spektrum-landscape-large {
					border-radius: 0.5rem;
					box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
					display: block;
					margin: 1.125rem auto;
					max-width: 100%;
                }
            ";
            break;
        default:
            $custom_css = "
                .post-thumbnail .size-white-spektrum-landscape-medium {
					border-radius: 0.5rem;
					box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
					display: block;
					margin: 1.125rem auto;
					max-width: 100%;
                }
            ";
            break;
    }

	wp_add_inline_style( 'white-spektrum-screen', $custom_css );

} );