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

namespace WhiteSpektrum;

use function Backdrop\Fonts\enqueue;
use WhiteSpektrum\Template\ErrorPage;
use WhiteSpektrum\Tools\Config;
use WhiteSpektrum\Tools\Svg;

add_filter( 'body_class', function( $classes ) {

	$global_layout = get_theme_mod( 'theme_global_layout_options', 'full' );


	if ( $global_layout == 'full' ) {
		$classes[] = 'layout-full';
	} elseif ( $global_layout == 'wide' ) {
		$classes[] = 'layout-wide';
	}

	return $classes;
} );

/**
 * Adds error data for the 404 content template. Passes in the `ErrorPage` object
 * as the `$error` variable.
 *
 * @since  1.0.0
 * @access public
 * @param  Backdrop\Tools\Collection  $data
 * @return Backdrop\Tools\Collection
 */
add_filter( 'backdrop/view/content/data', function( $data ) {

	if ( is_404() ) {
		$data->add( 'error', new ErrorPage() );
	}

	return $data;

} );

/**
 * Filters the excerpt more link.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
add_filter( 'excerpt_more', function() {

	return sprintf(
		'&thinsp;&hellip;&thinsp;<a href="%s" class="entry-more-link">%s</a>',
		esc_url( get_permalink() ),
		sprintf(
			// Translators: %s is the post title for screen readers.
			esc_html__( 'Continue reading&nbsp;%s&nbsp;&rarr;', 'white-spektrum' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		)
	);
} );

add_filter( 'walker_nav_menu_start_el', function( $item_output, $item, $depth, $args ) {

	if ( 'social' === $args->theme_location ) {

		foreach ( Config::get( 'social-icons' ) as $url => $icon ) {

			if ( false !== strpos( $item->url, $url ) ) {
				$item_output = str_replace(
					$args->link_before,
					Svg::render( $icon ) . $args->link_before,
					$item_output
				);
			}
		}
	}

	return $item_output;

}, 10, 4 );


