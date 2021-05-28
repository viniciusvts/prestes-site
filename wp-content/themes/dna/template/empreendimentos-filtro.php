<?php
    $paged = isset( $_GET['sheet'] ) ? $_GET['sheet'] : 1;
    $postsPerPage = 16;//get_option('posts_per_page');
    $empreendimentos = new WP_Query(
        array(
            'post_type' => 'imoveis',
            'orderby' => 'date',
            'posts_per_page'=> $postsPerPage,
            'paged' => $paged,
        )
    );
    if($empreendimentos->have_posts()):
?>
<section id="development">
    <div class="container-fluid">
        <div class="row no-gutters ml-auto mr-auto" id="categories">

            <div class="inline inline-active col-md-2 ml-auto">
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
                ) );
                $last = count($terms);
                $index = 0;
                if ( !empty( $terms ) ):
                foreach ( $terms as $term ):
                    $index++;
            ?>

            <div class="inline col-md-2 <?php if($index == $last){echo "mr-auto";}?>">
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
            <div class="col-md-3 filtro <?php echo $value->slug; ?>">
                <a href="<?php the_permalink(); ?>">
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
                </a>
            </div>
            <?php endwhile; ?>
        </div>
        <!--paginação-->
        <div class="row">
            <?php $prevLink = get_prev_page_link( $empreendimentos->max_num_pages );
            if($prevLink){;
            ?>
            <div class="col-md-6 col-sm-12">
                <div class="blockPress-btn">
                    <a href="<?php echo ($prevLink); ?>"
                    rel="prev"
                    class="bttn-l">Anterior</a>
                </div>
            </div>
            <?php } ?>
            <?php $nextLink = get_next_page_link( $empreendimentos->max_num_pages );
            if($nextLink){;
            ?>
            <div class="col-md-6 col-sm-12" style="margin-left:auto;">
                <div class="blockPress-btn">
                    <a href="<?php echo ($nextLink); ?>"
                    rel="next"
                    class="bttn">Próximo</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <!--fim paginação-->
    </div>
</section>
<?php endif; ?>
