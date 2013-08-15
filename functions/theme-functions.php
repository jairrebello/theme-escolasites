<?php


#-----------------------------------------------------------------
# Continue lendo nos loops
#-----------------------------------------------------------------
/*
if ( !function_exists( 'continue_reading_link' ) ) {
	function continue_reading_link() {
		return '<a class="excerpt" href="'. get_permalink() . '">' . 'Continue Lendo' . '</a>';
	}
}

function new_excerpt_more($more) {
    global $post;
	
	$more = __('Continue Lendo <span class="meta-nav"></span>', UT_THEME_NAME);
	
	return '<div class="continue-lendo"><a href="'. get_permalink($post->ID) . '" class="more-link">'.$more.'</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');
*/

#-----------------------------------------------------------------
# Remove HTML from the_content
#-----------------------------------------------------------------

function strip_shortcode($code, $content)
{
    global $shortcode_tags;

    $stack = $shortcode_tags;
    $shortcode_tags = array($code => 1);

    $content = strip_shortcodes($content);

    $shortcode_tags = $stack;
    return $content;
}

/*
if ( !function_exists( 'strip_html_from_the_content' ) ) {

	function strip_html_from_the_content($content, $tags = '') {
		
		if ( is_home() ) {
			$content = strip_shortcode('gallery', $content);		
		}
		
		return $content;
	}
	
	add_filter( 'the_content', 'strip_html_from_the_content'); 
}

function custom_excerpt_length( $length ) {
	return 1000;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// RESUMO
function resumo($palavras){
    $result = explode(' ', get_the_excerpt(), $palavras);
    if (count($result) >= $palavras) {
        array_pop($result);
        $result = implode(" ",$result).' [...]';
    } else {
        $result = implode(" ",$result);
    }
    echo $result . '<a href="' . get_permalink() . '" class="more-link">Leia mais <span class="meta-nav">+</span></a>';
}
*/ 

#-----------------------------------------------------------------
# Rel Category
#-----------------------------------------------------------------
add_filter( 'the_category', 'add_nofollow_cat' );

function add_nofollow_cat( $rel ) {
	$rel = str_replace('rel="category"', 'data-rel="category"', $rel); return $rel;
}

#-----------------------------------------------------------------
# Get Image Size
#-----------------------------------------------------------------
if ( !function_exists( 'getImageSizebyID' ) ) {
	function getImageSizebyID($PostID, $columnset) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($PostID), $columnset.'col-image' );
		$size = getimagesize($thumb['0']);
		return $size;
	}
}

#-----------------------------------------------------------------
# Author Social Media
#-----------------------------------------------------------------
function more_contactmethods( $contactmethods ) {
    
	// Add Twitter
    $contactmethods['twitter'] = 'Twitter';
    //add Facebook
    $contactmethods['facebook'] = 'Facebook';
     
    return $contactmethods;
    }
add_filter('user_contactmethods','more_contactmethods',10,1);



if ( !function_exists( 'extractURL' ) ) {
	function extractURL($url) {
		$finalurl = preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $url, $match);
		$finalurl = generatePPVideoURL($match['0']['0']);		
		return $finalurl;
	}
}

?>