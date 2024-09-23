<?php
/**
 * The footer for the theme.
 * 
 * This is the template that displays the footer of the theme which includes
 * Copyright information, social navigation and others that falls into this
 * category.
 *
 * @package   White Spektrum
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/white-spektrum
 */
?>
	<footer id="colophon" class="site-footer">
		<div class="social-navigation">
			<?php Backdrop\View\display( 'menu', 'social', [ 'location' => 'social' ] ); ?>
		</div>
		<div class="site-info">
			<?php WhiteSpektrum\Template\Footer::displayCredit(); ?>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>