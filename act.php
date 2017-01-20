<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 20-Jan-17
 * Time: 12:11
 */
$act = $http->get('act'); //act value from url
//create act file path according to act value
$fn = ACTS_DIR.str_replace('.', '/', $act).'.php';
if(file_exists($fn) and is_file($fn) and is_readable($fn)) {
    require_once $fn;
} else {
    $fn = ACTS_DIR.DEFAULT_ACT.'.php';
    $http->set('act', DEFAULT_ACT);
    require_once $fn;
}
?>