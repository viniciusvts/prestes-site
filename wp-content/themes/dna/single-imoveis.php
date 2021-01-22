<?php
get_header();
$idImovel = get_field('id_do_imovel')
?>
<script> const idImovel = '<?php echo $idImovel; ?>'; </script>

<div class="bd-example" id="slider">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="caption">
          <h1 class="font-lato">
            <?php
              // pegar a categoria tipo de imóvel, se não houver seta o padrão "Imóvel"
              $tiposDeImovelDoPost = wp_get_object_terms( get_the_ID(), 'tipoDeImovel') ;
              if( count( $tiposDeImovelDoPost) ){
                $tipoDeImovel = $tiposDeImovelDoPost[0]->name;
              }else{
                $tipoDeImovel = "Imóvel";
              }
              // pegar a categoria cidade
              $cidadeDoPost = wp_get_object_terms( get_the_ID(), 'cidade') ;
              $cidade = $cidadeDoPost[0]->name;
            ?>
            <p><?php echo( $tipoDeImovel); ?> em <?php echo( $cidade); ?></p>
            <?php
              the_title();
            ?>
          </h1>
          <div>
            <?php
              if( have_rows("informacoes_legais") ){
                while( have_rows("informacoes_legais") ){
                  the_row();
                  $quartos = get_sub_field("quartos");
                  $metragem = get_sub_field("metragem");
                  $vagas = get_sub_field("vagas");
                }
              }
            ?>
            <div class="container-fluid attributes">
              <div class="row no-gutters">
                <?php
                  if($quartos){
                ?>
                <div class="col-4 col-lg-2 mr-auto mr-md-0 ml-auto ml-md-0">
                  <?php echo file_get_contents("wp-content/themes/dna/svg/bed.svg"); ?>
                  <p class="text-center"><?php echo $quartos; ?></p>
                </div>
                <?php
                  }
                  if($metragem){
                ?>
                <div class="col-4 col-lg-2 mr-auto  mr-md-0 ml-auto ml-md-0">
                  <?php echo file_get_contents("wp-content/themes/dna/svg/home.svg"); ?>
                  <p class="text-center pl-hd-20 pr-hd-20"><?php echo $metragem; ?></p>
                </div>
                <?php
                  }
                  if($vagas){
                ?>
                <div class="col-4 col-lg-2 mr-auto  mr-md-0 ml-auto ml-md-0">
                  <?php echo file_get_contents("wp-content/themes/dna/svg/car.svg"); ?>
                  <p class="text-center"><?php echo $vagas; ?></p>
                </div>
                <?php
                  }
                ?>
              </div>
          </div>
          </div>
          <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
        </div>
        <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 img-filter')); ?>
      </div>      
    </div>
  </div>
  <?php 
    $taxs = get_the_taxonomies( 
        get_the_ID(), 
        array('slug' =>'financiamento')
    );
    if( isset($taxs['financiamento']) ){
      // to lower case pq vai que o cidadão muda o case da categoria
      $taxFinanciamento= strtolower($taxs['financiamento']);
      if( strpos( $taxFinanciamento,"minha vida" ) ){
    ?>
    <img src="<?php echo get_template_directory_uri()?>/img/minha-casa-minha-vida-horizontal.jpg" alt="" class="mcmvImgSingle">
    <?php
    }
      }
    ?>
</div>

