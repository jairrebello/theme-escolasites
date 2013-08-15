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
	<div id="content" class="twelve columns alpha">
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
                    
                    
            		</article>
				</section><!-- #post-## -->
				

<?php endwhile; // end of the loop. ?>
</div><!-- /#content -->
<?php

//include sidebar.php
get_sidebar();

//include footer.php
get_footer();
?>