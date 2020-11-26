
<?php get_header();?>
<?php
    if(have_posts()):
?>  
<div id="bp-page-blog">

    <div class="bd-example" id="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="caption">
                <h1 class="font-lato">Categoria: <?php $categories = get_the_category(); foreach($categories as $category) : echo $category->name; endforeach; ?></h1>
                <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
                </div>
                <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
            </div>      
            </div>
        </div>
    </div>
    <div class="container bp-blog-container">
        <div class="row">
            <div class="bp-blog-cards col-md-9 col-sm-12">
                <div class="row">
                    <!--the_loop here-->
                    <?php                        
                        while(have_posts()) : the_post();
                    ?>  
                    <div class="col-md-6 col-sm-12">
                        <a href="<?php the_permalink(); ?>">
                            <div class="bp-card">
                                <div class="bp-card-spotlight-text">
                                    <p><?php $dia = get_the_date( 'd' ); echo $dia; ?></p>
                                    <p><?php $mes = get_the_date( 'M' ); echo $mes; ?></p>
                                </div>
                                <div class="bp-card-spotlight-img">
                                    <?php the_post_thumbnail('large', array('class'=>'w-100 d-block')); ?>
                                </div>
                                <div class="bp-card-title">
                                    <?the_title();?>
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
                    <!--end the_loop-->
                </div>
                <div class="row page-links">
                    
                    <div class="col previous-link">
                        <?php $voltar = get_previous_posts_link('Voltar', $the_query->max_num_pages); if($voltar == true):?>
                        <a href="#">
                            <h5><?php echo $voltar; ?></h5>
                        </a>
                        <?php endif; ?>
                    </div>
                   
                    <!--
                    <div class="col page-inf">
                        <a href="#">
                            <h5>PÁGINA 2 DE 5</h5>
                        </a>
                    </div>-->                    
                    
                    <div class="col next-link">
                        <?php $proximo = get_next_posts_link('Próximo', $the_query->max_num_pages); if($proximo == true):?>
                            <a href="#">
                                <h5><?php echo $proximo; ?></h5>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>

            

            <?php 
                wp_reset_postdata();
            ?>
            <!-- start sidebar -->
            <?php get_template_part("/template/sidebar"); ?>
            <!--end sidebar-->
        </div>
    </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>