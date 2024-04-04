<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter-theme
 */
get_header();
?>

	<div class="container single">
		<?php the_content(); ?>
	</div>

<?php
get_footer();