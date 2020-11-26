<?php /* Template Name: Minha casa minha vida */ 
chr_setPostViews( get_the_ID() );
?>

<?php get_header(); ?>

    <div class="bd-example" style="background-image:unset" id="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div id="mcmv" class="carousel-item active">
            <div id="filter"></div>
            <div class="caption">
            <h1 class="font-lato">Saia do aluguel com o MCMV!</h1>
            <p>Aqui você encontra tudo o que precisa para garantir o seu Prestes através do programa Minha Casa Minha Vida.</p>
            <div class="breadcrumbs"><?php wp_custom_breadcrumbs(); ?></div>
            <div class="row">
                <div style="margin-left:unset" class="blockPress-btn">
                <a href="#consultant" class="bttn bttn-white">Simule agora - Grátis</a>
                </div>
            </div>
            </div>
            <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 img-filter')); ?>
        </div>      
        </div>
    </div>
    </div>

    <section id="minha-casa-minha-vida">
    <div class="container-fluid no-gutters"> 
                
        <div class="row no-gutters">      
            <div class="col-md-6">
                <div class="left">     
                    <div class="floater">
                        <img src="<?php bloginfo('template_url');?>/img/minha-casa-minha-vida.jpg"> 
                    </div>                
                    <div class="gradient"></div>
                    <img src="<?php bloginfo('template_url');?>/img/bgimg.jpg" class="image">
                </div>
            </div> 
            <div class="col-md-6">
                <div class="right animar">
                    <h2>Minha Casa Minha Vida com a Prestes</h2>
                    <p>
                    Com vantagens especiais para facilitar o financiamento da casa própria, o MCMV já beneficiou mais de 5,5 milhões de famílias em todo Brasil.
                    </p>
                    <p>
                    Agora chegou a sua vez de realizar o seu sonho com a Prestes:
                    </p>
                    <ul>
                        <li><span>Entrega Garantida: </span> Mais de 3800 mil chaves entregues nos últimos 48 meses;</li>
                        <li><span>Confiança: </span> há 11 anos no mercado com mais de 5000 clientes em mais de 8 cidades do Paraná;</li>
                        <li><span>Qualidade Absoluta: </span> produtos e fornecedores de qualidade reconhecida em condomínios com paisagismo e lazer para uma excelente qualidade de vida dos moradores;</li>
                        <li><span>Reconhecimento: </span> somos premiados pela ADEMI como maior incorporadora do Paraná em 2018;;</li>
                    </ul>
                    <div class="blockPress-btn animar">
                        <a href="<?php bloginfo('url');?>/financiamento/minha-casa-minha-vida/" class="bttn">Veja os empreendimentos</a>
                    </div>
                </div>
            </div>         
        </div>
    </div>
</section>



<?php get_template_part( 'template/relacionados'); ?>
<?php //get_template_part( 'template/video'); ?>
<section id="video">
<iframe width="100%" height="556" src="https://www.youtube.com/embed/9UzCPDgSoVs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</section>


<section id="ebook">
    <h2>Quer saber tudo sobre como financiar um imóvel pelo MCMV?</h2>
    <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
    <div class="container">
        <div id="ebook-row" class="row">
            <div class="col-sm-12 col-md-6">
                <p id="title-sec">Preencha o formulário ao lado e receba <span>gratuitamente o nosso eBook!</span></p>
                <p id="img-ebook">
                <img src="<?php bloginfo('template_url');?>/img/ebook.png"> 
                </p>
            </div>
            <div class="col-sm-12 col-md-6">
            <div role="main" id="material-rico-mcmv-63b47055a6ff187f46fa"></div>
    <script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/rdstation-forms/stable/rdstation-forms.min.js"></script>
    <script type="text/javascript"> new RDStationForms('material-rico-mcmv-63b47055a6ff187f46fa', 'UA-100759079-1').createForm();</script>
            </div>
    </div>
    </div>
</section>


