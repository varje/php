<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 06-Feb-17
 * Time: 15:32
 */
$username = $http->get('username');
$password = $http->get('password');
$sql = 'SELECT * FROM user WHERE '.'username='.fixDb($username).' AND '.'password='.fixDb(md5($password)).' AND '.'is_active=1';
$res = $db->getArray($sql);

if($res === false)
{
    $sess->set('login_error', tr('Viga sisselogimisel'));

    $link = $http->getLink(array('act'=>'login'), array('username'));
    $http->redirect($link);
}else {
    $sess->createSession($res[0]);
    // now we have to redirect to index.php
    $http->redirect();
}
?>