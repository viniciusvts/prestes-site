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
                                    "posts_per_page"=> 12,
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
                <?php get_template_part("/template/paginacao-dna"); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>