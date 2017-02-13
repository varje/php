<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 13-Feb-17
 * Time: 10:32
 */
if(ROLE_ID != ROLE_ADMIN){
    $http->redirect();
} else {
    $menu = new template('admin.menu.menu');
    $item = new template('admin.menu.item');

    $admin_menu = array(
        array(
            'name'=>'Kasutajad',
            'link' => 'user.list'),
        array(
            'name' => 'Menüü',
            'link' => 'page.add')
    );

    foreach ($admin_menu as $link_data){
        $link = $http->getLink(array('act' => $link_data['link']));
        $item->set('link', $link);
        $item->set('name', tr($link_data['name']));
        $menu->add('items', $item->parse());
    }

    $tmpl->set('content', $menu->parse());
}
?>