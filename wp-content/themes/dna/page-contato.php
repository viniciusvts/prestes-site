<?php /* Template Name: Basic */ ?>

<?php get_header(); ?>

<div class="bd-example" id="slider">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="caption">
          <h1 class="font-lato"><?php the_title(); ?></h1>
          <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
        </div>
        <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
      </div>      
    </div>
  </div>
</div>
<?php
if(get_the_content()){
?>
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php the_content();?>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
<?php get_template_part("template/contato"); ?>
<?php get_footer(); ?>