<?php
/**
 * Created by PhpStorm.
 * User: anna.karutina
 * Date: 19.01.2017
 * Time: 10:35
 */
// create menu and item objects
$menu = new template('menu.menu');
$item = new template('menu.item');
//main menu content query
$sql = 'SELECT content_id, title FROM content WHERE parent_id=0 AND show_in_menu=1 ORDER BY sort ASC';
// get menu data from database
$res = $db->getArray($sql);
//create menu items from query result
if($res != false) {
    foreach ($res as $page) {
        $item->set('name', $page['title']);
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link',$link);
        // add item to menu
        $menu->add('items', $item->parse());
    }
}

$tmpl->set('menu', $menu->parse());
?>