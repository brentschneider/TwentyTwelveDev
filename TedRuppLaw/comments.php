<?php
/* The Template for displaying comments.
 *
 *
 * @subpackage persia
 * @since persia 0.1.0
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<i class="fa fa-comments-o"></i>
			<?php
				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'persia' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 74,
					'reply_text' => __('<i class="fa fa-reply"></i>','persia')
				) );
			?>
		</ol><!-- .comment-list -->
		
	<nav class="comment-navigation" >
			<div class="previous-comments"><?php previous_comments_link( __( '<i class="fa fa-chevron-left"></i> Older Comments', 'persia' ) ); ?></div>
			<div class="next-comments"><?php next_comments_link( __( 'Newer Comments <i class="fa fa-chevron-right"></i>', 'persia' ) ); ?></div>
		</nav><!-- .comment-navigation -->	


		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'persia' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php get_template_part('lib/comment','form'); ?>

</div><!-- #comments -->