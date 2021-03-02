/*! DNA main.js*/
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
  
  $(this).ekkoLightbox();
};

/**
 * Ao ser iserido no evento do select, dá um submit no form
 */
function submitOnSelect(){
  this.parentNode.submit();
}
/**
 * Inicia e configura o botão de escolher a localização
 * @author Vinicius de Santana
 */
class LocationSidebar{
  constructor(){
    this.locationSidebar = document.getElementById("locationSidebar");
    this.citylink = document.getElementById("citylink");
    this.locationclose = document.getElementById("closeLocSidebar");
    this.listItens = document.querySelectorAll("#locList a");
    // evento de abrir a sidebar
    try {
      this.citylink.onclick = this.openLocationSidebar;
      this.citylink.targ = this.locationSidebar;
    } catch(e) {
      console.warn(e);
    }
    // evento de fechar a sidebar
    try {
      this.locationclose.onclick = this.closeLocationSidebar;
      this.locationclose.targ = this.locationSidebar;
    } catch(e) {
      console.warn(e);
    }
    //FIM evento de abrir e fechar a sidebar
    //resgatar informações de empreendimentos de acordo com a cidade escolhida
    for (var i = 0; i < this.listItens.length; i++) {
      this.listItens[i].onclick = this.loadEmp;
    }
  }
  /**
   * Apenas altera a classe da sidebar para exibir
   * @author  Vinicius de Santana
   */
  openLocationSidebar(){
    this.targ.classList.add('active');
  }

  /**
   * Apenas altera a classe da sidebar para esconder
   * @author  Vinicius de Santana
   */
  closeLocationSidebar(){
    this.targ.classList.remove('active');
  }

  loadEmp(){
    var city = this.innerText;
    empreendimentosNaLocalizacaoDoUsuarioCityToId(city);
    getCentralDeAtendimentoFromACF(city);
    //fechar a sidebar e alterar o nome no menu
    var citylink = document.getElementById("citylink");
    var locationclose = document.getElementById("closeLocSidebar");
    locationclose.click();
    citylink.innerText = city;
  }
}


/**
 * Requisição para localizar em que cidade o usuário está
 * @author Vinicius de Santana
 */
function localizarUser(){
  var locale = {lat: "",lon :"", city: ""};//definida globalmente
  //var target = document.querySelector('#map');
  //requisição assíncrona
  var xhttp = new XMLHttpRequest();
  var geoOptions = {
    maximumAge: 5 * 60 * 1000, //localização nos dos últimos 5 minutos
  }
  var geoSuccess = function(position) {
    //var target = document.querySelector('#map');
    locale.lat = position.coords.latitude;
    locale.lon = position.coords.longitude;
    //monta a url https://nominatim.openstreetmap.org/reverse?lat=-12.869759499999999&lon=-38.3003171
    //monta a url https://maps.googleapis.com/maps/api/geocode/json?latlng=-12.869759499999999,-38.3003171&key=
    var urlapi = "https://nominatim.openstreetmap.org/reverse?lat=";
    urlapi += locale.lat;
    urlapi +="&lon=";
    urlapi += locale.lon;
    urlapi += "&format=json";
    //requisição assíncrona
    xhttp.open("GET", urlapi, true);
    xhttp.send();
    
    xhttp.onreadystatechange = function(){//Função a ser chamada quando a requisição retornar do servidor
        if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
            var jsonresponse = JSON.parse(xhttp.response);
            locale.city = jsonresponse.address.city?jsonresponse.address.city:jsonresponse.address.town;
            //preenche cidade e estado na navbar 
            var cityuser = locale.city;
            cityuser += "/"+jsonresponse.address.state;
            var cityhtml = document.getElementById('citylink');
            cityhtml.innerText = cityuser;
            cityuserglobal = locale.city;
            //chama as funções
            //criarLinkParaEmpreendimentosProximos();
            empreendimentosNaLocalizacaoDoUsuarioCityToId(locale.city);
            getCentralDeAtendimentoFromACF(locale.city);
        }
    }
  };
  var geoError = function(error) {
    console.log('Erro ao recuperar localização. Código do erro: ' + error.code);
    // error.code can be:
    //   0: unknown error
    //   1: permission denied
    //   2: position unavailable (error response from location provider)
    //   3: timed out
  };
  navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
}

/**
 * define a url do site, seja local ou web
 * @returns {String} A raiz do site atual
 * @author Vinicius de Santana
 */
