<?php
/**
 * Default extras template
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

use function Backdrop\Fonts\enqueue;

/**
 * Changes the theme template path to the `public/views` folder.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
add_filter( 'backdrop/template/path', function() {

	return 'public/views';
} );

/**
 * Registers custom templates with WordPress.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $templates
 * @return void
 */
add_action( 'backdrop/templates/register', function( $templates ) {
	$templates->add(
		'template-home.php', [
			'label' => esc_html__( 'Home', 'white-spektrum' ),
			'post_types' => [ 'page' ]
		]
	);
	$templates->add(
		'template-left-sidebar.php', [
			'label' => esc_html__( 'Left Sidebar', 'white-spektrum' ),
			'post_types' => [ 'page' ]
		]
	);

	$templates->add(
		'template-right-sidebar.php', [
			'label' => esc_html__( 'Right Sidebar', 'white-spektrum' ),
			'post_types' => [ 'page' ]
		]
	);
} );

/**
 * Registers custom fonts.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $file
 * @return void
 */
add_action( 'wp_enqueue_scripts', function( $file ) {

	array_map( function( $file ) {
		enqueue( $file );
	}, [
		'fira-sans',
		'merriweather',
		'tangerine'
	] );
} );