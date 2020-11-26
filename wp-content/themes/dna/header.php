<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/icon.png" type="image/x-icon">
    <title>Prestes Imobiliária</title>

    <?php wp_head(); ?>

  </head>
  <body>
    <div class="blockpress-nav-over">
      <nav id="menu" class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo("template_url"); ?>/img/icon.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02,#navbarTogglerDemo03" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <div class="ml-auto bp-ddmenu">

          <!--SearchForm-->
            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>">              
                <?php wp_dropdown_categories( array(
                  'show_option_all' => 'Cidade',
                  'orderby' => 'name',
                  'echo' => 1,
                  'selected' => $cat,
                  'hide_empty'         => 1,
                  'name' => 'cidade',
                  'hierarchical' => true,
                  'id'	=> 'custom-cat-drop',//há um evento no javascript capturando este id
                  'value_field' => 'slug',
                  'taxonomy' => 'cidade'
                ) ); ?>
                <div class="blockPress-btn">
                  <a href="#0" class="bttn" ><input type="submit" id="searchsubmit" value="Buscar Imóvel" /></a>
                </div>
            </form>
          <!--End SearchForm-->
          </div>

          <ul class="options my-2 my-lg-0">
            <li>
              <?php echo file_get_contents("wp-content/themes/dna/svg/placeholder-filled-point.svg"); ?>
              <a href="<?php bloginfo( "url" ); ?>/mapa">Mapa</a>
            </li>
            <li>
              <?php echo file_get_contents("wp-content/themes/dna/svg/navigation.svg"); ?>
              <a href="#"id="citylink">Ponta Grossa/PR</a>
            </li>
            <li class="border-menu-top menu-desktop">
              <a href="#navbarTogglerDemo03" data-toggle="collapse" role="button" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false">
                <?php echo file_get_contents("wp-content/themes/dna/svg/menu.svg"); ?>Menu
              </a>
            </li>
            <li class="border-menu-top menu-mobile">
              <a href="#_">
                <?php echo file_get_contents("wp-content/themes/dna/svg/menu.svg"); ?>Menu
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <div id="navbarTogglerDemo03" class="collapse">
        <div class="mr-auto ml-auto">
          <?php 
          wp_nav_menu(
            array(
              'menu_class' => 'nav justify-content-center options',
              'container' => false,
              'theme_location' => 'main-menu',
              'depth' => 1,
            )
          ); 
          ?>
        </div>
      </div>
    </div>
    <?php
    if(is_single()){
      include 'template/pop-up-simulador.php';
    } 
    include 'template/locationSidebar.php';
    ?>
  <!--/body-->
<!--/html-->