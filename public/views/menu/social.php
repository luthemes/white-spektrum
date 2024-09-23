<?php
if ( has_nav_menu( $data->location ) ) { ?>
    <nav id="social" class="social-menu">
        <?php
        wp_nav_menu( [
            'theme_location' => $data->location,
            'container'      => '',
            'menu_id'        => 'social-menu',
            'menu_class'     => 'menu-items',
            'depth'          => 1
        ] );
        ?>
    </nav>
<?php }