<?php
function custom_premios() {
	$labels = array(
		'name'                  => _x( 'Nossos Prêmios', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Nossos Prêmios', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Nossos Prêmios', 'text_domain' ),
		'name_admin_bar'        => __( 'Nossos Prêmios', 'text_domain' ),
		'archives'              => __( 'Nossos Prêmios Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os Prêmios', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo Prêmios', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo Prêmios', 'text_domain' ),
		'edit_item'             => __( 'Editar Prêmios', 'text_domain' ),
		'update_item'           => __( 'Atualizar Prêmios', 'text_domain' ),
		'view_item'             => __( 'Ver Prêmios', 'text_domain' ),
		'search_items'          => __( 'Buscar Prêmios', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem Prêmios', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no Prêmios', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para Prêmios', 'text_domain' ),
		'items_list'            => __( 'Lista de Prêmios', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos Prêmios', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar Prêmios', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Nossos Prêmios', 'text_domain' ),
		'description'           => __( 'Cadastrar Prêmios', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array( 'categoria_premios' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-star-filled',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'premios', $args );
}
add_action( 'init', 'custom_premios', 0 );
?>