<div id="development-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-9">
        <?php
          if(have_posts()) : the_post();
            the_content();
          endif; 
        
          if(have_rows('informacoes_adicionais')){
            the_row()
        ?>
        
        <div id="aditional-info">
          <div class="box">
            <div class="container">
              <div class="row">
                <?php
                    $informacoes = get_field('informacoes_adicionais');
                    $informacoes_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                    'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                    'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                    'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                    'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'A'=>'a', 'B'=>'b', 'A'=>'a', ' ' => '-');
                    $size = count($informacoes);
                    if ($size>4){
                      $col = "col-lg-10";
                ?> 
                <div class="carousel-control-prev-icon col-md-1 EPbuttom" onclick="scrollEPL('#car2', '.informa')"></div>
                <?php
                    }else{
                      $col = "col-lg-12";
                    }
                ?>
                <div id="car2" class="estabelecimentos row col-12 <?php echo $col ?>">
                  <?php foreach($informacoes as $informacao): ?>
                    <div class="informa col-6 col-md-4 col-lg-3"> 
                      <?php
                      $str = strtr( $informacao, $informacoes_array );
                      $str = strtolower($str);                  
                      
                      echo file_get_contents("wp-content/themes/dna/svg/". $str . ".svg"); ?>
                      <p><?php echo $informacao; ?></p>
                    </div>
                  <?php endforeach; ?>
                </div>
                <?php if ($size>4){
                ?>
                <div class="carousel-control-next-icon col-md-1 EPbuttom" onclick="scrollEPR('#car2', '.informa')"></div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
        <div id="localization">
          <?php
            $estabelecimentos = get_field('estabelecimentos');
            if($estabelecimentos){
          ?>
          <div class="header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <p>Estabelecimentos próximos</p>
                </div>
                <?php
                    $size = count($estabelecimentos);
                    if ($size>4){
                    $col = "col-lg-10";
                ?>
                <div class="carousel-control-prev-icon col-md-1 EPbuttom" onclick="scrollEPL('#car1, .item')"></div>
                <?php
                  }else{
                    $col = "col-lg-12";
                  }
                ?>
                <div id="car1" class="estabelecimentos row col-12 <?php echo $col; ?>">
                  <?php
                    if($estabelecimentos):
                      $estabelecimentos_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                      'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                      'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                      'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                      'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'A'=>'a', 'B'=>'b', 'A'=>'a', ' ' => '-');
                      foreach($estabelecimentos as $estabelecimento):
                  ?>
                  <div class="item col-6 col-md-4 col-lg-3">
                    <?php
                      $str = strtr( $estabelecimento, $estabelecimentos_array );
                      $str = strtolower($str);
                      echo file_get_contents("wp-content/themes/dna/svg/". $str . ".svg");
                    ?>
                    <h3><?php echo $estabelecimento; ?></h3>
                  </div>
                  <?php
                      endforeach;
                    endif; ?>
                </div>
                <?php
                  if ($size>4){
                ?>
                <div class="carousel-control-next-icon col-md-1 EPbuttom" onclick="scrollEPR('#car1, .item')"></div>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php
            }
            if(get_field('mapa') != false): 
            the_field('mapa');
            endif;
          ?>
        </div>
      </div>
      <div class="col-12 col-lg-3">
        <div class="card">
          <div class="card-body">
              <?php if(get_field('preco_promocional') != false): ?>         
                <div class="preco-promocional">
                  <?php if(get_field('preco') != false): ?>
                  <span>De: <span>
                  <h4><strike>R$ <?php the_field('preco'); ?></strike></h4>
                  <?php endif; ?>
                  <span>Por: </span>
                  <h3>R$ <?php the_field('preco_promocional'); ?></h3>
                </div>
              <?php endif; ?>
              <?php if(get_field('preco_promocional') == false && get_field("preco") !=false ): ?>
                <div class="preco-default">
                  <span>A partir de: <span>
                  <h4>R$ <?php the_field('preco'); ?></h4>
                </div>
              <?php endif; ?>
              <?php if(get_field('preco_promocional') != false || get_field("preco") !=false ): ?>
              <div class="preco-observacao">
                *Ref. Unidade 10001. Válido até 21/09/2019
              </div>
          <?php endif; ?>
              <button class="pegueSeuPresenteSidebar" type="button" data-toggle="modal" data-target="#modalRD">
                <img src="/wp-content/themes/dna/img/clickPresente.png" 
                alt="Pegue seu presente" 
                data-src="/wp-content/themes/dna/img/clickPresente.png" />
              </button>
              <a href="#" onclick="open_pop_up('<?php the_title() ?>')"><button class="btn btn-lg">Faça sua simulação aqui</button></a>
              <a href="mailto:contato@prestes.com"><button class="btn btn-lg">Atendimento por email</button></a>
              <a href="javascript:window.blipClient.toogleChat();"><button class="btn btn-lg">Atendimento Online</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="gallery">
  <div class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5">
          <h2>Galeria</h2>
          <div class="filete"><?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?></div>
        </div>
        <div class="col-md-7">
          <ul id="categories">
            <li class="categories-active"><a href="#todos">Ver todos</a></li>
            <li><a href="#video">Vídeo</a></li>
            <li><a href="#perspectiva">Perspectiva</a></li>
            <li><a href="#planta">Planta</a></li>
            <li><a href="#fachada">Fachada</a></li>            
          </ul>
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
        <!--Looping fachada-->
        <?php
          if( have_rows('video') ): 
            while( have_rows('video') ): the_row();
              $video = get_sub_field('link');
              $link = str_replace('watch?v=', 'embed/', $video);
        ?>
        <div class="col-md-4 filtro video">
          <iframe width="100%" height="290" src="<?php echo $link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <?php
            endwhile; 
          endif;
        ?>

        <!--Looping fachada-->
        <?php
          $images = get_field('perspectiva');
          if($images):
          foreach( $images as $image ):
        ?>
        <div class="col-md-4 filtro perspectiva">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-100 d-block" data-toggle="modal" data-target=".bd-example-modal-xl"/>
        </div>
        <?php
          endforeach;
          endif;
        ?>
        <!--Looping Plantas-->
        <?php
          $images = get_field('planta');
          if($images):
          foreach( $images as $image ):
        ?>
        <div class="col-md-4 filtro planta">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-100 d-block" data-toggle="modal" data-target=".bd-example-modal-xl"/>
        </div>
        <?php
          endforeach;
          endif;
        ?>

        <!--Looping Plantas-->
        <?php
          $images = get_field('fachada');
          if($images):
          foreach( $images as $image ):
        ?>
        <div class="col-md-4 filtro fachada">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-100 d-block" data-toggle="modal" data-target=".bd-example-modal-xl"/>
        </div>
        <?php
          endforeach;
          endif;
        ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <img src="" class="w-100 d-block">
    </div>
  </div>
</div>


<?php if( have_rows('andamento') ): ?>
<div id="status">
  <div class="container-fluid">
  <h2>Andamento da Obra</h2>
    <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
    <div class="row">
      <?php        
        while( have_rows('andamento') ): the_row(); 
          if( have_rows('estagio') ): 
            while( have_rows('estagio') ): the_row();
              $andamento = get_sub_field('etapa');
              $porcentagem = get_sub_field('porcentagem');
              $porcentagem_resto = 100 - $porcentagem;
              ?>            
              <div class="col-md-6">
                <div class="row">
                  <div class="loadbar">
                    <div class="load" style="width:<?php echo $porcentagem; ?>%"></div>
                    <div class="bar" style="width:<?php echo $porcentagem_resto; ?>%"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col"><p class="left"><?php echo $andamento; ?></p></div>
                  <div class="col"><p class="right"><?php echo $porcentagem . "%"; ?></p></div>
                </div>
              </div>
            <?php
            endwhile;
          endif;
        endwhile;
      ?>
    </div>
  </div>
</div>
<?php endif; ?>

<section id="consultant">
  <h2>Fale com um consultor</h2>
  <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
  <form method="POST" action="<?php echo bloginfo( "url" ) ?>/wp-json/dna_theme/v1/falecomconsultorempreedimento/"
  id="falecomconsultorempreedimento">
    <div class="form animar">
      <h3>Preencha todos os dados para que um de nossos corretores possa entrar em contato</h3>
      <label>
        Seu nome*
        <input type="text" name="name" id="name" required>
      </label>
      <label>
        E-mail*
        <input type="email" name="email" id="email" required>
      </label>
      <label>
        Telefone*
        <input type="text" name="telefone" id="telInput" required>
      </label>
      <input type="hidden" name="urlOrigem" value="<?php echo $_SERVER["REQUEST_URI"] ?>">
      <input type="hidden" name="converteuEm" value="Fale com um consultor - empreendimento">
      <input type="hidden" name="empreendimentocliente" value="<?php the_title() ?>">
      <input type="hidden" name="idempreendimento" value="<?php echo get_field('id_do_imovel'); ?>">
      <input type="hidden" name="falecomconsultorempreedimento" value="<?php echo $_SERVER["REQUEST_URI"] ?>">
      <input type="hidden" name="traffic_source" id="traffic_source">
      <input type="hidden" name="traffic_medium" id="traffic_medium">
      <input type="hidden" name="traffic_campaign" id="traffic_campaign">
      <input type="hidden" name="traffic_value" id="traffic_value">
      <p>*Campos obrigatórios</p>
      <hr>
      <p>Fique tranquilo, suas informações estarão seguras conosco. Nós prometemos não utilizar para enviar quaisquer tipo de SPAM.</p>
      <div class="container">
        <div class="row">
          <div class="blockPress-btn">
            <div class="bttn">
              <input type="submit" value="Agende uma conversa">
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script>
    /** https://www.w3schools.com/js/js_cookies.asp */
    function getCookie(cname) {
      let name = `${cname}=`;
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(";");
      for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === " ") {
          c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }
    /**
    * Pega parametros passados pela uri
    * @param {String} param - parâmetro que se quer pegar
    * @author Vinicius de Santana
    */
    function getUriParam(param) {
      var params = window.location.search.substr(1).split('&');
      for (var i = 0; i < params.length; i++) {
        var par = params[i].split('=');
        if (par[0] == param) {
          return decodeURIComponent(par[1]);
        }
      }
      return '';
    }
    document.querySelector('form#falecomconsultorempreedimento #traffic_source').value = getUriParam('utm_source') ? getUriParam('utm_source') : getCookie('__trf.src')
    document.querySelector('form#falecomconsultorempreedimento #traffic_medium').value = getUriParam('utm_medium')
    document.querySelector('form#falecomconsultorempreedimento #traffic_campaign').value = getUriParam('utm_campaign')
    document.querySelector('form#falecomconsultorempreedimento #traffic_value').value = getUriParam('utm_term')
    // envia o formulário
    document.getElementById('falecomconsultorempreedimento').addEventListener('submit',function(evt){
      // valida telefone
      if(evt.target.querySelector('#telInput').value.length < 14){
          evt.preventDefault()
          alert('Número de telefone incorreto')
      }
      evt.preventDefault()
      const formData = new FormData(evt.target)
      const url = evt.target.action
      fetch(url,  {
        method: "POST",
        body: formData
      })
      .then(resp => {
        console.log('resp=> ', resp)
        if (resp.ok) return resp.json()
        alert('Houve um erro ao enviar,\nTente novamente.')
      })
      .then(json => {
        console.log('json=> ', json)
        location.href = json.data.url
      })
    })
  </script>
</section>

<!-- Modal e Script do RD para apresentar o form-->
<div class="modal fade" id="modalRD" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div role="main" id="desconto-exclusivo-4f50972099a8d1e3eb01"></div>
      </div>
    </div>
  </div>
</div>
<style>
@media (max-width: 500px){
  #bricks-component-MqfsG1AR8x3JbiK6D9zA1Q{
    width: 100% !important;
  }
  #rd-text-joq3m2m5h p, #rd-text-joq3m2m5h p{
    text-align: center !important;
  }
  #rd-row-k1ujc7x0{
    display: flex !important;
    flex-wrap: wrap !important;
  }
  #rd-column-k1ujc7x1, #rd-column-kd50f8vi{
    flex: 0 0 100% !important;
    max-width: 100% !important;
    position: relative !important;
    width: 100% !important;
  }
}
</style>
<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/rdstation-forms/stable/rdstation-forms.min.js"></script>
<script type="text/javascript"> new RDStationForms('desconto-exclusivo-4f50972099a8d1e3eb01', 'UA-100759079-1').createForm();</script>

<?php get_footer(); ?>