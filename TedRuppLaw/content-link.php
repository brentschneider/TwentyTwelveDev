<?php
/* The Template for displaying link post format.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0
 */
?>

<article id="post-<?php the_ID(); ?> " <?php post_class(); ?>>
	<header class="post-header">
		<?php persia_post_format(); ?>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="featured-post"><i class="fa fa-star" > <?php echo __('Featured','persia'); ?></i></span>
		<?php endif; ?>
		
		<h3 class="post-title p-name entry-title"><a id="link-title" href="<?php echo esc_url( persia_get_link_url() ); ?>"><?php the_title(); ?></a></h3>
	</header>

	<div class="post-content">
		<?php if ( !is_single() ) : 
					the_excerpt('<a class="more-link" href="'. get_permalink($post->ID) . '">'.__('... Read More','persia').'</a>');
				else : ?>
		<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'persia' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		<?php endif; ?>
	</div>

	<?php if ( is_single() ) : ?>
	<div class="post-info">
				
				<?php get_template_part('lib/post','meta'); ?>
			</div>
	<?php endif; ?>
	<?php edit_post_link( '<i class="fa fa-edit"></i>','<span class="edit-link">', '</span>' ); ?>
</article>

