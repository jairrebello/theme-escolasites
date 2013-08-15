<?php

	if ( function_exists( 'ot_get_option' ) ) {
			$biografia = ot_get_option( 'biografia' );
		}
				if ( get_the_author_meta( 'description' ) && ($biografia[0] == 1)){ ?>
				<div id="author-info" class="clearfix">
					
					
					<figure id="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'lambda_author_bio_avatar_size', 60 ) ); ?>
					</figure><!-- #author-avatar -->
							
					
					<div id="author-description">
						
						<h3 class="author-name">						
							Sobre
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<span class="author-link"><?php the_author(); ?></span>
							</a>												
						</h3>
						
						<?php the_author_meta( 'description' ); ?>
                        
                    <div class="author-links clearfix">					
					
					<?php if(get_the_author_meta( 'user_url', $author_id )) : ?>
					
					<a class="link-author" href="<?php the_author_meta( 'user_url', $author_id ); ?>" target="_blank"></a>
    				
					<?php endif; ?>
					
					
					<?php if(get_the_author_meta( 'facebook', $author_id )) : ?>
					
					<a class="facebook-author" href="<?php the_author_meta( 'facebook', $author_id ); ?>" target="_blank"></a>
					
					<?php endif; ?>
					
					
					<?php if(get_the_author_meta( 'twitter', $author_id )) : ?>
					
					<a class="twitter-author" href="<?php the_author_meta( 'twitter', $author_id ); ?>" target="_blank"></a>
					
					<?php endif; ?>
					
					
					<?php if(get_the_author_meta( 'aim', $author_id )) : ?>
					
					<a class="aim-author" href="<?php the_author_meta( 'aim', $author_id ); ?>" target="_blank"></a>
					
					<?php endif; ?>	
					
					
					<?php if(get_the_author_meta( 'yim', $author_id )) : ?>
					
					<a class="yahoo-author" href="<?php the_author_meta( 'yim', $author_id ); ?>" target="_blank"></a>
					
					<?php endif; ?>	
					
					
					<?php if(get_the_author_meta( 'jabber', $author_id )) : ?>
					
					<a class="google-author" href="<?php the_author_meta( 'jabber', $author_id ); ?>" target="_blank"></a>
					
					<?php endif; ?>	
					
					
					<?php if(get_the_author_meta( 'email', $author_id )) : ?>
					
					<a class="email-author" href="mailto:<?php the_author_meta( 'email', $author_id ); ?>" target="_blank"></a>
					
					<?php endif; ?>	
					
					</div>
                    
					</div><!-- #author-description	-->
                    
                 
				</div><!-- #entry-author-info -->
				<?php } ?>