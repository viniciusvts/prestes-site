<?php /* Template Name: Vendas */ ?>

<?php get_header(); ?>

<div class="bd-example" id="slider">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="caption">
          <h1 class="font-lato"><?php the_title(); ?></h1>
          <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
          <div class="row">
            <div class="blockPress-btn">
              <a href="<?php bloginfo('url')?>/imoveis" class="bttn">Ver imóveis</a>
            </div>
            <div class="blockPress-btn">
              <a href="<?php bloginfo('url');?>/contato" class="bttn bttn-white">Ligamos para você</a>
            </div>
          </div>
        </div>
        <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 img-filter')); ?>
      </div>      
    </div>
  </div>
</div>

<div id="about">
  <div class="col-12">
    <div class="row">
      <?php
        $centraisAtendimento = new WP_Query(array(
          'post_type' => 'central',
          'orderby' => 'date',
          'order' => 'ASC',
          'posts_per_page' => -1,
        ));
        if($centraisAtendimento->have_posts(  )){
          $loop = 0;
      ?>
        <table>
          <tbody>
            <?php
              while( $centraisAtendimento->have_posts() ){
                $centraisAtendimento->the_post();
                $loop++;
                $city = get_field("cidade");
                $email = get_field("email");
                $tel = get_field("tel");
                if($loop%2 == 1){
            ?>
            <tr>
              <?php
                }
              ?>
              <!--informações de atendimento-->
              <td>
                <strong>
                  <?php
                    echo($city);
                  ?>
                </strong>
                <?php
                  if( have_rows( "ends" ) ){
                    while( have_rows( "ends" ) ){
                      the_row();
                      echo"<br>";
                      echo( the_sub_field('end') );
                    }
                  }
                  echo"<br>Email: ";
                  echo( $email );
                  echo"<br>Telefone/WhatsApp: ";
                  echo( $tel );
                ?>
              </td>
              <!--fim informações central de atendimento-->
              <?php
                if($loop%2 == 0){
              ?>
            </tr>
            <?php
                }
              }//end while the loop
              //se chegar aqui e o $loop for impar, não teve o fechamento da tag tr
              if($loop%2 == 1){
            ?>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <?php
        }else{//end if the loop
        ?>
          <strong>Não foi encontrada central de atendimento</strong>
        <?php
        }
        ?>
    </div>
  </div>
</div>

<?php get_template_part("template/premios"); ?>

<section id="map">
  <!--
  <div class="floater">
    <div class="container">
      <h2>Onde estamos</h2>
    </div>
  </div>-->
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d903.2961925627986!2d-50.158498770813225!3d-25.09560598449007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e81a414eee5133%3A0x8c4c50b58c9665a8!2sR.%20Dr.%20Colares%2C%20215%20-%20Centro%2C%20Ponta%20Grossa%20-%20PR%2C%2084010-010!5e0!3m2!1spt-BR!2sbr!4v1568123581461!5m2!1spt-BR!2sbr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>

<?php get_template_part("template/fale-com-um-consultor"); ?>
<?php get_footer(); ?>