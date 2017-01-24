<?php

/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 24-Jan-17
 * Time: 16:05
 */
class sessioon
{//sessioon class begin
    //class variables
    var $sid = false; //session id
    var $vars = array(); //web content
    var $http = false;
    var $db = false; //connect to database
    var $anonymous = true; //anonymous session
    var $timeout = 1800; //session length

    //class methods
    function setAnonymous() {
        $this->anonymous = false;
    }

    function setTimeout() {
        $this->timeout = 2000;
    }

}//class end
?>