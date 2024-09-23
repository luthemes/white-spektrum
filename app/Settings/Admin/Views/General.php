<?php
/**
 * General Settings View.
 *
 * Displays the general theme settings view (tab) on the settings page.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */

namespace WhiteSpektrum\Settings\Admin\Views;

use WhiteSpektrum\Settings\Options;
use function Backdrop\Theme\is_classicpress;

/**
 * General settings view class.
 *
 * @since  1.0.0
 * @access public
 */
class General extends View {

    /**
     * Holds the settings.
     *
     * @var array
     */
    private $settings;

	/**
	 * Returns the view name/ID.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function name() {
		return 'general';
	}

	/**
	 * Returns the internationalized, human-readable view label.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function label() {

		return esc_html__( 'General', 'white-spektrum' );
	}

	/**
	 * Called on the `admin_init` hook and should be used to register theme
	 * settings via the Settings API.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		// Get the current plugin settings w/o the defaults.
		$this->settings = get_option( 'white_spektrum_settings' );

		// Register the setting.
		register_setting( 'white_spektrum_settings', 'white_spektrum_settings', [ $this, 'validateSettings' ] );

		// Register sections and fields.
		add_action( 'white/spektrumsettings/admin/view/general/register', [ $this, 'registerDefaultSections' ] );
		add_action( 'white/spektrumsettings/admin/view/general/register', [ $this, 'registerDefaultFields'   ] );
	}

	/**
	 * Called on the `load-{$page}` hook when the view is booted. Use this
	 * to add any actions or filters needed.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
		do_action( 'white/spektrumsettings/admin/view/general/register' );
	}

	/**
	 * Validates the settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array  $input
	 * @return array
	 */
	function validateSettings( $settings ) { // phpcs:ignore

		// Checkboxes.
		$settings['disable_emoji']    = ! empty( $settings['disable_emoji']    );
		$settings['disable_wp_embed'] = ! empty( $settings['disable_wp_embed'] );

		// Integers.
		$settings['error_page'] = absint( $settings['error_page']           );

		// Return the validated/sanitized settings.
		return $settings;
	}

	/**
	 * Registers default settings sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function registerDefaultSections() {

		$label = is_classicpress() ? __( 'Clean ClassicPress', 'white-spektrum' ) : __( 'Clean WordPress', 'white-spektrum' );

		$sections = [
			'reading' => [
				'label'    => __( 'Reading', 'white-spektrum' ),
				'callback' => 'sectionReading'
			],
			'clean_wp' => [
				'label'    => $label,
				'callback' => 'sectionCleanWP'
			]
		];

		array_map( function( $name, $section ) {

			add_settings_section(
				$name,
				$section['label'],
				[ $this, $section['callback'] ],
				'white_spektrum_settings'
			);

		}, array_keys( $sections ), $sections );
	}

	/**
	 * Registers default settings fields.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function registerDefaultFields() {

		$fields = [

			// Reading fields.
			'error_page' => [
				'label'    => __( '404 Page', 'white-spektrum' ),
				'callback' => 'fieldErrorPage',
				'section'  => 'reading'
			],

			// Clean WP fields.
			'emoji' => [
				'label'    => __( 'Emoji', 'white-spektrum' ),
				'callback' => 'fieldEmoji',
				'section'  => 'clean_wp',
			],
			'embeds' => [
				'label'    => __( 'Embeds', 'white-spektrum' ),
				'callback' => 'fieldEmbeds',
				'section'  => 'clean_wp'
			]
		];

		array_map( function( $name, $field ) {

			add_settings_field(
				$name,
				$field['label'],
				[ $this, $field['callback'] ],
				'white_spektrum_settings',
				$field['section']
			);

		}, array_keys( $fields ), $fields );
	}

	/**
	 * Displays the reading section.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function sectionReading() { ?>
		<p>
			<?php esc_html_e( 'Settings related to reading and display options for your site, including the 404 error page.', 'white-spektrum' ) ?>
		</p>

	<?php }

	/**
	 * Displays the clean WP section.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function sectionCleanWP() { ?>

		<p>
			<?php esc_html_e( 'Clean up unnecessary items on the front end of your site for speed improvements.', 'white-spektrum' ) ?>
		</p>

	<?php }

	/**
	 * Displays the 404 error page field.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function fieldErrorPage() {

		$dropdown = wp_dropdown_pages( [
			'name'              => 'white_spektrum_settings[error_page]',
			'show_option_none'  => '-',
			'option_none_value' => 0,
			'selected'          => Options::get( 'error_page' ),
			'post_status'       => [ 'private' ],
			'echo'              => false
		] ); ?>

		<p>
			<label>
				<?php if ( $dropdown ) : ?>

					<?php echo wp_kses( $dropdown, [
                    'select' => [
                        'name' => true,
                        'id' => true
                    ],
                    'option' => [
                        'value' => true,
                        'selected' => true
                    ]
                ] ); ?>

				<?php else : ?>

					<?php if ( current_user_can( 'publish_pages' ) ) : ?>

						<a href="<?php echo esc_url( add_query_arg( 'post_type', 'page', admin_url( 'post-new.php' ) ) ) ?>"><?php esc_html_e( 'Add New Page', 'white-spektrum' ) ?></a>

					<?php endif ?>

				<?php endif ?>
			</label>
		</p>

		<p class="description">
			<?php esc_html_e( 'Select a page to display when users visit a 404 error on your site. Ensure the page is set to private so it does not appear on the front end.', 'white-spektrum' ) ?>
		</p>

	<?php }

	/**
	 * Displays the emoji field.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function fieldEmoji() { ?>

		<p>
			<label>
				<input type="checkbox" name="white_spektrum_settings[disable_emoji]" value="true" <?php checked( Options::get( 'disable_emoji' ) ) ?> />
				<?php esc_html_e( 'Disable Emoji Scripts', 'white-spektrum' ) ?>
			</label>
		</p>

		<p class="description">
			<?php esc_html_e( 'All modern browsers support emoji natively. Disabling emoji scripts removes the JavaScript loaded on every page of your site for a small percentage of users on outdated browsers.', 'white-spektrum' ) ?>
		</p>

	<?php }

	/**
	 * Displays the embeds field.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function fieldEmbeds() {
		$label = is_classicpress() ? __( 'Disable ClassicPress Embeds', 'white-spektrum' ) : __( 'Disable WordPress Embeds', 'white-spektrum' );
		?>

		<p>
			<label>
				<input type="checkbox" name="white_spektrum_settings[disable_wp_embed]" value="true" <?php checked( Options::get( 'disable_wp_embed' ) ) ?> />
				<?php echo esc_html( $label ); ?>
			</label>
		</p>

		<p class="description">
			<?php esc_html_e( 'Removes the JavaScript that allows other sites to embed your posts.', 'white-spektrum' ) ?>
		</p>

	<?php }

	/**
	 * Renders the settings page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function template() { ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'white_spektrum_settings' ); ?>
			<?php do_settings_sections( 'white_spektrum_settings' ); ?>
			<?php submit_button( esc_attr__( 'Update Settings', 'white-spektrum' ), 'primary' ); ?>
		</form>

	<?php }

	/**
	 * Displays the home posts number field.
	 *
	 * @since      1.0.0
	 * @deprecated 2.1.0
	 * @access     public
	 * @return     void
	 */
	public function fieldHomePostsNumber() {}

	/**
	 * Displays the archive posts number field.
	 *
	 * @since      1.0.0
	 * @deprecated 2.1.0
	 * @access     public
	 * @return     void
	 */
	public function fieldArchivePostsNumber() {}

}