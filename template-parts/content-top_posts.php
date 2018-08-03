<?php
/*
	Template Name: Top 3 Posts
*/
?>
<?php 
	$postOneID    = esc_attr(get_option('post_one_id')  );
	$imgOne       = esc_attr(get_option('post_one_pic') );
	$imgOneAlt 	  = get_post_meta( get_image_id($imgOne), '_wp_attachment_image_alt', true);
	$postTwoID    = esc_attr(get_option('post_two_id')  );
	$imgTwo       = esc_attr(get_option('post_two_pic') );
	$imgTwoAlt 	  = get_post_meta( get_image_id($imgTwo), '_wp_attachment_image_alt', true);
	$postThreeID  = esc_attr(get_option('post_three_id')  );
	$imgThree     = esc_attr(get_option('post_three_pic' ) );
	$imgThreeAlt  = get_post_meta( get_image_id($imgThree), '_wp_attachment_image_alt', true);
	
	$topThreePosts = array(
		array($postOneID,$imgOne,$imgOneAlt),
		array($postTwoID,$imgTwo,$imgTwoAlt), 
		array($postThreeID,$imgThree,$imgThreeAlt)
	);
?>
<!-- TOP THREE ARTICLES
    ================================================== -->
	<section>
		
		<div class="row">
			
			<?php 
				foreach($topThreePosts as $three){
					if( $three[0] !== '- None Selected -') : 
			?>
				
				<div class="col-sm top-3-posts">
					<a href="<?PHP echo get_permalink($three[0]);?>">
					<div class="position-relative w-100">
						<img src="<?php echo $three[1];?>" alt="<?php echo $three[2];?>"/>
						<div class="line-height-1 d-flex justify-content-center align-items-center top-3-posts-tag">
							<span>
								<?php echo get_the_title($three[0]);?>
							</span>
						</div>
					</div>
				</a>
				</div>
				
			<?php endif; }; ?>
			
			
		</div>
	</section> <!-- End Top Three Articles -->