<?php
    $premios = new WP_Query(array('post_type'=>'premios', 'posts_per_page'=> 4));
    if($premios->have_posts()):
?>
<section id="awards">
    <div class="container">
        <h2 class="animar">O mercado acredita na Prestes</h2>
        <div class="row">
            <?php while($premios->have_posts()): $premios->the_post(); ?>
                <div class="col-md-6 col-lg-3 animar">        
                    <div class="image">
                        <?php $link = get_field('link'); ?>
                            <?php if($link):?>
                                <a href="<?php echo $link; ?>" target="_blank">
                            <?php endif; ?>
                                <img  src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="post thumbnail">
                            <?php if($link):?>
                                </a>
                            <?php endif; ?>
                    </div>
                    <div class="description">
                        <h4><b><?php the_title(); ?></b></h4>
                        <p><?php the_field('descricao'); ?></p>
                    </div>                     
                </div>            
            <?php endwhile; ?>         
        </div>
    </div>
</section>
<?php endif; ?>