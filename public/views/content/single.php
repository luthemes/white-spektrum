<section id="content" class="site-content m-18">
	<div id="global-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
		<main id="main" class="content-area">
			<?php while( have_posts() ) : the_post(); ?>
				<?php Backdrop\View\display( 'entry/single' ); ?>
			<?php endwhile; ?>
			<?php comments_template(); ?>
		</main>
		<?php Backdrop\View\display( 'sidebar', 'primary', [ 'sidebar' => 'primary' ] ); ?>
	</div>
</section>