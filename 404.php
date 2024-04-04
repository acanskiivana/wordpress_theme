<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package starter-theme
 */

get_header();
?>

<section class="page-404">
	<div class="container">
		<div class="page-404__img">
			<img data-skip-lazy="" src="<?php echo get_template_directory_uri(); ?>/img/404illustration.png" alt="i4see 404">
		</div>

		<p>Page not found</p>
	</div>
</section>
<?php
get_footer();
