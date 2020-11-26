<?php get_header();?>
<div id="bp-page-blog">
    <div class="bd-example" id="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="caption">
                <h1 class="font-lato"><?php the_title(); ?></h1>
                <div class="breadcrumbs"><?php wp_custom_breadcrumbs() ?></div>
                </div>
                <img class="img-fluid w-100 img-filter" src="<?php echo(get_theme_mod( 'dnaTheme_setting_ImgHeadSearch')); ?>">
            </div>      
            </div>
        </div>
    </div>
    <?php
    $posts_slides = new WP_Query(array(
    'order' => 'DESC',
    ));
    if($posts_slides->have_posts() ):
?> 
    <div class="container bp-blog-container">
        <div class="row">
            <div class="bp-blog-cards col-md-8 col-sm-12">
                <div class="row">
                    <!--pagination-->
                    <?php
                    $s=get_search_query();
                    $args = array('s' =>$s, 'post_type' => 'post',);
                    query_posts($args);
                    $p = 0; $i = 0; $posts = 0;
                    if ( have_posts() ) {
                    ?>        

                    <!--the_loop here-->            
                    <?php                        
                        while(have_posts()) : the_post();
                    ?>  
                    <div class="col-md-6 col-sm-12">
                        <a href="<?php the_permalink(); ?>">
                            <div class="bp-card">
                                <!--
                                <div class="bp-card-spotlight-text">
                                    <p><?php //$dia = get_the_date( 'd' ); echo $dia; ?></p>
                                    <p><?php //$mes = get_the_date( 'M' ); echo $mes; ?></p>
                                </div>-->
                                <div class="bp-card-spotlight-img">
                                    <?php the_post_thumbnail('large', array('class'=>'w-100 d-block')); ?>
                                </div>
                                <div class="bp-card-title">
                                    <?php the_title();?>
                                </div>
                                <?php $categorias = wp_get_object_terms( $post->ID, 'category'); if(get_terms() != null): ?>
                                    <div class="bp-card-category"><?php foreach($categorias as $categoria): echo " - "; echo $categoria->name; endforeach;?></div>
                                <?php endif;?>
                                <div class="bp-card-content">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                            <div class="detail">
                                <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                    <?php } else {
                            echo '<h2>Nenhum Post encontrado para a pesquisa "'.$s.'"</h2>';
                        } ?>
                    <!--end the_loop-->
                </div>
                <!--paginação-->
                <div class="row">
                    <div class="col previous-link">
                        <?php $prevLink = get_paginate('post',0,$posts_per_page);
                        if($prevLink){;
                        ?>
                        <div class="blockPress-btn">
                            <a href="<?php echo ($prevLink); ?>" class="bttn-l">Anterior</a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col page-inf">
                        <?php if($wp_query->max_num_pages > 0):?>
                            <h5 style="text-align: center;margin-top: 30px;">
                                Página <?php if($paged == 0): echo $paged+=1; else: echo $paged; endif; ?> de <?php echo $wp_query->max_num_pages; ?>
                            </h5>                            
                        <?php endif; ?>
                    </div>
                    <div class="col next-link">
                        <?php $nextLink = get_paginate('post',1,$posts_per_page);
                        if($nextLink){;
                        ?>
                            <div class="blockPress-btn">
                                <a href="<?php echo ($nextLink); ?>" class="bttn">Próximo</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!--fim paginação-->
            </div>
            <!-- start sidebar -->
            <?php get_template_part("/template/sidebar"); ?>
            <!--end sidebar-->
        </div>
    </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>