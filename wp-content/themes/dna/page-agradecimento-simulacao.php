<?php
/* vem de dna/page-simulador.php */
// verifica google recaptcha
if(isset($_POST['g-recaptcha-response'])){
  $respCaptcha = gCaptchaVerify('6LdEi0UaAAAAADTwU3fYJHMQpBXKXz3sIxRScpOs',
    $_POST['g-recaptcha-response'],
    $_SERVER['REMOTE_ADDR']
  );
}
if(isset($_POST["nome"]) && $respCaptcha->success){
  $regiao = $_POST["regiao"];
  $empreendimento = $_POST["empreendimentocliente"];
  $cidade = $_POST["cidade"];
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $renda = $_POST["renda"];
  $entrada = $_POST["entrada"];
  $tel = $_POST["tel"];
  $fgts = $_POST["fgts"];
  $convertido = $_POST['converteuEm'];
  /** se consentiu com o envio de comunicações */
  $communicationsconsent = isset($_POST["communicationsconsent"]);
  //$cash = $_POST["cash"];
  $urlOrigem = $_POST["urlOrigem"];
  //send email
  $to = "marketing@prestes.com";
  $subject = 'Form prestes (simulador Pop-Up)';
  $message = "Nome: ".$nome
      ."<br>Email: ".$email
      ."<br>Regiao: ".$regiao
      ."<br>Cidade: ".$cidade
      ."<br>Renda: ".$renda
      ."<br>Entrada: ".$entrada
      ."<br>Telefone: ".$tel
      ."<br>Pretende usar o FGTS: ".$fgts
      ."<br>Empreendimento de Interesse: ".$empreendimento
      ."<br>Url de Origem: ".$urlOrigem
      ."<br>Converteu em: ".$convertido;
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  // envio para o RD
  $RDI = new Rdi_wp();
  $getContact = $RDI->getContactByEmail($email);
  // se há registro do contato removo as tag
  if ($getContact){
    // novas tag a serem inseridas, neste caso
    $newtags = array(
      "tags" => array()
    );
    $esdited = $RDI->editContact($getContact->uuid, $newtags);
  }
  // envio a conversão
  $data = array(
    'email' => $email,
    'name' => $nome,
    'cf_regiao' => $regiao,
    'city' => $cidade,
    'cf_renda' => $renda,
    'cf_entrada' => $entrada,
    'personal_phone' => $tel,
    'cf_fgts' => $fgts,
    'cf_empreendimentocliente' => $empreendimento,
    'cf_origem' => $urlOrigem,
    'traffic_source' => $_POST['traffic_source'],
    'traffic_medium' => $_POST['traffic_medium'],
    'traffic_campaign' => $_POST['traffic_campaign'],
    'traffic_value' => $_POST['traffic_value'],
  );
  // se consentiu com o envio de informações
  if ($communicationsconsent){
    $legal_bases = array(
      array(
        "category" => "communications",
        "type" => "consent",
        "status" => "granted"
      ),
    );
    $data['legal_bases'] = $legal_bases;
  }
  $conversionIdentifier = 'form-simulador';
  if (isset($_POST['nomeDoEmpreendimento'])){
    $conversionIdentifier .= '-'.$_POST['nomeDoEmpreendimento'];
  }
  $statusRD = $RDI->sendConversionEvent($conversionIdentifier, $data);
}
?>
<?php
/// job #18615 página com o mesmo layout de /agradecimento
get_header();
?>
<div id="pg-404">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Obrigado!</h1>
        <h2>Recebemos seu contato.</h2>
        <p>Em breve um de nossos consultores entrará em contato.</p>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>