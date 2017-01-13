<?php

/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 13-Jan-17
 * Time: 12:04
 */
// import text class variables and methods
require_once 'text.php';
class ctext extends text
{//begin of class
    //class variable - color
    var $color = false; //color doesn't exist
    //methods
    //set up the color
    function setColor($c) {
        $this->color = $c; //set up $c parameters value to
    }//setColor

}//end of class