<?php

/* 
 * Funções do template
 * Autor: Jair Rebello
 * Site: www.escolasites.com
 * 
 */

$content_width = '940';

#-----------------------------------------------------------------
# Check IE
#-----------------------------------------------------------------
$browser = (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) ? true : false;

#-------------------------------------------------------------------
# Inclusão do OptionTree
#-------------------------------------------------------------------

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );

require_once ( get_template_directory()  . '/functions/theme-functions.php' );
require_once ( get_template_directory()  . '/functions/opcoes-ot.php' );
require_once ( get_template_directory()  . '/functions/navegacao.php' );
require_once ( get_template_directory()  . '/includes/ads.php' );

#--------------------------------------------------------------
# Carregamento dos Widgets
#--------------------------------------------------------------

require_once ( get_template_directory()  . '/includes/widgets/widget-artigos-populares.php' );
require_once ( get_template_directory()  . '/includes/widgets/widget-facebook.php' );
require_once ( get_template_directory()  . '/includes/widgets/widget-plus.php' );
require_once ( get_template_directory()  . '/includes/widgets/widget-rss.php' );



#-----------------------------------------------------------------
# Register Menu
#-----------------------------------------------------------------
if( !function_exists( 'register_menu' ) ) {
    
	function register_menu() {
	    register_nav_menu('primary-menu', __('Menu Principal', UT_THEME_NAME));
		register_nav_menus( array( 'mobile-menu' => 'Menu Mobile') );
    }
    add_action('init', 'register_menu');
	
}

function apply_mobile_menu( $menu_id ) {
	$menu_id = 'mobile-menu';
	return $menu_id;
}
add_filter( 'lambda_responsive_menu_location', 'apply_mobile_menu' );	





