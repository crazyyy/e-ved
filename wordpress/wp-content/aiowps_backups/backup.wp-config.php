<?php

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'eved_wp1402');

/** Имя пользователя MySQL */
define('DB_USER', 'eved_wp1402');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '3v3d3v3d');

/** Имя сервера MySQL */
// define('DB_HOST', 'srv-cpaneldb02.ps.kz');
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?kV3ZQ7@2eHi7|Z3h<_C8a&a|Jj+$kGyB*$Dq6aZcaa,7fhZ;sRBG&4zyiGFGDfD');
define('SECURE_AUTH_KEY',  '>HB=}#@{(8Hr-}Cju4k7^Rs|wweg*Ga ?vB!]O2}kX}+iQ0,O=)D!`846N|_w]-S');
define('LOGGED_IN_KEY',    '&t-4l;wc{p1#xk~GS2a_+4[aO=F+)5B,H@Rg}|i11rQGr|](4pM]#FUy8!px^rZ0');
define('NONCE_KEY',        '?Je7XTyg?;0)*o%^3HI - O`TdwS_)BT:q%49U6ER-#0y4drBN8rDA{Ed83G*+^r');
define('AUTH_SALT',        '=xtV|~1m_&pk}+qNkKoQz$3k;R{sfwZ-:eInr@]--]sc/K+;5#~`=A`JhDk<2ei_');
define('SECURE_AUTH_SALT', 'A}s|)8@?[:{>;U-L()_*+2Eb/p+jE(Ht{2*;m]O>fw&Hx3RZ:?o@IS56a(-N/r{6');
define('LOGGED_IN_SALT',   '$o+en#|=y,<wj@(k~+*]MjSj7l&Zj+ ;1&-.p_/*7=r,2Q?$mx3<SPs}z+pUe0`x');
define('NONCE_SALT',       '$Tw6z?M>IwVS:N%=4VR?rSH@IO{Aeu&Q6100i7J)M3Anq5d1_a78@L,MT([1uGtI');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'eujdw_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');


define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
