<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'ayhal' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'ayhal' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '24823vas' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tx_IC!d|L:gJUjv-[v@6*Dy%_*-0;P(nkFoyp>A3m~iCkUImw@PHm$e3x|v2TmW!' );
define( 'SECURE_AUTH_KEY',  'Q==YPw{!X*-t%8PVJ)w}s~dcq(?,_K2j5h)pTQJ9GZ32d%w9^mp7CZr;5a0z#I2@' );
define( 'LOGGED_IN_KEY',    'uSyyL<L41{x[jGHnbGOKH 5jv{oGXov`VnmnLUz8>H0htd7|y2I1*G9 O kztGsl' );
define( 'NONCE_KEY',        'HL,q7=[W$g=sWs!7}(2e5dbj!1xuVJzAz15uEB&6Q^vP@|3g7G~&h.-Y@]sgS%3`' );
define( 'AUTH_SALT',        'FgBAd/?=[nDzYwjbgjN4xf=JW(KX^s=OLS=V)Jk[l2kg}KgxE#IxdTwh!y^|`ExW' );
define( 'SECURE_AUTH_SALT', 'z$(l`~7I%3d@mu={_+K[9Af`8yDp*@D{cr:vwPXWk)|_pN`)s^.YWJ1NHF}w]!v:' );
define( 'LOGGED_IN_SALT',   'Rto%J^8:2e<GLvyd?uT>}+Kg;zK(R)INMYLB$p/YA.URPtBpop0tM?~reV[e,[B:' );
define( 'NONCE_SALT',       'MMzGf$iM}?G%7vJ1PdFD a5-c 5W>8}X+:0dxMmj1IrpK72d$nAV6LHBA)HJD`.7' );

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
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
