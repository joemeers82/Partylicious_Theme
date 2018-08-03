<?php
/**
*
* @package Misfit_Foodie
*/

namespace Inc\Api\Callbacks;

class AdminCallbacks
{
	//Build Dropdown Menu To Display All Posts
	public function posts_dropdown_menu($id,$name) {
		global $post;
		$args = [
			'numberposts' =>-1
		];
		$allposts = get_posts($args);
		echo '<select name="'.$name.'" id="'.$id.'"><option>- None Selected -</option>';
			foreach($allposts as $post) : setup_postdata($post); ?>
				<option value='<?php echo $post->ID; ?>' <?php selected(get_option($name), $post->ID ); ?> >   <?php the_title();?> </option> <?php 
			endforeach;
			wp_reset_postdata();
		echo '</select><p>';
	}

	public function display_preview_top_post($id,$tag,$colorId){
	 	echo '<p>
	 		<div class="top-3-posts">
	 			<div>
	 				<div class="top-left-cat">
	 					<span class="top-left-title">'.$tag.'</span>
	 					<div class="triangle-up-left" id="'.$colorId.'"></div>
	 				</div>
	 				'.get_the_post_thumbnail($id,'thumbnail').'
	 				<div class="d-flex justify-content-center align-items-center top-3-posts-tag">
	 				'.get_the_title($id).'
	 				</div>
	 			</div>
	 		</div>
	 	';
	}

	public function adminDashBoard() {
		return require_once( get_template_directory() ."/template-parts/home-page-settings.php" );
	}

	public function homePageSettingsGroup( $input ) {
		return $input;
	}

	public function homePageAdminOptions() {
		
	}

	public function addSiteLogo() {
		$siteLogo = esc_attr( get_option('site-header-logo') );
		echo '<div style="max-width:50%;"><img style="max-width:100%;" class="site-header-logo" src="'.$siteLogo.'"/></div>';  //inline style
		echo '<input type="button" class="btn-sm btn-misfit upload-button" value="Upload Logo"> <input type="hidden" id="site-header-logo" name="site-header-logo" value="'.$siteLogo.'" />';
		echo '<hr>';
	}

	public function homePageTopPostOne() {
		$postOneTag  = esc_attr(get_option('post_one_tag') );
		$postOneID   = esc_attr(get_option('post_one_id') );
		$postOnePic  = esc_attr(get_option('post_one_pic') );
		
		echo '<div class="container d-flex justify-content-between">';
		
		echo '<div class="d-inline-block">';
		echo '<img style="max-width:150px;" class="post_one_pic" src="'.$postOnePic.'"><p>';
		echo '<input type="button" class="btn-sm btn-misfit upload-button" value="Upload Post 1 Image"/> <input type="hidden" id="post_one_pic" name="post_one_pic" value="'.$postOnePic.'" />';
		echo '</div>';
		echo '<div class=" align-top d-inline-block border rounded">';
		$this->posts_dropdown_menu('post_one','post_one_id');
		echo '<input type="text" name="post_one_tag" value="'.$postOneTag.'" placeholder="Post Tag" /><p>';
		
		echo '</div>';
		
		echo '</div>';
		
	}

	public function homePageTopPostTwo() {
		$postTwoTag = esc_attr(get_option('post_two_tag') );
		$postTwoID  = esc_attr(get_option('post_two_id') );
		$postTwoPic = esc_attr(get_option('post_two_pic') );
		
		echo '<div class="container d-flex justify-content-between">';
		echo '<div class="d-inline-block">';
		echo '<img style="max-width:150px;" class="post_two_pic" src="'.$postTwoPic.'"><p>';
		echo '<input type="button" class="btn-sm btn-misfit upload-button" value="Upload Post 2 Image"/> <input type="hidden" id="post_two_pic" name="post_two_pic" value="'.$postTwoPic.'" />';
		echo '</div>';
		echo '<div class=" align-top d-inline-block border rounded">';
		$this->posts_dropdown_menu('post_two','post_two_id');
		echo '<input type="text" name="post_two_tag" value="'.$postTwoTag.'" placeholder="Post Tag" />';
		echo '</div>';
		echo '</div>';
		
	}

	public function homePageTopPostThree() {
		$postThreeTag = esc_attr(get_option('post_three_tag') );
		$postThreeID  = esc_attr(get_option('post_three_id') );
		$postThreePic  = esc_attr(get_option('post_three_pic') );

		echo '<div class="container d-flex justify-content-between">';
		echo '<div class="d-inline-block">';
		echo '<img style="max-width:150px;" class="post_three_pic" src="'.$postThreePic.'"><p>';
		echo '<input type="button" class="btn-sm btn-misfit upload-button" value=" Upload Post 3 Image"/> <input type="hidden" id="post_three_pic" name="post_three_pic" value="'.$postThreePic.'" />';
		echo '</div>';
		echo '<div class="align-top d-inline-block border rounded">';
		$this->posts_dropdown_menu('post_three','post_three_id');
		echo '<input type="text" name="post_three_tag" value="'.$postThreeTag.'" placeholder="Post Tag" />';
		echo '</div>';
		echo '</div>';
		
	}

	public function homePageAboutAuthor() {
		$aboutAuthorText = wpautop( stripslashes(get_option('about-author') ) );
		$authorPic       = esc_attr( get_option('author-image') );
		$content         = $aboutAuthorText;
		$editor_id       ='about_author_editor';
		$settings = array(
	    	'textarea_rows' => 7,
	    	'media_buttons' =>false,
	    	'textarea_name' => 'about-author'
		);
		echo '<div class="profile-pic"><img class="author-picture" src="'.$authorPic.'"/></div>';
		echo '<input type="button" class="btn-sm btn-misfit upload-button" value="Upload Author Picture"/input> <input type="hidden" id="author-picture" name="author-image" value="'.$authorPic.'" />';
		wp_editor($content,$editor_id,$settings);
	}

	public function facebookLink() {
		$facebookUrl  = esc_attr(get_option('facebookUrl') );
		
		echo '<div class="container d-flex justify-content-between">';
		echo '<label for="facebookUrl">Facebook Url: </label>';
		echo '<input class="w-75" name="facebookUrl" value="'.$facebookUrl.'" placeholder="Facebook Url" type="text"></input>';
		echo '</div>';
	}

	public function pinterestLink() {
		$pinterestUrl   = esc_attr(get_option('pinterestUrl') );
		
		echo '<div class="container d-flex justify-content-between">';
		echo '<label for="pinterestUrl">Pinterest Url: </label>';
		echo '<input class="w-75" name="pinterestUrl" value="'.$pinterestUrl.'" placeholder="Pinterest Url" type="text"></input>';
		echo '</div>';
	}

	public function instagramLink() {
		$instagramUrl   = esc_attr(get_option('instagramUrl') );
		
		echo '<div class="container d-flex justify-content-between">';
		echo '<label for="instagramUrl">Instagram Url: </label>';
		echo '<input class="w-75" name="instagramUrl" value="'.$instagramUrl.'" placeholder="Instagram Url" type="text"></input>';
		echo '</div>';
	}
}