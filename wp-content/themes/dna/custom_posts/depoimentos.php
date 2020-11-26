<?php
function custom_depoimentos() {
	$labels = array(
		'name'                  => _x( 'Depoimentos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Depoimentos', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Depoimentos', 'text_domain' ),
		'name_admin_bar'        => __( 'Depoimentos', 'text_domain' ),
		'archives'              => __( 'Depoimentos Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os depoimentos', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo Depoimentos', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo Depoimentos', 'text_domain' ),
		'edit_item'             => __( 'Editar Depoimentos', 'text_domain' ),
		'update_item'           => __( 'Atualizar Depoimentos', 'text_domain' ),
		'view_item'             => __( 'Ver Depoimentos', 'text_domain' ),
		'search_items'          => __( 'Buscar Depoimentos', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem Depoimentos', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no Depoimentos', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para Depoimentos', 'text_domain' ),
		'items_list'            => __( 'Lista de Depoimentos', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos Depoimentos', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar Depoimentos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'depoimentos', 'text_domain' ),
		'description'           => __( 'Cadastrar Depoimentos', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail','editor', ),
		'taxonomies'            => array( 'categoria_depoimentos' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-edit',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'depoimentos', $args );
}
add_action( 'init', 'custom_depoimentos', 0 );
?>