<section id="consultant">
    <h2>Simule agora - Grátis</h2>
    <?php echo file_get_contents("wp-content/themes/dna/svg/line-color.svg"); ?>
       
    <div class="form animar">
        <form action="<?php echo bloginfo( "url" ) ?>/wp-json/dna_theme/v1/falecomconsultor/" method="POST" id="central-de-vendas">
            <h3>Preencha todos os dados para que um de nossos corretores possa entrar em contato</h3>
            <label>
                Seu nome*<br>
                <span class="nome">
                    <input type="text" name="name" id="name" value="" required>
                </span>
            </label>
            <label>
                E-mail*<br>
                <span class="email">
                    <input type="email" name="email" id="email" value="" required>
                </span>
            </label>
            <label>
                Telefone*<br>
                <span class="telefone">
                    <input type="text" name="telefone" id="telInput" value="" required>
                </span>
            </label>
            <label>
                Cidade*<br>
                <span class="setor">
                    <select name="city" id="city" required>
                        <option value="Apucarana">Apucarana</option>
                        <option value="Cambé">Cambé</option>
                        <option value="Castro">Castro</option>
                        <option value="Curitiba">Curitiba</option>
                        <option value="Guarapuava">Guarapuava</option>
                        <option value="Londrina">Londrina</option>
                        <option value="Maringá">Maringá</option>
                        <option value="Ponta Grossa">Ponta Grossa</option>
                        <option value="Tibagi">Tibagi</option>
                    </select>
                </span>
            </label>
            <label class="mx-auto">
                <input type="checkbox"
                name="communicationsconsent"
                id="communicationsconsent"
                checked>
                Eu concordo em receber comunicações.
            </label>
            <div style="display:none">
                <?php
                // path, query
                $url = parse_url($_SERVER["REQUEST_URI"]);
                ?>
                <input type="hidden" name="urlOrigem" id="urlOrigem" value="<?php echo $url['path']; ?>">
                <input type="hidden" name="traffic_source" id="traffic_source">
                <input type="hidden" name="traffic_medium" id="traffic_medium">
                <input type="hidden" name="traffic_campaign" id="traffic_campaign">
                <input type="hidden" name="traffic_value" id="traffic_value">
            </div>
            <p>*Campos obrigatórios</p>
            <hr>
            <p>Fique tranquilo, suas informações estarão seguras conosco. Nós prometemos não utilizar para enviar quaisquer tipo de SPAM.</p>
            <div class="container">
                <div class="row">
                    <div class="blockPress-btn">
                        <div class="bttn">
                            <input type="submit" value="Agende uma conversa" class="wpcf7-form-control wpcf7-submit">
                            <span class="ajax-loader"></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
            window.addEventListener('load', function(){
                document.querySelector('#central-de-vendas #traffic_source').value = getUriParam('utm_source') ? getUriParam('utm_source') : getCookie('__trf.src');
                document.querySelector('#central-de-vendas #traffic_medium').value = getUriParam('utm_medium');
                document.querySelector('#central-de-vendas #traffic_campaign').value = getUriParam('utm_campaign');
                document.querySelector('#central-de-vendas #traffic_value').value = getUriParam('utm_term');
            });
        </script>
    </div>
</section>