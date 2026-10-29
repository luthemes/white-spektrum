<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
			<?php printf( '<span class="sticky-post">%1$s</span>', esc_html__( 'Featured', 'white-spektrum' ) ); ?>
		<?php } ?>
		<?php Backdrop\Post\display_title( [ 'class' => 'entry-title' ] ); ?>
		<div class="entry-metadata">
			<?php Backdrop\Post\display_author( [ 'class' => 'entry-author' ] ); ?>
			<?php Backdrop\Post\display_date( [ 'class' => 'entry-published', 'before' => WhiteSpektrum\sep() ] ); ?>
			<?php Backdrop\Post\display_comments_link( [ 'class' => 'entry-comments', 'before' => WhiteSpektrum\sep() ] ); ?>
		</div>
	</header>
	<?php if ( has_post_thumbnail() ) { ?>
		<picture class="post-thumbnail">
			<?php
				$size = get_theme_mod( 'theme_content_feature_image' ) ?: WhiteSpektrum\Tools\Mod::fallback( 'featured_image_size' );
				the_post_thumbnail( $size );
			?>
		</picture>
	<?php } ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div>
</article>
