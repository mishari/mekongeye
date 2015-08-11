<footer class="global-footer">
	<div class="global-footer__bd">

		<nav class="footer-directional">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="#nameplate">Top of Page</a></li>
			</ul>
		</nav>

		<nav class="footer-utility">
			<ul>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Submit Content</a></li>
				<li><a href="#">For Journalists</a></li>
				<li><a href="#">Terms of Use</a></li>
			</ul>
		</nav>

		<div class="footer-partners">
			<h6>Partner Sites</h6>
			<ul>
				<li><a href="#">Mekong Matters Journalism Network</a></li>
				<li><a href="#">Open Development Mekong</a></li>
				<li><a href="#">Mekong Citizen</a></li>
			</ul>
		</div>

		<div class="footer-social">
			<h6>Follow us on social media</h6>
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-icon.png" alt="twitter"></a>
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon.png" alt="facebook"></a>
		</div>

		<div class="footer-subscribe">
			<h6>Subscribe for email updates</h6>
			<form class="email-signup">
				<label for="email-signup__name" class="hidden-label">Name</label>
				<input type="email" value="" name="EMAIL" class="email" id="email-signup__name" placeholder="name" required="">
				<label for="email-signup__mail" class="hidden-label">Email Address</label>
				<input type="email" value="" name="EMAIL" class="email" id="email-signup__mail" placeholder="email address" required="">
				<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button ss-icon">
			</form>
		</div>

		<div class="footer-sponsors">
			<h6>Project Sponsors</h6>
			<p>
				<a href="http://earthjournalism.net" style="width: 150px;"><img src="<?php echo get_template_directory_uri(); ?>/images/ejn-logo-hi.png" alt="Earth Journalism Network"></a>
			</p>
		</div>

		<div class="footer-contact">
			<p>
				<a href="#">editor@mekongeye.com</a><br>
				Address goes here
			</p>
		</div>

	</div>
</footer>
<?php wp_footer(); ?>

	</div>
    <!-- end container -->

	<!-- local scripts -->
	<script src="/wp-content/themes/mekongeye/assets/javascript/global.js"></script>

</body>
</html>
