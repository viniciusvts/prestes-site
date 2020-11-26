<?php
/**
 * Função adiciona defer a todos os scripts na página caso já não a possuam
 * @param String $tag a tag <script src="...
 * @return String $tag a tag <script defer src=...
 * @author Vinicius de Santana
 */
function addDeferToAllScripts($tag){
    if(stripos( 'defer', $tag ) == false){
        return str_replace( '<script ', '<script async ', $tag );
    }
    return $tag;
}
add_filter('script_loader_tag', 'addDeferToAllScripts', 10, 1);