<section id="passo-a-passo">
    <h2>Passo a passo para comprar seu imóvel</h2>
    <div class="customNextBtn-steps"><p><?php echo file_get_contents("wp-content/themes/dna/svg/arrow-point-to-right.svg"); ?></p></div>
    <div class="customPrevBtn-steps"><p><?php echo file_get_contents("wp-content/themes/dna/svg/arrow-point-to-right.svg"); ?></p></div>
    <div class="container">
        <div id="step" class="owl-carousel owl-theme owl-steps">
            <div class="step item">
                <div class="row"><span class="step-number">1</span></div>
                <div class="">Conversar com os nossos consultores.</div>
                <?php // echo file_get_contents("wp-content/themes/dna/svg/tracos.svg"); ?>
            </div>
            <div class="step item">
                <div class="row"><span class="step-number">2</span></div>
                <div class="">Identificar as melhores opções de acordo com o seu perfil.</div>
                <?php // echo file_get_contents("wp-content/themes/dna/svg/tracos.svg"); ?>
            </div>
            <div class="step item">
                <div class="row"><span class="step-number">3</span></div>
                <div class="">Escolher o melhor imóvel para você.</div>
                <?php // echo file_get_contents("wp-content/themes/dna/svg/tracos.svg"); ?>
            </div>
            <div class="step item">
                <div class="row"><span class="step-number">4</span></div>
                <div class="">Separar os documentos necessários para adquirir o imóvel.</div>
            </div>
            <div class="step item">
                <div class="row"><span class="step-number">5</span></div>
                <div class="">A Prestes irá enviar os documentos para o banco e facilitar a liberação do financiamento.</div>
                <?php // echo file_get_contents("wp-content/themes/dna/svg/tracos.svg"); ?>
            </div>
            <div class="step item">
                <div class="row"><span class="step-number">6</span></div>
                <div class="">Assinar o contrato com a Prestes.</div>
                <?php // echo file_get_contents("wp-content/themes/dna/svg/tracos.svg"); ?>
            </div>
            <div class="step item">
                <div class="row"><span class="step-number">7</span></div>
                <div class="">Documentos aprovados! Hora de assinar o contrato de financiamento da sua casa própria.</div>
                <?php // echo file_get_contents("wp-content/themes/dna/svg/tracos.svg"); ?>
            </div>
            <div class="step item">
                <div class="row"><span class="step-number">8</span></div>
                <div class="">Sonho realizado e concluído com sucesso. Aproveite a casa nova! </div>
            </div>
        </div>
        <div class="row">
        <div class="blockPress-btn">
            <a href="#consultant" class="bttn">Falar com um consultor</a>
        </div> 
        </div>
    </div>
</section>

<?php get_template_part( 'template/fale-com-um-consultor'); ?>

<section id="perguntas-frequentes">
    <h2>Perguntas Frequentes</h2>
    <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
    <div class="accordion container" id="accordionExample">
    <div class="bg">
        <div class="head" id="headingOne">
        <h3 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            O que é o Minha Casa Minha Vida?
            </button>
        </h3>
        <h4 class="indicator-show"></h4>
        </div>
        <div id="collapseOne" class="finder collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <p>O programa Minha Casa Minha Vida (MCMV) é uma iniciativa do Governo Federal para viabilizar a 
                    aquisição da casa própria através de financiamentos acessíveis. Implementado em 2009, desde 
                    então, já entregou mais de 5,5 milhões de moradias.</p>
                <div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="head" id="headingTwo">
            <h3 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Quem pode participar do Minha Casa Minha Vida?
                </button>
            </h3>
            <h4 class="indicator-show"></h4>
        </div>
        <div id="collapseTwo" class="finder collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
            <p>Pessoas com renda bruta familiar de até R$ 9 mil que estão em busca do primeiro imóvel próprio.
                </p>
                <div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="head" id="headingThree">
            <h3 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Quais as vantagens do programa Minha Casa Minha Vida pela Prestes?
                </button>
            </h3>
            <h4 class="indicator-show"></h4>
            </div>
            <div id="collapseThree" class="finder collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <p>O programa Minha Casa Minha Vida é a melhor opção de financiamento de imóvel pelos seus juros baixos, flexibilidade de parcelas e, em alguns casos, subsídio do Governo.
O cidadão pode adquirir um imóvel novo ou usado, em centros urbanos ou áreas rurais, em construção ou já pronto, e tudo isso sem ter que apertar o orçamento. 
Além disso, a consultoria especializada da Prestes é ponto-chave na hora de escolher o imóvel que é a sua cara e cabe no bolso.
</p>
<div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
            </div>
        </div>
        <div class="bg">
            <div class="head" id="headingFour">
                <h3 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Quais são os pré-requisitos para participar do programa?
                    </button>
                </h3>
                <h4 class="indicator-show"></h4>
            </div>
            <div id="collapseFour" class="finder collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        <ul>
                            <li>Ter mais de 18 anos;</li>
                            <li>Trabalho com carteira assinada por, no mínimo, 3 anos;</li>
                            <li>Residir ou trabalhar há um ano no mesmo município que o imóvel pretendido;</li>
                            <li>Não possuir nenhum outro imóvel no nome do comprador;</li>
                            <li>A prestação do financiamento não pode comprometer mais do que 30% da renda familiar mensal;</li>
                            <li>O imóvel não pode ser utilizado para fins comerciais;</li>
                            <li>É necessário comprovação de renda (formal, informal ou combinada).</li>
                        </ul>
                    </p>
                    <div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
                </div>
            </div>
        </div>
        <div class="bg">
            <div class="head" id="headingFive">
                <h3 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Como posso me inscrever no Minha Casa Minha Vida?
                    </button>
                </h3>
                <h4 class="indicator-show"></h4>
            </div>
            <div id="collapseFive" class="finder collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    <p>O programa é dividido em faixas, na qual cada uma corresponde a rendas familiares distintas e o modo de inscrição irá variar de acordo com a sua colocação.
