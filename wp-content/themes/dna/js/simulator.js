/*! DNA simulator.js*/
var page = 1;

/**
 * função que auxilia a troca de páginas do form
 * @author Vinicius de Santana
 */
function getElements(){
    var elm = {};
    elm.numbPage = document.getElementsByClassName("page");
    elm.pages = document.getElementsByClassName("pageshow");
    return elm;
}

/**
 * envia os dados via post
 * @author Vinicius de Santana
 */
function sendForm(){
    //pegar dados
    var formData = {};
    formData.regiao = document.querySelector("#regiao").value;
    formData.nome = document.querySelector("#nome").value;
    formData.email = document.querySelector("#email").value;
    formData.tel = document.querySelector("#tel").value;
    var fgtsRadio = document.getElementsByName("fgts");
    fgtsRadio.forEach(radio=>{
        if(radio.checked){
            formData.fgts = radio.value;
        }
    });
    var cashRadio = document.getElementsByName("cash");
    cashRadio.forEach(radio=>{
        if(radio.checked){
            formData.cash = radio.value;
        }
    });
    if(formData.regiao != "" &&
            formData.nome != "" &&
            formData.email != "" &&
            formData.tel != "" &&
            formData.fgts != "" &&
            formData.cash != ""){
        var form = document.getElementById("formSimulator");
        form.submit();
    }else{
        alert("Preencha todos os campos");
    }
}

/**
 * controla a troca de páginas do form ao retroceder
 * @author Vinicius de Santana
 */
function prev(){
    var elem = getElements();
    elem.numbPage[page-1].className = "page";
    elem.numbPage[page-2].className = "page active";
    elem.pages[page-1].style.display = "none";
    elem.pages[page-2].style.display = "";
    page--;
}

/**
 * controla a troca de páginas do form ao avançar
 * @author Vinicius de Santana
 */
function next(){
    var elem = getElements();
    if(page == 1 ){
        if( document.getElementById("regiao").value == ""){
            alert("Selecione uma região");
            return;
        }
        if( document.getElementById("cidade").value == ""){
            alert("Selecione uma cidade");
            return;
        }
    }else if( page == 2 ){
        if( document.getElementById("nome").value == ""){
            alert("Digite um nome");
            return;
        }
        if(!isEmail( document.getElementById("email").value)){
            alert("Email inválido");
            return;
        }
    }else if(page == 3){
        if( document.getElementById("renda").value == ""){
            alert("Digite sua renda");
            return;
        }
        if( document.getElementById("entrada").value == ""){
            alert("Digite o valor da entrada");
            return;
        }
    }else if(page == 4){
        if( document.getElementById("tel").value == "" || document.getElementById("tel").value.length < 14){
            alert("Digite um telefone válido");
            return;
        }
    }else if( page == 5){
        document.forms["formSimulator"].submit();
    }
    if(page<5){
        elem.numbPage[page-1].className = "page";
        elem.numbPage[page].className = "page active";
        elem.pages[page-1].style.display = "none";
        elem.pages[page].style.display = "";
        page++;
    }
}

/**
 * Verifica se a string passada é email
 * @param {String} value string a ser validada como email
 * @returns {boolean} true se é email
 * @author https://www.devmedia.com.br/validando-e-mail-em-inputs-html-com-javascript/26427
 */
function isEmail(value) {
    usuario = value.substring(0, value.indexOf("@"));
    dominio = value.substring(value.indexOf("@")+ 1, value.length);
        
    if ((usuario.length >=1) &&
            (dominio.length >=3) && 
            (usuario.search("@")==-1) && 
            (dominio.search("@")==-1) &&
            (usuario.search(" ")==-1) && 
            (dominio.search(" ")==-1) &&
            (dominio.search(".")!=-1) &&      
            (dominio.indexOf(".") >=1)&& 
            (dominio.lastIndexOf(".") < dominio.length - 1)) {
        return true;
    }else{
        return false;
    }
}
/** Máscaras ER 
 * http://wbruno.com.br/expressao-regular/mascara-campo-de-telefone-em-javascript-com-regex-nono-digito-telefones-sao-paulo/
*/
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

/** Máscara dinheiro ,define a função e o objeto
 * @param {HTMLElement} obj input que receberá a mascara
 * @param {function} func função que faz o replace
 * @author Vinicius de Santana
 * 
 * @example <input type="text" name="money" onkeyup="maskMoney( this, mMoney );">
 */
function maskMoney(obj,func){
    d_obj=obj;
    d_func=func;
    setTimeout("execMaskMoneyBR()",1);
}
/** Máscara dinheiro , faz o replace do valor atual pelo valor com mascara
 * @author Vinicius de Santana
 */
function execMaskMoneyBR(){
    d_obj.value=d_func(d_obj.value);
}
/** Máscara dinheiro recebe a string aleatória e retorna a string formatada como dinheiro
 * @param {string} v 
 * @returns {string}
 * @author Vinicius de Santana
 * 
 * @example d_obj.value=mMoney(d_obj.value);
 */
function mMoney(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/(\d+)(\d{2})/g,"R$ $1,$2"); //R$ (grupo1),(grupo2)
    return v;
}