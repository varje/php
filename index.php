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
define('STYLE_DIR', 'CSS/');
require_once CLASSES_DIR.'template.php';
//and use it
//create an empty template object
$tmpl = new template('main');
// add pairs of template element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu pealkiri');
$tmpl->set('menu', 'minu menüü');
$tmpl->set('nav_bar', 'minu navigatsioon');
$tmpl->set('lang_bar', 'minu keeleriba');
$tmpl->set('content', 'minu sisu');

/*
// set up the file name for template
//control the content of template object
echo '<pre>';
print_r($tmpl);
echo '</pre>';
*/

//output template content set up with real values
echo $tmpl->parse();

//http object testing
echo '<br/>';
//import http class file
require_once CLASSES_DIR.'http.php';
//import linkobject file
require_once CLASSES_DIR.'linkobject.php';
//create http object
$http = new linkobject();
echo '<pre>';
print_r($http);
echo'</pre>';
//output http constants
echo HTTP_HOST.'<br />';
echo SCRIPT_NAME.'<br />';
echo PHP_SELF.'<br />';
echo REMOTE_ADDR.'<br />';

//set up vars array pair element_name=>element_value
$http->set('kasutaja', 'varje');
//output htttp object vars element
echo '<pre>';
print_r($http->vars);
echo'</pre>';
echo'<hr />';

//create data elements for url testing
//name=value
//name1=value1&name2=value2

//$link = '';
//$http->addToLink($link, 'user', 'test');
//$http->addToLink($link, 'parool', 'qwerty');
$link = $http->getLink(array('user'=>'test', 'parool'=>'qwerty'));
//output link
echo $link;
?>