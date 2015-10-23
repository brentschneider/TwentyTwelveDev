<?php
/* The Template for displaying Index page.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0
 */

get_header(); ?>
	
	<div class="primary" id="primary">
	
		<?php if ( have_posts() ) : ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	
		<nav class="pagination">
			<span class="page-links-title"><?php echo __('Page:','persia'); ?></span> <?php persia_pagination(); ?>
		</nav><!--.pagination-->

	</div><!--.primary-->		

<?php get_sidebar(); ?>
<?php get_footer(); ?>