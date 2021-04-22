<?php
// https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/
/**
 * Atende a requisição enviando um email para o adm do site
 * @author Vinicius de Santana
 */
function dnaapi_personalizeLP(){
  $to = get_option('admin_email');
  $subject = 'Prestes Personalize LP';
  $message = criaMensagemPaginaDeContato($_POST);
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  $count = 0;
  while (!$wpmail && $count < 3) {
    $wpmail = wp_mail( $to, $subject, $message, $headers );
    $count++;
  }
  $url ='https://www.prestes.com/personalize/obrigado.html?email='.$_POST['email'];
  //vai para o url
  wp_redirect($url);
  exit;
}
/**
 * Atende a requisição enviando para o rd a informação do site
 * @author Vinicius de Santana
 */
function dnaapi_personalizeLPBaixouBook(){
  $RDI = new Rdi_wp();
  $data = array('email' => $_POST['email']);
  $statusRD = $RDI->sendConversionEvent('personalize-baixou-ebook', $data);
  return array('statusRD' => $statusRD);
}
/**
 * Atende a requisição enviando para o rd a informação do site
 * @author Vinicius de Santana
 */
function dnaapi_falecomconsultorempreedimento(){
  if(isset($_POST['g-recaptcha-response'])){
    $respCaptcha = gCaptchaVerify('6LdEi0UaAAAAADTwU3fYJHMQpBXKXz3sIxRScpOs',
      $_POST['g-recaptcha-response'],
      $_SERVER['REMOTE_ADDR']
    );
  }
  if($respCaptcha->success){
    $nome = $_POST["name"];
    $email = $_POST["email"];
    $tel = $_POST["telefone"];
    $urlOrigem = $_POST["urlOrigem"];
    $convertido = $_POST['converteuEm'];
    $empreendimento = $_POST["empreendimentocliente"];
    $idempreendimento = $_POST["idempreendimento"];
    /** se consentiu com o envio de comunicações */
    $communicationsconsent = isset($_POST["communicationsconsent"]);

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
    $statusRD = $RDI->sendConversionEvent($_POST["falecomconsultorempreedimento"], $data);
    // foi enviado ok? então vejo se consentiu o envio de informações
    if ($statusRD) {
      // Se não tenho o user, busco-o 
      if (!$getContact){
        $getContact = $RDI->getContactByEmail($email);
      }
    } else {
      return new WP_Error( "Bad Gateway", 'Erro ao enviar para o rd', array(
        'status' => 502,
        'statusRD' => $statusRD,
        'statusMail' => $wpmail,
      ));
    }
  }
  $url = 'https://www.prestes.com/agradecimento/';
  return array(
    'code' => 'Requisição OK',
    'message' => '',
    'data' => array(
      'url' => $url,
      'statusRD' => $statusRD,
      'statusMail' => $wpmail,
    )
  );
}


/**
 * Atende a requisição enviando um email para o adm do site
 * @author Vinicius de Santana
 */
function dnaapi_feirao2020(){
  $to = get_option('admin_email');
  $subject = 'Prestes Feirão 2020';
  $message = criaMensagemPaginaDeContato($_POST);
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  $count = 0;
  while (!$wpmail && $count < 3) {
    $wpmail = wp_mail( $to, $subject, $message, $headers );
    $count++;
  }
  $url ='https://www.prestes.com/feirao-digital-caixa-2020/obrigado.html';
  //vai para o url
  wp_redirect($url);
  exit;
}
/**
 * Atende a requisição enviando para o rd a informação do site
 * @author Vinicius de Santana
 */
