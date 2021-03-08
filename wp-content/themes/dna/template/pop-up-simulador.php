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

<div id="pop-up-simulator">
    <span onclick="close_pop_up()" class="close-pop-up">x</span>
    <form method="POST"
    action="<?php echo bloginfo( "url" ) ?>/agradecimento-simulacao/"
    class="bp-simulador container"
    id="formSimulator">
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
                            <input type="hidden" id="inp-hidden" name="empreendimentocliente" value="">
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
                            <input type="email" required name="email" id="email">
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
                                    <a href="#0" class="bttn" required onClick="next()">Continuar</a>
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
                            <input type="text" name="renda" required id="renda" onkeyup="maskMoney( this, mMoney );">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="pageshow-title row">
                            <h4>Quanto será a sua entrada? (R$)</h4>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="pageshow-choice row">
                            <input type="text" name="entrada" required id="entrada" onkeyup="maskMoney( this, mMoney );">
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
                            <input type="tel" name="tel" required id="tel" onkeyup="mascara( this, mtel );" maxlength="15">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="pageshow-title row">
                            <h4>Usará o seu FGTS?</h4>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="pageshow-choice row">
                            <div class="radio-group">
                                <div class="radio-choice">
                                    <input type="radio" name="fgts" required id="fgts-y" value="sim" class="radiobuttom">
                                    <label for="fgts-y">Sim</label>
                                </div>
                                <div class="radio-choice">
                                    <input type="radio" required name="fgts" id="fgts-n" value="nao" class="radiobuttom">
                                    <label for="fgts-n">Não</label>
                                </div>
                            </div>
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
                            <label class="mx-auto">
                                <input type="checkbox"
                                name="communicationsconsent"
                                id="communicationsconsent"
                                checked>
                                Eu concordo em receber comunicações.
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="pageshow-title row">
                            <div class="g-recaptcha mx-auto"
                            data-sitekey="6LdEi0UaAAAAAGZpCfy55RKory2cHlxTdqRS2a3z"
                            data-callback="gcCallback"></div>
                        </div>
                    </div>
                    <input type="hidden" name="urlOrigem" value="<?php echo $_SERVER["REQUEST_URI"] ?>">
                    <input type="hidden" name="converteuEm" value="<?php echo 'Form Pop-Up Simulador' ?>">
                    <input type="hidden" name="nomeDoEmpreendimento" value="<?php echo get_queried_object()->post_name; ?>">
                    <input type="hidden" name="traffic_source" id="traffic_source">
                    <input type="hidden" name="traffic_medium" id="traffic_medium">
                    <input type="hidden" name="traffic_campaign" id="traffic_campaign">
                    <input type="hidden" name="traffic_value" id="traffic_value">
                    <div class="col-12">
                        <div class=" pageshow-btns row">
                            <div class="col-6">
                                <div class="blockPress-btn">
                                    <a href="#0" class="bttn-l" onClick="prev()">Anterior</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="blockPress-btn">
                                    <a href="#0" class="bttn" required onClick="next()">Enviar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- recapctch google #17453 -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            function gcCallback(evt){
                if(evt){ document.querySelector('#formSimulator').setAttribute('data-gcok', true) }
            }
        </script>
        <script>
            /** https://www.w3schools.com/js/js_cookies.asp */
            function getCookie(cname) {
                let name = `${cname}=`;
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(";");
                for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === " ") {
                    c = c.substring(1);
                }
                if (c.indexOf(name) === 0) {
                    return c.substring(name.length, c.length);
                }
                }
                return "";
            }
            
            /**
            * Pega parametros passados pela uri
            * @param {String} param - parâmetro que se quer pegar
            * @author Vinicius de Santana
            */
            function getUriParam(param) {
                var params = window.location.search.substr(1).split('&');
                for (var i = 0; i < params.length; i++) {
                    var par = params[i].split('=');
                    if (par[0] == param) {
                        return decodeURIComponent(par[1]);
                    }
                }
                return '';
            }
            document.getElementById('traffic_source').value = getUriParam('utm_source') ? getUriParam('utm_source') : getCookie('__trf.src')
            document.getElementById('traffic_medium').value = getUriParam('utm_medium')
            document.getElementById('traffic_campaign').value = getUriParam('utm_campaign')
            document.getElementById('traffic_value').value = getUriParam('utm_term')
        </script>
    </form><!--bp-simulador container-->
</div>