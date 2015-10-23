<?php
/* The Template for displaying footer area.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0
 */
?>
				</div><!--.content-->
			</div><!--.main-->
		
		
		<div id="footer" class="footer">
			
			<?php get_sidebar( 'footer' ); ?>
			
			<div class="site-credit">
				<?php printf( __( '%s Copyright (C) %d . All Rights Reserved.', 'Ted Rupp Law Office' ), esc_html(get_bloginfo('name')) ,get_the_date('Y') ); ?><br>
				
			</div><!--.site-credit-->
			
		</div><!--.footer-->
			
		 
		 <div class="advance-search-slide">
			<div class="inner">				
					<?php get_search_form(); ?>
				
			</div><!--inner-->
		</div><!--.advance-search-slide-->
		
		<?php wp_footer(); ?>
  	</body><!--body-->
</html><!--html-->