<?php
/*
	Template Name: About Author
*/
?>
<?php 
	$aboutAuthorText = wpautop( stripslashes(get_option('about-author') ) );
	$profilePicture  = esc_attr(get_option('author-image') );
?>
<!-- WELCOME SECTION
================================================== -->
<div class="container welcome">
	<div class="about row align-items-center">
		<div class="col-sm-3 offset-sm-1">
			<div>
				<div class="profile-pic">
					<img src="<?php echo $profilePicture; ?>" alt="Author Picture"/>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<?php echo $aboutAuthorText; ?>
		</div>
	</div>
</div> <!-- End Welcome Section -->