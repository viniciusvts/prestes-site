/*! DNA scriptmaps.js*/
/**
 * Ação do botao de pesquisa no mapa
 * @author Vinicius de Santana
 */
function buscarEmpreendimentos(){
  //var optionRegion = document.getElementById("regiao");
  var optionState = document.getElementById("estado");
  var optionCity = document.getElementById("cidade");
  var optionStage = document.getElementById("estagio");
  var optionFinanc = document.getElementById("financ");
  if(//optionRegion.value == "" &&
    optionState.value == "" &&
    optionCity.value == "" &&
    optionStage.value == "" &&
    optionFinanc.value == ""
  ){
    //se não há campo selecionado, ativa todos os markers
    emps.forEach(emp=>{
        map.addLayer(emp.layer);
    });
    map.setView([-18, -52],4);//todo o brasil
  }else{
    //se há campo selecionado, desativa todos os markers
    map.eachLayer(function(layer){
      if(layer._latlng){
        map.removeLayer(layer);
      }
    });
    //if(optionRegion.value != ""){
    //  emps.forEach(emp=>{
    //    if(emp.regiao == optionRegion.value){
    //      map.addLayer(emp.layer);
    //    }
    //  });
    //}
    if(optionState.value != ""){
      emps.forEach(emp=>{
        if(emp.estado == optionState.value){
          map.addLayer(emp.layer);
        }
      });
    }
    if(optionCity.value != ""){
      emps.forEach(emp=>{
        if(emp.cidade == optionCity.value){
          map.addLayer(emp.layer);
        }
      });
    }
    if(optionStage.value != ""){
      emps.forEach(emp=>{
        if(emp.estagio == optionStage.value){
          map.addLayer(emp.layer);
        }
      });
    }
    if(optionFinanc.value != ""){
      emps.forEach(emp=>{
        if(emp.financiamento == optionFinanc.value){
          map.addLayer(emp.layer);
        }
      });
    }
    //zoom no primeiro marker
    map.eachLayer(function(layer){
      if(layer._latlng){
        map.setView(layer._latlng, 12);
        return false;
      }
    });
  }
}

/**
 * Pegar os parametros da url se houver, e completa os forms de busca do mapa
 * @author Vinicius de Santana
 */
function paramUrl(){
  var params = window.location.search.substring(1).split('&');
  //Criar objeto que vai conter os parametros
  var paramArray = {};
  //Passar por todos os parametros
  for(var i=0; i<params.length; i++) {
      //Dividir os parametros chave e valor
      var param = params[i].split('=');
      //Adicionar ao objeto criado antes
      paramArray[param[0]] = param[1];
  }
  var hasParam = false;
  if(paramArray.region){
    document.getElementById("regiao").value = paramArray.region;
    document.getElementById("regiaoH").value = paramArray.region;
    hasParam = true;
  }
  if(paramArray.state){
    document.getElementById("estado").value = paramArray.state;
    document.getElementById("estadoH").value = paramArray.state;
    hasParam = true;
  }
  if(paramArray.city){
    document.getElementById("cidade").value = paramArray.city;
    document.getElementById("cidadeH").value = paramArray.city;
    hasParam = true;
  }
  if(hasParam){
    buscarEmpreendimentos();
  }
}


/**
 * mapa open street maps
 * @author Vinicius de Santana
*/
var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
		osmAttrib = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});

//seta local padrão
var map = L.map('map').setView([-25.1033834,-50.161633], 10).addLayer(osm);

//carrega array de empreendimentos em algum lugar -12.869762399999999 -38.300323399999996
//carrega json: 
var xhttpMapRequest = new XMLHttpRequest();
var jsonApiresponse;
var emps = [];

var siteUrl = window.location.protocol+"//"+window.location.hostname;
if(window.location.hostname == "localhost" || window.location.hostname == "dnaformarketing.com.br"){ //dev
  siteUrl += "/prestes";
}
var urlapiEmpRequest = siteUrl + "/wp-json/wp/v2/imoveis?per_page=100";

xhttpMapRequest.open("GET", urlapiEmpRequest, true);
xhttpMapRequest.send();
xhttpMapRequest.onreadystatechange = function(){
    if ( xhttpMapRequest.readyState == 4 && xhttpMapRequest.status == 200 ) {
        jsonApiresponse = JSON.parse(xhttpMapRequest.response);
        jsonApiresponse.forEach(item => {
            var coord = item.acf.coordenadas;
            if( coord.latitude != "" &&
              coord.longitude != ""){
                emps.push({
                  layer:null,
                  nome: item.title.rendered,
                  link: item.link,
                  regiao: item.regiao[0],
                  estado: item.estado[0],
                  cidade: item.cidade[0],
                  estagio: item.imovel[0],
                  financiamento: item.financiamento[0],
                  lat: item.acf.coordenadas.latitude,
                  lon: item.acf.coordenadas.longitude
                });
            }
        });
        var prestesIconUrl = siteUrl + "/wp-content/themes/dna/img/marker-icon.png";
        var prestesIcon = L.icon({
            iconUrl: prestesIconUrl,
            iconSize: [25, 41],
            iconAnchor: [12.5, 41],
            popupAnchor: [-3, -56],
            shadowUrl:  siteUrl + "/wp-content/themes/dna/img/marker-shadow.png",
            shadowSize: [41, 41],
            shadowAnchor: [14, 41]
        });
        emps.forEach(emp=>{
          emp.layer = L.marker([emp.lat, emp.lon],{icon: prestesIcon})
          .addTo(map)
          .bindPopup("<a href='"+emp.link+"'><b>"+emp.nome+"</b></a>");
        });
        paramUrl();
    }
}
 