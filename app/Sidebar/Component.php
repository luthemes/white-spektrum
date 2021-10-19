<?php
/**
 * Backdrop Core ( app/Sidebar/Component.php )
 *
 * @package   Backdrop Core
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */


namespace WhiteSpektrum\Sidebar;
use Benlumia007\Backdrop\Theme\Sidebar\Component as SidebarContract;

class Component extends SidebarContract {
    public function sidebars() {
        return [
            'primary' => [
                'name' => esc_html__( 'Primary Sidebar', 'white-spektrum' ),
                'desc' => esc_html__( 'test', 'white-spektrum' ),
            ],
            'secondary' => [
                'name' => esc_html__( 'Secondary Sidebar', 'white-spektrum' ),
                'desc' => esc_html__( 'test', 'white-spektrum' ),
            ]
        ];
    }
}   