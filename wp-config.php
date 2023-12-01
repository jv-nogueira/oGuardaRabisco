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
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'projeto-integrador' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'JH{J s9Mfusp*71A!Z:)%afzw51t9`CM/)v16U.!V3[763Q4F6sW|z?[hup,rU]I' );
define( 'SECURE_AUTH_KEY',  'dj5R;h*C)%_yX?E#i/Y|V]D$bS9e-k~]M|fmi#Xq6v9Y<7ATpmQ|=8F$~;RT`^7J' );
define( 'LOGGED_IN_KEY',    'kB1Ua$.dD:#`WM{LY<5lRWM3HP*g1D.@Ri@jJiEL^VWQyf~<66[9qtYiem[1BVB^' );
define( 'NONCE_KEY',        '2oqb!`6ED[[hOGTAin^5k/c4w>jKKww,xQwsOikb1K`,2o&w6RJ)`mM3p}jO1[)m' );
define( 'AUTH_SALT',        '^=PBl+&)K]0_N5^ *TPauZqcxfBJ5$X:P:f# |]ZlF38&_4k6eaHE%exovGQtZ4c' );
define( 'SECURE_AUTH_SALT', 'CLt4}j<o.M=[F.+H9fLp]Su<Ih2($R9K>FnzWm3ii%Z S{YbYqw<IaQ2J|C7/;nV' );
define( 'LOGGED_IN_SALT',   'RSD[i@+uC&G9OY,c>thdw_11MuQ%?__&/`#=aBu~v}D :*MaMJ2H1!h| Ox!5Hmc' );
define( 'NONCE_SALT',       'tygiA)y3CzK y+6t=<t|0f/448uGQp4$Y,#Mm7Ss-z9/5!`(>)1e^1*<!Vwx+^{O' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'admin';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
