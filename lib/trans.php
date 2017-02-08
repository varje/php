<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 08-Feb-17
 * Time: 10:34
 */
function tr($txt)
{
    static $trans = false; //static - lang file is read only on the first try

    //default language
    if(LANG_ID == DEFAULT_LANG)
    {
        return $txt;
    }
    //not default language
    if($trans === false)
    {
        $fn = LANG_DIR.'lang_'.LANG_ID.'.php';
        if(file_exists($fn) and is_file($fn) and is_readable($fn))
        {
            require_once($fn);
            $trans = $_trans;
        }
        else
        {
            $trans = array();
        }
    }
    if(isset($trans($txt)))
    {
        return $trans($txt);
    }
    //if answer not found, return default text
    return $txt;
}
?>