function dnaapi_formcontato(){
  if(isset($_POST['g-recaptcha-response'])){
    $respCaptcha = gCaptchaVerify('6LdEi0UaAAAAADTwU3fYJHMQpBXKXz3sIxRScpOs',
      $_POST['g-recaptcha-response'],
      $_SERVER['REMOTE_ADDR']
    );
  }
  if($respCaptcha->success){
    $nome = $_POST["name"];
    $email = $_POST["email"];
    $tel = $_POST["telefone"];
    $cidade = $_POST["cidade"];
    $setor = $_POST["setor"];
    $urlOrigem = $_POST["urlOrigem"];
    $mensagem = $_POST["mensagem"];
    $identificador = $_POST["identificador"];
    /** se consentiu com o envio de comunicações */
    $communicationsconsent = isset($_POST["communicationsconsent"]);

    //send email
    $to = "marketing@prestes.com";
    $subject = 'Formulário de contato em Preste.com';
    $message = "Nome: ".$nome
        ."<br>Email: ".$email
        ."<br>Telefone: ".$tel
        ."<br>Cidade: ".$cidade
        ."<br>Setor: ".$setor
        ."<br>Url de Origem: ".$urlOrigem
        ."<br>Mensagem: ".$mensagem;
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
      'cf_tipo_contato' => $setor, //cf_tipo_atendimento
      'city' => $cidade,
      'cf_mensagem' => $mensagem,
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
    $statusRD = $RDI->sendConversionEvent($identificador, $data);
    if (!$statusRD) {
      return new WP_Error( "Bad Gateway", 'Erro ao enviar para o rd', array(
        'status' => 502,
        'statusRD' => $statusRD,
        'statusMail' => $wpmail,
      ));
    }
  }
  $url = 'https://www.prestes.com/sucesso/';
  return array(
    'code' => 'Requisição OK',
    'message' => '',
    'data' => array(
      'url' => $url,
      'statusRD' => $statusRD,
      'statusMail' => $wpmail,
    )
  );
}

/**
 * Atende a requisição enviando para o rd a informação do site
 * @author Vinicius de Santana
 */
function dnaapi_falecomconsultor(){
  if(isset($_POST['g-recaptcha-response'])){
    $respCaptcha = gCaptchaVerify('6LdEi0UaAAAAADTwU3fYJHMQpBXKXz3sIxRScpOs',
      $_POST['g-recaptcha-response'],
      $_SERVER['REMOTE_ADDR']
    );
  }
  if($respCaptcha->success){
    $nome = $_POST["name"];
    $email = $_POST["email"];
    $tel = $_POST["telefone"];
    $city = $_POST["city"];
    $urlOrigem = $_POST["urlOrigem"];
    // define identificador
    $identificador = $urlOrigem == "/" ? "/"."home/" : $urlOrigem;
    /** se consentiu com o envio de comunicações */
    $communicationsconsent = isset($_POST["communicationsconsent"]);
    //send email
    $to = "marketing@prestes.com";
    $subject = 'Formulário de contato em Preste.com';
    $message = "Nome: ".$nome
        ."<br>Email: ".$email
        ."<br>Telefone: ".$tel
        ."<br>Cidade: ".$city
        ."<br>Url de Origem: ".$urlOrigem;
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
      'city' => $city,
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
    $statusRD = $RDI->sendConversionEvent($identificador, $data);
  }
  $url ='https://www.prestes.com/agradecimento/';
  //vai para o url
  wp_redirect($url);
  exit;
}

/**
 * Atende a requisição e atualiza o dono do lead com um dos campos do form
 * tarefa #20007
 * @author Vinicius de Santana
 */
function dnaapi_updateLeadOwner(WP_REST_Request $request){
  // $allparams = $request->get_params();
  $contactInfo = $request->get_param('contact');
  $contactId = isset($contactInfo['uuid']) ? $contactInfo['uuid'] : $contactInfo['email'];
  if($contactId && isset($contactInfo['cf_dono_do_lead'])){
    // prepare data
    $data = array("contact_owner_email" => $contactInfo['cf_dono_do_lead']);
    $RDI = new Rdi_wp();
    $statusRD = $RDI->putFunnel($contactId, $data);
  } else {
    return new WP_Error(
      'Bad request', 'Contact has no id, email or leadOwner field',
      array( 'status' => 400 ),
    );
  }
  if ($statusRD->errors){
    $response = array(
      'status' => 502,
      'RDresponse' => $statusRD,
    );
    return new WP_Error( 'Bad gateway', 'RD return an error', $response);
  }
  // Create the response object
  $response = new WP_REST_Response( $statusRD );
  // Add a custom status code: $response->set_status( 201 );
  // Add a custom header: $response->header( 'Location', 'http://example.com/' );

  return $response;
}

