<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Misfit_Foodie
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area text-left">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h5 class=" comment_h4 comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( '1 comment', 'misfit-foodie' )
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comment &ldquo;%2$s&rdquo;', '%1$s comments', $comment_count, 'comments title', 'misfit-foodie' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h5><!-- .comments-title -->

		<?php the_comments_navigation(); ?>
		<ul class="misfit_comment_list list-group">
			<?php wp_list_comments(); ?>
		</ul>
		<?php 
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'misfit-foodie' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().
	$args = [
		'class_form'   => 'misfit_comment_form',
		'class_submit' => 'btn comment-button',
		'title_reply'  => '<h4 class="comment_h4">Leave a Reply</h4>'
	];
	comment_form($args);
	?>

</div><!-- #comments -->