Aqueles que possuem renda familiar mensal de até R$ 1.800, portanto, faixa 1 do programa, devem realizar o cadastro do MCMV na prefeitura da sua cidade.
</p>
<p><p>Já quem tem renda familiar mensal entre R$ 1.800 e R$ 9 mil, pode fazer a inscrição no programa diretamente nos bancos, com o auxílio e consultoria da Prestes. Após isso, a instituição financeira irá analisar os seus dados e apresentar as condições de financiamento.</p></p>
<div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>           
</div>
            </div>
        </div>
    <div class="bg">
        <div class="head" id="headingSix">
            <h3 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Quando o contrato é assinado?
                </button>
            </h3>
            <h4 class="indicator-show"></h4>
        </div>
        <div id="collapseSix" class="finder collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
            <div class="card-body">
                <p>O grande momento de assinar o contrato do imóvel acontece quando a documentação é aprovada e validada pelo banco escolhido e o contrato com a Prestes é fechado.</p>
                <div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="head" id="headingSeven">
            <h3 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                Quais são as vantagens e benefícios de comprar com a Prestes?
                </button>
            </h3>
            <h4 class="indicator-show"></h4>
        </div>
        <div id="collapseSeven" class="finder collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
            <div class="card-body">
                <p>A Prestes oferece uma consultoria especializada e personalizada, levando em consideração as particularidades de cada cliente. Dessa forma, se tem a garantia de estar adquirindo o melhor imóvel de acordo com as suas condições.
Além disso, os imóveis da Prestes têm como prioridade a qualidade de vida e bem estar de seus moradores, por isso existe um grande investindo em boa infraestrutura.
</p>
<div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="head" id="headingEight">
            <h3 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                Quais são as taxas de juros cobradas?
                </button>
            </h3>
            <h4 class="indicator-show"></h4>
        </div>
        <div id="collapseEight" class="finder collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
            <div class="card-body">
                <p>As taxas de juros cobradas irão variar de acordo com a faixa que você se encontra. Quem está na faixa 1 e 2, os juros serão de 5% ao ano. Para quem está na faixa 3, eles podem chegar até 9% ao ano.</p>
                <div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="head" id="headingNine">
            <h3 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                É possível utilizar o FGTS para financiar o imóvel no Minha Casa Minha Vida?
                </button>
            </h3>
            <h4 class="indicator-show"></h4>
        </div>
        <div id="collapseNine" class="finder collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
            <div class="card-body">
                <p>Sim! É possível utilizar o FGTS para dar entrada no financiamento, na quitação de parcelas ou para reduzir o saldo devedor. Para isso, é necessário:</p>
                <ul>
                    <li>Ter, ao menos, 3 anos trabalhando sob o regime FGTS (podendo ser em empresas diferentes);</li>
                    <li>Não possuir qualquer financiamento ativo no Sistema Financeiro de Habitação (SFH);</li>
                    <li>Não já ter utilizado o FGTS para adquirir um imóvel ou no abatimento do saldo devedor dos últimos 5 anos.</li>
                </ul>
                <div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="head" id="headingTen">
            <h3 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                Posso adquirir um imóvel com o CPF negativado?
                </button>
            </h3>
            <h4 class="indicator-show"></h4>
        </div>
        <div id="collapseTen" class="finder collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
            <div class="card-body">
                <p>Sim e não. Quem está nas faixas 1 e 1,5 do Minha Casa Minha Vida, é possível participar do programa mesmo com o CPF negativado (ou o popular “nome sujo”). Isso acontece porque nessa classificação não é feita análise de crédito.</p>
                <p>Já nas demais faixas, o banco realiza uma análise do perfil do comprador e o risco do financiamento ser negado é grande para quem possui CPF negativado.</p>
                <div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="head" id="headingEleven">
            <h3 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                É possível realizar o financiamento de um imóvel se eu já tiver um financiamento de veículo?
                </button>
            </h3>
            <h4 class="indicator-show"></h4>
        </div>
        <div id="collapseEleven" class="finder collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
            <div class="card-body">
                <p>Ter um veículo financiado não atrapalha no momento de tentar o financiamento de um imóvel caso as duas parcelas caibam no seu orçamento. 
No entanto, caso existam parcelas em atraso no pagamento do carro e o score for baixo, se torna mais difícil que o banco libere um novo financiamento.
</p>
<div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="head" id="headingTwelve">
            <h3 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                Como o banco calcula o score?
                </button>
            </h3>
            <h4 class="indicator-show"></h4>
        </div>
        <div id="collapseTwelve" class="finder collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
            <div class="card-body">
                <p>O valor do score é baseado em algumas variáveis do comprador, como: idade, endereço, CPF, histórico de crédito, renda, dívidas anteriores, pagamentos feitos depois do vencimento etc.
Essa pontuação é disponibilizada pelo Serasa Score e Boa Vista SCPC.
</p>
<div style="width:fit-content" class="blockPress-btn">
                    <a href="#consultant" class="bttn">Falar com um consultor</a>
                </div><br>
            </div>
        </div>
    </div>
    </div>
</section>


<?php get_footer(); ?>