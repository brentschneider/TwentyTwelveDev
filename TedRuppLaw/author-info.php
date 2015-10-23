<?php
/* The Template for displaying author information.
 *
 * @subpackage persia
 * @since persia 0.1.0
 */
?>

<div class="author-info">
	<h2 class="author-title">
		<?php if(get_the_author_meta( 'user_url',get_the_author_meta( 'ID' ))) :  ?>
			<a class="author-link" href="<?php echo esc_url( get_the_author_meta( 'user_url',get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'About %s', 'persia' ), get_the_author() ); ?>
			</a>
		<?php else: ?>
			<?php printf( __( 'About %s', 'persia' ), get_the_author() ); ?>
		<?php endif; ?>
	</h2>
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
	</div><!-- .author-avatar -->
	<div class="author-description">
		<p class="author-bio" >
			<?php the_author_meta( 'description' ); ?>
		</p>
	</div><!-- .author-description -->
</div><!-- .author-info -->