<?php /* Template Name: Blog */ ?>
<?php get_header();?>
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
            <div class="bp-blog-cards col-md-8 col-sm-12">
                <div class="row">
                    <!--pagination-->
                    <?php 
                        global $wp_query;
                        $paged= isset( $_GET['sheet'])?$_GET['sheet']:1;
                        $postsPerPage = get_option("posts_per_page");
                        $temp = $wp_query; 
                        $wp_query = null; 
                        $wp_query = new WP_Query(array('post_type' => 'post',
							'posts_per_page'=> $postsPerPage,
							'paged' => $paged,
						));       
                    ?>        

                    <!--the_loop here-->            
                    <?php                        
                        while($wp_query->have_posts()) : $wp_query->the_post();
                    ?>  
                    <div class="col-lg-6 col-sm-12">
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
                            <h5 style="text-align: center;margin-top: 30px;}">
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
<?php get_footer(); ?>