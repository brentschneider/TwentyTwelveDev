<?php
/* The Template for category archive page.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0
 */
get_header(); ?>

	<div id="primary" class="primary">
	

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<ul class="post-header-list">
					<li><h1 class="archive-title"><i class="fa fa-bookmark"></i><?php printf( __( 'Category Archives: %s', 'persia' ), single_cat_title( '', false ) ); ?></h1></li>
				</ul>
					<?php if ( category_description() ) : ?>
						<div class="archive-meta"><p><?php echo category_description(); ?></p></div>
					<?php endif; ?>
					
			</header>
			<div class="special-search-form"><?php get_search_form(); ?></div>
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<nav class="pagination">
			<span class="page-links-title"><?php echo __('Page:','persia'); ?></span> <?php persia_pagination(); ?>
		</nav>
		
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>