#-----------------------------------------------------------------
# Register widgetized areas, including two sidebars and four widget-ready 
# columns in the footer and all created Sidebars in Admin Panel
#-----------------------------------------------------------------
if ( !function_exists( 'st_widgets_init' ) ) {

function st_widgets_init() {
	
	// The Default Sidebar
	register_sidebar( array(
		'name' => __( 'Sidebar', UT_THEME_NAME ),
		'id' => 'sidebar',
		'description' => __( 'Sidebar Padrão', UT_THEME_NAME ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );
		
	
	
	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Rodapé 1', UT_THEME_NAME ),
		'id' => 'rodape-1',
		'description' => __( 'Rodapé 1', UT_THEME_NAME ),
		'before_widget' => '<div class="%1$s %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Rodapé 2', UT_THEME_NAME ),
		'id' => 'rodape-2',
		'description' => __( 'Rodapé 2', UT_THEME_NAME ),
		'before_widget' => '<div class="%1$s %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Rodapé 3', UT_THEME_NAME ),
		'id' => 'rodape-3',
		'description' => __( 'Rodapé 3', UT_THEME_NAME ),
		'before_widget' => '<div class="%1$s %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Rodapé 4', UT_THEME_NAME ),
		'id' => 'rodape-4',
		'description' => __( 'Rodapé 4', UT_THEME_NAME ),
		'before_widget' => '<div class="%1$s %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );
	
	// Area 7, located in the Header. Empty by default.
	register_sidebar( array(
		'name' => __( 'Cabeçalho', UT_THEME_NAME ),
		'id' => 'cabecalho',
		'description' => __( 'Widget para o cabeçalho', UT_THEME_NAME ),
		'before_widget' => '<div class="%1$s %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );
		
}
/** Register sidebars by running lambda_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'st_widgets_init' );

}

// Enable Shortcodes in excerpts and widgets
add_filter('widget_text', 'do_shortcode');


if (!function_exists('get_image_path'))  {
function get_image_path() {
	global $post;
	$id = get_post_thumbnail_id();
	// check to see if NextGen Gallery is present
	if(stripos($id,'ngg-') !== false && class_exists('nggdb')){
	$nggImage = nggdb::find_image(str_replace('ngg-','',$id));
	$thumbnail = array(
	$nggImage->imageURL,
	$nggImage->width,
	$nggImage->height
	);
	// otherwise, just get the wp thumbnail
	} else {
		$thumbnail = wp_get_attachment_image_src($id,'full', true);
	}
	$theimage = $thumbnail[0];
	return $theimage;
}
}

#-----------------------------------------------------------------
# override default filter for 'textarea' sanitization.
#----------------------------------------------------------------- 
add_action('admin_init','optionscheck_change_santiziation', 100);
 
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'st_custom_sanitize_textarea' );
}

function st_custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
    	$custom_allowedtags["script"] = array();
    	$custom_allowedtags["a"] = array('href' => array(),'title' => array());
    	$custom_allowedtags["img"] = array('src' => array(),'title' => array(),'alt' => array());
    	$custom_allowedtags["br"] = array();
    	$custom_allowedtags["em"] = array();
    	$custom_allowedtags["strong"] = array();
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
        $of_custom_allowedtags = array_merge($of_custom_allowedtags, $allowedtags);
        $output = wp_kses( $input, $of_custom_allowedtags);
    return $output;
} 


#-----------------------------------------------------------------
# Comment Styles
#-----------------------------------------------------------------
if ( ! function_exists( 'st_comments' ) ) :
function st_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; 
$admincomment = (1 == $comment->user_id) ? 'admin-comment' : '';
?>


<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>" class="single-comment clearfix">
                       
                    <figure class="comment-author vcard <?php echo $admincomment; ?>"> 
                        <?php echo get_avatar( $comment->comment_author_email, '60' ); ?> 
                    </figure>
               
                    <article class="comment-body">
                    
                    	<header class="comment-header">
							
							<?php if ($comment->comment_approved == '0') : ?>
                            	<em><?php _e('Comment is awaiting moderation',UT_THEME_NAME);?></em> <br />
                            <?php endif; ?>
							
                            <cite class="fn"><?php echo get_comment_author_link(); ?></cite>
                             <br />
                            <span class="comment-date"><?php echo get_comment_date(). '  -  ' . get_comment_time(); ?></span>
                            <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Responder','depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </header>
                        
						<?php comment_text() ?>
                        
                        <footer class="comment-meta commentmetadata">
							<?php edit_comment_link(__('Edit Comment',UT_THEME_NAME),'  ',''); ?>
						</footer>
                        
                	</article>                               
		</div>
<!-- </li> -->
<?php  }
endif;


add_theme_support( 'post-thumbnails' ); 

add_shortcode('caixa_rss', 'func_caixa_rss');

function func_caixa_rss() {    

return '<div id="receber">

	

	<h4>Assine nossas atualizações e receba um Ebook sobre SEO GRÁTIS!</h4>		

	<div class="ebook">

		<img src="http://www.escolasites.com/wp-content/uploads/2012/03/ebook-artigos.jpg" />

	</div>		

	<div class="texto">		

		<p>Mais de 1200 pessoas já assinaram nossa NEWSLETTER, inteiramente GRÁTIS, e aprendem todos os dias como criar e melhorar seus blogs e sites. Assine também e receba o ebook sobre como colocar seu Blog no topo do GOOGLE, apenas coloque seu nome e email nas caixas abaixo e clique em DOWNLOAD GRÁTIS.</p>		

	<form class="newsletter" method="post" target="_new" accept-charset="UTF-8" name="oi_form" action="http://link.emailchute.com/oi/1/5d9fe12bece58f19bc99b1a126c717aa">

<input type="hidden" name="goto" value="" />
			<input style="display: initial;" id="input-rss" class="input-rss" type="text" name="Nome" placeholder="Nome" />	

			<input style="display: initial;" id="input-rss" class="input-rss" type="text" name="email" placeholder="E-mail"/>						

			<input id="btn-assinar" class="mais" style="float: right;width: 220px;margin-bottom: 10px;margin-top: 1px; padding: 0px; font-size: 15px; margin-top: 3px; height: 31px;" type="submit" value=" DOWNLOAD GRÁTIS" />		

		</form>	

	</div>	

</div>

<div class="clear"></div>';}

?>