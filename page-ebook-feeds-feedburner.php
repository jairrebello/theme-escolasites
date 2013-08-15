<?php
/**
 * Template Name: Template Squezze Ebook Feeds e Feedburner
 *
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php 
if ( function_exists( 'ot_get_option' ) ) {
	$seo = ot_get_option('seo');
	if($seo[0] == 1)
		include(TEMPLATEPATH .'/includes/opcoes-seo.php');
	else
		include(TEMPLATEPATH .'/includes/title.php');
}
?>	

<!--[if lte IE 8]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" media="screen" />
<![endif]-->

<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->


<!-- Metatags específicas para dispositivos móveis
================================================== -->

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

<!-- Favicons ================================================== -->

<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.png">
<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/favicon.png">

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/formalize.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/layout.css" />
<style>
	.page-template-page-ebook-feeds-feedburner-php .container{
		border-left: 1px solid #ccc; 
		border-right: 1px solid #ccc;
		border-bottom: 1px solid #ccc;
		background: white;
		padding: 10px;
	}
	.type-page{
		border: none;
	}
	#content img{
		
	}
	.input{
		width: 200px;
	}
	.nome{
		margin-left: 3px;
		margin-bottom: 5px;
	}
</style>

<?php
	
	
	
	// Carregamento das funções incluídas no head
	wp_head();
?>

</head>

<body <?php body_class(); ?>>


	
    
    
	<div id="wrap" class="clearfix" data-role="page">
		<div class="container">
			<h1 class="titulo-squeeze">Qual a importância dos feeds e do Feedburner para um blog?</h1>
			<div id="content" class="twelve columns alpha">
				
				<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<p style="text-align: justify">Agora você pode baixar ele gratuitamente e ter a sua disposição mais de 41 páginas 
							de puro conteúdo de qualidade em um único E-book. Para fazer o download simplesmente preencha com seus dados ao lado. 
							Foram no total 9 autores que espoem a sua opinião e dicas para que você possa utilizar o FeedBurner melhor e 
							consiga aumentar a sua lista de assinantes.</p>
						<p align="center"><img src="<?php bloginfo("template_directory")?>/images/capa-feeds-feedburner.jpg" /></p>
						<p><strong>Autores: </strong></p>
					<ul style="text-align: justify">
						<li>Cláudio Luiz – Personalizar o blog</li>
<li>Émerson Felinto – Escola Sites</li>
<li>Gustavo Freitas – Gustavo Freitas.Net</li>
<li>Jackson Soares – Desenvolvendo Web</li>
<li>Leandro Eduardo – Linka Brasil</li>
<li>Magno Moraes – Informação Blogger</li>
<li>Paulo Moraes – Office Web</li>
<li>Ricardo Rojas Sierban – Marketisite</li>
<li>Victor Palandi – Victor Palandi</li>
					</ul>
					
				</section>
			</div>
			<aside id="sidebar" class="five columns alpha omega" role="complementary">
				<ul>
					<li>
						<h3 class="sidebar-squeeze">Coloque aqui seu nome e email</h3>
			<img src="<?php bloginfo("template_directory")?>/images/setas-squeeze.jpg" />
			<form method='get' accept-charset='UTF-8' name='oi_form' action='http://link.emailchute.com/oi/1/5d9fe12bece58f19bc99b1a126c717aa'>
Nome: <input type='text' name='Nome' class="nome input" /><br />
E-mail: <input type='text' name='email' class="input"/><br />

<input type='hidden' name='goto' value='' />
<input type='hidden' name='iehack' value='&#9760;' />		
			<input type="image" src="<?php bloginfo("template_directory")?>/images/acesso-gratis.png">		
		</form>	
					</li>	
				</ul>
			</aside><!-- #sidebar -->
		</div>
			
		</div>
	</div>



</div><!-- #page -->
<script src="<?php bloginfo('template_directory'); ?>/js/cufon.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bombardier.cufonfonts.js" type="text/javascript"></script>
<script>
	Cufon.replace('h1, h2, h3, h4, h5, h6', { fontFamily: 'Bombardier', hover: true });
</script>
<?php wp_footer(); ?>

</body>
</html>