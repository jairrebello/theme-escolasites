<?php
	if ( function_exists( 'ot_get_option' ) ) {
		$titulo_blog = ot_get_option('titulo_blog');
		$description = ot_get_option('description');
		$noindex_cat = ot_get_option('noindex_cat');
		$noindex_tag = ot_get_option('noindex_tag');
		$noindex_search = ot_get_option('noindex_search');
		$keywords = ot_get_option('keywords');
		$convert_tags_key = ot_get_option('convert_tags_key');
	} 
?>

<title>
<?php
/********************** TITULO DO BLOG ***************************/
	if(is_home()) {
    	if($titulo_blog) {
        	echo $titulo_blog;
    	} else {
      	 	bloginfo('description'); echo ' - '; bloginfo('name');
    	}
	}
	elseif(is_tag()) {
    	single_tag_title();
	}
	elseif(is_archive()) {
    	wp_title('', true, 'right'); 
	}
	elseif (is_search()) {
    	echo 'Resultado de busca pelo termo: &quot;'.esc_html($s).'&quot;';
	}
	elseif(!(is_404()) && (is_single()) || (is_page())) {
    	wp_title('', true, 'right');
	}
	elseif(is_404()) {
    	echo 'Página não encontrada';
	}

	if(!is_home()) {
    	echo' | ';bloginfo('name');
	}
	if($paged>1) {
    	echo ' - Página '. $paged;
	}
?></title>

<?php 
/********************** TAGS INDEX E FOLLOW ***************************/

if(is_category() && $noindex_cat[0]) {
    echo '<meta name="robots" content="noindex, follow" />'."\n";
}
elseif(is_tag() && $noindex_tag[0]) {
    echo '<meta name="robots" content="noindex, follow" />'."\n";
}
elseif(is_search() && $noindex_search[0]) {
    echo '<meta name="robots" content="noindex, follow" />'."\n";
}
if(is_single() || is_page() && get_option("blog_public"))
	echo '<meta name="robots" content="index, follow" />'."\n";


/********************** METATAG DESCRIPTION ***************************/
if(is_home() || is_front_page()) {
    echo '<meta name="description" content="'. $description .'" />'."\n";
}
elseif(is_single() || is_page()) {
	if (have_posts()) { 
        while (have_posts()) { 
            the_post();
                echo '<meta name="description" content="'.get_the_excerpt().'" />'."\n";
        }
    }
}


/********************** METATAG KEYWORDS ***************************/
if(is_home() || is_front_page()) {
    echo '<meta name="keywords" content="'. $keywords .'" />'."\n";
}
elseif(is_single() || is_page()) {
    if (have_posts() && $convert_tags_key[0]) {
        while (have_posts()) {
            the_post();
			
            $tags = get_tags();
            $content = '';
            foreach ($tags as $tag){
                $content .= $tag->name . ",";
            }
			echo '<meta name="keywords" content="'. $content .'" />'."\n";
        }
    }
}

?>