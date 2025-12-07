<?php
session_start();

date_default_timezone_set('Pacific/Auckland');

/** Include Required Files */

require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/../vendor/autoload.php';


// Determine environment and load the appropriate .env file
$env = getenv('APP_ENV') ?: 'local';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__), ".env.{$env}");
$dotenv->safeLoad();

/** GENERAL VARS */
define('VERSION', '8.2.33');

if(!defined('PRODUCTION_MODE')) define('PRODUCTION_MODE', filter_var($_ENV['PRODUCTION_MODE'], FILTER_VALIDATE_BOOLEAN));
if(!defined('RB_WIDGET_ALL_PAGES')) define('RB_WIDGET_ALL_PAGES', filter_var($_ENV['RB_WIDGET_ALL_PAGES'], FILTER_VALIDATE_BOOLEAN));

/** GENERAL CONSTANTS */


if(!defined('DS'))                      define('DS', DIRECTORY_SEPARATOR);



/** DATABASE CONSTANTS */
if(!defined('DB_HOST'))                 define('DB_HOST', $_ENV['DB_HOST']);
if(!defined('DB_NAME'))                 define('DB_NAME', $_ENV['DB_NAME']);
if(!defined('DB_USER'))                 define('DB_USER', $_ENV['DB_USER']);
if(!defined('DB_PASSWORD'))             define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

/** DIRECTORY PATHS & URL CONSTANTS */
if(!defined('BASE_URL'))                define('BASE_URL', $_ENV['BASE_URL']);

if(!defined('BASE_PATH'))               define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']);
if(!defined('ADMIN_BASE_URL'))          define('ADMIN_BASE_URL', BASE_URL.'/'.ADMIN_DIR);

if(!defined('ADMIN_BASE_PATH'))         define('ADMIN_BASE_PATH', BASE_PATH.DS.ADMIN_DIR);
// die('12121');
if(!defined('ADMIN_TEMPLATE_DIR_PATH')) define('ADMIN_TEMPLATE_DIR_PATH', BASE_PATH.DS.ADMIN_DIR.DS.TEMPLATES_DIR);

if(!defined('GRAPHICS_DIR_PATH'))       define('GRAPHICS_DIR_PATH', BASE_PATH.DS.GRAPHICS_DIR);
if(!defined('TEMPLATES_DIR_PATH'))      define('TEMPLATES_DIR_PATH', BASE_PATH.DS.TEMPLATES_DIR);
if(!defined('LIBRARY_DIR_PATH'))        define('LIBRARY_DIR_PATH', BASE_PATH.DS.LIBRARY_DIR);
if(!defined('UPLOADS_DIR_PATH'))        define('UPLOADS_DIR_PATH', BASE_PATH.DS.UPLOADS_DIR);
if(!defined('CLASS_DIR_PATH'))          define('CLASS_DIR_PATH', BASE_PATH.DS.CLASS_DIR);
if(!defined('HELPER_DIR_PATH'))         define('HELPER_DIR_PATH', BASE_PATH.DS.HELPER_DIR);
if(!defined('MODULES_DIR_PATH'))        define('MODULES_DIR_PATH', BASE_PATH.DS.MODULES_DIR);
if(!defined('INCLUDES_DIR_PATH'))       define('INCLUDES_DIR_PATH', BASE_PATH.DS.INCLUDES_DIR);
if(!defined('FUNCTIONS_DIR_PATH'))      define('FUNCTIONS_DIR_PATH', BASE_PATH.DS.FUNCTIONS_DIR);

/** PARKED DOMAIN CONSTANTS */

if(!defined('PLACE_HOLDER_IMG_URI')) define('PLACE_HOLDER_IMG_URI', 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==');

$reservedTemplates = [HOME_TEMPLATE_ID, DEFAULT_TEMPLATE_ID];

/** INCLUDE HELPER FUNCTIONS FILE */
require_once (FUNCTIONS_DIR_PATH.DS.'func_all.php');

/** Script Processing */

/** ERROR & NOTICE REPORTING ? */

if (PRODUCTION_MODE) {

    error_reporting(0);

} else { 

    error_reporting(E_ALL & ~E_NOTICE);

}

/** AUTO LOAD CLASSES */

spl_autoload_register(function ($className) {

    if (file_exists(CLASS_DIR_PATH.DS."{$className}.class.php")) {
        require_once CLASS_DIR_PATH.DS."{$className}.class.php";
    } elseif (file_exists(HELPER_DIR_PATH.DS."{$className}.helper.php")) {
        require_once HELPER_DIR_PATH.DS."{$className}.helper.php";
    }    

});

if(PRODUCTION_MODE) {
    global $rpApiUrl;
    $rpApiUrl = 'https://netzonerp.tomahawk.co.nz';
} else {    
    $rpApiUrl = 'https://netzonerptest.tomahawk.co.nz';
}
/** Creating the Database Connections */

$cConnection = new CConnection();
$cConnection->Configure(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);


