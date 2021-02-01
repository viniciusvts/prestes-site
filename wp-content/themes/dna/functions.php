<?php

    // Imagens dos posts
    add_theme_support( 'post-thumbnails' );

      /* PAGINAÇÃO WORDPRESS */
    function wordpress_pagination() {
        global $wp_query;

        $big = 999999999;

        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
        ) );
    }

    function wp_custom_breadcrumbs() { 
        $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '&raquo;'; // delimiter between crumbs
        $home = 'Home'; // text for the 'Home' link
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
        
        global $post;
        $homeLink = get_bloginfo('url');
        
        if (is_home() || is_front_page()) {
        
            if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
        
        } else {
        
            echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        
            if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;
        
            } elseif ( is_search() ) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        
            } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        
            } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        
            } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
        
            } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->menu_name . '</a>';
                if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }
        
            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        
            } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        
            } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;
        
            } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        
            } elseif ( is_tag() ) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        
            } elseif ( is_author() ) {
                global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        
            } elseif ( is_404() ) {
            echo $before . 'Error 404' . $after;
            }
        
            if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }
        
            echo '</div>';
        
            }
    } // end wp_custom_breadcrumbs() 
      

    /* Reescrita blog */
    function add_rewrite_rules( $wp_rewrite ){
        $new_rules = array(
            'blog/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
        );
        $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
    }
    add_action('generate_rewrite_rules', 'add_rewrite_rules'); 

    function change_blog_links($post_link, $id=0){
        $post = get_post($id);
        if( is_object($post) && $post->post_type == 'post'){
            return home_url('/blog/'. $post->post_name.'/');
        }
        return $post_link;
    }
    add_filter('post_link', 'change_blog_links', 1, 3);
    /* End Reescrita blog */


    // IMPORTANTE!!! Precisa chamar esta funcao na single do post ->> chr_setPostViews( get_the_ID() );

    // Set post views count using post meta

    function chr_setPostViews($postID) {
        $countKey = 'post_views_count';
        $count = get_post_meta($postID, $countKey, true);
        
        if($count == ''){
            $count = 0;
            delete_post_meta($postID, $countKey);
            add_post_meta($postID, $countKey, '0');
            return "nenhuma visualzação";
        }elseif( is_single($postID) ){
            $count++;
            update_post_meta($postID, $countKey, $count);
        }
        return $count;
    }

    // Add a new column in the wp-admin posts list
    function chr_posts_column_views( $defaults ) {
        $defaults['post_views'] = __( 'Visualização(ões)' );
        return $defaults;
    }

    // Display the number of views for each posts
    function chr_posts_custom_column_views( $column_name, $id ) {
        if ( $column_name === 'post_views' ) {
            echo chr_setPostViews( get_the_ID() );
        }
    }
    add_filter( 'manage_posts_columns', 'chr_posts_column_views' );
    add_action( 'manage_posts_custom_column', 'chr_posts_custom_column_views', 5, 2 );    

    include("custom_posts/imoveis.php");
    include("custom_posts/revista-prestes.php");
    include("custom_posts/depoimentos.php");
    include("custom_posts/premios.php");
    include("custom_posts/linha-do-tempo.php");
    include("custom_posts/banners.php");
    include("custom_posts/blogBanners.php");
    include("custom_posts/central-atendimento.php");
    include("custom_posts/materiais.php");
    
    include("inc/paginate.php");
    include("inc/loadSources.php");
    include("inc/widgets.php");
    include("inc/customizeLoginScreen.php");
    include("inc/customizer.php");
    include("inc/gCaptchaVerify.php");
    include("inc/disableEndpoints.php");
    include("inc/endpoints.php");
?>