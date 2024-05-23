<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php Backdrop\Theme\Entry\display_title(); ?>
	</header>
    <?php if ( has_post_thumbnail() ) { ?>
        <picture class="post-thumbnail">
            <?php the_post_thumbnail( 'white-spektrum-medium-thumbnails' ); ?>
        </picture>
    <?php } ?>
	<div class="entry-excerpt">
		<?php the_content(); ?>
	</div>
</article>
