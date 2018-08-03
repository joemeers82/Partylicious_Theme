<?php 
/*
	Template Name: Front Page Post Display
*/
?>
<!-- LEFT SIDE ARTICLE LIST
================================================== -->
<div class="ls-articles container">
	<?php 
		$offset          = get_query_var('offset');  //offset variable from load_more_posts function
		$postOneID       = esc_attr(get_option('post_one_id')   ); 
		$postTwoID       = esc_attr(get_option('post_two_id')   ); 
		$postThreeID     = esc_attr(get_option('post_three_id') ); 

		if(get_query_var('catID') !== ''){
			$postNotIn = '';
		}
		else {
			$postNotIn = array($postOneID,$postTwoID,$postThreeID);
		}
	   
		
		$args = array (
			'post_type'      => 'post',
			'cat'            => get_query_var('catID'),
			'posts_per_page' => 4,
			'post_status'    => 'publish',
			'offset'         => $offset,
			'post__not_in'   => $postNotIn //Exclude any posts being shown in top 3
		);
		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ): while( $the_query->have_posts() ) : $the_query->the_post(); 
		?>
		<article class="top-3 row">
			<div class="col-lg ls-article-pic">
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
			</div>
			<div class="col-lg ls-article-text">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="fp-entry-meta pb-2">
						<?php
							misfit_foodie_posted_on();
						?>
					</div><!-- .entry-meta -->
					<a href="<?php the_permalink(); ?>"><?php the_excerpt();?></a>
				</div>
		</article>
	<?php 
		wp_reset_postdata(); 
	?>
	<?php endwhile; endif;?>
</div> <!-- End Left Side Article List -->
