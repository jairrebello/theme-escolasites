<?php
/* 
 * Single.php
 * Autor: Jair Rebello
 * Site: www.escolasites.com
 * 
 */
?>

<?php
//includes the header.php
get_header();
?>

<div id="content-wrap" class="fluid clearfix" data-content="content"><!-- /#start content-wrap -->
	<div class="container">
	
		<div id="content" class="twelve columns alpha">
		<?php 
		
		navegacao();	
		if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<section id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
                	<header class="entry-header">
						<h1 class="entry-title standard-post-title">
                        	<?php the_title(); ?>
                    	</h1>
                    
                    	<div class="entry-meta">
					
							<!-- Autor -->
					
							<div class="post-ut autor">                        
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<span class="author-link"><?php the_author(); ?></span>
								</a>												
                    		</div> <!-- Autor -->
					                
                    <div class="post-ut date">
                        <?php echo  
                        	sprintf( __( '%2$s', UT_THEME_NAME ),
								'meta-prep meta-prep-author',
								sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
									get_permalink(),
									esc_attr( get_the_time() ),
									get_the_date()
								));
                        
                        ?>
                    </div> <!-- data de publicação -->
                         
                    <div class="post-ut comments">	
                       <span class="comments-link"><?php comments_popup_link('Comente', '1 Comentário', '% Comentários'); ?></span>
                    </div><!-- comentários -->
                                             
                </div><!-- .entry-meta -->                      
                
            	</header>          
					<article class="entry-post clearfix">
						
                    
                    		
        
        			<div class="clear"></div>
                					
                    <?php
					$post_format = get_post_format();
					($post_format) ? get_template_part( 'post-formats/' . $post_format ) : get_template_part( 'post-formats/standard' );
					?>
                   
                    <div class="entry-content clearfix">
                    
						<div class="entry-summary">	
							<?php ads_inicio_left();?>
							<?php ads_inicio_right();?>				
							<?php the_content(); ?>
							<?php ads_final_left();?>
							<?php ads_final_right();?>
                        </div>
                        
					</div><!-- .entry-content -->
                    
				</article><!-- end article -->
                
				<?php $tags_list = get_the_tag_list( '', ', ' );
						if ( $tags_list ):	?>
						
                    	<div class="post-ut">	
						
							<span class="tag_links">
								<span class="entry-utility-prep entry-utility-prep-tag-links"></span> <?php echo $tags_list; ?>
							</span>
							
						</div><!-- tags do artigo -->
						
				<?php endif; ?>
				 
				<div class="clear"></div>
				            
			</section><!-- #fim da section do post -->             
                
                
                              
                <div class="clear"></div>
                                
				<?php require_once ( get_template_directory()  . '/includes/like-box.php' ); ?>                
				<?php require_once ( get_template_directory()  . '/includes/author-info.php' ); ?>
				                                
				<?php comments_template( '', true ); ?>
                
                <div class="clear"></div>
                
                <?php 
                	if(function_exists('wp_pagenavi')) { 
						wp_pagenavi(); 
					}
					else { 
				?>
                <div id="nav-below" class="navigation loop-single clearfix">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&#8656;', 'Previous post link', UT_THEME_NAME ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&#8658;', 'Next post link', UT_THEME_NAME ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->
				<?php } ?>

<?php endwhile; // final do loop.  ?>

</div><!-- /#content -->

<?php
//include sidebar.php
get_sidebar();
	
//include footer.php
get_footer();
?>