<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 12-Jan-17
 * Time: 12:58
 */

//create and template object
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
require_once CLASSES_DIR.'template.php';
//and use it
//create an empty template object
$tmpl = new template();
// set up the file name for template
$tmpl->file='main.html';
//control the content of template object
echo '<pre>';
print_r($tmpl);
echo '</pre>';
//load the content of template object
$tmpl->loadFile();
?>