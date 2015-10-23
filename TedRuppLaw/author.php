<?php
/* The Template for displaying author archive page.
 *
 
 * @subpackage persia
 * @since persia 0.1.0
 */

get_header(); ?>

	<div id="primary" class="primary">
		

		<?php if ( have_posts() ) : ?>

			<?php
			
				the_post();
			?>

			<header class="archive-header">
				<ul class="post-header-list">
					<li><h1 class="archive-title"><i class="fa fa-user"></i><?php printf( __( ' All posts by %s', 'persia' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .'" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1></li>
				</ul>
			</header><!-- .archive-header -->
			<div class="special-search-form"><?php get_search_form(); ?></div>
			<?php
		
				rewind_posts();
			?>
			
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php get_template_part( 'author-info' ); ?>
				
			<?php endif; ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<nav class="pagination">
			<span class="page-links-title"><?php echo __('Page:','persia'); ?></span> <?php persia_pagination(); ?>
		</nav>
	
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>