function getSiteUrl(){
  var siteUrl = window.location.protocol+"//"+window.location.hostname;
  if(window.location.hostname == "localhost"){ //dev
    siteUrl += "/prestes";
  }
  return siteUrl;
}

/**
 * Preenche os dados de central de vendas na dom
 * @param {String} tel o telefone da central de vendas
 * @param {String} email o email da central de vendas
 * @param {String} end o endereço da central de vendas
 * @param {String} city a cidade da central de vendas
 * @author Vinicius de Santana
 */
function setCentralDeVendasNoFooter(tel, email, end, city){
  var cdvTel = document.getElementById("cdv-tel");
  var cdvEmail = document.getElementById("cdv-email");
  var cdvEnd = document.getElementById("cdv-end");
  var cdvCity = document.getElementById("cdv-cidade");
  var cdvEmailA = document.getElementById("cdv-email-a");
  var cdvTelA = document.getElementById("cdv-tel-a");
  cdvTel.innerHTML = tel?tel:cdvTel.innerHTML;
  cdvEmail.innerHTML = email?email:cdvEmail.innerHTML;
  cdvEnd.innerHTML = end?end:cdvEnd.innerHTML;
  cdvCity.innerHTML = city?city:cdvCity.innerHTML;
  if(email){ cdvEmailA.setAttribute("href", "mailto:" + email); }
  if(tel){ cdvTelA.setAttribute("href", "tel:"+ tel.replace(/\D/g,"")); }
}

/**
 * Busca na api uma central de atendimento disponível na cidade em que o usuário está
 * Depois chama o método que preencherá os dados na dom
 * @param {String} city a cidade do usuário
 * @author Vinicius de Santana
 */
function getCentralDeAtendimentoFromACF(city){
  var siteUrl = getSiteUrl();
  var urlapi = siteUrl + "/wp-json/acf/v3/central";
  var xhttp = new XMLHttpRequest;
  xhttp.open("GET", urlapi, true);
  xhttp.send();
  xhttp.onreadystatechange = function(){//Função a ser chamada quando a requisição retornar do servidor
    if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
      var jsonresponse = JSON.parse(xhttp.response);
      for(var i = 0; i< jsonresponse.length ; i++){
        item = jsonresponse[i];
        if(item.acf.cidade == city){
          setCentralDeVendasNoFooter(item.acf.tel, item.acf.email, item.acf.ends[0].end, item.acf.cidade);
          return;
        }
      }
    }
  }
}

/**
 * Função redireciona para o mapa efetuando uma pesquisa
 * @author Vinicius de Santana
 */
function buscarEmpreendimentosHeader(){
  var siteUrl = getSiteUrl();
  var optionRegion = document.getElementById("regiaoH");
  var optionState = document.getElementById("estadoH");
  var optionCity = document.getElementById("cidadeH");
  urlRedirect = siteUrl+"/mapa/#iframe-map?";
  urlRedirect += "region=" + optionRegion.value;
  urlRedirect += "&state=" + optionState.value;
  urlRedirect += "&city=" + optionCity.value;
  window.location.href = urlRedirect;
}

/**
 * cria link para a pagina que lista empreendimentos utilizando a localização do user como variavel
 * @author Vinicius de Santana
 * @deprecated em 10/11 foi solicitado a mudança de link para escolha de cidades
 */
function criarLinkParaEmpreendimentosProximos(){
  var cityLink = document.getElementById("citylink");
  var siteUrl = window.location.protocol+"//"+window.location.hostname;
  if(window.location.hostname == "localhost"){ //dev
    siteUrl += "/prestes";
  }
  var urlapi = siteUrl + "/wp-json/wp/v2/cidade";
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", urlapi, true);
  xhttp.send();
  
  xhttp.onreadystatechange = function(){//Função a ser chamada quando a requisição retornar do servidor
      if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
          var jsonresponse = JSON.parse(xhttp.response);
          jsonresponse.forEach(res=>{
            if(res.name == cityuserglobal){
              cityLink.href = res.link;
            }
          });
      }
  }
}
/**
 * adiciona um novo card na seção especificada
 * @param {} posts Post a ser processado
 * @param {HTMLElement} secao
 * @author Vinicius de Santana
 */
