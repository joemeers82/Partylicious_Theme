<?php
/*
	Template Name: Right Sidebar
*/
?>

 <!-- RIGHT CONTAINER
================================================== -->
<div class="col-md-4 right-container">
	<?php 
		if( is_single() ){
		?>
		<section class="about-me-sidebar">
			<?php if ( is_active_sidebar( 'post_about_me' ) ) : ?>
				<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
					<?php dynamic_sidebar( 'post_about_me' ); ?>
				</div><!-- #primary-sidebar -->
			<?php endif; ?>
		</section> 
	<?php } ?>

	<!-- SIGN UP CONTAINER
	================================================== -->
	<!-- Widget Area for Sidebar Subscription -->
	<?php dynamic_sidebar( 'sidebar_subscription' ); ?>

	<section class="sign-up">
		<?php if ( is_active_sidebar( 'subscribe_sidebar' ) ) : ?>
			<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'subscribe_sidebar' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</section> 
	
	<!-- End Sign Up Container -->
	
	<!-- POPULAR RECIPES
	================================================== -->
	<!-- Widget Area for Popular Recipes -->
	


	<section class="popular-recipes">
		<?php if ( is_active_sidebar( 'popular_recipes_sidebar' ) ) : ?>
			<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'popular_recipes_sidebar' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</section> <!-- End Popular Recipes -->

</div> <!-- End Right Container -->