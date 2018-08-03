<?php get_header();?>

<!-- TOP THREE ARTICLES -->
<?php get_template_part('template-parts/content','top_posts'); ?>
<?php 
	
?>
	
<!-- MAIN CONTENT
================================================== -->
<section>
	<div class="row">

		<!-- LEFT CONTAINER
	    ================================================== -->
		<div class="col-md-8">
			 
			<!-- ABOUT AUTHOR -->
			<?php get_template_part('template-parts/content','about_author'); ?>
			
			<!-- LIST POSTS-->
			<div id="fp-article-posts-container">
			<?php get_template_part('template-parts/content','fp-posts'); ?>
			</div>
			<div class="post-nav text-center">
				<?php get_page_numbers(); ?>
			</div>
		</div> <!-- End Left Container -->
		
		<!-- RIGHT SIDEBAR-->
		<?php get_template_part('template-parts/content','right_sidebar')?>
			
	</div>
</section> <!-- End Main Content -->

<?php get_footer();?>