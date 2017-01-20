<?php
// index.php
/**
 * Created by PhpStorm.
 * User: anna.karutina
 * Date: 12.01.2017
 * Time: 12:58
 */
// import configuration
require_once 'conf.php';
// create and template object
// and use it
// create an template object,
// set up the file name for template
// load template file content
$tmpl = new template('main');
// add pairs of temlate element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');
// menu testing
// import menu file
require_once 'menu.php';
$tmpl->set('menu', $menu->parse());
// end of menu
$tmpl->set('nav_bar', 'minu navigatsioon');
$tmpl->set('lang_bar', 'minu keeleriba');
$tmpl->set('content', 'minu sisu');
// output template content set up with real values
echo $tmpl->parse();
//database test
echo '<pre>';
print_r($db);
echo '</pre>';
?>