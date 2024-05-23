<?php if ( is_active_sidebar( $data->sidebar ) ) { ?>
    <aside id="aside" class="widget-area">
        <?php dynamic_sidebar( $data->sidebar ); ?>
    </aside> 
<?php }