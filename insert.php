<?php

/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 13-Feb-17
 * Time: 15:06
 */
$link = $db;
$user_id = mysqli_real_escape_string($link, $_POST['userid']);
$username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$is_active = mysqli_real_escape_string($link, $_POST['is_active']);
$role_id = mysqli_real_escape_string($link, $_POST['role_id']);
$created = mysqli_real_escape_string($link, $_POST['created']);
$changed = mysqli_real_escape_string($link, $_POST['changed']);

$sql = "INSERT into user (user_id, username, password, first_name, last_name, email, is_active, role_id, created, changed) values ('$user_id', '$username', '$password', '$first_name', '$last_name', '$email', '$is_active', '$role_id', '$created', $changed)";
if(mysqli_query($link, $sql)) {
    echo "Lisatud";
} else {
    echo "ERROR:" .mysqli_error($link);
}

mysqli_close($link);
?>



