<?php

/**
 * Cabeçalho do template.
 *
 * Autor: Jair Rebello
 * Site: www.escolasites.com
 */
 
global $wpdb;

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

<!-- Favicons
================================================== -->


<!-- Aprender a utilizar o Option Tree-->
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.png">

<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/favicon.png">

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/formalize.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/responsive.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/layout.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/superfish.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/colors/blue.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	
	// habilitar script de comentários dinâmicos
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	// Carregamento das funções incluídas no head
	wp_head();
?>

</head>

<body <?php body_class(); ?>>

<!-- to top button -->
<div id="toTop">Go to Top</div>
<!-- end to top button -->
	
    
    
	<div id="wrap" class="container clearfix" data-role="page">
	
	
	<header id="header" class="fluid clearfix" data-role="header">
	<div class="container">    
		<div id="logo">
			<h1>
				<a href="<?php bloginfo("url") ?>" title="<?php bloginfo("title") ?>"><img alt="<?php bloginfo("title") ?>" src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a>
				
			</h1>
		</div>
       
        	<div class="h-right">
        		 	   
                    <?php
            //Navigation
                
            //main navigation
            wp_nav_menu( array( 'container' 		=> 'nav',  
                                'container_id' 		=> 'navigation', 
                                'theme_location' 	=> 'primary-menu', 
                                'fallback_cb' 		=> 'default_menu',
                                'menu_class'      	=> 'menu clearfix',
                                'container_class' 	=> 'clearfix')
            );
            ?>	
			
			<?php if ( has_nav_menu( 'mobile-menu' ) ) { 
			
				echo '<div class="mm-trigger">'.get_bloginfo('name').'<button class="mm-button"></button></div>';
				
				wp_nav_menu( array( 'theme_location' => 'mobile-menu', 
									'container_id' => 'mobile-menu',
									'container' => 'nav', 
									'menu_class' => 'mm-menu',
									'depth' => 1 ) ); 
											
			} ?>
			<?php dynamic_sidebar('cabecalho'); ?>
        </div>
      </div>  
      
	</header><!--/#header-->
	
	<div class="clear"></div>