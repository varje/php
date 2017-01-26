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
    }//setAnonymous

    //setTimeout
    function setTimeout($t) {
        $this->timeout = $t;
    }//setTimeout

    // delete sessions from database
    function clearSession() {
        $sql = 'DELETE FROM session '.'WHERE '.
            time(). '- UNIX_TIMESTAMP(changed) > '.
            $this->timeout;
        $this->db->query($sql);
    }//clearSession

    //create session
    function createSession($user = false) {
        //anonymous user session
        if($user == false) {
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonymous'
            );
            //create session id number
            $sid = md5(uniqid(time().mt_rand(1, 1000)), true);
            //add session data to database
            $sql = 'INSERT INTO session SET '.
                'sid='
        }
    }//createSession

}//class end
?>