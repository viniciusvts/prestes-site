<?php get_header();?>
<?php
    $posts_slides = new WP_Query(array(
    'order' => 'DESC',
    ));
    if($posts_slides->have_posts()):
?>  
<div id="bp-page-blog">

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
    <div class="container bp-blog-container">
        <div class="row">
            <div class="bp-blog-cards col-md-12">
                <div class="row">
                    <!--pagination-->
                    <?php 
                        global $paged;
                        global $wp_query;
                        $temp = $wp_query; 
                        $wp_query = null; 
                        $wp_query = new WP_Query(); 
                        $wp_query->query('post_type=materiais&posts_per_page=4&paged='.$paged);       
                    ?>        

                    <!--the_loop here-->            
                    <?php                        
                        while($wp_query->have_posts()) : $wp_query->the_post();
                    ?>  
                    <div class="col-md-4">
                        <a href="<?php the_field('link') ?>" target="_blank">
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
                        <?php $voltar = previous_posts_link('Voltar'); if($voltar == true): ?>
                            <h5><?php echo $voltar; ?></h5>
                        <?php endif; ?>
                    </div>                    
                    
                    <div class="col page-inf">
                        <?php if($wp_query->max_num_pages > 0):?>
                            <h5>Página <?php if($paged == 0): echo $paged+=1; else: echo $paged; endif; ?> de <?php echo $wp_query->max_num_pages; ?></h5>                            
                        <?php endif; ?>
                    </div>
                    
                    <div class="col next-link">                            
                        <?php $proximo = next_posts_link('Próximo'); if($proximo == true): ?>                                    
                            <h5><?php echo $proximo; ?></h5>                                    
                        <?php endif; ?>                            
                    </div>                    
                    <?php 
                        $wp_query = null; 
                        $wp_query = $temp; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>