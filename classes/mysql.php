<?php

/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 20-Jan-17
 * Time: 09:11
 */
class mysql
{
    //set variables
    var $host = false;// database server name/ip
    var $user = false; //database server user name
    var $pass = false; //database user server password
    var $dbname = false; //one of user databases

    //class methods
    //construct
    function __construct($h, $u, $p, $dbn) {
        $this->host = $h; //real database server name
        $this->user = $u; //real database server user name
        $this->pass = $p;//real database server user password
        $this->dbname = $dbn;//real database server user database
        $this->connect(); //connect to real database server
    }//construct

    //connection to database server
    function connect() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(mysqli_connect_error()) {
            echo 'Viga andmebaasiga ühendamisel<br />';
            exit;
        }// if problem with connection
    }//connect

    //query to database
    function query($sql) {
        $res = mysqli_query($this->conn, $sql);
        if ($res === FALSE) {
            echo 'Viga päringuga <b>'.$mysql.'</b><br />';
            echo mysqli_error($this->conn).'<br />';
            exit;
        }
        return $res;
    }//query
}//class end
?>