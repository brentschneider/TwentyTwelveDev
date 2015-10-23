<?php
/* The Template for displaying not post found pages.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0
 */
?>

<header class="page-header">
	
	<h1 class="page-title"><i class="fa fa-warning"></i> <?php _e( 'Nothing Found', 'persia' ); ?></h1>
</header>

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'persia' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'persia' ); ?></p>
	<div class="special-search-form"><?php get_search_form(); ?></div>

	<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'persia' ); ?></p>
	<div class="special-search-form"><?php get_search_form(); ?></div>

	<?php endif; ?>
</div>
