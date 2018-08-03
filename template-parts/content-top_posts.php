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
	$postOneTag   = esc_attr(get_option('post_one_tag' ) );
	$postTwoTag   = esc_attr(get_option('post_two_tag' ) );
	$postThreeTag = esc_attr(get_option('post_three_tag' ) );
	
	$topThreePosts = array(
		array($postOneID,$imgOne,$imgOneAlt,$postOneTag),
		array($postTwoID,$imgTwo,$imgTwoAlt,$postTwoTag), 
		array($postThreeID,$imgThree,$imgThreeAlt,$postThreeTag)
	);
?>
<!-- TOP THREE ARTICLES
    ================================================== -->
	<section class="top_posts_row">
		
		<div class="row">
			
			<?php 
				foreach($topThreePosts as $three){
					if( $three[0] !== '- None Selected -') : 
			?>
				<div class="col-md-4">
				<div class="hoverbox">
					<div class="hoverbox__img_container">
						<img src="<?php echo $three[1];?>" alt="<?php echo $three[2];?>"/>
						<a href="<?php echo get_permalink($three[0]); ?>">
							<div class="hoverbox__article-title">
								<?php echo get_the_title($three[0]);?>
							</div>
						</a>
					</div>
					<div class="hoverbox__description">
						<a href="<?php echo get_permalink($three[0]); ?>"><span><?php echo $three[3]; ?></span></a>
					</div>
					<div class="hoverbox__triangle_container">

						<div class="hoverbox__triangles">
							<div class="darkPink triangle right"></div>
							<div class="darkPurple triangle left"></div>
							<div class="darkPink triangle right"></div>
							<div class="purple triangle left"></div>
							<div class="aqua triangle right"></div>
						</div>
						<div class="hoverbox__triangles">
							<div class="darkPurple triangle left"></div>
							<div class="darkPink triangle right"></div>
							<div class="purple triangle left"></div>
							<div class="darkPink triangle right"></div>
							<div class="purple triangle left"></div>
						</div>
						<div class="hoverbox__triangles">
							<div class="darkPink triangle right"></div>
							<div class="darkPurple triangle left"></div>
							<div class="darkPink triangle right"></div>
							<div class="purple triangle left"></div>
							<div class="aqua triangle right"></div>
						</div>
						<div class="hoverbox__triangles">
							<div class="darkPurple triangle left"></div>
							<div class="darkPink triangle right"></div>
							<div class="purple triangle left"></div>
							<div class="darkPink triangle right"></div>
							<div class="purple triangle left"></div>
						</div>
						<div class="hoverbox__triangles">
							<div class="darkPink triangle right"></div>
							<div class="darkPurple triangle left"></div>
							<div class="darkPink triangle right"></div>
							<div class="purple triangle left"></div>
							<div class="aqua triangle right"></div>
						</div>
					</div>
				</div>		
			</div>
				<!-- <div class="col-sm top-3-posts">
					<a href="<?PHP echo get_permalink($three[0]);?>">
						<div class="position-relative w-100">
							<img src="<?php echo $three[1];?>" alt="<?php echo $three[2];?>"/>
							<div class="line-height-1 d-flex justify-content-center align-items-center top-3-posts-tag">
								<span>
									
								</span>
							</div>
						</div>
					</a>
				</div> -->
				
			<?php endif; }; ?>
			
			
		</div>
	</section> <!-- End Top Three Articles -->