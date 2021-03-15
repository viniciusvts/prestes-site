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
                                <h4 class="bp-card-title">
                                    <?php the_title();?>
                                </h4>
                                <?php $categorias = wp_get_object_terms( $post->ID, 'category'); if(get_terms() != null): ?>
                                    <p class="bp-card-category"><?php foreach($categorias as $categoria): echo " - "; echo $categoria->name; endforeach;?></p>
                                <?php endif;?>
                                <div class="bp-card-content">
                                    <?php
                                    $content = get_the_content();
                                    $stripContent = strip_tags($content);
                                    echo("<p>".substr($stripContent, 0, 500)."[...]</p>");
                                    ?>
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
                <?php get_template_part("/template/paginacao-dna"); ?>
            </div>
            <!-- start sidebar -->
            <?php get_template_part("/template/sidebar"); ?>
            <!--end sidebar-->
        </div>
    </div>
</div>
<?php get_footer(); ?>