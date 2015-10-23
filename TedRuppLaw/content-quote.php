<?php
/* The Template for displaying quote post format.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0
 */
?>

<article id="post-<?php the_ID(); ?> " <?php post_class(); ?>>
			<?php persia_post_format(); ?>
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="featured-post"><i class="fa fa-star" > <?php echo __('Featured','persia'); ?></i></span>
			<?php endif; ?>
			
			<div class="post-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'persia' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</div><!--.post-content-->

		<footer class="post-meta">
		<?php if ( is_single() ) : ?>
				<?php get_template_part('lib/post','meta'); ?>
		<?php else : ?>
			
				<div class="post-meta">
					<ul class="post-meta-list">
					<li>
						<?php if ( comments_open() ) : ?>
							<ul class="meta-list">
								<li><i class="fa fa-comments-o"></i></li>
								<li class="meta-comment">
									<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'persia' ) . '</span>', __( 'One comment so far', 'persia' ), __( 'View all % comments', 'persia' ) ); ?>
								</li>
							</ul>
						<?php endif; ?>
					</li>
					<li>
						<ul class="meta-list">
							<li><i class="fa fa-clock-o"></i></li>
							<li class="meta-date dt-published">
								<?php if(function_exists('jdate')) {
									$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
													esc_url( get_permalink() ),
													esc_attr( get_the_time() ),
													esc_attr( jdate('c',strtotime($post->post_date)) ),
													esc_html( jdate(get_option('date_format'),strtotime($post->post_date)) )
													);
										} else {
									$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
													esc_url( get_permalink() ),
													esc_attr( get_the_time() ),
													esc_attr( get_the_date( 'c' ) ),
													esc_html( get_the_date() )
													);
										}
									echo $date; 
								?>
							</li>
							<li  class="updated more-info">
								<?php the_modified_time('F jS, Y'); ?>
							</li>
						</ul><!--.meta-list-->
					</li>
				</ul>
			</div>
		<?php endif;  ?>
	</footer>
					<?php edit_post_link( '<i class="fa fa-edit"></i>','<span class="edit-link">', '</span>' ); ?>
</article><!--.article-->
