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
<?php
$termsCity = get_terms([
    'taxonomy' => 'cidade',
    'hide_empty' => true,
]);
$termsState = get_terms([
    'taxonomy' => 'estado',
    'hide_empty' => true,
]);
$termsFinanc = get_terms([
    'taxonomy' => 'financiamento',
    'hide_empty' => true,
]);
$termsStage = get_terms([
    'taxonomy' => 'imovel',
    'hide_empty' => true,
]);
?>
<section id="map-filter">
    <div id="search">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
                <select id="estado">
                    <option value="">Estado</option>
                    <?php 
                        foreach ( $termsState as $term ){
                    ?>
                    <option value="<?php echo $term->term_id; ?>">
                        <?php echo $term->name;?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-2">
                <select id="cidade">
                    <option value="">Cidade</option>
                    <?php 
                        foreach ( $termsCity as $term ){//for($i = 0, $size = count( $termsCity); $i < $size; $i++ ) :
                    ?>
                    <option value="<?php echo $term->term_id; ?>">
                        <?php echo $term->name;?>
                    </option>
                    <?php }//endfor; ?>
                </select>
            </div>
            <div class="col-sm-2">
            <select id="estagio">
                    <option value="">Estágio</option>
                    <?php 
                        foreach ( $termsStage as $term ){
                    ?>
                    <option value="<?php echo $term->term_id; ?>">
                        <?php echo $term->name;?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-2">
            <select id="financ">
                <option value="">Financiamento</option>
                <?php 
                    foreach ( $termsFinanc as $term ){
                ?>
                <option value="<?php echo $term->term_id; ?>">
                    <?php echo $term->name;?>
                </option>
                <?php } ?>
            </select>
            </div>
            <div class="col-sm-2">
                <div class="blockPress-btn">
                    <a href="#iframe-map" class="bttn" onClick="buscarEmpreendimentos()">Buscar</a>
                </div>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
    </div>
    <div id="iframe-map">
        <div id="map" class="map">Não foi possivel carregar o recurso :(</div>
    </div>
</section>

<?php get_footer(); ?>