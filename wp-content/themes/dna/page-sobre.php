<?php /* Template Name: Sobre */ ?>

<?php get_header(); ?>

<div class="bd-example" id="slider">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="caption">
          <h1 class="font-lato"><?php the_title(); ?></h1>
          <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
        </div>
        <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 img-filter')); ?>
      </div>      
    </div>
  </div>
</div>

<div id="about">
  <div class="col-12">
    <div class="row">
      <?php if(have_posts()): the_post(); the_content(); endif; ?>
    </div>
  </div>
</div>


<?php
    $timeLine = new WP_Query(array("post_type" => "linha-do-tempo", "order" => "ASC", "posts_per_page" => -1));
    if($timeLine->have_posts()): $timeLine->the_post();
?>
<div id="timeline">
    <div class="row no-gutters">
        <div class="col-md-6">
            <div class="left">
                <h2>Linha do tempo</h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="right">
                <div class="timeline">
                    <?php while($timeLine->have_posts()): $timeLine->the_post();?>
                    <div class="entry">
                        <div class="title">
                            <h3><?php the_field('data'); ?></h3>
                        </div>
                        <div class="body-card">
                            <ul>
                                <li><?php the_field('acontecimento'); ?></li>
                            </ul>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>  
</div>
<?php endif; 
$missao = get_theme_mod( 'dnaTheme_setting_missao');
$visao = get_theme_mod( 'dnaTheme_setting_visao');
$valor = get_theme_mod( 'dnaTheme_setting_valor');
$projeto = get_theme_mod( 'dnaTheme_setting_projeto');
$hasAll = ($missao || $visao || $valor || $projeto);
if($hasAll){
?>

<div id="about-tab">
    <div class="container">
        <h2>Sobre a Prestes</h2>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php
            if($missao){
            ?>
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#missao" 
                role="tab" aria-controls="pills-home" aria-selected="true">Missão</a>
            </li>
            <?php
            }
            if($visao){
            ?>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#visao" 
                role="tab" aria-controls="pills-profile" aria-selected="false">Visão</a>
            </li>
            <?php
            }
            if($valor){
            ?>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#valores" 
                role="tab" aria-controls="pills-contact" aria-selected="false">Valores</a>
            </li>
            <?php
            }
            if($projeto){
            ?>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#projeto" 
                role="tab" aria-controls="pills-contact" aria-selected="false">Instituto Vida</a>
            </li>
            <?php
            }
            ?>
            <li class="nav-item">
                <a class="nav-link"
                id="pills-contact-tab"
                target="_blank"
                href="https://www.prestes.com/wp-content/uploads/2021/01/codigo-de-conduta.pdf" >
                    Código de Conduta
                </a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <?php
            if($missao){
            ?>
            <div class="tab-pane fade show active" id="missao" role="tabpanel" aria-labelledby="pills-missao-tab"><?php echo($missao); ?></div>
            <?php
            }
            if($visao){
            ?>
            <div class="tab-pane fade" id="visao" role="tabpanel" aria-labelledby="pills-visao-tab"><?php echo($visao); ?></div>
            <?php
            }
            if($valor){
            ?>
            <div class="tab-pane fade" id="valores" role="tabpanel" aria-labelledby="pills-valores-tab"><?php echo($valor); ?></div>
            <?php
            }
            if($projeto){
            ?>
            <div class="tab-pane fade" id="projeto" role="tabpanel" aria-labelledby="pills-projeto-tab"><?php echo($projeto); ?></div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
}
get_footer();
?>