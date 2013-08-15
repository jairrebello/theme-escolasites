<?php
/* 
 * Template 404.php
 * Autor: Jair Rebello
 * Site: www.escolasites.com
 * 
 */

//include header.php
get_header();

?>

<div id="content-wrap" class="fluid clearfix" data-content="content"><!-- /#start content-wrap -->
	<div class="container">
		<div id="content" class="eleven columns">
			<header class="entry-header clearfix">
        		<h1 class="entry-title standard-post-title">Página não encontrada</h1>
        	</header>
			<p>Desculpe, a página que você tentou acessou não foi encontrada! Abaixo você pode realizar uma pesquisa, isso pode lhe ajudar.</p>
		    <div class="row">
				<?php get_search_form(); ?>
			</div>
			<script type="text/javascript">
				// focus on search field after it has loaded
				document.getElementById('s') && document.getElementById('s').focus();
			</script>
</div><!-- /#content -->
<?php

//include sidebar.php
get_sidebar();

//include footer.php
get_footer();
?>