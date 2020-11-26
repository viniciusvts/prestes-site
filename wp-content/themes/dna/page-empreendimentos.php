<?php /* Template Name: Empreendimentos */ ?>

<?php get_header(); ?>
<div class="bd-example" id="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="caption">
                    <h1 class="font-lato" id="titleSlider"><?php the_title(); ?></h1>
                    <div class="center">
                        <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
                    </div>
                </div>
                <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
            </div>      
        </div>
    </div>
</div>

<?php get_template_part('template/empreendimentos-filtro'); ?>
<?php get_template_part('template/depoimentos'); ?>
<?php get_template_part('template/fale-com-um-consultor'); ?>

<?php get_footer(); ?>