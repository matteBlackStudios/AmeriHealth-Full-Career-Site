<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
<div id="footer-container">
	<footer id="footer">
		<div class="row align-middle">
			<div class="small-12 medium-3 large-2 columns">
				<div class="social">
					<p>GET CONNECTED</p>
					<a href="https://www.facebook.com/AmeriHealthCaritas"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
					<a href="https://www.facebook.com/AmeriHealthCaritas"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
					<a href="https://www.facebook.com/AmeriHealthCaritas"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
					<a href="https://www.facebook.com/AmeriHealthCaritas"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="small-12 medium-6 large-4 large-offset-2 columns text-center">
				<p class="show-for-medium">Suspendisse viverra dictum libero at viverra?</p>
				<a class="button">CONTACT US NOW <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			</div>
			<div class="small-12 medium-3 large-2 large-offset-2 columns show-for-medium">
				<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/amerihealth-careers/assets/images/global/footer-logo.png" alt="AmeriHealth Caritas Logo">
			</div>
		</div>
	</footer>
	<div id="post-footer">
		<div class="row text-center">
			<div class="small-12 columns">
				<p>Copyright © 2001-2017 AMERIHEALTH CARITAS. All rights reserved. Privacy Policy and Terms of Use.</p>
			</div>
		</div>
	</div>
</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3005/browser-sync/browser-sync-client.js?v=2.18.7'><\/script>".replace("HOST", location.hostname));
//]]></script>
<script>
	$('#slider-container').slick({
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  prevArrow: $('#slider-prev'),
	  nextArrow: $('#slider-next'),
	});
</script>
<script type="text/javascript" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/amerihealth-careers/assets/javascript/jquery.history.js"></script>

</body>
</html>
