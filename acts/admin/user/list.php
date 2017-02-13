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
    $user_data->set('username', $user['username']);
}
$tmpl->set('content', $user_data->parse());

?>