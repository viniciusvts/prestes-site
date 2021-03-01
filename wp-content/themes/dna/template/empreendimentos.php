<?php
    $empreendimentos = new WP_Query(
        array(
            'post_type' => 'imoveis',
        )
    );
    if($empreendimentos->have_posts()):
?>


<section id="development">
    <div class="container-fluid">
        <h2 class="animar">Empreendimentos em obras</h2>
        <h3 class="animar">
            Apartamentos à venda em:
            <strong id="cityEmp">Ponta Grossa</strong>
            <!--<img src="<?php bloginfo('template_url'); ?>/svg/arrow-point-to-down-gray.svg">-->
        </h3>
        <div class="bp-carroussel-row" id="bp-carroussel">
            <?php
                while($empreendimentos->have_posts()): $empreendimentos->the_post();
                    $cidades = wp_get_object_terms( $post->ID, 'cidade');
                    $estados = wp_get_object_terms( $post->ID, 'estado');
                    $categorias = wp_get_object_terms( $post->ID, 'imovel');
                            if( have_rows("informacoes_legais") ):
                            while( have_rows("informacoes_legais") ): the_row();
                                $quartos = get_sub_field("quartos");
                                $metragem = get_sub_field("metragem");
                                $vagas = get_sub_field("vagas");
                            endwhile;
            ?>
            <div class="bp-col-xxl-3 col-xl-4 col-lg-6 col-12 animar">
                <a href="<?php the_permalink(); ?>">
                    <div class="item">
                        <div class="blockpress-card">
                            <img  src="<?php the_post_thumbnail_url( 'medium' ); ?>"
                            class="d-block w-100 wp-post-image"
                            alt="thumbnail empreedimentos">
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
                                                    <?php
                                                        if($quartos){
                                                    ?>
                                                    <div class="col">
                                                        <?php echo file_get_contents("wp-content/themes/dna/svg/bed.svg"); ?>
                                                        <p><?php echo $quartos; ?></p>
                                                    </div>
                                                    <?php
                                                        }
                                                        if($metragem){
                                                    ?>
                                                    <div class="col">
                                                        <?php echo file_get_contents("wp-content/themes/dna/svg/home.svg"); ?>
                                                        <p><?php echo $metragem; ?></p>
                                                    </div>
                                                    <?php
                                                        }
                                                        if($vagas){
                                                    ?>
                                                    <div class="col">
                                                        <?php echo file_get_contents("wp-content/themes/dna/svg/car.svg"); ?>
                                                        <p><?php echo $vagas; ?></p>
                                                    </div>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <img src="<?php echo(get_template_directory_uri()); ?>/svg/filete-card.svg" alt="fillete prestes">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                        endif;
                endwhile;
            ?>
        </div>
    </div>
    <div class="row-buttons">
        <a href="#0">
            <div class="rectangle-left" onClick="scrollL()">
                <?php echo file_get_contents("wp-content/themes/dna/svg/arrow-point-to-right.svg"); ?>
            </div>
        </a>
        <?php
        if ($_SERVER['REQUEST_URI'] != '/imoveis/'){
        ?>
        <div class="blockPress-btn">
            <a href="<?php echo bloginfo("wpurl"); ?>/empreendimentos/" class="bttn">Clique e conheça</a>
        </div>
        <?php
        }
        ?>
        <a href="#0">
            <div class="rectangle-right" onClick="scrollR()">
                <?php echo file_get_contents("wp-content/themes/dna/svg/arrow-point-to-right.svg"); ?>
            </div>
        </a>
    </div>
</section>


<?php endif; ?>
