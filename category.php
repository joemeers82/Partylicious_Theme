<?php get_header(); ?>
<section>
	<?php 
		$cat = get_queried_object();
		if($cat){
			set_query_var('catID',$cat->term_id);  
			
		}
		else {
			set_query_var('catID','');  
		}
	?>
	
	<div class="row">
		<!-- MAIN CONTENT -->
		<div class="col-md-8">
			<!-- ABOUT AUTHOR -->
			<h2 class="mb-4 text-uppercase text-center"><?php single_cat_title();?></h2>
			<hr>
			<!-- LIST POSTS-->
			<div id="fp-article-posts-container">
			<?php get_template_part('template-parts/content','fp-posts'); ?>
			</div>
			<div class="post-nav text-center">
				<?php get_page_numbers(get_query_var('catID')); ?>
			</div>
		</div> <!-- End Left Container -->
	<!-- RIGHT SIDEBAR-->
		<?php get_template_part('template-parts/content','right_sidebar')?>
	</div>
</section>


		<?php get_footer();?>