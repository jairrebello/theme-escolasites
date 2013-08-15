<title><?php
	// Verifica a existência do Plugin SEO da Yoast
	if (defined('WPSEO_VERSION')) {
		wp_title('');
	} else {
	/*
	 * Caso não exista faz a montagem do título
	 */
	global $page, $paged;

	wp_title('|', true, 'right' );

	// Adiciona o nome do blog
	bloginfo('name');

	// Adiciona a descrição do blog se a página for a principal.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Adiciona a numeração de páginas se a mesma for necessária
	if ( $paged >= 2 || $page >= 2 )
		echo ' | Página ' .  max( $paged, $page );
	}
	?>
</title>