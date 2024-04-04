<?php
/**
 * The template for displaying the footer
 * *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter-theme
 */
?>

	<footer class="footer" data-aos="fade-in" id="footer">
		<div class="container">
			<div class="footer__info">
				<?php $footer_logo = get_field( 'footer_logo', 'option' ); ?>
				<?php if ( $footer_logo ) { ?>
					<a href="/" class="footer__logo">
						<img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" width="185" height="100"/>
					</a>
				<?php } ?>

				<div class="footer__info-location">
					<?php the_field( 'footer_location', 'option' ); ?>
				</div>
			</div>
			<div class="footer__nav">

				<?php wp_nav_menu(
					array(
						'items_wrap' => '<ul class="%2$s"><li ><p class="footer__nav-title">Links</p></li>%3$s</ul>',
						'theme_location' => 'footer-links',
						'container'      => 'ul',
						'menu_class'     => 'unstyle-list footer__nav-list',
					)
				); ?>

				<?php if ( have_rows( 'social_links', 'option' ) ) : ?>
					<ul class="unstyle-list footer__nav-list">
						<li><p class="footer__nav-title">Social</p></li>

						<?php while ( have_rows( 'social_links', 'option' ) ) : the_row(); ?>
							<?php $social_link = get_sub_field( 'social_link' ); ?>
							<?php if ( $social_link ) { ?>
								<li><a href="<?php echo $social_link['url']; ?>" target="<?php echo $social_link['target']; ?>"><?php echo $social_link['title']; ?></a></li>
							<?php } ?>
						<?php endwhile; ?>

					</ul>
				<?php endif; ?>

				<?php if ( have_rows( 'footer_partner_logo', 'option' ) ) : ?>
					<ul class="unstyle-list footer__nav-logo">
						<?php while ( have_rows( 'footer_partner_logo', 'option' ) ) : the_row(); ?>

							<?php $partner_logo = get_sub_field( 'partner_logo' ); ?>
							<?php if ( $partner_logo ) { ?>
								<li><a href="<?php the_sub_field( 'partner_link' ); ?>" target="_blank"><img src="<?php echo $partner_logo['url']; ?>" alt="<?php echo $partner_logo['alt']; ?>" width="207" height="83"/></a></li>		
							<?php } ?>

						<?php endwhile; ?>
					</ul>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>
			</div>
			<div class="footer__copyright border-top-04">
				<div class="footer__logos-group"><img class="footer__logos-group--i4see" src="<?php echo get_template_directory_uri() ?>/img/i4see-logo.png" alt="i4see" width="110" height="60"/><span>is now part of</span><a class="footer__logos-group--sky" target="_blank" rel="nofollow" href="http://www.skyspecs.com/"><img src="<?php echo get_template_directory_uri() ?>/img/skyspecslogo.png" alt="skyspecs" width="180" height="60"></a></div>
				<p>Copyright i4SEE 2023</p>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Linkedin insight tag -->
<script type="text/javascript"> _linkedin_partner_id = "3711444"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(l) { if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])}; window.lintrk.q=[]} var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(window.lintrk); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3711444&fmt=gif" /> </noscript>

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/25466926.js"></script>
<!-- End of HubSpot Embed Code -->

</body>
</html>