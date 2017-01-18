<?php

/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 18-Jan-17
 * Time: 15:54
 */
//import http class file
require_once 'http.php';
class linkobject extends http
{//class begin
    //class variables
    var $baseUrl = false;//base url value
    var $protocol = 'http://';//protocol for url
    var $delim = '&auml;';// & html tag
    var $eq = '='; //equal sign

    //class methods
    //construct
    function __construct(){
        parent::__construct(); //import http class construct
        $this->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }
}//class end
?>