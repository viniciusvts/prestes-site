<?php
function custom_imovel() {
	$labels = array(
		'name'                  => _x( 'Imóveis', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Imóvel', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Imóveis', 'text_domain' ),
		'name_admin_bar'        => __( 'Imóvel', 'text_domain' ),
		'archives'              => __( 'Imóvels Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os Imóveis', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo Imóvel', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo Imóvel', 'text_domain' ),
		'edit_item'             => __( 'Editar Imóvel', 'text_domain' ),
		'update_item'           => __( 'Atualizar Imóvel', 'text_domain' ),
		'view_item'             => __( 'Ver Imóvel', 'text_domain' ),
		'search_items'          => __( 'Buscar Imóvel', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem Imóvel', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no Imóvel', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para Imóvel', 'text_domain' ),
		'items_list'            => __( 'Lista de Imóvels', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos Imóvels', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar Imóvels', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'imovel', 'text_domain' ),
		'description'           => __( 'Cadastrar Imóvels', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail','editor', ),
		'taxonomies'            => array( 'categoria_imovel' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		"show_in_rest"			=> true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-admin-multisite',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'imoveis', $args );
}
add_action( 'init', 'custom_imovel', 0 );


// Register Custom Post Type Categoria
function categoria_imovel_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Categorias do Imóvel', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Categoria do Imóvel', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Categorias', 'dna' ),
		'all_items'                  => __( 'Todas as categorias', 'dna' ),
		'parent_item'                => __( 'Categoria Mãe', 'dna' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'dna' ),
		'new_item_name'              => __( 'Nova Categoria de Imóvel', 'dna' ),
		'add_new_item'               => __( 'Adicionar Categoria de Imóvel', 'dna' ),
		'edit_item'                  => __( 'Editar Categoria de Imóvel', 'dna' ),
		'update_item'                => __( 'Atualizar Categoria de Imóvel', 'dna' ),
		'view_item'                  => __( 'Ver Categoria de Imóvel', 'dna' ),
		'separate_items_with_commas' => __( 'Separar categorias por vírgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria de Imóvel', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'dna' ),
		'popular_items'              => __( 'Categorias populares', 'dna' ),
		'search_items'               => __( 'Buscar Categoria de Imóvel', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Categoria de Imóvel', 'dna' ),
		'items_list'                 => __( 'Lista de categorias', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Categoria de Imóvel', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'imovel',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		"show_in_rest"				 => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'imovel', array( 'imoveis' ), $args );
}
add_action( 'init', 'categoria_imovel_taxonomy', 0 );

// Register Custom Post Type Cidade
function categoria_cidade_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Cidade do Imóvel', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Cidade do Imóvel', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Cidades', 'dna' ),
		'all_items'                  => __( 'Todas', 'dna' ),
		'parent_item'                => __( 'Categoria Mãe', 'dna' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'dna' ),
		'new_item_name'              => __( 'Nova Categoria de Imóvel', 'dna' ),
		'add_new_item'               => __( 'Adicionar Categoria de Imóvel', 'dna' ),
		'edit_item'                  => __( 'Editar Categoria de Imóvel', 'dna' ),
		'update_item'                => __( 'Atualizar Categoria de Imóvel', 'dna' ),
		'view_item'                  => __( 'Ver Categoria de Imóvel', 'dna' ),
		'separate_items_with_commas' => __( 'Separar categorias por vírgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria de Imóvel', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'dna' ),
		'popular_items'              => __( 'Categorias populares', 'dna' ),
		'search_items'               => __( 'Buscar Categoria de Imóvel', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Categoria de Imóvel', 'dna' ),
		'items_list'                 => __( 'Lista de categorias', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Categoria de Imóvel', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'cidade',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		"show_in_rest"				 => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'cidade', array( 'imoveis' ), $args );
}
add_action( 'init', 'categoria_cidade_taxonomy', 0 );


// Register Custom Post Type Estado
function categoria_estado_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Estado do Imóvel', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Estado do Imóvel', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Estados', 'dna' ),
		'all_items'                  => __( 'Todas', 'dna' ),
		'parent_item'                => __( 'Categoria Mãe', 'dna' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'dna' ),
		'new_item_name'              => __( 'Nova Categoria de Imóvel', 'dna' ),
		'add_new_item'               => __( 'Adicionar Categoria de Imóvel', 'dna' ),
		'edit_item'                  => __( 'Editar Estado', 'dna' ),
		'update_item'                => __( 'Atualizar Categoria de Imóvel', 'dna' ),
		'view_item'                  => __( 'Ver Estados', 'dna' ),
		'separate_items_with_commas' => __( 'Separar categorias por vírgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria de Imóvel', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'dna' ),
		'popular_items'              => __( 'Categorias populares', 'dna' ),
		'search_items'               => __( 'Buscar Categoria de Imóvel', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Categoria de Imóvel', 'dna' ),
		'items_list'                 => __( 'Lista de categorias', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Categoria de Imóvel', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'estado',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		"show_in_rest"				 => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'estado', array( 'imoveis' ), $args );
}
add_action( 'init', 'categoria_estado_taxonomy', 0 );


// Register Custom Post Type Região
function categoria_regiao_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Região do Imóvel', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Região do Imóvel', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Regiões', 'dna' ),
		'all_items'                  => __( 'Todas', 'dna' ),
		'parent_item'                => __( 'Categoria Mãe', 'dna' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'dna' ),
		'new_item_name'              => __( 'Nova Região de Imóvel', 'dna' ),
		'add_new_item'               => __( 'Adicionar Região de Imóvel', 'dna' ),
		'edit_item'                  => __( 'Editar Região', 'dna' ),
		'update_item'                => __( 'Atualizar Região de Imóvel', 'dna' ),
		'view_item'                  => __( 'Ver Regiões', 'dna' ),
		'separate_items_with_commas' => __( 'Separar categorias por vírgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria de Imóvel', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'dna' ),
		'popular_items'              => __( 'Categorias populares', 'dna' ),
		'search_items'               => __( 'Buscar Categoria de Imóvel', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Categoria de Imóvel', 'dna' ),
		'items_list'                 => __( 'Lista de categorias', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Categoria de Imóvel', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'regiao',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		"show_in_rest"				 => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'regiao', array( 'imoveis' ), $args );
}
add_action( 'init', 'categoria_regiao_taxonomy', 0 );

// Register Custom Post Type financiamento
function categoria_financiamento_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Financiamento do Imóvel', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Financiamento do Imóvel', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Financiamentos', 'dna' ),
		'all_items'                  => __( 'Todas', 'dna' ),
		'parent_item'                => __( 'Categoria Mãe', 'dna' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'dna' ),
		'new_item_name'              => __( 'Nova Categoria de financiamento', 'dna' ),
		'add_new_item'               => __( 'Adicionar Categoria de financiamento', 'dna' ),
		'edit_item'                  => __( 'Editar financiamento', 'dna' ),
		'update_item'                => __( 'Atualizar Categoria de Imóvel', 'dna' ),
		'view_item'                  => __( 'Ver Estados', 'dna' ),
		'separate_items_with_commas' => __( 'Separar categorias por vírgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria de Imóvel', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'dna' ),
		'popular_items'              => __( 'Categorias populares', 'dna' ),
		'search_items'               => __( 'Buscar Categoria de Imóvel', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Categoria de Imóvel', 'dna' ),
		'items_list'                 => __( 'Lista de categorias', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Categoria de Imóvel', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'financiamento',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		"show_in_rest"				 => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'financiamento', array( 'imoveis' ), $args );
}
add_action( 'init', 'categoria_financiamento_taxonomy', 0 );

// Register Custom Post Type Tipo imovel
function categoria_tipoImovel_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Tipo do Imóvel', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Tipo do Imóvel', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Tipos', 'dna' ),
		'all_items'                  => __( 'Todas', 'dna' ),
		'parent_item'                => __( 'Categoria Mãe', 'dna' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'dna' ),
		'new_item_name'              => __( 'Novo tipo do imóvel', 'dna' ),
		'add_new_item'               => __( 'Adicionar tipo de imóvel', 'dna' ),
		'edit_item'                  => __( 'Editar tipo do imóvel', 'dna' ),
		'update_item'                => __( 'Atualizar tipo do Imóvel', 'dna' ),
		'view_item'                  => __( 'Ver tipo do imóvel', 'dna' ),
		'separate_items_with_commas' => __( 'Separar tipo por vírgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover tipo do imóvel', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar tipo de imóvel mais usado', 'dna' ),
		'popular_items'              => __( 'tipos de imóvel populares', 'dna' ),
		'search_items'               => __( 'Buscar tipo de Imóvel', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhum tipo de Imóvel', 'dna' ),
		'items_list'                 => __( 'Lista de tipos de imóvel', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por tipos de Imóvel', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'tipoDeImovel',
		'with_front'                 => false,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		"show_in_rest"				 => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'tipoDeImovel', array( 'imoveis' ), $args );
}
add_action( 'init', 'categoria_tipoImovel_taxonomy', 0 );
