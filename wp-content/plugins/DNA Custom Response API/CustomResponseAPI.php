<?php
/**
 * Plugin Name: DNA Custom Response API
 * Description: This plugin includ some responses in the wordpress rest api
 * Author: Vinicius de Santana
 * Author URI: http://github.com/viniciusvts
 * Email: vinicius.vts@gmail.com
 * Version: 0.1
 * Text Domain: Custom response for RestAPI
 */
function getCategoriesFromID($object){
    $post_api["cidade"] = wp_get_object_terms( $object["id"], 'cidade');
    $post_api["categoria"] = wp_get_object_terms( $object["id"], 'imovel');
    $post_api["estado"] = wp_get_object_terms( $object["id"], 'estado');
    $post_api["postThumbnail"] = get_the_post_thumbnail( $object["id"], 'large', array('class'=>'d-block w-100') );
    return $post_api;
}

//register fields
function create_custom_fields_api_imoveis() {
    //cidade
    register_rest_field( 'imoveis',
        'DNA_custom',
        array(
            'get_callback'    => 'getCategoriesFromID',
            'schema'          => null,
        )
    );
}
add_action( 'rest_api_init', 'create_custom_fields_api_imoveis' );