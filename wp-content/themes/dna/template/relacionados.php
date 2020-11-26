<?php
    $empreendimentos = new WP_Query(array(
        'post_type' => 'imoveis',
        'order' => 'ASC',
        'posts_per_page'=> 8
    ));
    if($empreendimentos->have_posts()):
?>

<section id="development">
    <div class="container-fluid">
        <h2>Confira os melhores imóveis Minha Casa Minha Vida</h2>
        <div class="customNextBtn"><?php echo file_get_contents("wp-content/themes/dna/svg/arrow-point-to-right.svg"); ?></div>
        <div class="customPrevBtn"><?php echo file_get_contents("wp-content/themes/dna/svg/arrow-point-to-right.svg"); ?></div>
        <div class="row">
            <div class="owl-carousel owl-theme owl-empreendimentos">   
                <?php
                    while($empreendimentos->have_posts()): $empreendimentos->the_post(); 

                        $cidades = wp_get_object_terms( $post->ID, 'cidade');                    
                        $estados = wp_get_object_terms( $post->ID, 'estado');
                        $categorias = wp_get_object_terms( $post->ID, 'imoveis'); 
                        $financiamentos = wp_get_object_terms( $post->ID, 'financiamento');  
                    
                        foreach($financiamentos as $financiamento):
                             $minhaCasaMinhaVida = $financiamento->slug;
                        endforeach;

                        if($minhaCasaMinhaVida == "minha-casa-minha-vida" && $financiamentos != false): 
                ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="item">
                        <div class="blockpress-card">
                            <?php the_post_thumbnail('large', array('class'=>'d-block w-100')); ?>
                            <div class="description">
                                <div class="container-fluid">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">                            
                                            <h4><?php the_title(); ?></h4>
                                            <h5><?php foreach($cidades as $cidade): echo $cidade->name; endforeach; ?>  /  <?php foreach($estados as $estado): echo $estado->name; endforeach; ?></h5>
                                            <h6><?php foreach($categorias as $categoria): echo $categoria->name; endforeach; ?></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="container-fluid attributes">
                                                <div class="row no-gutters">
                                                <?php
                                                    if( have_rows("informacoes_legais")): 
                                                        while( have_rows("informacoes_legais") ): the_row();
                                                            $quartos = get_sub_field("quartos");
                                                            $metragem = get_sub_field("metragem");
                                                            $vagas = get_sub_field("vagas");
                                                        endwhile;
                                                    endif; 
                                                ?>
                                                <div class="col">
                                                    <?php echo file_get_contents("wp-content/themes/dna/svg/bed.svg"); ?>
                                                    <p><?php echo $quartos; ?></p>
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
                    </div>
                </a>
                <?php
                        endif;
                    endwhile;
                ?>
            </div>
            <div class="blockPress-btn">
                <a href="#consultant" class="bttn">Falar com um consultor</a>
            </div>                       
        </div>
    </div>
</section>

<?php endif; ?>

