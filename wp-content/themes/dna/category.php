
<?php 
global $wp_query;
$queried_object = $wp_query->queried_object;
get_header();
if(have_posts()){
?>  
<div id="bp-page-blog">

    <div class="bd-example" id="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="caption">
                <h1>Categoria: <?php  echo( $queried_object->name ); ?></h1>
                <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
                </div>
                <?php echo ( get_the_post_thumbnail( 82, 'full',  array('class' => 'img-fluid w-100 img-filter') ) ); //82 é o id da página blog?>
            </div>      
            </div>
        </div>
    </div>
    <div class="container bp-blog-container">
        <div class="row">
            <div class="bp-blog-cards col-md-8 col-sm-12">
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
                                <h4 class="bp-card-title">
                                    <?php the_title();?>
                                </h4>
                                <?php $categorias = wp_get_object_terms( $post->ID, 'category'); if(get_terms() != null): ?>
                                    <p class="bp-card-category">
                                        <?php 
                                            foreach($categorias as $categoria){
                                                if( !($categoria->term_id == $queried_object->term_id) ){
                                                    echo " - "; echo $categoria->name;
                                                }
                                            }
                                        ?>
                                    </p>
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
                <!-- paginação -->
                <div class="row page-links">
                    <div class="col previous-link">
                        <?php
                        $voltar = get_previous_posts_link('— Voltar');
                        if($voltar){
                            echo $voltar;
                        }
                        ?>
                    </div>
                    <div class="col next-link">
                        <?php
                        $proximo = get_next_posts_link('Próximo —');
                        if($proximo){
                            echo $proximo;
                        }
                        ?>
                    </div>
                </div>
                <!-- fim paginação -->
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
<?php 
}
?>
<?php get_footer(); ?>