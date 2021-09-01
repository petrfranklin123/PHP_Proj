<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'timber-wp' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'NZ^g|M~U*633?zB@w1<ivN!CVeDKuLh(+Qpz}sbmiU3/ZV|gsg5&bW6?Jl1^Kena' );
define( 'SECURE_AUTH_KEY',  '7%&IwXp:<rj(2=%ca~UERH~PHp)$8S}-`^jBz1qN+E:PELF~<RAsc%53^:o|;@?(' );
define( 'LOGGED_IN_KEY',    'nTa~z4&Gkh[G)4_aR-C+!(nN3,+qC8l9rOi-heTJD}[EyDb.H67B1 orY=$r.A8K' );
define( 'NONCE_KEY',        '^cb=Ng3|+ZY?>97e>@d,^~*DU3(jUdKhVaM(+cVh1q@s:Uv-F]m>C_b{I59m56H2' );
define( 'AUTH_SALT',        'TwAuH^]ur`iX5d%r2SHe;g9G=xl|j=A&;:/~xn,&u_c4K@`lNF,z1.pTCNxpy7=2' );
define( 'SECURE_AUTH_SALT', '5pn,[<(mC~DfE8[h3y5yoU.I;z}S/:=5}#YsZ]C6j+%c ,cg#VhB^*(1b7(~z>m}' );
define( 'LOGGED_IN_SALT',   'lo~RW^m3pFm|JO}#{PB@ofod!hER`J1-b))^9S,DnzBR:+ym5YHR}bu%kBN@vV!c' );
define( 'NONCE_SALT',       '5kGO6u1_{6R8NZ%sSYIi*B2i0*m--?D=W+X{rpTlfPm&`cTT27}F?$UoYRB+yE2p' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
