<?php
/**
 * Carrega o css e o javascript que customiza a tela de login do wordpress
 */
function custom_login_css() {
    $sources = '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/css/wpadmin.css"/>';
    $sources .= '<script defer src="'.get_stylesheet_directory_uri().'/js/wpadmin.js"/></script>';
    echo $sources;
}
add_action('login_head', 'custom_login_css');