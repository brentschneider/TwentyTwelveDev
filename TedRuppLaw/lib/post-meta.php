<?php
/*
*
*/?>
		<div class="post-meta">
				<ul class="post-meta-list">
					<li>
						<ul class="meta-list">
							<li><i class="fa fa-user"></i></li>
							<li class="meta-author">
								<span class="author-info vcard">
									<a  class="author-link url p-author h-card" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
										<span class="fn"><?php echo get_the_author(); ?></span>
									</a>
									<span class="more-info">
										<span class="author-avatar" >
											<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
										</span><!-- .author-avatar -->
									</span>
								</span><!-- .author-info -->
							</li>
						</ul><!--.meta-list-->
					</li>
					
					<li>
						<ul class="meta-list">
							<li><i class="fa fa-clock-o"></i></li>
							<li class="meta-date dt-published">
								<?php if(function_exists('jdate')) {
									$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
													esc_url( get_permalink() ),
													esc_attr( get_the_time() ),
													esc_attr( jdate('c',strtotime($post->post_date)) ),
													esc_html( jdate(get_option('date_format'),strtotime($post->post_date)) )
													);
										} else {
									$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
													esc_url( get_permalink() ),
													esc_attr( get_the_time() ),
													esc_attr( get_the_date( 'c' ) ),
													esc_html( get_the_date() )
													);
										}
									echo $date; 
								?>
							</li>
							<li  class="updated more-info">
								<?php the_modified_time('F jS, Y'); ?>
							</li>
						</ul><!--.meta-list-->
					</li>
					
					<li>
						<?php if ( comments_open() ) : ?>
							<ul class="meta-list">
								<li><i class="fa fa-comments-o"></i></li>
								<li class="meta-comment">
									<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'persia' ) . '</span>', __( 'One comment so far', 'persia' ), __( 'View all % comments', 'persia' ) ); ?>
								</li>
							</ul><!--.meta-list-->
						<?php endif; ?>
					</li>
					
					<li>
						<?php $categories_list = get_the_category_list( __( ' ', 'persia' ) );
							if ( $categories_list ) { ?>
								<ul class="meta-list">
									<li><i class="fa fa-bookmark"></i></li>
									<li class="meta-cat">
										<span class="p-category"><?php echo $categories_list ; ?></span>
									</li>
								</ul><!--.meta-list-->
							<?php } ?>
					</li>
					
					<li>
						<?php $tag_list = get_the_tag_list( '', __( ' ', 'persia' ) );
							if ( $tag_list ) { ?>
								<ul class="meta-list">
									<li><i class="fa fa-tags"></i></li>
									<li class="meta-tag">
										<?php echo $tag_list ;?>
									</li>
								</ul><!--.meta-list-->
							<?php } ?>
					</li>
					
				</ul><!--.post-meta-list-->
				
		</div><!--.post-meta-->		