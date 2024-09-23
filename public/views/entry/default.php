<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php Backdrop\Theme\Entry\display_title(); ?>
		<div class="entry-metadata">
			<?php Backdrop\Theme\Entry\display_author(); ?>
			<?php Backdrop\Theme\Entry\display_date( [ 'before' => WhiteSpektrum\sep() ] ); ?>
			<?php Backdrop\Theme\Entry\display_comments_link( [ 'before' => WhiteSpektrum\sep() ] ); ?>
		</div>
	</header>
	<?php if ( has_post_thumbnail() ) { ?>
		<picture class="post-thumbnail">
			<?php
				$size = get_theme_mod( 'theme_content_feature_image', 'white-spektrum-landscape-medium' ) ? get_theme_mod( 'theme_content_feature_image' ) : Mod::fallback( 'featured_image_size' );
				the_post_thumbnail( $size );
			?>
		</picture>
	<?php } ?>
	<div class="entry-excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>
