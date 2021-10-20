<?php

namespace WhiteSpektrum\Menu;
use Benlumia007\Backdrop\Theme\Menu\Component as MenuContract;

class Component extends MenuContract {
    public function menus() {
        return [
            'primary'   => esc_html__( 'Primary Navigation', 'white-spektrum' ),
            'secondary' => esc_html__( 'Secondary Sidebar', 'white-spektrum' ),
            'social'    => esc_html__( 'Social Navigation', 'white-spektrum' )
        ];
    }

	public function enqueue() {
		wp_enqueue_script( 'white-spektrum-navigation', get_theme_file_uri( 'public/assets/js/app.js' ), array('jquery'), '1.0.0', true );
		wp_localize_script( 'white-spektrum-navigation', 'whiteSpektrumScreenReaderText', array(
			'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'white-spektrum' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'white-spektrum' ) . '</span>',
		) );
	}
}   