function novoCardEmpreendimento(post, secao){
  var siteUrl = getSiteUrl();
  var card = "";
  card += "<div class='bp-col-xxl-3 col-xl-4 col-lg-6 col-12'><a href='" ;
  card += post.link ;
  card += "'><div class='item'><div class='blockpress-card'>" ;
  card += post.DNA_custom.postThumbnail ;
  card += "<div class='description'><div class='container-fluid'><div class='row no-gutters'><div class='col-6'><h4>" ;
  card += post.title.rendered ;
  card += "</h4><h5>" ;
  card += post.DNA_custom.cidade[0].name ;
  card += " / " ;
  card += post.DNA_custom.estado[0].name ;
  card += "</h5><h6>" ;
  card += post.DNA_custom.categoria[0].name ;
  card += "</h6></div><div class='col-6'><div class='container-fluid attributes'><div class='row no-gutters'><div class='col'>" ;
  card += "<img src='" +siteUrl + "/wp-content/themes/dna/svg/bed.svg'>" ;
  card += "<p>" + post.acf.informacoes_legais.quartos + "</p>" ;
  card += "</div><div class='col'>" ;
  card += "<img src='" +siteUrl + "/wp-content/themes/dna/svg/home.svg'>" ;
  card += "<p>" + post.acf.informacoes_legais.metragem + "</p>" ;
  card += "</div><div class='col'>" ;
  card += "<img src='" +siteUrl + "/wp-content/themes/dna/svg/car.svg'>" ;
  card += "<p>" + post.acf.informacoes_legais.vagas + "</p>" ;
  card += "</div></div></div></div></div></div></div><div class='detail'>" ;
  card += "<img src='" +siteUrl + "/wp-content/themes/dna/svg/filete-card.svg'>" ;
  card += "</div></div></div></a></div>" ;
  secao.innerHTML += card;
}

/**
 * Preenche  a seção de empreendimento na home com os posts do parametro
 * @param {[]}posts Posts a serem processados
 * @author Vinicius de Santana
 */
function empreendimentosNaLocalizacaoDoUsuarioPostsToPage(posts){
  if(posts.length > 0 ){
    var carroussel = document.getElementById("bp-carroussel");
    var cityEmp = document.getElementById("cityEmp");
    carroussel.innerHTML = "";
    cityEmp.innerHTML = posts[0].DNA_custom.cidade[0].name;
    for(var i = 0; i<posts.length; i++){
      novoCardEmpreendimento(posts[i], carroussel);
    }
    setasNoCarrossel();
  }
}

/**
 * Solicita via ajax os posts (se houver) dos imóveis levando em consideração o id da categoria em qual se encontram
 * Chama o método que irá tratar esses posts
 * @param {number}id Id da categoria
 * @author Vinicius de Santana
 */
function empreendimentosNaLocalizacaoDoUsuarioIdToPosts(id){
  var siteUrl = getSiteUrl();
  var urlapi = siteUrl + "/wp-json/wp/v2/imoveis?cidade=" + id;
  var xhttp = new XMLHttpRequest;
  xhttp.open("GET", urlapi, true);
  xhttp.send();
  xhttp.onreadystatechange = function(){//Função a ser chamada quando a requisição retornar do servidor
      if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
          var jsonresponse = JSON.parse(xhttp.response);
          empreendimentosNaLocalizacaoDoUsuarioPostsToPage(jsonresponse);
      }
  }
}

/**
 * Solicita via ajax o id (se houver) da categoria cidade com o nome da cidade do usuário
 * @param {string}city Nome da cidade
 * @author Vinicius de Santana
 */
function empreendimentosNaLocalizacaoDoUsuarioCityToId(city){
  var siteUrl = getSiteUrl();
  var urlapi = siteUrl +"/wp-json/wp/v2/cidade";
  var xhttp = new XMLHttpRequest;
  xhttp.open("GET", urlapi, true);
  xhttp.send();
  xhttp.onreadystatechange = function(){//Função a ser chamada quando a requisição retornar do servidor
      if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
          var jsonresponse = JSON.parse(xhttp.response);
          for(var i = 0; i< jsonresponse.length ; i++){
            item = jsonresponse[i];
            if(item.name == city){
              empreendimentosNaLocalizacaoDoUsuarioIdToPosts(item.id);
            }
          }
      }
  }
}

/**
 * Provê o rolamento para a direita do carrossel na home
 * @author Vinicius de Santana
 */
function scrollR(){
  var carroussel = document.querySelector(".bp-carroussel-row");
  carroussel.scrollLeft += document.querySelector(".bp-col-xxl-3").offsetWidth;
}

/**
 * Provê o rolamento para a esquerda do carrossel na home
 * @author Vinicius de Santana
 */
