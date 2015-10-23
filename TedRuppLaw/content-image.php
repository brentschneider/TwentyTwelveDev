<?php
/* The Template for displaying image post format.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="post-header">
			<?php persia_post_format(); ?>
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="featured-post"><i class="fa fa-star" > <?php echo __('Featured','persia'); ?></i></span>
			<?php endif; ?>
		
			<?php if ( is_single() ) : ?>
				<h1 class="post-title p-name entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h3 class="post-title p-name entry-title"><a id="image-title" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						
					<div class="post-info">
						<?php get_template_part('lib/post','meta'); ?>
					</div>
			<?php endif;  ?>
				
			<?php if(is_single()): ?>
				
				<div class="post-info">
					<?php get_template_part('lib/post','meta'); ?>
				</div>
			<?php endif; ?>
		</header>
	
		
			<div class="post-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'persia' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</div>
		<?php edit_post_link( '<i class="fa fa-edit"></i>','<span class="edit-link">', '</span>' ); ?>
					
</article>
