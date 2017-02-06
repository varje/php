<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 06-Feb-17
 * Time: 17:23
 */
//define separator
$sep = new Template('lang.sep');
$sep = $sep->parse();
$count= 0;
//language massive
foreach($siteLangs as $lang_id => $lang_name)
{
    //enlarge for separators
    $count++;
    //use active mall on active language
    if($lang_id == LANG_ID)
    {
        $item = new Template('lang.active');
    }
    //else usual mall
    else{
        $item = new Template('lang.item');
    }
    //link to choose between languages
    // add massive as language, aie massive as action, menu element, not massive as language choice
    $link = $http->getLink(array('lang_id'=>$lang_id), array('act', 'page_id'), array('lang_id'));
    $item->set('link', $link);
    $item->set('name', $lang_name);
    $tmpl->add('lang_bar', $item->parse());
    //add separator, but no separator after last language
    if($count < count($siteLangs)){
        $tmpl->add('lang_bar', $sep);
    }
}