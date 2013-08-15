<?php 

/**
 * Rodapé
 * 
 * Autor: Jair Rebello
 * Site: www.escolasites.com
 */

?>
	</div> <!-- container -->
	<div class="clear"></div>
</div><!-- (#content-wrap) -->


<footer id="footer-wrap" class="fluid clearfix">
	<div class="container">
			<div id="footer" class="<?php echo $class; ?> sixteen columns"> 

			<?php //loads sidebar-footer.php
				get_sidebar( 'footer' );
			?>
			</div><!--/#footer-->
           	
    </div><!--/.container-->
</footer><!--/#footer-wrap-->
            
			<div id="sub-footer-wrap" class="clearfix">
				<div class="container">
                
     			
				
                <div class="copyright">
                   
				    Orgulhosamente desenvolvido com Wordpress | Desenvolvido por <a href="http://www.escolasites.com/">Escola Sites </a>
					
                </div>    
                
                </div>      
		</div><!--/#sub-footer-wrap-->	
    

</div><!--/#wrap -->

<?php wp_footer();?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=430739126957277";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
$(document).ready(function(){

	// hide #back-top first
	$("#toTop").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#toTop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
<?php require_once ( get_template_directory()  . '/includes/ga.php' ); ?>
</body>
</html>