function scrollL(){
  var carroussel = document.querySelector(".bp-carroussel-row");
  carroussel.scrollLeft -= document.querySelector(".bp-col-xxl-3").offsetWidth;
}

/**
 * Provê o rolamento para a direita do carrossel na single imoveis
 * @param {String} selCarroussel seletor de todo o carrossel
 * @param {String} selItem seletor do item do carrossel
 * @author Vinicius de Santana
 */
function scrollEPR(selCarrossel, selItem){
  var carroussel = document.querySelector(selCarrossel);
  carroussel.scrollLeft += document.querySelector( selCarrossel + " > " + selItem ).offsetWidth;
}

/**
 * Provê o rolamento para a esquerda do carrossel na single imoveis
 * @param {String} selCarroussel seletor de todo o carrossel
 * @param {String} selItem seletor do item do carrossel
 * @author Vinicius de Santana
 */
function scrollEPL(selCarrossel, selItem){
  var carroussel = document.querySelector(selCarrossel);
  carroussel.scrollLeft -= document.querySelector( selCarrossel + " > " + selItem ).offsetWidth;
}

/**
 * Caucula a necessidade do cursor de seta no carrossel os eliminando se necessário
 * @author Vinicius de Santana
 */
function setasNoCarrossel(){
  var carroussel = document.getElementById("bp-carroussel");
  var cards = document.querySelectorAll("#bp-carroussel .item");
  var cardsWidthTotal = 0;
  for (var i = 0; i<cards.length; i++){
    cardsWidthTotal += cards[i].offsetWidth;
  }
    try {
      if (cardsWidthTotal < carroussel.offsetWidth){
        document.querySelector(".rectangle-left").style.display = "none";
        document.querySelector(".rectangle-right").style.display = "none";
      }else{
        document.querySelector(".rectangle-left").style.display = "";
        document.querySelector(".rectangle-right").style.display = "";
      }
    }
    catch (e) {
      // declarações para manipular quaisquer exceções
      console.log(e); // passa o objeto de exceção para o manipulador de erro
    }
}

/**
 *Máscaras ER 
 * http://wbruno.com.br/expressao-regular/mascara-campo-de-telefone-em-javascript-com-regex-nono-digito-telefones-sao-paulo/
 * @deprecated
*/
function mtel(v){
  v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
  v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
  v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
  return v;
}

/** 
 * Recebe o input que receberá a mascara
 * @example document.getElementById("telInput").onkeyup = execMascara;
 * @deprecated
*/
function execMascara(){
  this.value = mtel(this.value);
}
/**
 * Executa máscara de telefone
 * @author Vinicius de Santana
 * @param {KeyboardEvent} evt 
 */
function execMascaraTel (evt) {
  let v = evt.target.value;
  v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
  v=v.replace(/^(\d{11})(\d*)/g,"$1"); // remove o excedente de 11 digitos
  v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
  v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca - depois dos 4 digitos após ()
  evt.target.value = v;
}

function close_pop_up() {
  var btnClose = document.getElementById('close-pop-up');
  var popUp = document.getElementById('pop-up-simulator');
  popUp.style.display = "none";
}
function open_pop_up(name) {
  var hiddenInput = document.getElementById('inp-hidden');
  var popUp = document.getElementById('pop-up-simulator');
  popUp.style.display = "block";
  hiddenInput.value = name;
}

/**
 * Com o objetivo e iniciar os button de redes sociais
 * @author  Vinicius de Santana
 */
