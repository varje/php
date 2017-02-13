<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 13-Feb-17
 * Time: 10:02
 */
echo 'aaaaaaaaaaaaa';
$sql = 'SELECT * FROM user';
$res = $db->getArray($sql);
echo '<pre>';
print_r($res);
echo '</pre>';
//$tmpl->set('content', $res->parse());

?>