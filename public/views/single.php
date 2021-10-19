<?php
/**
 * Main Template File - index.php
 *
 * @package   White Spektrum
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/white-spektrum
 */
?>
<?php $engine = Benlumia007\Backdrop\App::resolve( 'view/engine' ); ?>
<?php $engine->display( 'header' ); ?>
	<section id="content" class="site-content">
		<div id="global-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
			<main id="main" class="content-area">
			<?php
				while ( have_posts() ) : the_post();
					$engine->display( 'content/single' );
				endwhile;
					the_post_navigation( [
						'next_text' => '<span class="post-next" aria-hidden="true">' . esc_html__( 'Next', 'white-spektrum' ) . '</span><span class="post-title">%title</span>',
						'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Previous', 'white-spektrum' ) . '</span><span class="post-title">%title</span>',
					] );
					comments_template();
			?>
			</main>
			<?php Benlumia007\Backdrop\Theme\Sidebar\display( 'sidebar', [ 'primary' ] ); ?>
		</div>
	</section>
<?php $engine->display( 'footer' ); ?>