function iniciaSocialButtons(){
  var facebook = document.getElementById('facebook');
  if(facebook){
    /**
     * Escuta evento de clique da imagem e redireciona o compartilhamento da pagina para rede social especifica
     * @author Vinicius de Santana
     */
    facebook.addEventListener("click", function(e){
        var link = "https://www.facebook.com/sharer/sharer.php?u="+document.URL;
        window.open(link);
    });
  }
  /*    
      //insere o script dinamicamente na página
      if( !document.getElementById('scriptFacebook')){
          var scriptFacebook = document.createElement("script");
          scriptFacebook.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
          scriptFacebook.id = "scriptFacebook";
          document.getElementById("scriptsdinamicos").appendChild(scriptFacebook);
      }
      //executa o compartilhamento
      FB.ui({
          app_id: '9b505abb9d2470a3f25b64520657d078',
          method: 'share',
          href: 'https://www.meusite.com.br',
          hashtag: '#dnaDeVendas',
      }, function(response){ console.log(response)});
  */

  var pinterest = document.getElementById('pinterest');
  if(pinterest){

    /**
     * Escuta evento de clique da imagem e redireciona o compartilhamento da pagina para rede social especifica
     * @author Vinicius de Santana
     */
    pinterest.addEventListener("click", function(e){
        var link = "https://www.pinterest.com/pin/create/button/?url="+document.URL;
        try{
            var description = document.querySelector("meta[name='description']").getAttribute("content");
        }catch(e){
            console.log("error", e);
        }
        if( description ){
            link += "&description="+description;
        }
        window.open(link);
    });
  }


  var twitter = document.getElementById('twitter');
  if(twitter){
    /**
     * Escuta evento de clique da imagem e redireciona o compartilhamento da pagina para rede social especifica
     * @author Vinicius de Santana
     */
    twitter.addEventListener("click", function(e){
        var link = "https://twitter.com/intent/tweet?url="+document.URL;
        try{
            var titulo = document.querySelector("title").innerText;
        }catch(e){
            console.log("error", e);
        }
        if( titulo ){
            link += "&text="+titulo;
        }
        window.open(link);
    });
  }

  var linkedin = document.getElementById('linkedin');
  if(linkedin){
    /**
     * Escuta evento de clique da imagem e redireciona o compartilhamento da pagina para rede social especifica
     * @author Vinicius de Santana
     */
    linkedin.addEventListener("click", function(e){
        var link = "https://www.linkedin.com/shareArticle?mini=true&url="+document.URL;
        try{
            var titulo = document.querySelector("title").innerText;
        }catch(e){
            console.log("error", e);
        }
        if( titulo ){
            link += "&title="+titulo;
        }
        try{
            var description = document.querySelector("meta[name='description']").getAttribute("content");
        }catch(e){
            console.log("error", e);
        }
        if( description ){
            link += "&summary="+description;
        }
        window.open(link);
    });
  }
  //sanpchat, linkedin, intagram
}
/** escuta o evento de envio do form do floater */
function iniciaAtendimentoPorEmailTrigger() {
  var count = 0;
  const interval = setInterval(() => {
    const input = document.querySelector('#atendimento-por-e-mail-8789164923009fd9d62d input[name="redirect_to"]');
    console.log('setinterval debug');
    console.log(count, input, input.value);
    if (input || count > 360){ //3minutos
      input.value = 'mailto:contato@prestes.com';
      clearInterval(interval);
    } else {
      count ++;
    }
  }, 500);
}

window.addEventListener('resize', function(){
  setasNoCarrossel();
});

window.addEventListener('load', function(){
  	localizarUser();
    iniciaSocialButtons();
    setasNoCarrossel();
    iniciaAtendimentoPorEmailTrigger();
    document.getElementById('custom-cat-drop').addEventListener('change', submitOnSelect);
   	// Init ScrollMagic
	var controller = new ScrollMagic.Controller();  
	// loop through each .project element
	var animarDivs = document.querySelectorAll('.animar');
	for (var index = 0; index < animarDivs.length; index++) {
		var element = animarDivs[index];
		// build a scene
		var ourScene = new ScrollMagic.Scene({
			triggerElement: element,
			triggerHook: 0.8
		})
		.setClassToggle(element, 'fade-in') // add class to project01
		.addTo(controller);
	}
  $('.owl-empreendimentos').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    autoplay: false,
    responsive:{
        0:{
          items:1
        },
        700:{
          items:1
        },
        920:{
          items:2
        },
        1200:{
          items:3
        },
        1600:{
          items:4
        }
    }
  })
  
  $('.owl-depoimentos').owlCarousel({
    loop: true,
    margin: 90,
    nav: false,
    autoplay: true,
    responsive:{
        0:{
          items:1
        },
        700:{
          items:1
        },
        920:{
          items:2
        },
        1200:{
          items:2
        },
        1600:{
          items:2
        }
    }
  })

try {
  var owl = $('.owl-empreendimentos');
owl.owlCarousel();
// Go to the next item
$('.customNextBtn').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.customPrevBtn').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
})
} catch(e) {}
  // End OwlCarousel
  try {
    var owlS = $('.owl-steps');
  owlS.owlCarousel();
  // Go to the next item
  $('.customNextBtn-steps').click(function() {
      owlS.trigger('next.owl.carousel');
  })
  // Go to the previous item
  $('.customPrevBtn-steps').click(function() {
      // With optional speed parameter
      // Parameters has to be in square bracket '[]'
      owlS.trigger('prev.owl.carousel', [300]);
  })
  } catch(e) {}
    // End OwlCarousel
