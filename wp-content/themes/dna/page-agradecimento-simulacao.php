<?php /* Template Name: Basic */ ?>
<?php
/* vem de dna/page-simulador.php */
if(isset($_POST["nome"])){
  $regiao = $_POST["regiao"];
  $empreendimento = $_POST["empreendimentocliente"];
  $cidade = $_POST["cidade"];
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $renda = $_POST["renda"];
  $entrada = $_POST["entrada"];
  $tel = $_POST["tel"];
  $fgts = $_POST["fgts"];
  $convertido = $_POST['converteuEm'];
  //$cash = $_POST["cash"];
  $urlOrigem = $_POST["urlOrigem"];
  //send email
  $to = "marketing@prestes.com";
  $subject = 'Form prestes (simulador Pop-Up)';
  $message = "Nome: ".$nome
      ."<br>Email: ".$email
      ."<br>Regiao: ".$regiao
      ."<br>Cidade: ".$cidade
      ."<br>Renda: ".$renda
      ."<br>Entrada: ".$entrada
      ."<br>Telefone: ".$tel
      ."<br>Pretende usar o FGTS: ".$fgts
      ."<br>Empreendimento de Interesse: ".$empreendimento
      ."<br>Url de Origem: ".$urlOrigem
      ."<br>Converteu em: ".$convertido;
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
}
?>
<?php get_header(); ?>

<div class="bd-example" id="slider">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="caption">
          <h1><?php the_title(); ?></h1>
          <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
        </div>
        <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 img-filter')); ?>
      </div>      
    </div>
  </div>
</div>

<div id="about">
  <div class="row">
    <div class="col-12">
      <?php if(have_posts()): the_post(); the_content(); endif; ?>
    </div>
  </div>
</div>


<?php get_footer(); ?>