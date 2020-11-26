<?php


/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

/* Não Alterar o código abaixo */
$dbhost = ''; /* Deixar em branco para utilizar o padrão (automático) */
$dbuser = ''; /* Deixar em branco para utilizar o padrão (automático) */
$dbpassword = ''; /* Deixar em branco para utilizar o padrão (automático) */

$server_addr = $_SERVER['SERVER_ADDR'];
switch ($server_addr) {
    case '::1':
    case '127.0.0.1':
        $dbhost_default = 'localhost';
        $dbname = 'prestes_bd';
        $dbuser_default = 'root';
        $dbpassword_default = 'root';
        define('DEV_MODE', true);
        define('WP_DEBUG', true);
        define('WP_DEBUG_DISPLAY', true );
        define('WP_HOME','http://prestes.localhost/');
        define('WP_SITEURL','http://prestes.localhost/');
        break;

    case '172.31.29.159':
        $dbhost_default = 'pro-ciapipe.c6kc9wk9fak1.us-west-2.rds.amazonaws.com';
        $dbname = 'prestes_bd';
        $dbuser_default = 'root';
        $dbpassword_default = 'fZBy8NhelGwQNS';
        define('DEV_MODE', false);
        define('WP_HOME','https://dnaformarketing.com.br/prestes/');
        define('WP_SITEURL','https://dnaformarketing.com.br/prestes/');
        break;

    case '198.199.88.130':
        $dbhost_default = 'ddb-mysql-nyc1-74097-do-user-787860-0.db.ondigitalocean.com:25060';
        $dbname = 'prestes_bd';
        $dbuser_default = 'wordpressuser';
        $dbpassword_default = '53kmqydsxob789a'; 
        define('DEV_MODE', true);
        // define('WP_DEBUG', true);
        // define('WP_DEBUG_DISPLAY', true );
        define('WP_HOME','https://novo.dnadevendas.com.br/prestes/');
        define('WP_SITEURL','https://novo.dnadevendas.com.br/prestes/');
        break;
    
    default:
        $dbhost_default = 'localhost';
        $dbname = 'comprest_site';
        $dbuser_default = 'comprest_prestes';
        $dbpassword_default = 'prestesD0192';
        define('DEV_MODE', false);
        define('WP_HOME','https://www.prestes.com/');
        define('WP_SITEURL','https://www.prestes.com/');
        break;
}

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
define('DB_NAME', $dbname);
/** Usuário do banco de dados MySQL */
define('DB_USER', ($dbuser != '') ? $dbuser : $dbuser_default);
/** Senha do banco de dados MySQL */
define('DB_PASSWORD', ($dbpassword != '') ? $dbpassword : $dbpassword_default);
/** nome do host do MySQL */
define('DB_HOST', ($dbhost != '') ? $dbhost : $dbhost_default);
/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');
/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');
define( 'FS_METHOD', 'direct' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7z(TxJ4e(x`4j}%$DyM?PM2Xe^a~?DD|Rpv~o3:I2WniIDF~GUB]j5AT33%7#75Y' );
define( 'SECURE_AUTH_KEY',  'GK-,g0eWwKcb/tgR-J:3`a#dJ#nc0vQ,iSv/;P;(Q:;9jdon( )E*](zk[MRu?S)' );
define( 'LOGGED_IN_KEY',    '4EiOosafkudwDP9xt7p-2ge@^4x?X9&ALaplbVb^Xi;-[wZ5hnPWNd?:wlQ([jYj' );
define( 'NONCE_KEY',        'zfqex;9*zp&TH2y7s.Qv3DP=_T0Z(~<1[0+dsE;S9l#Lb<O+3Veg @X?^Hz2U=py' );
define( 'AUTH_SALT',        'fV>^Nh] 6G=8RV5Q`L/T$-lN_DE/zZEDHs*i0{M4+;8}X0q,4}Eh}mN6&z(-]R.i' );
define( 'SECURE_AUTH_SALT', 'Mvb]#q>IAeaEHyCtm?<.8-1iX5u;#?#)R_bA0Co$F}ICGNlpR=l:s$1t/nahyw36' );
define( 'LOGGED_IN_SALT',   ')-_{axp&*VR^dT*`avPp0boy{,p<Z5c;@ M;TWG|!Ct=Q)y&lK8xygSqae DJT*&' );
define( 'NONCE_SALT',       '9wH04=0.xS<HUHA^[ok]F_*vviHU-]Q|lT.X/Bgf`CuAZ`NKr.%E/)<Q<T*wKraa' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';


/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
