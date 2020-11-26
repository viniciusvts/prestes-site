<?php
    get_header();
    chr_setPostViews( get_the_ID() );
?>
<div class="bd-example" id="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
        </div>      
        </div>
    </div>
</div>

<div id="singleblog">
    <div class="container">
        <div class="row">
            <div class="col-10 mr-auto ml-auto">
                <div class="bp-postcontent">
                    <h1><?php the_title(); ?></h1>
                    <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
                    <p><?php if(have_posts()): the_post(); the_content(); endif; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- posts relacionados -->
        <p style="display:none">
            <?php
                $cat = get_the_terms( the_ID(), 'category' );
            ?>
        </p>
        <?php
            $query = new WP_Query( array(
                'cat' => $cat[0]->term_id,
                'posts_per_page' => 3
            ) );
            $posts = $query->posts;
            $size = count($posts);
            //var_dump($posts[0]);
            for($i = 0 ; $i < $size ; $i++){
                $post = $posts[$i];
            ?>
            <div class="col-md-4 col-sm-12">
                <a href="<?php the_permalink(); ?>">
                    <div class="bp-card">
                        <!--
                        <div class="bp-card-spotlight-text">
                            <p><?php //$dia = get_the_date( 'd' ); echo $dia; ?></p>
                            <p><?php //$mes = get_the_date( 'M' ); echo $mes; ?></p>
                        </div>-->
                        <div class="bp-card-spotlight-img">
                            <?php echo get_the_post_thumbnail( $post, 'large', array('class'=>'w-100 d-block') ); ?>
                        </div>
                        <div class="bp-card-title">
                            <?php $post->post_title;?>
                        </div>
                        <?php $categorias = wp_get_object_terms( $post->ID, 'category'); ?>
                        <div class="bp-card-category">
                            <?php foreach($categorias as $categoria): echo " - "; echo $categoria->name; endforeach;?>
                        </div>
                        <div class="bp-card-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <div class="detail">
                        <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php get_template_part('template/social-floater'); ?>
<?php get_footer( );?>