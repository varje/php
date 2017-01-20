<?php
/**
 * Created by PhpStorm.
 * User: anna.karutina
 * Date: 20.01.2017
 * Time: 8:53
 */
// define constants
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
// import classes
require_once CLASSES_DIR.'template.php'; // import template class file
require_once CLASSES_DIR.'http.php'; // import http class file
require_once CLASSES_DIR.'linkobject.php'; // import linkobject file
require_once CLASSES_DIR.'mysql.php';//import database class file
// objects
// create linkobject object, because it extends http object
$http = new linkobject();
//create database class object
$db = new mysql('localhost', 'user', 'parool', 'andmebaas');
?>