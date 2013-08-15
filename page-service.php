<?php /* Template name: Page FULL */ ?>
<?php
/**
 * Template Page
 *
 * Autor: Jair Rebello
 * Site: www.escolasites.com
 */

//include header.php
get_header();

?>

<div id="content-wrap" class="fluid clearfix" data-content="content"><!-- /#start content-wrap -->
	<div class="container">
	
<?php
if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
                
				<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header clearfix">                   		
                    		<h1 class="entry-title standard-post-title"><?php the_title();?></h1>
            		</header>
					<article>				
					
					<div class="entry-post clearfix">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
                    
                    <div class="edit-link-wrap">
						<?php edit_post_link( 'Editar Página', '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .edit-link-wrap -->
            		</article>
				</section><!-- #post-## -->
				

<?php endwhile; // end of the loop. ?>

<?php

//include footer.php
get_footer();
?>