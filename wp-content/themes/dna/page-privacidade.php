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
      <article>
        <?php if(have_posts()): the_post(); the_content(); endif; ?>
      </article>
    </div>
  </div>
</div>


<?php get_footer(); ?>