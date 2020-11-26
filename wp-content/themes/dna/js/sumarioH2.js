/*! DNA sumarioH2.js*/
/**
 * @description Método verifica todos os h2 da pagina, adiciona um id e gera um sumário no campo com id="sumarioh2"
 * @example <div id="sumarioh2"></div>
 * @author Vinicius de Santana
 */
var sumarioMenu = document.getElementById("sumarioh2");
if(sumarioMenu){
    var h2List = document.getElementsByTagName("h2");
    if(h2List.length > 0){
        const sizeH2 = h2List.length;
        //enumera h2 com ids
        for(var i=0; i<sizeH2; i++){
            h2List[i].id = "h2-"+i;
        }
        //inicia lista do sumario
        var lista = "<h2>Veja neste post:</h2>";
        lista += "<ul style='text-align:center;'>";
        for(var j=0; j<sizeH2; j++){
            lista += "<li><a href='#";
            lista += h2List[j].id;
            lista += "'>";
            lista += h2List[j].innerText;
            lista += "</a></li>";
        }
        //finaliza lista do sumario
        lista += "</ul>";
        //popula a tag
        sumarioMenu.innerHTML = lista;
    }else{
        console.log("Título 'h2' nao encontrado");
    }
}else{
    console.log("Tag sumarioh2 nao encontrada");
}