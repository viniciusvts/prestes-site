<section id="consultant">       
    <div class="form animar">
        <form action="<?php echo bloginfo( "url" ) ?>/wp-json/dna_theme/v1/formcontato/" method="POST" id="contatoform">
            <h3>Preencha todos os dados para que um de nossos corretores possa entrar em contato</h3>
            <label>
                Nome*<br>
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
                <span class="cidade">
                    <input type="text" name="cidade" id="cidade" value="" required>
                </span>
            </label>
            <label>
                Com quem quero falar*<br>
                <span class="setor">
                    <select name="setor" id="setor" required>
                        <option value=""></option>
                        <option value="Vendas">Vendas</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Financeiro">Financeiro</option>
                        <option value="RH">RH</option>
                    </select>
                </span>
            </label>
            <div style="display:none">
                <input type="hidden" name="urlOrigem" id="urlOrigem" value="<?php echo $_SERVER["REQUEST_URI"] ?>">
                <input type="hidden" name="traffic_source" id="traffic_source">
                <input type="hidden" name="traffic_medium" id="traffic_medium">
                <input type="hidden" name="traffic_campaign" id="traffic_campaign">
                <input type="hidden" name="traffic_value" id="traffic_value">
                <input type="hidden" name="identificador" id="identificador" value="/contato/">
            </div>
            <label>
                Mensagem<br>
                <span class="mensagem" id="mensagem">
                    <textarea name="mensagem" cols="40" rows="10" ></textarea>
                </span>
            </label>
            <label class="mx-auto">
                <input type="checkbox"
                name="communicationsconsent"
                id="communicationsconsent"
                checked>
                Eu concordo em receber comunica????es.
            </label>
            <div class="col-12">
                <div class="pageshow-title row">
                    <div class="g-recaptcha mx-auto"
                    data-sitekey="6LdEi0UaAAAAAGZpCfy55RKory2cHlxTdqRS2a3z"></div>
                </div>
            </div>
            <p>*Campos obrigat??rios</p>
            <hr>
            <p>Fique tranquilo, suas informa????es estar??o seguras conosco. N??s prometemos n??o utilizar para enviar quaisquer tipo de SPAM.</p>
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
        <!-- recapctch google #17453 -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
            * @param {String} param - par??metro que se quer pegar
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
                document.getElementById('traffic_source').value = getUriParam('utm_source') ? getUriParam('utm_source') : getCookie('__trf.src');
                document.getElementById('traffic_medium').value = getUriParam('utm_medium');
                document.getElementById('traffic_campaign').value = getUriParam('utm_campaign');
                document.getElementById('traffic_value').value = getUriParam('utm_term');
            });
            // envia o formul??rio
            var formContato = document.getElementById('contatoform');
            formContato.addEventListener('submit',function(evt){
                evt.preventDefault()
                if(formContato.querySelector("#telInput").value.length < 14){
                    alert("Digite um telefone v??lido")
                    return;
                }
                const gcok = evt.target.querySelector('[name="g-recaptcha-response"');
                if( !gcok.value ) {
                    alert("Preencha o desafio");
                    return;
                }
                const formData = new FormData(evt.target)
                const url = evt.target.action
                fetch(url,  {
                    method: "POST",
                    body: formData
                })
                .then(resp => {
                    if (resp.ok) return resp.json()
                    alert('Houve um erro ao enviar,\nTente novamente.')
                })
                .then(json => {
                    if(json.data.url){
                        location.href = json.data.url
                    } else {
                        alert("Houve um erro, tente novamente mais tarde.")
                    }
                })
            })
        </script>
    </div>
</section>