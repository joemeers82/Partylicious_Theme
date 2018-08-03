<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Misfit_Foodie
 */

get_header(); ?>

	<div id="primary" class="container content-area">
		<div class="row">
			<main id="main" class="col-md-8 site-main">
			
				<?php
				while ( have_posts() ) : the_post();
			
					get_template_part( 'template-parts/content', 'page' );
			
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
			
				endwhile; // End of the loop.
				?>
			
			</main><!-- #main -->
			<!-- RIGHT SIDEBAR-->
			<?php get_template_part('template-parts/content','right_sidebar')?>
		</div> <!-- end of row -->
	</div><!-- #primary -->

<?php

get_footer();
