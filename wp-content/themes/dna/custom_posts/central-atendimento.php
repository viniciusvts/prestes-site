<?php
function custom_central() {
	$labels = array(
		'name'                  => _x( 'Central de atendimento', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Central de atendimento', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Central de atendimento', 'text_domain' ),
		'name_admin_bar'        => __( 'Central de atendimento', 'text_domain' ),
		'archives'              => __( 'Central de atendimento Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos as centrais', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar nova central', 'text_domain' ),
		'add_new'               => __( 'Adicionar nova', 'text_domain' ),
		'new_item'              => __( 'Nova central', 'text_domain' ),
		'edit_item'             => __( 'Editar central', 'text_domain' ),
		'update_item'           => __( 'Atualizar central', 'text_domain' ),
		'view_item'             => __( 'Ver central', 'text_domain' ),
		'search_items'          => __( 'Buscar central', 'text_domain' ),
		'not_found'             => __( 'Nenhuma cadastrada', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhuma na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem da central', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir na central', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para central', 'text_domain' ),
		'items_list'            => __( 'Lista de centrais', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelas centrais', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar centrais', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Central de atendimento', 'text_domain' ),
		'description'           => __( 'Cadastrar central', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'categoria_central' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		"show_in_rest"			=> true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-phone',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'central', $args );
}
add_action( 'init', 'custom_central', 0 );
?>