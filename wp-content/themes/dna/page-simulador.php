<?php /* Template Name: Simulação */?>

<?php get_header(); ?>
<?php
$termsRegion = get_terms([
    'taxonomy' => 'regiao',
    'hide_empty' => true,
]);
$termsCity = get_terms([
    'taxonomy' => 'cidade',
    'hide_empty' => true,
]);
?>

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
<form method="POST" action="<?php echo bloginfo( "url" ) ?>/agradecimento-simulacao/" class="bp-simulador container" id="formSimulator">
    <div class="title row">
        <div class="col-12">
            <h3>Simulador de financiamento</h3>
        </div>
        <div class="bp-line col-12">
            <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
        </div>
    </div>
    <hr class="simulatorline">
    <div class="page-number row">
        <div class="page active">1</div>
        <div class="page">2</div>
        <div class="page">3</div>
        <div class="page">4</div>
        <div class="page">5</div>
    </div>
    <!--pageshow regiao&cidade-->
    <div class="row pageshow">
        <div class="container">
            <div class="row">
            <div class="col-12">
                    <div class="pageshow-title row">
                        <h4>Selecione a sua região</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-choice row">
                        <select id="regiao" name="regiao">
                            <option value="">Região</option>
                            <?php 
                                foreach ( $termsRegion as $term ){
                            ?>
                            <option value="<?php echo $term->slug; ?>">
                                <?php echo $term->name;?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-title row">
                        <h4>Selecione a sua cidade</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-choice row">
                        <select id="cidade" name="cidade">
                            <option value="">Cidade</option>
                            <?php 
                                foreach ( $termsCity as $term ){
                            ?>
                            <option value="<?php echo $term->slug; ?>">
                                <?php echo $term->name;?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class=" pageshow-btns row">
                        <div class="blockPress-btn">
                            <a href="#0" class="bttn" onClick="next()">Continuar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--pageshow-->
    <!--pageshow nome&email-->
    <div class="row pageshow" style="display:none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageshow-title row">
                        <h4>Qual o seu nome?</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-choice row">
                        <input type="text" name="nome" id="nome">
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-title row">
                        <h4>Qual o seu email?</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-choice row">
                        <input type="email" name="email" id="email">
                    </div>
                </div>
                <div class="col-12">
                    <div class=" pageshow-btns row">
                        <div class="col-6">
                            <div class="blockPress-btn">
                                <a href="#0" class="bttn-l" onClick="prev()">Anterior</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="blockPress-btn">
                                <a href="#0" class="bttn" onClick="next()">Continuar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--pageshow-->
    <!--pageshow renda&entrada-->
    <div class="row pageshow" style="display:none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageshow-title row">
                        <h4>Qual a sua renda? (R$)</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-choice row">
                        <input type="text" name="renda" id="renda" onkeyup="maskMoney( this, mMoney );">
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-title row">
                        <h4>Quanto será a sua entrada? (R$)</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-choice row">
                        <input type="text" name="entrada" id="entrada" onkeyup="maskMoney( this, mMoney );">
                    </div>
                </div>
                <div class="col-12">
                    <div class=" pageshow-btns row">
                        <div class="col-6">
                            <div class="blockPress-btn">
                                <a href="#0" class="bttn-l" onClick="prev()">Anterior</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="blockPress-btn">
                                <a href="#0" class="bttn" onClick="next()">Continuar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--pageshow-->
    <!--pageshow tel-->
    <div class="row pageshow" style="display:none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageshow-title row">
                        <h4>Qual o seu telefone com DDD?</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-choice row">
                        <input type="tel" name="tel" id="tel" onkeyup="mascara( this, mtel );" maxlength="15">
                    </div>
                </div>
                <div class="col-12">
                    <div class=" pageshow-btns row">
                        <div class="col-6">
                            <div class="blockPress-btn">
                                <a href="#0" class="bttn-l" onClick="prev()">Anterior</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="blockPress-btn">
                                <a href="#0" class="bttn" onClick="next()">Continuar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--pageshow-->
    <!--pageshow fgts&cash-->
    <div class="row pageshow" style="display:none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageshow-title row">
                        <h4>Usará o seu FGTS?</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-choice row">
                        <div class="radio-group">
                            <div class="radio-choice">
                                <input type="radio" name="fgts" id="fgts-y" value="sim" class="radiobuttom">
                                <label for="fgts-y">Sim</label>
                            </div>
                            <div class="radio-choice">
                                <input type="radio" name="fgts" id="fgts-n" value="nao" class="radiobuttom">
                                <label for="fgts-n">Não</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-title row">
                        <h4>Possui valor de entrada?</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pageshow-choice row">
                        <div class="radio-group">
                            <div class="radio-choice">
                                <input type="radio" name="cash" id="cash-y" value="sim" class="radiobuttom">
                                <label for="cash-y">Sim</label>
                            </div>
                            <div class="radio-choice">
                                <input type="radio" name="cash" id="cash-n" value="nao" class="radiobuttom">
                                <label for="cash-n">Não</label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="name" name="urlOrigem" style="display:none">
                <div class="col-12">
                    <div class=" pageshow-btns row">
                        <div class="col-6">
                            <div class="blockPress-btn">
                                <a href="#0" class="bttn-l" onClick="prev()">Anterior</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="blockPress-btn">
                                <button type="submit" id="formSimulatorSubmit" class="bttn">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form><!--bp-simulador container-->
<?php get_footer();?>