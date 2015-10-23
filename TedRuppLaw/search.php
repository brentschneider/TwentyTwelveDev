
<?php
/**
 * Template Name: Search Page
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0
 */


get_header(); ?>
	
<div class="primary" id="primary">
		
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<ul class="post-header-list">
					<li><h1 class="page-title"><i class="fa fa-search"></i><?php printf( __( 'Search Results for: %s', 'persia' ), get_search_query() ); ?></h1></li>
				</ul><!--.post-header-list-->
			</header><!--.page-header-->
			
			<div class="special-search-form">
				<?php get_search_form(); ?>
			</div><!--.special-search-form-->
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		
		<nav class="pagination">
			<span class="page-links-title"><?php echo __('Page:','persia'); ?></span> <?php persia_pagination(); ?>
		</nav><!--.primary-->
		
</div><!--.primary-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>