<?php
if ( function_exists( 'ot_get_option' ) ) {
	$likebox = ot_get_option( 'likebox' );
	$facebook = ot_get_option( 'facebook' );
}

        if (isset($likebox) && $likebox[0] == 1) {
            echo '<div id="like-box"><iframe src="//www.facebook.com/plugins/likebox.php?href=' . str_replace(array('/', ':'),array('%2F', '%3A'),$facebook) .'&amp;width=610&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23ffffff&amp;stream=false&amp;header=false&amp;appId=112980195496066" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:610px; height:258px;" allowTransparency="true"></iframe></div>';
        }
		
?>