<?php
function custom_blogBanner() {
	$labels = array(
		'name'                  => _x( 'Blog Banners Institucionais', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Blog Banners Institucionais', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Blog Banners Institucionais', 'text_domain' ),
		'name_admin_bar'        => __( 'Blog Banners Institucionais', 'text_domain' ),
		'archives'              => __( 'Blog Banners Institucionais Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os Blog banners', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo Blog Banner', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo Blog banner', 'text_domain' ),
		'edit_item'             => __( 'Editar Blog banner', 'text_domain' ),
		'update_item'           => __( 'Atualizar Blog banner', 'text_domain' ),
		'view_item'             => __( 'Ver Blog banner', 'text_domain' ),
		'search_items'          => __( 'Buscar Blog banner', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem Blog banner', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no Blog banner', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para Blog banner', 'text_domain' ),
		'items_list'            => __( 'Lista de Blog banner', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos Blog banner', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar Blog banner', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Blog Banners Institucionais', 'text_domain' ),
		'description'           => __( 'Cadastrar Blog banner', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'categoria_blogbanners' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-format-gallery',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'blog-banners', $args );
}
add_action( 'init', 'custom_blogBanner', 0 );
?>