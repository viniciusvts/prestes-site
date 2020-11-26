<?php
/**
 * Adiciona os scripts e folha de estilos ao site
 *
 * @package DNA
 * @subpackage loadSources
 * @author Vinicius de Santana
 */
function add_css_and_js() {
  //scripts: wp_enqueue_script( $nome, $origem, $dependencia, $versao, $rodape );
  $jsInternalPath = get_template_directory() . "/"."js/";
  $jsUriPath = get_template_directory_uri() . "/"."js/";

  $archive = 'jquery.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, true);

  $archive = 'pop-up-simulador.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, true);
  
  $archive = 'owl.carousel.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('jquery.min.js'), $fileVersion, true);

  $archive = 'popper.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('jquery.min.js'), $fileVersion, true);
  
  $archive = 'bootstrap.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('jquery.min.js','popper.min.js'), $fileVersion, true);
  
  $archive = 'ScrollMagic.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('jquery.min.js'), $fileVersion, true);
  
  $archive = 'debug.addIndicators.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('ScrollMagic.min.js'), $fileVersion, true);

  $archive = 'main.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('jquery.min.js', 'ScrollMagic.min.js', 'owl.carousel.min.js'), $fileVersion, true);
  
  if(is_page('mapa')) {//caso a página seja mapa
    
    $archive = 'leaflet.js';
    $urlPath = $jsUriPath . $archive;
    $internalPath = $jsInternalPath . $archive;
    $fileVersion = filemtime($internalPath);
    wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, true);
    
    $archive = 'scriptmaps.js';
    $urlPath = $jsUriPath . $archive;
    $internalPath = $jsInternalPath . $archive;
    $fileVersion = filemtime($internalPath);
    wp_enqueue_script( $archive, $urlPath, array ('leaflet.js'), $fileVersion, true);
  }
  /*if(is_page('simulacao')) {//caso a página seja simulador
    $archive = 'simulator.js';
    $urlPath = $jsUriPath . $archive;
    $internalPath = $jsInternalPath . $archive;
    $fileVersion = filemtime($internalPath);
    wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, true);
  } */
  //###############################################################################################
  //styles: wp_enqueue_style( $nome, $origem, $dependencia, $versao, $media );
  $media = 'all';
  $cssInternalPath = get_template_directory() . "/"."css/";
  $cssUriPath = get_template_directory_uri() . "/"."css/";

  $archive = 'bootstrap.min.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );

  $archive = 'owl.carousel.min.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );

  $archive = 'owl.theme.default.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );
  
  $archive = 'main.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );
}
//do it
add_action( 'wp_enqueue_scripts', 'add_css_and_js' );

//examples
/*
if(is_page('contato')) {
  wp_enqueue_script('form-contato', get_template_directory_uri() . '/js/formulario.js', array(), '1.2', true);
}
*/