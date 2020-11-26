<?php get_header(); ?>
<div class="bd-example" id="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 img-filter')); ?>
        </div>      
        </div>
    </div>
</div>

<div id="singleblog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bp-postcontent">
                    <h1><?php the_title(); ?></h1>
                    <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
                    <p><?php if(have_posts()): the_post(); the_content(); endif; ?></p>
                    <h3>Quer conferir mais conteúdos da Prestes? No nosso blog você encontra dicas e materiais que podem te ajudar a conquistar o seu tão sonhado imóvel.</h3>
                    <div class="row justify-content-center mt-5"><div class="col-md-auto align-self-center"> <a href="https://www.prestes.com/blog" target="_blank"> <button class="btn d-block mr-auto ml-auto mb-3" style="background-color: #ef7c00; color: white">Acesse nosso blog</button> </a></div><div class="col-md-auto align-self-center"> <a href="https://www.prestes.com/materiais" target="_blank"> <button class="btn d-block mr-auto ml-auto mb-3" style="background-color: #ef7c00; color: white">Acesse nossos materiais gratuitos</button> </a></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer( );?>