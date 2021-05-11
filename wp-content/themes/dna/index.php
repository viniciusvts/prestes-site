<?php get_header(); ?>

<?php get_template_part( 'template/banner-home'); ?>
<?php get_template_part( 'template/empreendimentos'); ?>
<?php get_template_part( 'template/premios'); ?>
<?php //get_template_part( 'template/simulacao'); ?>
<?php //get_template_part( 'template/minha-casa-minha-vida'); ?>
<img src="<?php bloginfo('template_url');?>/img/ilustracao-prestes.jpg" class="w-100" alt="ilustração prestes">
<?php get_template_part( 'template/depoimentos'); ?>
<?php get_template_part( 'template/fale-com-um-consultor'); ?>

<?php get_footer(); ?>