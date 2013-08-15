<?php

/* 
 * Loop de artigos
 * Autor: Jair Rebello
 * Site: www.escolasites.com
 * 
 */
 
?>

<?php /* Se o loop em questão estiver vazio, exibir página 404 */ ?>
<?php if ( !have_posts() ) : ?>
	<section id="post-0" class="post error404 not-found">
    	<article class="entry-post clearfix">
			<h1 class="entry-title"><span>Página não encontrada</span></h1>
			<div class="entry-content">
			<p>A página que você está tentando acessar não existe, abaixo você pode realizar uma pesquisa.</p>
			<?php get_search_form(); ?>
			</div><!-- .entry-content -->
        </article>
	</section><!-- #post-0 -->
<?php endif; ?>


<?php
#-----------------------------------------------------------------
# Início do Loop
#-----------------------------------------------------------------
?>
<div id="content-wrap" class="fluid clearfix" data-content="content"><!-- /#start content-wrap -->
	<div class="container">
	
	<div id="content" class="twelve columns alpha">
		<?php navegacao();?>
		<?php if (is_tag()){ ?>
			<h1 class="title-section">Artigos marcados com a tag "<?php single_tag_title();?>"</h1>
		<?php }elseif (is_category()) {?>
			<h1 class="title-section">Artigos da categoria "<?php single_cat_title();?>"</h1>
			<?php 
				$category_description = category_description();
				if ( ! empty( $category_description ) ){ 
			?>
					<div class="cat-description"><?php echo $category_description; ?></div>
			<?php } ?>
		<?php }elseif (is_search()) {?>
			<h1 class="title-section">Resultados para o termo "<?php echo get_search_query(); ?>"</h1>	
		<?php } ?>
<?php while ( have_posts() ) : the_post(); ?>
    	     
        <section id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
        	<header class="entry-header">
					<h1 class="entry-title standard-post-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="bookmark"><?php the_title(); ?></a>
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
        	<?php 
			//only show picture if it has been set in the article
			if(has_post_thumbnail(get_the_ID())) :						
				the_post_thumbnail();				
			endif; 
			?>
           	<article class="entry-post clearfix">

            <div class="entry-content">
                
            
            			
			<div class="entry-summary">
				
				<?php the_content('', FALSE, ''); ?> 
				<div class="continue-lendo">
					<a href="<?php the_permalink($post->ID); ?>" class="more-link">Continue Lendo</a>
				</div>  
                 
			</div><!-- .entry-summary -->
            
            </div><!-- .entry-content -->
                       
								
			<div class="clear"></div> 		
			</article>
         
		</section><!-- #post-## -->
        
        <div class="clear"></div>
	
		

<?php endwhile; // End the loop. Whew.  ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php 
	if (function_exists('wp_pagenavi')){
		wp_pagenavi();
	}
	else if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation clearfix">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&#8656;</span> Older posts', UT_THEME_NAME ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&#8658;</span>', UT_THEME_NAME ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
</div><!-- /#content-wrap -->

<?php get_sidebar(); ?>