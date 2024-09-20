<?php
/**
 * Powered By Text Class.
 *
 * A simple class for randomly displaying a "powered by..." line of text in the
 * theme footer.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

namespace WhiteSpektrum\Tools;

/**
 * Powered by class.
 *
 * @since  1.0.0
 * @access public
 */
class PoweredBy {

	/**
	 * Returns an array of all the powered by quotes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public static function all() {

		return apply_filters( 'white/spektrum/poweredby/collection', [
			esc_html__( 'Powered by heart and soul.', 'white-spektrum' ),
			esc_html__( 'Powered by crazy ideas and passion.', 'white-spektrum' ),
			esc_html__( 'Powered by the thing that holds all things together in the universe.', 'white-spektrum' ),
			esc_html__( 'Powered by love.', 'white-spektrum' ),
			esc_html__( 'Powered by the vast and endless void.', 'white-spektrum' ),
			esc_html__( 'Powered by the code of a maniac.', 'white-spektrum' ),
			esc_html__( 'Powered by peace and understanding.', 'white-spektrum' ),
			esc_html__( 'Powered by coffee.', 'white-spektrum' ),
			esc_html__( 'Powered by sleepness nights.', 'white-spektrum' ),
			esc_html__( 'Powered by the love of all things.', 'white-spektrum' ),
			esc_html__( 'Powered by something greater than myself.', 'white-spektrum' ),
			esc_html__( 'Powered by whispers from the future.', 'white-spektrum' ),
			esc_html__( 'Powered by the fusion of technology and dreams.', 'white-spektrum' ),
			esc_html__( 'Powered by the strength found in kindness.', 'white-spektrum' ),
			esc_html__( 'Powered by the melodies of the unseen world.', 'white-spektrum' ),
			esc_html__( 'Powered by the courage of the unheard voices.', 'white-spektrum' ),
			esc_html__( 'Powered by the beauty of the human spirit.', 'white-spektrum' ),
			esc_html__( 'Powered by the quest for eternal wisdom.', 'white-spektrum' ),
			esc_html__( 'Powered by the energy of uncharted galaxies.', 'white-spektrum' ),
			esc_html__( 'Powered by the magic hidden in plain sight.', 'white-spektrum' ),
			esc_html__( 'Powered by the legacy of the ancients.', 'white-spektrum' ),
			esc_html__( 'Powered by the dance between light and darkness.', 'white-spektrum' ),
			esc_html__( 'Powered by the touch of the morning sun.', 'white-spektrum' ),
			esc_html__( 'Powered by the secrets of the deep ocean.', 'white-spektrum' ),
			esc_html__( 'Powered by the echoes of laughter and joy.', 'white-spektrum' ),
			esc_html__( 'Powered by the relentless pursuit of truth.', 'white-spektrum' ),
		] );
	}

	/**
	 * Displays a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public static function display() {

		echo esc_html( static::render() );
	}

	/**
	 * Returns a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public static function render() {

		$collection = static::all();

		return $collection[ array_rand( $collection, 1 ) ];
	}
}