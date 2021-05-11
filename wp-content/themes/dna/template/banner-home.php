<div class="bd-example slider-home" id="slider">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <h1 class="d-none">Prestes Construtora Incorporação Imobiliária no Paraná</h1>
    <ol class="carousel-indicators">
      <?php
        // imoveis
        $imovel = new WP_Query(
          array(
            'post_type' => 'imoveis',
            'posts_per_page'=>'10',
            'tax_query' => array(
              array(
                'taxonomy' => 'imovel',
                'field' => 'slug',
                'terms' => 'exibe-na-home	'
              )
            )
          )
        );
        $idsImoveis = [];
        while($imovel->have_posts()): $imovel->the_post();
          $idsImoveis[] = get_the_id( );
        endwhile;
        wp_reset_postdata(  );
        // banners
        $banners = new WP_Query(array('post_type' => 'banners', 'orderby' => 'date', 'posts_per_page'=>'10') );
        $idsBanners = [];
        while($banners->have_posts()): $banners->the_post();
          $idsBanners[] = get_the_id( );
        endwhile;
        wp_reset_postdata(  );
        $sizeBanners = count($idsBanners);
        $sizeImoveis = count($idsImoveis);
        $size = $sizeBanners>$sizeImoveis?$sizeBanners:$sizeImoveis;
        for($slide = 0; $slide < $sizeImoveis+$sizeBanners; $slide++){
      ?>
      <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $slide; ?>" class="<?php if($slide == 0) : echo "active"; endif; ?>"></li>
      <?php
        }
      ?>
    </ol>
    <div class="carousel-inner">
      <?php
        $first = true;
        for($slide = 0 ; $slide<$size ; $slide++){
          if(isset($idsBanners[$slide])){
            $fieldsBanner = get_fields( $idsBanners[$slide] );
      ?>
      <!--banner-->
      <div class="carousel-item <?php if($first): echo "active"; $first = false; endif; ?>">
        <a href="<?php echo $fieldsBanner["link"] ?>">
            <?php
            if(!isset($fieldsBanner['video_or_mage']) || $fieldsBanner['video_or_mage'] == 'i'){
            ?>
            <img class="d-block w-100 wp-post-image" src="<?php echo $fieldsBanner["imagem"]["url"] ?>" alt="<?php echo $fieldsBanner["imagem"]["alt"] ?>" srcset="<?php echo $fieldsBanner["imagem"]["url"]?>">
            <?php
            } else if($fieldsBanner['video_or_mage'] == 'v'){
            ?>
            <video autoplay loop muted>
                <source type="<?php echo($fieldsBanner['video'][0]['mime_type']); ?>" src="<?php echo($fieldsBanner['video'][0]['url']); ?>" />
            </video>
            <?php
            }
            ?>
        </a>
      </div>
      <!--empreendimento-->
      <?php
          }
          if(isset($idsImoveis[$slide])){
            $fieldsImovel = get_fields( $idsImoveis[$slide] );
            if($rows = have_rows("informacoes_legais", $idsImoveis[$slide]) ){
              while( have_rows("informacoes_legais", $idsImoveis[$slide]) ): the_row();
                $quartos = get_sub_field("quartos");
                $metragem = get_sub_field("metragem");
                $vagas = get_sub_field("vagas");
              endwhile;
            }
      ?>
      <div class="carousel-item">
        <div class="caption">

          <h5 id="titleSlider"><?php echo get_the_title( $idsImoveis[$slide] ); ?></h5>
          <div class="container-slider">
            <div class="row">
            <?php if($quartos){ ?>
              <div class="col">
                <?php echo file_get_contents("wp-content/themes/dna/svg/bed.svg"); ?>
                <p class="text-center"><?php echo $quartos; ?></p>
              </div>
            <?php
                }
                if($metragem){
            ?>
              <div class="col">
                <?php echo file_get_contents("wp-content/themes/dna/svg/home.svg"); ?>
                <p class="text-center"><?php echo $metragem; ?></p>
              </div>
            <?php
              }
              if($vagas){
            ?>
              <div class="col">
                <?php echo file_get_contents("wp-content/themes/dna/svg/car.svg"); ?>
                <p class="text-center"><?php echo $vagas; ?></p>
              </div>
          <?php } ?>
            </div>
          </div>
          <div class="blockPress-btn">
            <a href="<?php echo get_the_permalink($idsImoveis[$slide]); ?>" class="bttn">Clique e conheça</a>
          </div>
        </div>
        <a href="<?php echo get_the_permalink($idsImoveis[$slide]); ?>">
          <?php echo get_the_post_thumbnail($idsImoveis[$slide], 'full', array('class' => 'd-block w-100 img-filter')); ?>
        </a>
      </div>
      <?php
        }
      }
      ?>
    </div>


    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