/**
 * Função registra os endpoints
 * @author Vinicius de Santana
 */
function dnaapi_register_ccp(){
  //Solicitar contato
  register_rest_route('dna_theme/v1',
    '/personalize-lp',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_personalizeLP',
      'description' => 'recebe as informações do form e envia um email notificando o adm do site',
    )
  );
  //baixou book
  register_rest_route('dna_theme/v1',
    '/personalize-lp-baixoubook',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_personalizeLPBaixouBook',
      'description' => 'recebe as informações do form e envia para o RD',
      'args' => array(
        'email' => array(
          'required' => true,
        ),
      )
    )
  );
  //fale com consultor
  register_rest_route('dna_theme/v1',
    '/falecomconsultorempreedimento',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_falecomconsultorempreedimento',
      'description' => 'recebe as informações do form e envia para o RD',
      'args' => array(
        'email' => array(
          'required' => true,
        ),
      )
    )
  );
  //cntato form
  register_rest_route('dna_theme/v1',
    '/formcontato',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_formcontato',
      'description' => 'recebe as informações do form e envia para o RD',
      'args' => array(
        'email' => array(
          'required' => true,
        ),
      )
    )
  );
  //feirao 2020
  register_rest_route('dna_theme/v1',
    '/feirao-2020-lp',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_feirao2020',
      'description' => 'recebe as informações do form e envia um email notificando o adm do site',
      'args' => array(
        'email' => array(
          'required' => true,
        ),
      )
    )
  );
  // falecomconsultor 2020
  register_rest_route('dna_theme/v1',
    '/falecomconsultor',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_falecomconsultor',
      'description' => 'recebe as informações do form e envia um email notificando o adm do site',
      'args' => array(
        'email' => array(
          'required' => true,
        ),
      )
    )
  );
  // rd station webhook update lead owner
  register_rest_route('dna_theme/v1',
    '/updateleadowner',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_updateLeadOwner',
      'description' => 'Recebe o webkook do RD e utiliza um campo do lead para atualizar o dono do lead',
      'args' => array(
        'contact' => array(
          'required' => true,
        ),
      ),
      'permission_callback' => '__return_true',
    )
  );
}

add_action('rest_api_init', 'dnaapi_register_ccp');



// funções auxiliares da api
/**
 * Cria a mensagem dá página contato com os parametros passados
 * 
 * @param array $data - informações do formulário
 * @return string  - o html para enviar o email
 * @author Vinicius de Santana
*/
function criaMensagemPaginaDeContato($data){
  // inicio mensagem
  $message = '<div style="font-family: Arial, sans-serif;margin: 40px auto;width: 550px;">';
  $message .=   '<table>';
  $message .=     '<tbody><tr>';
  $message .=     '<td><img src="https://www.prestes.com/wp-content/themes/dna/img/icon.png" width="100" height="100"></td>';
  $message .=     '<td><h1 style="margin-left: 30px;font-weight: 800;margin-bottom: 0;">Solicitação de Contato</h1>';
  $message .=     '<h3 style="font-weight: 100;margin-left: 30px;margin-top: 0;">Prestes personalize LP</h3></td>';
  $message .=     '</tr></tbody>';
  $message .=   '</table>';
  $message .=   '<table style="font-family: Arial, sans-serif;background-color: #eee;margin: 20px 40px 50px 40px;border-radius: 6px;min-width: 450px;">';
  $message .=     '<tbody>';
  foreach ($data as $key => $value) {
    $message .=     '<tr>';
    $message .=       '<td style="padding: 10px 20px;width: 60px">';
    $message .=         $key;
    $message .=       ':</td>';
    $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
    $message .=         $value;
    $message .=       '</td>';
    $message .=     '</tr>';
  }
  $message .=     '</tbody>';
  $message .=   '</table>';
  $message .=   '<p style="font-family: Arial, sans-serif;font-weight: 100;font-style: italic;">Enviado pelo site Prestes Construtora.</p>';
  $message .= '</div>';
  return $message;
  // fim mensagem
}
