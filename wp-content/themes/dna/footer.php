
  <?php get_template_part( 'template/floater'); ?>
    <section class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3 animar">
            <a href="<?php bloginfo('url'); ?>">
              <img src="<?php bloginfo('template_url');?>/img/icon.png" alt="icone da prestes">
            </a>
            <!--<p>Lorem ipsum dolor sit amet, elitr tincidunt forensibus vim ea, ei pro autem malis habemus. Diam appetere democritum sed ea, his cu noster aeterno, possit iriure reprehendunt pri no. Ea modo iudico iriure per, porro nostro convenire id pri. An ius fierent gubergren disputando, at pro quod ipsum legere.</p>-->     
            <div class="social">
              <a href="https://www.facebook.com/prestesconstrutora/" target="_blank"><?php echo file_get_contents("wp-content/themes/dna/svg/facebook.svg"); ?></a>
              <a href="https://www.instagram.com/prestesconstrutora/" target="_blank"><?php echo file_get_contents("wp-content/themes/dna/svg/instagram.svg"); ?></a>
              <a href="https://www.youtube.com/channel/UC1ZiUWNy6x8gYp-j-I8F05g/" target="_blank"><?php echo file_get_contents("wp-content/themes/dna/svg/youtube.svg"); ?></a>
            </div>
          </div>
          <div class="col-md-3 animar"> 
            <h4><?php echo(get_theme_mod( 'dnaTheme_setting_MenuFooterName1')); ?></h4>
            <?php 
            wp_nav_menu(
              array(
                'container' => false,
                'theme_location' => 'menu-footer-1',
                'depth' => 1,
              )
            ); 
            ?>
          </div>
          <div class="col-md-3 animar">  
            <h4><?php echo(get_theme_mod( 'dnaTheme_setting_MenuFooterName2')); ?></h4>
            <?php 
            wp_nav_menu(
              array(
                'container' => false,
                'theme_location' => 'menu-footer-2',
                'depth' => 1,
              )
            ); 
            ?>
          </div>
          <div class="col-md-3 animar">
            <a href="<?php echo bloginfo( "url" ); ?>/central-de-vendas/">
              <h4><?php echo(get_theme_mod( 'dnaTheme_setting_MenuFooterName3')); ?></h4>
            </a>
            <ul>
              <?php 
              $tel = get_theme_mod( 'dnaTheme_setting_contatoTel');
              $telJustNumber = preg_replace("/[^0-9]/", "", $tel);
              $email = get_theme_mod( 'dnaTheme_setting_contatoEmail');
              $end = get_theme_mod( 'dnaTheme_setting_contatoEnd');
              $city = get_theme_mod( 'dnaTheme_setting_contatoCity');
              /* job #17676: se est?? na taxonomia cidade,
              mostra o telefone da cidade correspondente
              se est?? no empreendimento, pega a cidade do empreendimento
              e mostra o telefone de l??
              se nenhuma das anteriores mostra a op????o setada pelo usu??rio em personalizar
              Lembrando que se usu??rio estiver em uma cidade conhecida, o javascript vai sobrescrever tudo*/
              if(is_tax('cidade')){
                $taxSlug = get_queried_object()->slug;
                
              } else if(is_singular('imoveis')) {
                $postID = get_queried_object()->ID;
                $taxSlug = wp_get_post_terms($postID, 'cidade')[0]->slug;
              }
              // se definiu o slug da taxonomia
              if(isset($taxSlug)){
                $query = new WP_Query(
                  array(
                    'post_type' => 'central',
                    'name' => $taxSlug
                  )
                );
                $centralDeVendas = $query->posts;
              }
              // se encontrou uma central de vendas
              if(isset($centralDeVendas[0])){
                $tel = get_field('tel', $centralDeVendas[0]->ID);
                $telJustNumber = preg_replace("/[^0-9]/", "", $tel);
                $email = get_field('email', $centralDeVendas[0]->ID);
                $end = get_field('ends', $centralDeVendas[0]->ID)[0]['end'];
                $city = get_field('cidade', $centralDeVendas[0]->ID);
              }
              ?>
              <a id="cdv-tel-a" href="tel:<?php echo($telJustNumber); ?>">
                <li id="cdv-tel"><?php echo($tel); ?></li>
              </a>
              <a id="cdv-email-a" href="mailto:<?php echo($email); ?>"><li id="cdv-email"><?php echo($email); ?></li></a>
              <li>
                <div id="cdv-end"><?php echo($end); ?></div>
                <div id="cdv-cidade"><?php echo($city); ?></div>
              </li>
            </ul> 
            
            <h4>Relacionamento com cliente</h4>
            
            <ul>
              <?php 
              $tel = "(42) 3122-6100";
              $telJustNumber = preg_replace("/[^0-9]/", "", $tel);
              $cel = " (42) 99865-0084";
              $celJustNumber = preg_replace("/[^0-9]/", "", $cel);
              ?>
              <a href="tel:<?php echo($telJustNumber); ?>">
                <li>Fone: <?php echo($tel); ?> (fixo)</li>
              </a>
              <a target="_blank" href="https://api.whatsapp.com/send?phone=5542998650084">
                <li>Celular: <?php echo($cel); ?></li>
              </a>
            </ul>        
            
            
            
          </div>
          <div class="col-md-12 animar">
            <hr>
            <p class="signature">Prestes Construtora e Incorporadora | Todos os direitos reservados.</p>      
          </div>
        </div>
      </div>
    </section>
    
    <!--wp_footer()-->
    <?php wp_footer(); ?>
    <!--end wp_footer()-->
    <script src="https://prestescontrutora.housecrm.com.br/track/origem.js"></script>
    <script language="javascript">
      var hc_dominio_chat	= "prestesconstrutora.housecrm.com.br"; //dominio nao pode conter http://
      var hc_filial	= "";
      //var hc_color	= "green";//chat pro ativo
      //var hc_empreendimento	= "";//chat pro ativo
      var hc_https = 1; //https
    </script>
  </body>
</html>
