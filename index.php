<?php
// index.php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 12.01.2017
 * Time: 12:58
 */
// import configuration
require_once 'conf.php';
//import act
require_once 'act.php';
// create and template object
// and use it
// create an template object,
// set up the file name for template
// load template file content
$tmpl = new template('main');
//require language control
require_once(BASE_DIR.'lang.php');
// add pairs of template element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');
// menu testing
// import menu file
require_once 'menu.php';
$tmpl->set('menu', $menu->parse());
// end of menu
//import act file
require_once 'act.php';
//$tmpl->set('nav_bar', 'minu navigatsioon');
$tmpl->set('nav_bar', $sess->user_data['username']);
//$tmpl->set('lang_bar', LANG_ID);
//allow to use default act
//$tmpl->set('content', $http->get('content'));
// output template content set up with real values
echo $tmpl->parse();
//database test
$sql = 'SELECT NOW()';
$res = $db->getArray($sql);
$sql = 'SELECT NOW()';
$res = $db->getArray($sql);
$sql = 'SELECT NOW()';
$res = $db->getArray($sql);
$db->showHistory();
//control session output
$sess->flush();
echo '<pre>';
print_r($sess);
echo '</pre>';
?>
