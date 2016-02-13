<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rt-restaurants
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer col span_12_of_12" role="contentinfo">
		<div class="contact-info col span_12_of_12">
			
			<div class="footer-menu col span_3_of_12">
				<p class="contact-info-title">
					LUXURY RESTAURANTS
				</p>
				<div>
					<?php clean_custom_menus(); ?>
				</div>
			</div>
			<div class="contact-us col span_4_of_12">
				<p class="contact-info-title">
					CONTACT US
				</p>
				<div class="contact-details col span_9_of_12">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tortor dui, tempor nec elit sed, luctus vulputate nulla. Proin scelerisque dolor et purus hendrerit tristique.
					</p>
				</div>
				<div>
					<div class="contact-number col span_9_of_12">
						<i class="fa fa-phone-square fa-lg"></i>
						<a href="tel://+91 12 34 123456">+91 12 34 123456</a>
					</div>
				</div>
				<div>
					<div class="contact-email col span_9_of_12">
						<i class="fa fa-envelope fa-lg"></i>
						<span>contact@luxuryrestaurants.com</span>
					</div>
				</div>
				<div>
					<div class="contact-address col span_10_of_12">
						<i class="fa fa-map-marker fa-lg"></i>
						12, stomach full,
						Khau gali,India.
					</div>
				</div>
			</div>
			<div class="follow-newletter col span_4_of_12">
				<div class="follow">
					<p class="contact-info-title">
						FOLLOW
					</p>
					<div class="follow-icons">
						<i class="fa fa-facebook-square fa-lg"></i>
						<i class="fa fa-twitter-square fa-lg"></i>
						<i class="fa fa-google-plus-square fa-lg"></i>
						<i class="fa fa-flickr fa-lg"></i>
						<i class="fa fa-pinterest-square fa-lg"></i>
						<i class="fa fa-rss-square fa-lg"></i>
					</div>
				</div>
				
				<div class="newsletter">
					<p class="contact-info-title">
						NEWSLETTER
					</p>
					<p class="">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</p>
					<div class="email-form">
						<form>
							<input type="email" placeholder="Your email address.">
							<div class="fa fa-envelope fa-2x"></div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
		<div class="site-info col span_12_of_12">
			<h1 class="site-title-footer col span_3_of_12"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Luxury Restaurants</a></h1>
			<div class="copyright-info col span_5_of_12">
				<span>Designed by <a class="rtCamp-link" href="https://rtcamp.com/">rtCamp</a>. All rights Reserved. Copyright © 2016.</span> 
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
