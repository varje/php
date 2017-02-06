<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 06-Feb-17
 * Time: 15:27
 */
$form = new Template('login');

$form->set('error', $sess->get('login_error'));
$sess->del('login_error');

$form->set('submit', tr('Logi sisse'));
$form->set('username_str', tr('Kasutajanimi'));
$form->set('password_str', tr('Parool'));

$form->set('username', $http->get('username', true));

$link = $http->getLink(array('act' => 'login_do'));
$form->set('action', $link);

$tmpl->set('content', $form->parse());
?>