<?php if ( is_active_sidebar( $data->sidebar ) ) { ?>
    <aside id="aside" class="widget-area">
        <?php dynamic_sidebar( $data->sidebar ); ?>
    </aside> 
<?php } else {
    // Sidebar is not active or has no widgets, display categories instead
    ?>
    <aside id="aside" class="widget-area">
        <h2 class="widget-title">Categories</h2>
        <ul>
            <?php 
            // List categories. You can customize it by passing arguments to wp_list_categories()
            // For example, 'title_li=' will remove the 'Categories' title that is added by default
            wp_list_categories('title_li='); 
            ?>
        </ul>
    </aside>
<?php } ?>
