<?php /* Template Name: Revista Prestes */ ?>
<?php get_header(); ?>
<div id="bp-page-blog">
    <div class="bd-example" id="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="caption">
                <h1 class="font-lato"><?php the_title(); ?></h1>
                <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
                </div>
                <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
            </div>      
            </div>
        </div>
    </div>
    <div class="container bp-blog-container">
        <div class="row">
            <div class="bp-blog-cards col-md-12 col-sm-12">
                <div class="row">
                    
                    <!--the_loop here-->
                    <?php 
                        $paged = isset($_GET['sheet'])?$_GET['sheet']:null;
                        $args = array("post_type"=>"revista-prestes",
                                    "posts_per_page"=> 6,
                                    "paged"=>$paged);
                        global $wp_query;
                        $temp = $wp_query; 
                        $wp_query = new WP_Query($args);
                        while($wp_query->have_posts()): $wp_query->the_post();
                    ?>
                    <div class="col-md-4 col-sm-12">
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
                                    <?php echo wp_trim_words( get_the_title(), 8, '...' ); ?>
                                </div>
                                <div class="bp-card-content">
                                    <?php echo wp_trim_words( get_the_excerpt(), 19, ' [...] ' ); ?>
                                </div>                                
                            </div>
                            <div class="detail">
                                <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; wp_reset_postdata();?>
                    <!--end the_loop-->
                </div>
                <div class="row page-links">                        
                    <div class="col previous-link">
                        <?php
                        $prevLink = get_prev_page_link($wp_query->max_num_pages);
                        if($prevLink){
                        ?>                                   
                            <a href="<?php echo($prevLink); ?>" rel="prev">Voltar</a>                                  
                        <?php
                        }
                        ?>  
                    </div>                    
                    
                    <div class="col page-inf">
                        <?php if($wp_query->max_num_pages > 0):?>
                            <h5>Página <?php if($paged == 0): echo $paged+=1; else: echo $paged; endif; ?> de <?php echo $wp_query->max_num_pages; ?></h5>                            
                        <?php endif; ?>
                    </div>
                    
                    <div class="col next-link">                            
                        <?php
                        $nextLink = get_next_page_link($wp_query->max_num_pages);
                        if($nextLink){
                        ?>                                   
                            <a href="<?php echo($nextLink); ?>" rel="next">Próximo</a>                                  
                        <?php
                        }
                        ?>                            
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
<?php get_footer(); ?>