<?php
/**
 * white-spektrum ( content-single.php )
 *
 * @package   White Spektrum
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php Benlumia007\Backdrop\Theme\Entry\display_title(); ?>
		<div class="entry-metadata">
			<?php Benlumia007\Backdrop\Theme\Entry\display_author(); ?>
			<?php Benlumia007\Backdrop\Theme\Entry\display_date(); ?>
			<?php Benlumia007\Backdrop\Theme\Entry\display_comments_link(); ?>
	</div>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( [
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'white-spektrum' ),
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'white-spektrum' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">,</span> ',
			] );
			?>
	</div>
	<div class="entry-taxonomies">
		<?php Benlumia007\Backdrop\Theme\Entry\display_categories(); ?>
		<?php Benlumia007\Backdrop\Theme\Entry\display_tags(); ?>
	</div>
</article>
