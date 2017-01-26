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
    //construct
    function __construct(&$http, &$db) {
        $this->http = &$http;
        $this->db = &$db;
        $this->sid = $http->get('sid');
    }//construct

    //setAnonymous
    function setAnonymous($bool) {
        $this->anonymous = $bool;
    }

    //setTimeout
    function setTimeout($t) {
        $this->timeout = $t;
    }

}//class end
?>