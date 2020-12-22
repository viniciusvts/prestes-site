<?php
/* vem do formulário Fale com consultor da single empreedimento */
if(isset($_POST["falecomconsultorempreedimento"])){
  $nome = $_POST["name"];
  $email = $_POST["email"];
  $tel = $_POST["telefone"];
  $urlOrigem = $_POST["urlOrigem"];
  $convertido = $_POST['converteuEm'];
  $empreendimento = $_POST["empreendimentocliente"];
  $idempreendimento = $_POST["idempreendimento"];

  //send email
  $to = "marketing@prestes.com";
  $subject = $convertido;
  $message = "Nome: ".$nome
      ."<br>Email: ".$email
      ."<br>Telefone: ".$tel
      ."<br>Url de Origem: ".$urlOrigem
      ."<br>Converteu em: ".$convertido
      ."<br>Empreendimento de Interesse: ".$empreendimento
      ."<br>Id do Empreendimento: ".$idempreendimento;
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
    'name' => $nome,
    'email' => $email,
    'personal_phone' => $tel,
    'cf_origem' => $urlOrigem,
    'cf_empreendimentocliente' => $empreendimento,
    'cf_id_empreendimento' => $idempreendimento,
    'traffic_source' => $_POST['traffic_source'],
    'traffic_medium' => $_POST['traffic_medium'],
    'traffic_campaign' => $_POST['traffic_campaign'],
    'traffic_value' => $_POST['traffic_value'],
  );
  $statusRD = $RDI->sendConversionEvent($_POST["falecomconsultorempreedimento"], $data);
}
?>
<?php get_header(); ?>

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