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
			
				endwhile; // End of the loop.
				?>
			
			
			
			<!-- Timeline -->
			<div class="col-12 mx-auto text-center timeline_container">
				<?php 
					$profilePicture  = esc_attr(get_option('author-image') ); 
					$siteLogo        = esc_attr( get_option('site-header-logo') );
				?>
				<div class="p-1 w-75 mx-auto timeline_header"><h5>PARTY&nbsp; + &nbsp;DELICIOUS</h5></div>
				
					<div class="row">
						<div class="col-12 text-center ">
							<img class="w-50" src="<?php echo $siteLogo; ?>"/>
							<br>
							<img class="timeline_profile" src="<?php echo $profilePicture; ?>"/>
						</div>
						<div class="col-12">
							<!-- New Date -->
							<div class="row  timeline_row">
								<div class="timeline_date d-flex col align-items-center p-0">
									<div class="p-2 w-100 text-right">
									<span class="smallest" >1980's</span >
									</div>
								</div>
								<div class="p-0 d-flex text-center">
									<div class="mx-auto timeline"></div>
								</div>
								<div class="timeline_description col p-0 align-items-center d-flex ">
									<div class="timeline_marker"></div>
									<div class="p-2 w-75 timeline_description_text text-left">
										Partylicious Established
									</div>
								</div>
							</div>

							<!-- New Date -->
							<div class="row  timeline_row">
								<div class="timeline_description col p-0 align-items-center d-flex ">
									<div class="p-2 w-100 timeline_description_text text-right">
										<a target="_blank" href=" https://youtu.be/IyYnnUcgeMc">Inspiration Strikes</a>
									</div>
									<div class="timeline_marker"></div>
								</div>
								<div class="p-0 d-flex text-center">
									<div class="mx-auto timeline"></div>
								</div>
								<div class="timeline_date d-flex col align-items-center p-0">
									<div class="p-2">
									<span class="small" >2001</span >
									</div>
								</div>
							</div>
							
							<!-- New Date -->
							<div class="row  timeline_row">
								<div class="timeline_date d-flex col align-items-center p-0">
									<div class="p-2 w-100 text-right">
									<span class="medium" >2006</span >
									</div>
								</div>
								<div class="p-0 d-flex text-center">
									<div class="mx-auto timeline"></div>
								</div>
								<div class="timeline_description col p-0 align-items-center d-flex ">
									<div class="timeline_marker"></div>
									<div class="p-2 w-75 timeline_description_text text-left">
										 <a target="_blank" href="https://www.youtube.com/watch?v=5T0utQ-XWGY&feature=youtu.be">Inspiration Strikes Again </a>
									</div>
								</div>
							</div>
							
							<!-- New Date -->
							<div class="row  timeline_row">
								<div class="timeline_description col p-0 align-items-center d-flex ">
									<div class="p-2 w-100 timeline_description_text text-right">
										<a target="_blank" href="https://partylicious.net/wp-content/uploads/2018/03/IMG_4308.jpg">First attempt at a decorated cake </a>-  a Daisy Cake with Marshmallow Fondant for an Easter Party.  <a target="_blank" href="https://www.pinterest.com/pin/177399672791805879/">This</a> is how it’s supposed to look (nailed it). 
									</div>
									<div class="timeline_marker"></div>
								</div>
								<div class="p-0 d-flex text-center">
									<div class="mx-auto timeline"></div>
								</div>
								<div class="timeline_date d-flex col align-items-center p-0">
									<div class="p-2">
									<span  class="medium_large">2009</span >
									</div>
								</div>
							</div>	

								<!-- New Date -->
							<div class="row  timeline_row">
								<div class="timeline_date d-flex col align-items-center p-0">
									<div class="p-2 w-100 text-right">
									<span class="large" >2012</span >
									</div>
								</div>
								<div class="p-0 d-flex text-center">
									<div class="mx-auto timeline"></div>
								</div>
								<div class="timeline_description col p-0 align-items-center d-flex ">
									<div class="timeline_marker"></div>
									<div class="p-2 w-75 timeline_description_text text-left">
										<a target="_blank" href="https://partylicious.net/wp-content/uploads/2018/03/479874_10100445266254895_1068648939_n.jpg">First attempt at Macarons</a>, also for an Easter Party.  They look great but were unfortunately hallow. People still ate them and my mac game has greatly improved since then. 
									</div>
								</div>
							</div>
							
							<!-- New Date -->
							<div class="row  timeline_row">
								<div class="timeline_description col p-0 align-items-center d-flex ">
									<div class="p-2 w-100 timeline_description_text text-right">
										 First attempt at using a DSLR camera. It took me almost a day to figure out how to focus, which still causes me trouble. 
									</div>
									<div class="timeline_marker"></div>
								</div>
								<div class="p-0 d-flex text-center">
									<div class="mx-auto timeline"></div>
								</div>
								<div class="timeline_date d-flex col align-items-center p-0">
									<div class="p-2">
									<span class="large" >2016</span >
									</div>
								</div>
							</div>							
							
								<!-- New Date -->
							<div class="row  timeline_row">
								<div class="timeline_date d-flex col align-items-end p-0">
									<div class="pr-2 w-100 text-right">
									<span class="largest" >2018</span >
									</div>
								</div>
								<div class="p-0 d-flex text-center">
									<div class="mx-auto last-timeline"></div>
								</div>
								<div class="timeline_description col p-0 align-items-end d-flex ">
									
									<div class="p-2 w-75 timeline_description_text text-left">
										Partylicious Blog
									</div>
								</div>
							</div>

						</div>
				</div>
				
				<div class="mt-5 mb-3 pt-3 text-left">
					<p>
						In case you can’t tell from my timeline, I have no formal culinary or photography training. This is all in good fun. So, grab a glass of wine and read on my friends.
					</p>
						<span class="signature">xoxo </span><i><span class="signature">Sophia Assunta</span></i>
					
				</div>

			<?php	// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; 
			?>
			<!-- End Timeline -->
			</main><!-- #main -->
			<!-- RIGHT SIDEBAR-->
			<?php get_template_part('template-parts/content','right_sidebar')?>
		</div> <!-- end of row -->
	</div><!-- #primary -->

<?php

get_footer();
