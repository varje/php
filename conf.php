<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 20.01.2017
 * Time: 8:53
 */
// define constants
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
define('ACTS_DIR', 'acts/'); // define act directory
define('LIB_DIR', 'lib/'); //useful functions directory
define('LANG_DIR', 'lang/'); // lang path

define('DEFAULT_ACT', 'default'); // define act file name
define('ROLE_NONE', '0');
define('ROLE_ADMIN', '1');
define('ROLE_USER', '2');

define('DEFAULT_LANG', 'et'); //default language

//import useful files
require_once LIB_DIR.'utils.php';
// import classes
require_once CLASSES_DIR.'template.php'; // import template class file
require_once CLASSES_DIR.'http.php'; // import http class file
require_once CLASSES_DIR.'linkobject.php'; // import linkobject file
require_once CLASSES_DIR.'mysql.php';//import database class file
require_once CLASSES_DIR.'sessioon.php';//import session class file
//import database configuration
require_once 'db_conf.php';
// objects
// create linkobject object, because it extends http object
$http = new linkobject();
//create database class object
$db = new mysql(DBHOST, DBUSER, DBPASS, DBNAME);
//create session class object
$sess = new sessioon($http, $db);

//language support
//sites used langs
$siteLangs = array(
    'et' => 'estonian',
    'en' => 'english',
    'ru' => 'russian'
);
//get lang_id from url
$lang_id = $http->get('lang_id');
if (!isset($siteLangs[$lang_id])) {
    //if such lang_id is not supported
    $lang_id = DEFAULT_LANG; //use default lang - et
    $http->set('lang_id', $lang_id); // fix used lang_id
}
define('LANG_ID', $lang_id); //define useful constant which describe right now active lang


?>