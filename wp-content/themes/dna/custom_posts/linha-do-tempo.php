<?php
function custom_linha_do_tempo() {
	$labels = array(
		'name'                  => _x( 'Linha do Tempo', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Linha do Tempo', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Linha do Tempo', 'text_domain' ),
		'name_admin_bar'        => __( 'Linha do Tempo', 'text_domain' ),
		'archives'              => __( 'Linha do Tempo Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Linha do tempo', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo Histórias', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo Histórias', 'text_domain' ),
		'edit_item'             => __( 'Editar Histórias', 'text_domain' ),
		'update_item'           => __( 'Atualizar Histórias', 'text_domain' ),
		'view_item'             => __( 'Ver Histórias', 'text_domain' ),
		'search_items'          => __( 'Buscar Histórias', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Fazer upload', 'text_domain' ),
		'items_list'            => __( 'Linha do tempo', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Linha do Tempo', 'text_domain' ),
		'description'           => __( 'Cadastrar história', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'taxonomies'            => array( 'linha_do_tempo' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-calendar-alt',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'linha-do-tempo', $args );
}
add_action( 'init', 'custom_linha_do_tempo', 0 );
?>