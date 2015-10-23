<?php
/* The Template for displaying tag archive page.
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
					<li><h1 class="archive-title"><i class="fa fa-tags"></i><?php printf( __( 'Tag Archives: %s', 'persia' ), single_tag_title( '', false ) ); ?></h1></li>
				</ul><!-- .post-header-list -->
				
				<?php if ( tag_description() ) : ?>
					<div class="archive-meta"><p><?php echo tag_description(); ?></p></div>
				<?php endif; ?>
			
			</header><!-- .archive-header -->
			
			<div class="special-search-form">
				<?php get_search_form(); ?>
			</div><!-- .special-search-form -->
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<nav class="pagination">
			<span class="page-links-title"><?php echo __('Page:','persia'); ?></span> <?php persia_pagination(); ?>
		</nav><!-- .pagination -->
	
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>