function redirect() {
  var btn = document.getElementById('rd-button-joq3m2m5a');
  var ipt_email = document.getElementById('rd-email_field-k6tesmfj');
  var ipt_nome = document.getElementById('rd-text_field-k6tesmfi');
  var ipt_phone = document.getElementById('rd-phone_field-k6tesmfk');
  var ipt_renda = document.getElementById('rd-text_field-k6tesmfm');
  try {
    btn.addEventListener('click', () => {
      if(ipt_email.value != '' && ipt_nome.value != '' && ipt_phone.value != '' && ipt_renda.value != '') {
          setTimeout(() => {
              window.open('https://conteudo.prestes.com/typ-ebook-mcmv');
          }, 1000)
      }
  })
  } catch(e) {}
}
setTimeout(() => {
  redirect()
  if(window.location.href.indexOf('minha-casa-minha-vida') >= 0) {
    show_hide()
  }
}, 3000)

function show_hide() {
  var indicator = document.getElementsByClassName('indicator-show')
  var collapse = document.getElementsByClassName('finder')
  var btn = document.getElementsByClassName('btn-link')
  try {
      for(var i = 0; i < indicator.length; i ++) {
        indicator[i].textContent = '+'
    }
    setInterval(() => {
        for(var i = 0; i < btn.length; i++){
            if(!btn[i].classList.contains('collapsed')){
                indicator[i].textContent = '-'
            } else {
                indicator[i].textContent = '+'
            }
        }
    }, 500);
  } catch(e) {}
}
  
  
  //função do filtro pega o hash do link com nome da classe correspondente
  //retira o hash para comparar com a classe do link da li com a classe no link da imagem
  // tudo que não for a hash clicada ou não for todos, chama a classe para esconder
  //senão remove a classe esconder
  $('#categories a').click(function(e) {
    e.preventDefault();
    let a = $(this).attr('href');
    a = a.substr(1);
    $('.filtro').each(function() {
        if (!$(this).hasClass(a) && a != 'todos'){
          $(this).addClass("esconder");
        }                
        else{
          $(this).removeClass("esconder");
        }                
    });
  });
  
  // coloca background no botão que estiver ativo na galeria do single-imoves
  $("#categories li").click(function(){
    let menuClicado = $(this);  
    $(".categories-active").each(function(){
      $(this).removeClass("categories-active inline-active");
    });
    menuClicado.addClass("categories-active inline-active");
  });

  // coloca background no botão que estiver ativo na taxonomy-cidade
  $("#categories div").click(function(){
    let menuClicado = $(this);  
    $(".inline-active").each(function(){
      $(this).removeClass("inline-active");
    });
    menuClicado.addClass("inline-active");
  });
  
  $('[data-toggle="modal"]').click(function(event) {
    event.preventDefault();
    let imagemGaleria = $(this).attr('src'); 
    $('.modal-content img').attr('src', imagemGaleria);
  });
  var telInput = document.querySelectorAll("#telInput");
  for (var i = 0; i < telInput.length; i++) {
    telInput[i].onkeyup = execMascaraTel;
  }
  // adiciona o id do empreendimento ao form, a variável esta sendo iniciada na página do empreendimento
  if (typeof idImovel != 'undefined'){
    inputsIdDoImovel = document.querySelectorAll('input[name="idempreendimento"]');
    for (const input of inputsIdDoImovel) {
      input.value = idImovel;
    }
  }
  
});

document.addEventListener('readystatechange',(e)=>{
  if( document.readyState == 'interactive' ){
    //locSidebar = new LocationSidebar();
  }
})
// pegar a url atual e inseri num input hidden do formulário
jQuery(document).ready(function(){
 let pathname = $(location).attr('href');
 let fullpathname = window.location;
 let titulo = $("h1").text();
 $('input[type=text][name=urlOrigem]').val(fullpathname);
 $('input[type=text][name=empreendimentocliente]').val(titulo);
});
$(".owl-steps")
.owlCarousel({
  loop:true,
  autoplay:true,
  autoplayTimeout: 3000,
  autoplayHoverPause: false,
  nav:false,
  responsive:{
    0:{
      items:1
    },
    480:{
      items:1
    },
    768:{
      items:4
    }
  }
});
try {
  var owlCarr = document.getElementsByClassName('owl-steps');
owlCarr[0].children[0].setAttribute('style', 'overflow:visible');
var next = document.getElementById('next-relacionados');
next.onclick = function() {
  owl.next();
}
} catch(e) {}
