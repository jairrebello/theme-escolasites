<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'opcoes_gerais',
        'title'       => 'Opções Gerais'
      ),
      array(
        'id'          => 'aparencia',
        'title'       => 'Aparência'
      ),
      array(
        'id'          => 'publicidade',
        'title'       => 'Publicidade'
      ),
      array(
        'id'          => 'seo',
        'title'       => 'SEO'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'google_analytics',
        'label'       => 'ID da Estatística do Google Analytics',
        'desc'        => 'Inclua aqui o seu ID do Google Analytics - Está com dificuldade? <a target="_blank" href="http://www.escolasites.com/id-do-perfil-do-google-analytics/">CLIQUE AQUI</a>',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'feedburner',
        'label'       => 'Feedburner',
        'desc'        => 'Entre com seu ID no feedburner - Criar artigo',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook',
        'label'       => 'Página - Facebook',
        'desc'        => 'Entre com a URL da página de fãs - CRIAR ARTIGO',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter',
        'label'       => 'Twitter',
        'desc'        => 'Entre com seu nome de usuário do Twitter - CRIAR ARTIGO',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'plus',
        'label'       => 'Google Plus',
        'desc'        => 'Entre com o ID de página no Google Plus - Está com dificuldade? <a target="_blank" href="http://www.escolasites.com/como-adicionar-google-plus-badge-caixa-de-fas-no-wordpress-manualmente/">CLIQUE AQUI</a>',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'biografia',
        'label'       => 'Exibir Biografia',
        'desc'        => 'Marque esta opção se deseja exibir uma pequena biografia do autor, assim como links para redes sociais ao fim de cada artigo',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Sim',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'breadcrumb',
        'label'       => 'Usar breadcrumb do Template?',
        'desc'        => 'Marque esta opção se deseja exibir o breadcrumb(Migalha de pão) do template',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Sim',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'likebox',
        'label'       => 'Exibir Like Box ao fim do artigo?',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Sim',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'resumo_automatico',
        'label'       => 'Resumo automático?',
        'desc'        => 'Marque esta opção se deseja exibir um resumo automático do artigo nas páginas de listagens',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Sim',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'palavras_resumo',
        'label'       => 'Palavras do Resumo',
        'desc'        => 'Digite a quantidade de palavras desejadas para o resumo',
        'std'         => '100',
        'type'        => 'text',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'copy',
        'label'       => 'Copyright do Rodapé',
        'desc'        => 'Insira a mensagem de copyright que será exibida no rodapé',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'opcoes_gerais',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'background',
        'label'       => 'Background',
        'desc'        => 'Escolha um background para o blog',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'aparencia',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pub_acima_artigos',
        'label'       => 'Publicidade Acima dos Artigos',
        'desc'        => 'Insira aqui o Adsense, ou banner que será exibido acima dos artigos na listagem de artigos',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'publicidade',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pub_inicio_left',
        'label'       => 'Publicidade no Início dos Artigos - Esquerda',
        'desc'        => 'Insira aqui o Adsense, ou banner que irá ser exibido no início dos artigos ao lado esquerdo',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'publicidade',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pub_inicio_right',
        'label'       => 'Publicidade no Início dos Artigos - Direita',
        'desc'        => 'Insira aqui o Adsense, ou banner que irá ser exibido no início dos artigos ao lado direito',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'publicidade',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pub_final_left',
        'label'       => 'Publicidade no Final dos Artigos - Esquerda',
        'desc'        => 'Insira aqui o Adsense, ou banner que irá ser exibido no final dos artigos ao lado esquerdo',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'publicidade',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pub_final_right',
        'label'       => 'Publicidade no Final dos Artigos - Direita',
        'desc'        => 'Insira aqui o Adsense, ou banner que irá ser exibido no final dos artigos ao lado direito',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'publicidade',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'seo',
        'label'       => 'Usar opções de SEO do Template',
        'desc'        => 'Marque esta opção se deseja usar as configurações de SEO do template - É mais recomendado instalar um plugin para o mesmo',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Sim',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'titulo_blog',
        'label'       => 'Título do Blog',
        'desc'        => 'Adicione o título do Blog que irá ser exibido na página principal',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'description',
        'label'       => 'Desrição do Blog',
        'desc'        => 'Conteúdo da tag description',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'keywords',
        'label'       => 'Keywords do Blog',
        'desc'        => 'Conteúdo da tag keywords da página principal, sempre use separados por vírgulas.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'noindex_cat',
        'label'       => 'NoIndex e NoFollow em categorias',
        'desc'        => 'Aplicar NoIndex e NoFollow em página de categorias',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Sim',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'noindex_tag',
        'label'       => 'NoIndex e NoFollow em tags',
        'desc'        => 'Aplicar NoIndex e NoFollow em página de tags',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Sim',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'noindex_search',
        'label'       => 'NoIndex e NoFollow em buscas',
        'desc'        => 'Aplicar NoIndex e NoFollow em página de buscas',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Sim',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'convert_tags_key',
        'label'       => 'Converter tags em keywords',
        'desc'        => 'Marque aopção se deseja tranformar as tags de um artigo em keywords',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Sim',
            'src'         => ''
          )
        ),
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}