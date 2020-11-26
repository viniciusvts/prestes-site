<?php
function custom_revista_prestes() {
	$labels = array(
		'name'                  => _x( 'Revista Prestes', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Revista Prestes', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Revista Prestes', 'text_domain' ),
		'name_admin_bar'        => __( 'Revista Prestes', 'text_domain' ),
		'archives'              => __( 'Revista Prestess Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os artigos', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar artigo', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo Revista Prestes', 'text_domain' ),
		'edit_item'             => __( 'Editar Revista Prestes', 'text_domain' ),
		'update_item'           => __( 'Atualizar Revista Prestes', 'text_domain' ),
		'view_item'             => __( 'Ver Revista Prestes', 'text_domain' ),
		'search_items'          => __( 'Buscar Revista Prestes', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem Revista Prestes', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no Revista Prestes', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para Revista Prestes', 'text_domain' ),
		'items_list'            => __( 'Lista de Revista Prestess', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos Revista Prestess', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar Revista Prestess', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'revista_prestes', 'text_domain' ),
		'description'           => __( 'Cadastrar Revista Prestess', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail','editor', ),
		'taxonomies'            => array( 'categoria_revista_prestes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-text-page',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'revista-prestes', $args );
}
add_action( 'init', 'custom_revista_prestes', 0 );

?>