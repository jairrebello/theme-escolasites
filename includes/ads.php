<?php 


function ads_acima_artigos(){
	if ( function_exists( 'ot_get_option' ) ) {
		$pub_acima_artigos = ot_get_option('pub_acima_artigos');
	}
	if ($pub_acima_artigos <> '')
		echo '<div id="pub-acima-artigos">' . $pub_acima_artigos . '</div>';
}

function ads_inicio_left(){
	if ( function_exists( 'ot_get_option' ) ) {
		$pub_inicio_left = ot_get_option('pub_inicio_left');
	}
	if ($pub_inicio_left <> '')
		echo '<div id="pub-inicio-left">' . $pub_inicio_left . '</div>';
}

function ads_inicio_right(){
	if ( function_exists( 'ot_get_option' ) ) {
		$pub_inicio_right = ot_get_option('pub_inicio_right');
	}
	if ($pub_inicio_right <> '')
		echo '<div id="pub-inicio-right">' . $pub_inicio_right . '</div>';
}

function ads_final_left(){
	if ( function_exists( 'ot_get_option' ) ) {
		$pub_final_left = ot_get_option('pub_final_left');
	}
	if ($pub_final_left <> '')
		echo '<div id="pub-final-left">' . $pub_final_left . '</div>';
}

function ads_final_right(){
	if ( function_exists( 'ot_get_option' ) ) {
		$pub_final_right = ot_get_option('pub_final_right');
	}
	if ($pub_final_right <> '')
		echo '<div id="pub-final-right">' . $pub_final_right . '</div>';
}

?>