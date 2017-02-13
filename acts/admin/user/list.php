<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 13-Feb-17
 * Time: 10:02
 */
$sql = 'SELECT * FROM user';
$tmpl->set('content', getArray($sql));
$http->redirect();
?>