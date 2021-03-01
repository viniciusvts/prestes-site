<?php
    $depoimentos = new WP_Query(array("post_type" => "depoimentos", "posts_per_page" => 6));
    if($depoimentos->have_posts()):
?>
<section id="depoimentos">
    <div class="container-fluid">      
        <h2 class="animar">Depoimentos</h2>
        <h3 class="animar">Por pessoas, para pessoas</h3>
    
        <div class="owl-carousel owl-theme owl-depoimentos animar">
            <?php while($depoimentos->have_posts()) : $depoimentos->the_post(); ?>
            <div class="item">
                <div class="row">            
                    <div class="col-md-3">
                        <img  src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>"
                        class="circle rounded-circle"
                        alt="carrossel thumbnail">
                    </div>
                    <div class="col-md-9">
                        <p><?php the_content(); ?></p>
                        <p class="name"><?php the_title(); ?></p>
                        <p class="profession"><?php the_field('profissao'); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

