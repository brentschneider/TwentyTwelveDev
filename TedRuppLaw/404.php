<?php
/* The Template for displaying 404 page.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0

 */

get_header(); ?>
	<div class="primary" id="primary">
		<h1 class="page-header"><i class="fa fa-warning"></i><?php _e( 'Not found', 'persia' ); ?></h1>
			<div class="page-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'persia' ); ?>
					<?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'persia' ); ?></div>

		<div class="special-search-form"><?php get_search_form(); ?></div>
	</div>
		
<?php get_footer(); ?>