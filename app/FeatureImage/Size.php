<?php

namespace WhiteSpektrum\FeatureImage;
use JsonSerializable;

class Size implements JsonSerializable {

	/**
	 * Image size name.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected $name;

	/**
	 * Image size label.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected $label;

	/**
	 * Image size width.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    int
	 */
	protected $width = 150;

	/**
	 * Image size height.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected $height = 150;

	/**
	 * Whether to crop the image to exact width and height.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    bool
	 */
	protected $crop = true;

    protected $is_featured_size = true;

	/**
	 * Set up the object properties.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $name
	 * @param  array   $options
	 * @return void
	 */
	public function __construct( $name, array $options ) {

		foreach ( array_keys( get_object_vars( $this ) ) as $key ) {
			if ( isset( $options[ $key ] ) ) {
				$this->$key = $options[ $key ];
			}
		}

		$this->name = $name;
	}

	/**
	 * Returns the image sizes in a format necessary for JSON serialization.
	 *
	 * @since  2.1.0
	 * @access public
	 * @return array
	 */
	#[\ReturnTypeWillChange]
	public function jsonSerialize() {

		return [
			'name'        => $this->name(),
			'label'       => $this->label(),
			'width'       => $this->width(),
			'height'      => $this->height(),
			'orientation' => $this->orientation()
		];
	}

	/**
	 * Returns the image size name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function name() {
		return $this->name;
	}

	/**
	 * Returns the image size label.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function label() {

		return apply_filters(
			"white/spektrum/image/size/{$this->name}/label",
			$this->label ?: $this->name(),
			$this
		);
	}

	/**
	 * Returns the image size width.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return int
	 */
	public function width() {
		return absint( $this->width );
	}

	/**
	 * Returns the image size height.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return int
	 */
	public function height() {
		return absint( $this->height );
	}

	/**
	 * Returns the image size orientation. Can be one of square, landscape,
	 * or portrait.
	 *
	 * @since  2.1.0
	 * @access public
	 * @return string
	 */
	public function orientation() {

		$orientation = 'square';

		if ( $this->width() > $this->height() ) {
			$orientation = 'landscape';
		} elseif ( $this->width() < $this->height() ) {
			$orientation = 'portrait';
		}

		return $orientation;
	}

	/**
	 * Returns whether to hard-crop the image.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return bool
	 */
	public function crop() {
		return (bool) $this->crop;
	}

	public function isFeaturedSize() {
		return (bool) $this->is_featured_size;
	}
}