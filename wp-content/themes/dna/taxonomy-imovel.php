<?php /* Template Name: Imóveis */
chr_setPostViews( get_the_ID() );
?>

<?php get_header(); ?>
<div class="bd-example" id="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="caption">
                    <h1 class="font-lato"><?php echo $cidadeEscolhida = get_queried_object()->name; ?></h1>
                    <div class="center">
                        <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
                    </div>
                    <div id="sub-title">
                        <h3>Aproveitando a ajuda do governo pelo programa Minha Casa Minha Vida.</h3>
                    </div>
                </div>
                <img class="d-block w-100" src="<?php echo(get_theme_mod( 'dnaTheme_setting_ImgTaxImovel')); ?>" alt="First slide">
            </div>      
        </div>
    </div>
</div>

<?php get_template_part('template/empreendimentos-filtro'); ?>
<?php get_template_part('template/depoimentos'); ?>
<?php get_template_part('template/fale-com-um-consultor'); ?>

<?php get_footer(); ?>