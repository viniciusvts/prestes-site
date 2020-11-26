<?php

// todos os menus
register_nav_menus (
  array (
  	'main-menu' => 'Menu Principal DNA',
    'menu-footer-1' => 'Menu Footer 01',
    'menu-footer-2' => 'Menu Footer 02',
  )
);

/**
 * Adiciona  opções de personalização para o usuário no menu Aparencia >> personalização
 *
 * @package DNA
 * @subpackage Lafaete tema
 * @author Vinicius de Santana
 */
add_action('customize_register','dnaTheme_register_panelsAndSections');
function dnaTheme_register_panelsAndSections( $wp_customize ) {
  // start panel
  $dnaTheme_panel = array(
    'priority'       => 10,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => 'Tema DNA',
   'description'    => 'Editar opções do tema DNA',
  );
  $wp_customize->add_panel( 'dnaTheme_panel', $dnaTheme_panel);
  // end panel

  // start sections //
  $dnaTheme_section_sobre = array(
    'title' => 'Página sobre', 
    'priority'          => 80,
    'panel'  => 'dnaTheme_panel',
  );
  $wp_customize->add_section('dnaTheme_section_sobre', $dnaTheme_section_sobre);

  $dnaTheme_section_Footer = array(
    'title' => 'Footer', 
    'priority'          => 90,
    'panel'  => 'dnaTheme_panel',
  );
  $wp_customize->add_section('dnaTheme_section_Footer', $dnaTheme_section_Footer);

  $dnaTheme_section_Headers = array(
    'title' => 'Headers', 
    'priority'          => 85,
    'panel'  => 'dnaTheme_panel',
  );
  $wp_customize->add_section('dnaTheme_section_Headers', $dnaTheme_section_Headers);
  // end sections //

	// start settings and controls
  /* https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control => type: text, checkbox, radio, select, textarea, dropdown-pages, email, url, number, hidden, and date.*/
 
  $dnaTheme_setting_MenuFooterName1 = array( 
    'default' => 'Menu',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_MenuFooterName1 = array(
    'label' => 'Nome do menu 1 do footer',
    'section' => 'dnaTheme_section_Footer',
    'settings' => 'dnaTheme_setting_MenuFooterName1',
  );
  $wp_customize->add_setting('dnaTheme_setting_MenuFooterName1', $dnaTheme_setting_MenuFooterName1);
  $wp_customize->add_control('dnaTheme_control_MenuFooterName1', $dnaTheme_control_MenuFooterName1);


  $dnaTheme_setting_MenuFooterName2 = array( 
    'default' => 'Localidades',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_MenuFooterName2 = array(
    'label' => 'Nome do menu 2 do footer',
    'section' => 'dnaTheme_section_Footer',
    'settings' => 'dnaTheme_setting_MenuFooterName2',
  );
  $wp_customize->add_setting('dnaTheme_setting_MenuFooterName2', $dnaTheme_setting_MenuFooterName2);
  $wp_customize->add_control('dnaTheme_control_MenuFooterName2', $dnaTheme_control_MenuFooterName2);


  $dnaTheme_setting_MenuFooterName3 = array( 
    'default' => 'Central de Vendas',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_MenuFooterName3 = array(
    'label' => 'Nome do menu 3 do footer',
    'section' => 'dnaTheme_section_Footer',
    'settings' => 'dnaTheme_setting_MenuFooterName3',
  );
  $wp_customize->add_setting('dnaTheme_setting_MenuFooterName3', $dnaTheme_setting_MenuFooterName3);
  $wp_customize->add_control('dnaTheme_control_MenuFooterName3', $dnaTheme_control_MenuFooterName3);


  $dnaTheme_setting_contatoTel = array( 
    'default' => '(42) 99845 - 0001',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_contatoTel = array(
    'label' => 'Numero do contato que será exibido por padrão no footer',
    'section' => 'dnaTheme_section_Footer',
    'settings' => 'dnaTheme_setting_contatoTel',
  );
  $wp_customize->add_setting('dnaTheme_setting_contatoTel', $dnaTheme_setting_contatoTel);
  $wp_customize->add_control('dnaTheme_control_contatoTel', $dnaTheme_control_contatoTel);


  $dnaTheme_setting_contatoEmail = array( 
    'default' => 'contato@prestes.com.br',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_contatoEmail = array(
    'label' => 'Email do contato que será exibido por padrão no footer',
    'section' => 'dnaTheme_section_Footer',
    'settings' => 'dnaTheme_setting_contatoEmail',
  );
  $wp_customize->add_setting('dnaTheme_setting_contatoEmail', $dnaTheme_setting_contatoEmail);
  $wp_customize->add_control('dnaTheme_control_contatoEmail', $dnaTheme_control_contatoEmail);


  $dnaTheme_setting_contatoEnd = array( 
    'default' => 'Rua Nestor Guimarães, 111',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_contatoEnd = array(
    'label' => 'Endereço do contato que será exibido por padrão no footer',
    'section' => 'dnaTheme_section_Footer',
    'settings' => 'dnaTheme_setting_contatoEnd',
  );
  $wp_customize->add_setting('dnaTheme_setting_contatoEnd', $dnaTheme_setting_contatoEnd);
  $wp_customize->add_control('dnaTheme_control_contatoEnd', $dnaTheme_control_contatoEnd);


  $dnaTheme_setting_contatoCity = array( 
    'default' => 'Ponta Grossa',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_contatoCity = array(
    'label' => 'Cidade do contato que será exibido por padrão no footer',
    'section' => 'dnaTheme_section_Footer',
    'settings' => 'dnaTheme_setting_contatoCity',
  );
  $wp_customize->add_setting('dnaTheme_setting_contatoCity', $dnaTheme_setting_contatoCity);
  $wp_customize->add_control('dnaTheme_control_contatoCity', $dnaTheme_control_contatoCity);

  $dnaTheme_setting_missao = array( 
    'default' => '',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_missao = array(
    'label' => 'Texto a ser exibido em missão',
    'section' => 'dnaTheme_section_sobre',
    'settings' => 'dnaTheme_setting_missao',
  );
  $wp_customize->add_setting('dnaTheme_setting_missao', $dnaTheme_setting_missao);
  $wp_customize->add_control('dnaTheme_control_missao', $dnaTheme_control_missao);

  $dnaTheme_setting_visao = array( 
    'default' => '',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_visao = array(
    'label' => 'Texto a ser exibido em visão',
    'section' => 'dnaTheme_section_sobre',
    'settings' => 'dnaTheme_setting_visao',
  );
  $wp_customize->add_setting('dnaTheme_setting_visao', $dnaTheme_setting_visao);
  $wp_customize->add_control('dnaTheme_control_visao', $dnaTheme_control_visao);

  $dnaTheme_setting_valor = array( 
    'default' => '',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_valor = array(
    'label' => 'Texto a ser exibido em valor',
    'section' => 'dnaTheme_section_sobre',
    'settings' => 'dnaTheme_setting_valor',
  );
  $wp_customize->add_setting('dnaTheme_setting_valor', $dnaTheme_setting_valor);
  $wp_customize->add_control('dnaTheme_control_valor', $dnaTheme_control_valor);

  $dnaTheme_setting_projeto = array( 
    'default' => '',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_projeto = array(
    'label' => 'Texto a ser exibido em projeto vida',
    'section' => 'dnaTheme_section_sobre',
    'settings' => 'dnaTheme_setting_projeto',
  );
  $wp_customize->add_setting('dnaTheme_setting_projeto', $dnaTheme_setting_projeto);
  $wp_customize->add_control('dnaTheme_control_projeto', $dnaTheme_control_projeto);
  
  // setting a image control to search page
  $dnaTheme_setting_ImgHeadSearch = array( 
    'default' => get_template_directory_uri() . '/img/destaque-institucional.jpg',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_ImgHeadSearch = array(
    'label' => 'imagem do header da página de busca',
    'section' => 'dnaTheme_section_Headers',
    'settings' => 'dnaTheme_setting_ImgHeadSearch',
  );
  $wp_customize->add_setting('dnaTheme_setting_ImgHeadSearch', $dnaTheme_setting_ImgHeadSearch);
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize, 
      'dnaTheme_control_ImgHeadSearch',
      $dnaTheme_control_ImgHeadSearch
    )
  );
  
  // setting a image control to tax cidade
  $dnaTheme_setting_ImgHeadTaxCidade = array( 
    'default' => get_template_directory_uri() . '/img/destaque-aquarela.jpg',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_ImgHeadTaxCidade = array(
    'label' => 'imagem do header da taxonomia cidade',
    'section' => 'dnaTheme_section_Headers',
    'settings' => 'dnaTheme_setting_ImgHeadTaxCidade',
  );
  $wp_customize->add_setting('dnaTheme_setting_ImgHeadTaxCidade', $dnaTheme_setting_ImgHeadTaxCidade);
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize, 
      'dnaTheme_control_ImgHeadTaxCidade',
      $dnaTheme_control_ImgHeadTaxCidade
    )
  );

  // setting a image control to tax estado
  $dnaTheme_setting_ImgTaxEstado = array( 
    'default' => get_template_directory_uri() . '/img/destaque-institucional.jpg',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_ImgHeadTaxEstado = array(
    'label' => 'imagem do header da taxonomia estado',
    'section' => 'dnaTheme_section_Headers',
    'settings' => 'dnaTheme_setting_ImgTaxEstado',
  );
  $wp_customize->add_setting('dnaTheme_setting_ImgTaxEstado', $dnaTheme_setting_ImgTaxEstado);
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize, 
      'dnaTheme_control_ImgHeadTaxEstado',
      $dnaTheme_control_ImgHeadTaxEstado
    )
  );

  // setting a image control to tax imovel
  $dnaTheme_setting_ImgTaxImovel = array( 
    'default' => get_template_directory_uri() . '/img/destaque-institucional.jpg',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_ImgHeadTaxImovel = array(
    'label' => 'imagem do header da taxonomia imovel',
    'section' => 'dnaTheme_section_Headers',
    'settings' => 'dnaTheme_setting_ImgTaxImovel',
  );
  $wp_customize->add_setting('dnaTheme_setting_ImgTaxImovel', $dnaTheme_setting_ImgTaxImovel);
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize, 
      'dnaTheme_control_ImgHeadTaxImovel',
      $dnaTheme_control_ImgHeadTaxImovel
    )
  );

  // setting a image control to tax regiao
  $dnaTheme_setting_ImgTaxRegiao = array( 
    'default' => get_template_directory_uri() . '/img/destaque-institucional.jpg',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_ImgHeadTaxRegiao = array(
    'label' => 'imagem do header da taxonomia regiao',
    'section' => 'dnaTheme_section_Headers',
    'settings' => 'dnaTheme_setting_ImgTaxRegiao',
  );
  $wp_customize->add_setting('dnaTheme_setting_ImgTaxRegiao', $dnaTheme_setting_ImgTaxRegiao);
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize, 
      'dnaTheme_control_ImgHeadTaxRegiao',
      $dnaTheme_control_ImgHeadTaxRegiao
    )
  );

  // setting a image control to tax financiamento
  $dnaTheme_setting_ImgTaxFinanc = array( 
    'default' => get_template_directory_uri() . '/img/destaque-institucional.jpg',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_ImgHeadTaxFinanc = array(
    'label' => 'imagem do header da taxonomia financiamento',
    'section' => 'dnaTheme_section_Headers',
    'settings' => 'dnaTheme_setting_ImgTaxFinanc',
  );
  $wp_customize->add_setting('dnaTheme_setting_ImgTaxFinanc', $dnaTheme_setting_ImgTaxFinanc);
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize, 
      'dnaTheme_control_ImgHeadTaxFinanc',
      $dnaTheme_control_ImgHeadTaxFinanc
    )
  );

  // setting a image control to tax financiamento
  $dnaTheme_setting_ImgTaxFinanc = array( 
    'default' => get_template_directory_uri() . '/img/destaque-institucional.jpg',
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_ImgHeadTaxFinanc = array(
    'label' => 'imagem do header da taxonomia financiamento',
    'section' => 'dnaTheme_section_Headers',
    'settings' => 'dnaTheme_setting_ImgTaxFinanc',
  );
  $wp_customize->add_setting('dnaTheme_setting_ImgTaxFinanc', $dnaTheme_setting_ImgTaxFinanc);
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize, 
      'dnaTheme_control_ImgHeadTaxFinanc',
      $dnaTheme_control_ImgHeadTaxFinanc
    )
  );
  // end setting and controls
}

/**
 * Registra widgets áreas
 * @author Vinicius de Santana
 */
function dna_register_sidebar(){
  $after_title = '</div><div class="bp-category-line"><svg id="Grupo_9095" data-name="Grupo 9095" xmlns="http://www.w3.org/2000/svg" width="398" height="3" viewBox="0 0 398 3"><rect id="Retângulo_311" data-name="Retângulo 311" width="132.667" height="3" fill="#fc0"></rect><rect id="Retângulo_312" data-name="Retângulo 312" width="132.667" height="3" transform="translate(132.667)" fill="#8eb71b"></rect><rect id="Retângulo_313" data-name="Retângulo 313" width="132.667" height="3" transform="translate(265.333)" fill="#00a0ad"></rect></svg></div>';
  $args = array(
    'name'          => 'Sidebar widget area',
    'id'            => 'sidebar_area',
    'description'   => 'Área para inserir widgets na sidebar',
    'before_widget' => '<div class="bp-category">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="bp-category-title text-uppercase">',
    'after_title'   => $after_title,
  );

  register_sidebar($args);
}
    
add_action( 'widgets_init', 'dna_register_sidebar' );
