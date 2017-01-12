<?php

/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 12-Jan-17
 * Time: 10:51
 */
class text
{//begin of class
    //class variable
    var $str = '';
    //class methods
    //set text method
    //construct
    function __construct($s = '') {
        $this->setText($s);
    }

    function setText ($s) {
        $this->str = $s;
    }
    //setText

    //show text output
    function show() {
        echo $this->str.'<br/>';
    }
}//end of class
?>