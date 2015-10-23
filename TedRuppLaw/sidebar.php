<?php
/* The Template for displaying widgets on sidebar area.
 *
 * 
 * @subpackage persia
 * @since persia 0.1.0
 */
 ?>

<?php if ( is_active_sidebar( 'sidebar' )) : ?>
		
		<div class="secondary" id="secondary">
				
				<div id="sidebar-widget" class="sidebar-widget">
					<?php dynamic_sidebar( 'sidebar' ); ?>  
				</div>  
								
		</div><!--.secondary-->

 <?php endif; ?>
 


                    
               