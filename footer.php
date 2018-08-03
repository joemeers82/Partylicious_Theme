<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Misfit_Foodie
 */

?>
<?php 
	$facebookUrl    = esc_attr(get_option('facebookUrl') );
	$pinterestUrl   = esc_attr(get_option('pinterestUrl') );
	$instagramUrl   = esc_attr(get_option('instagramUrl') );
?>
</div></div>
<footer class="footer">
	<div class="container mx-auto d-flex justify-content-between">
		<div class="row w-100">
			<div class="col-3">
				<span>&copy;2018 Partylicious</span>
				<?php 
					wp_nav_menu( array(
						'theme_location'    => 'footer',
						'container'         => 'nav',
						'container_class'   => 'footer_menu',
						'menu_class'        => 'navbar-nav mx-auto',
						'container_id'      => 'footerNav'
					) );
				?>
			</div>
			<div class="col-6 footer-subscription"><?php if ( is_active_sidebar( 'footer_subscribe' ) ) : ?>
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'footer_subscribe' ); ?>
						</div><!-- #footer-subscription form -->
				
				<?php endif; ?>
			</div>
			<div class="col">
				<ul class="list-inline text-right m-0">
					<li class="list-inline-item social-links"><a target="_blank" href="<?php echo $facebookUrl;  ?>"><img alt="Partylicious Facebook" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/facebook-4-32.png"></a></li>
					<li class="list-inline-item social-links"><a target="_blank" href="<?php echo $instagramUrl; ?>"><img alt="Partylicious Instagram" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/instagram-4-32.png"></a></li>
					<li class="list-inline-item social-links"><a target="_blank" href="<?php echo $pinterestUrl; ?>"><img alt="Partylicious Pinterest" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/pinterest-4-32.png"></a></li>
				</ul>
			</div>
		</div>
	</div>
	

	<?php wp_footer(); ?>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.bundle.min.js"></script>



</body>
</html>
