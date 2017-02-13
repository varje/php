<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 13-Feb-17
 * Time: 10:32
 */
if(ROLE_ID == ROLE_ADMIN)
{
    $link = $http->getLink(array('user' => 'list'));
    $item->set('link', $link);
    $item->set('name', tr('Kasutajad'));
    $menu->add('items', $item->parse());
}
if(ROLE_ID == ROLE_ADMIN)
{
    $link = $http->getLink(array('page' => 'add'));
    $item->set('link', $link);
    $item->set('name', tr('Menüü'));
    $menu->add('items', $item->parse());
}
?>