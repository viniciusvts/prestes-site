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
                <img class="d-block w-100" src="<?php echo(get_theme_mod( 'dnaTheme_setting_ImgTaxRegiao')); ?>" alt="First slide">
            </div>      
        </div>
    </div>
</div>

<?php
    $empreendimentos = new WP_Query(array('post_type' => 'imoveis', 'order' => 'ASC', 'posts_per_page'=>'100'));
    if($empreendimentos->have_posts()):
?>
<section id="development">
    <div class="container-fluid">
        <div class="row no-gutters" id="categories">
            
            <div class="inline inline-active col-md-3">
                <a href="#todos">
                    <div class="container-fluid">                        
                        <p>Ver todos</p>                        
                    </div>
                </a>
            </div>
            
            <?php
                $terms = get_terms( array(
                    'taxonomy' => 'imovel',
                    'hide_empty' => true,
                    'child_of'   => $term_id,
                ) );
                if ( !empty( $terms ) ):
                foreach ( $terms as $term ):
            ?>
            
            <div class="inline col-md-3">
                <a href="#<?php echo $term->slug; ?>">
                    <div class="container-fluid">                        
                        <p><?php echo $term->name?></p>                        
                    </div>
                </a>
            </div>

            <?php endforeach; endif; ?>
        </div>
        <div class="row">
            <?php
                while($empreendimentos->have_posts()): $empreendimentos->the_post();                    
                    $cidades = wp_get_object_terms( $post->ID, 'cidade');                    
                    $estados = wp_get_object_terms( $post->ID, 'estado');
                    $categorias = wp_get_object_terms( $post->ID, 'imovel'); 
                    $cidadesComparas = $cidades;
                    foreach($cidadesComparas as $cidadeComparada):
                        if($cidadeComparada->name == $cidadeEscolhida):
                    
                            if( have_rows("informacoes_legais") ): 
                            while( have_rows("informacoes_legais") ): the_row();
                                $quartos = get_sub_field("quartos");
                                $metragem = get_sub_field("metragem");
                                $vagas = get_sub_field("vagas");
                            endwhile;
                            endif;

                            $slugs = wp_get_object_terms($post->ID, 'imovel'); 
                            foreach($slugs as $key => $value){
                                $value->slug;
                            }
            ?>
            <div class="col-12 col-md-6 col-lg-3 filtro <?php echo $value->slug; ?>">
                <a href="<?php the_permalink(); ?>">
                    <div class="blockpress-card">
                        <?php the_post_thumbnail('large', array('class'=>'d-block w-100')); ?>
                        <div class="description">
                            <div class="container-fluid">
                                <div class="row no-gutters">
                                    <div class="col-5">                            
                                        <h4><?php the_title(); ?></h4>
                                        <h5><?php foreach($cidades as $cidade): echo $cidade->name; endforeach; ?>  /  <?php foreach($estados as $estado): echo $estado->name; endforeach; ?></h5>
                                        <h6><?php foreach($categorias as $categoria): echo $categoria->name; endforeach; ?></h6>
                                    </div>
                                    <div class="col-7">
                                        <div class="container-fluid attributes">
                                            <div class="row no-gutters">
                                            <div class="col">
                                                <?php echo file_get_contents("wp-content/themes/dna/svg/bed.svg"); ?>
                                                <p><?php echo $quartos;?></p>
                                            </div>
                                            <div class="col">
                                                <?php echo file_get_contents("wp-content/themes/dna/svg/home.svg"); ?>
                                                <p><?php echo $metragem; ?></p>
                                            </div>
                                            <div class="col">
                                                <?php echo file_get_contents("wp-content/themes/dna/svg/car.svg"); ?>
                                                <p><?php echo $vagas; ?></p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <?php echo file_get_contents("wp-content/themes/dna/svg/filete-card.svg"); ?>                    
                        </div> 
                    </div> 
                </a>
            </div>
            <?php
                        endif;
                    endforeach;
                endwhile;
            ?>                      
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_template_part('template/depoimentos'); ?>
<?php get_template_part('template/fale-com-um-consultor'); ?>

<?php get_footer(); ?>