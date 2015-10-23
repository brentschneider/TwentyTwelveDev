<?php
/*
* The Template for displaying all single posts.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0

 */

get_header(); ?>

		<div class="primary" id="primary">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				
				<nav class="post-navigation">
					<ul>
						<li class="next-post"><?php echo __('Next : ','persia'); next_post_link( '%link', __('%title','persia') ); ?></li>
						<li class="previous-post"><?php echo __('Previous : ','persia'); previous_post_link( '%link', __('%title','persia') ); ?></li>
					</ul>
				</nav><!-- .post-navigation -->
	
				<?php comments_template(); ?>

			<?php endwhile; ?>
			
		</div><!-- .primary -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>