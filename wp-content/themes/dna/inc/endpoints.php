<?php
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
      'args' => array(
        'email' => array(
          'required' => true,
        ),
      )
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
