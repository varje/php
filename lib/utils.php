<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 26-Jan-17
 * Time: 13:44
 */
function fixDb($val) {
    return '"'.addslashes($val).'"';
}
?>