<?php
/* The Template for displaying archive page.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0

 */

get_header(); ?>

	
	<div class="primary" id="primary">
		<?php if ( have_posts() ) : ?>
			<div class="archive-header">
				<ul class="post-header-list">
					<li><h1 class="archive-title"><i class="fa fa-clock-o"></i>
					<?php
					if ( is_day() ) :
						printf( __( ' Daily Archives: %s', 'persia' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( ' Monthly Archives: %s', 'persia' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'persia' ) ) );
					elseif ( is_year() ) :
						printf( __( ' Yearly Archives: %s', 'persia' ), get_the_date( _x( 'Y', 'yearly archives date format', 'persia' ) ) );
					else :
						_e( 'Archives', 'persia' );
					endif;
					?>
					</h1></li>
				</ul>
			</div>
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