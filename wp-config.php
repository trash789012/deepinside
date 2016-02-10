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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/u448535596/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'u448535596_base1');

/** Имя пользователя MySQL */
define('DB_USER', 'u448535596_base1');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'nutene80');

/** Имя сервера MySQL */
define('DB_HOST', 'mysql.hostinger.ru');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Q*]:23mxY@YUirmvShw$do_r883KJ8en&dI/xM5zUD&}O(kf~Ar2AZlA-v{_CVjr');
define('SECURE_AUTH_KEY',  'ZY0wHUb#JpYiEO#-.]7YH0WlEV9GU)0kq(MMpL=!<TdycF+w!BX~1V`eU;l -TsD');
define('LOGGED_IN_KEY',    '[V?8FSVDMXr5##KmdI|z)?k%Kbx>Ist{|s*be+=.<T_,BC/+q>&UbG[3J#Xfr~kW');
define('NONCE_KEY',        'f*GJ;L7`5,4Jy;)_R.)g|Qin+u{$v)=9OiM`3(mS:eynK1Iqf%L86F=e}<NpiBVy');
define('AUTH_SALT',        'JbxQj[t@}a=;s*BeN{9y0l?;:B6a8@.G/AQ:L-_)U188oj}{DA*0$2-, c--I+La');
define('SECURE_AUTH_SALT', '.|y}iaE~7.jd;U.mB@U{OGIB(Rp@q9&X)X[Hvcf.0H<Jx[SRD8v1#j>vX+3sea$&');
define('LOGGED_IN_SALT',   '>n}5yVnTYCMQ&5ymlVXH*<+s:i[~mupKb&:+I?7_dFsMA~Vj=FdU-_lP0D@&vH|l');
define('NONCE_SALT',       'AbPs|+`[A@M6Q0(YjNX*l0mWvB1|^gxIYQBzgv.hJ7-yKgJIf+UAC]QD%M#HSPA!');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
