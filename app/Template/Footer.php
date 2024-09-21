<?php
/**
 * Footer Class.
 *
 * A simple class for outputting the appropriate footer credit text.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

namespace WhiteSpektrum\Template;

use WhiteSpektrum\Tools\Mod;
use WhiteSpektrum\Tools\PoweredBy;

/**
 * Powered by class.
 *
 * @since  1.0.0
 * @access public
 */
class Footer {

	/**
	 * Displays a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public static function displayCredit() {

		echo static::renderCredit(); // phpcs:ignore
	}

	/**
	 * Returns a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public static function renderCredit( array $args = [] ) {

		$args = wp_parse_args( $args, [
			'before' => '<p class="site-footer-credit">',
			'after'  => '</p>'
		] );

		$text = Mod::get( 'theme_footer_powered_by' ) ? PoweredBy::render() : Mod::get( 'theme_footer_custom_credit' );

		return sprintf(
			'%s%s%s',
			$args['before'],
			wp_kses( $text, static::allowedTags() ),
			$args['after']
		);
	}

	/**
	 * Returns an array of allowed tags in footer text.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public static function allowedTags() {

		return [
			'a'       => [ 'href' => true, 'title' => true, 'class' => true ],
			'abbr'    => [ 'title' => true ],
			'acronym' => [ 'title' => true ],
			'bold'    => [ 'class' => true ],
			'code'    => [ 'class' => true ],
			'em'      => [ 'class' => true ],
			'i'       => [ 'class' => true ],
			'span'    => [ 'class' => true ],
			'strong'  => [ 'class' => true ],
			'br'		=> []
		];
	}
}