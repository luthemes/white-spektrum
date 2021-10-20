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
	/**
	 * Rather than enqueue the main stylesheet, we are going to enqueue sceen.css since all of the styles will
	 * go here. We only need parse the information for the Theme in style.css so that it can be activated.
	 */
	wp_enqueue_style( 'white-spektrum-screen', get_theme_file_uri( 'public/assets/css/screen.css' ), array(), '1.0.0' );

	/**
	 * This allows users to comment by clicking on reply so that it gets nested.
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );