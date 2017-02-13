<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 13-Feb-17
 * Time: 10:02
 */
$user_data = new template('admin.user.user');
$sql = 'SELECT * FROM user';
$res = $db->getArray($sql);
foreach ($res as $key=>$user){
    $user_data->set('user_id', $user['user_id']);
    $user_data->set('username', $user['username']);
    $user_data->set('first_name', $user['first_name']);
    $user_data->set('last_name', $user['last_name']);
    $user_data->set('email', $user['email']);
    $user_data->set('created', $user['created']);
    $user_data->set('changed', $user['changed']);
}
$tmpl->set('content', $user_data->parse());

?>