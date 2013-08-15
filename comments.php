<?php
/* 
 * Template de Comentários
 * Autor: Jair Rebello
 * Site: www.escolasites.com
 * 
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Este artigo é protegido, por favor insira a senha para visualizar os comentários</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<div id="comments">
<?php if ( have_comments() ) : ?>

	
	
	<h3 class="response">	
	<?php printf( _n( '1 Comentário para %2$s', '%1$s Comentários para %2$s', get_comments_number(), UT_THEME_NAME ),
			number_format_i18n( get_comments_number() ), '<span>&quot;'.get_the_title().'&quot;</span>' );?>
	
	</h3>

	
	<ul class="commentlist">
		<?php wp_list_comments("callback=st_comments"); ?> 
	</ul>

	
    
<?php else : // this is displayed if there are no comments so far ?>

<?php endif; ?>
</div>

<?php if ( comments_open() ) : ?>

<?php 
comment_form(); 
?>


<?php endif; // if you delete this the sky will fall on your head ?>
