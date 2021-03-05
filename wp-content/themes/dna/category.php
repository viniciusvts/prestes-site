
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
                    $paged= isset( $_GET['sheet'])?$_GET['sheet']:1;
                        global $wp_query;
                        $temp = $wp_query; 
                        $wp_query = null; 
                        $wp_query = new WP_Query(); 
                        $wp_query->query('category_name='.$temp->query['category_name'].'&posts_per_page='.get_option("posts_per_page").'&paged='.$paged);  
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
                <!--paginação-->
                <div class="row">
                    <div class="col-12 col-lg previous-link">
                        <?php $prevLink = get_prevs_page_link();
                        if($prevLink){;
                        ?>
                        <div class="blockPress-btn m-0 p-0 d-flex">
                            <a href="<?php echo ($prevLink); ?>"
                            rel="prev"
                            class="bttn-l mr-auto">Anterior</a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-12 col-lg page-inf text-center align-self-center">
                        <?php
                        if($wp_query->max_num_pages > 0){
                            $pageprev3 = get_prevs_page_link(3);
                            if ($pageprev3){
                            ?>
                                <a href="<?php echo $pageprev3; ?>"
                                rel="prev"
                                class="mx-2">
                                    <?php echo($_GET['sheet'] - 3); ?>
                                </a>
                            <?php
                            }
                            $pageprev2 = get_prevs_page_link(2);
                            if ($pageprev2){
                            ?>
                                <a href="<?php echo $pageprev2; ?>"
                                rel="prev"
                                class="mx-2">
                                    <?php echo($_GET['sheet'] - 2); ?>
                                </a>
                            <?php
                            }
                            $pageprev1 = get_prevs_page_link(1);
                            if ($pageprev1){
                            ?>
                                <a href="<?php echo $pageprev1; ?>"
                                rel="prev"
                                class="mx-2">
                                    <?php echo($_GET['sheet'] - 1); ?>
                                </a>
                            <?php
                            }
                            ?>
                            <a href="#_" class="mx-2 text-black-50">
                                <?php echo(isset($_GET['sheet'])?$_GET['sheet']:1); ?>
                            </a>
                            <?php
                            $pagenext1 = get_nexts_page_link(1);
                            if ($pagenext1){
                            ?>
                                <a href="<?php echo $pagenext1; ?>"
                                rel="next"
                                class="mx-2">
                                    <?php echo(isset($_GET['sheet'])?($_GET['sheet'] + 1):2); ?>
                                </a>
                            <?php
                            }
                            $pagenext2 = get_nexts_page_link(2);
                            if ($pagenext2){
                            ?>
                                <a href="<?php echo $pagenext2; ?>"
                                rel="next"
                                class="mx-2">
                                    <?php echo(isset($_GET['sheet'])?($_GET['sheet'] + 2):3); ?>
                                </a>
                            <?php
                            }
                            $pagenext3 = get_nexts_page_link(3);
                            if ($pagenext3){
                            ?>
                                <a href="<?php echo $pagenext3; ?>"
                                rel="next"
                                class="mx-2">
                                    <?php echo(isset($_GET['sheet'])?($_GET['sheet'] + 3):4); ?>
                                </a>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-12 col-lg next-link">
                        <?php $nextLink = get_nexts_page_link();
                        if($nextLink){;
                        ?>
                            <div class="blockPress-btn m-0 p-0 d-flex">
                                <a href="<?php echo ($nextLink); ?>"
                                rel="next"
                                class="bttn ml-auto">Próximo</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!--fim paginação-->  
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