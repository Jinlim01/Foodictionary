<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'database.php';

$user_name = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

//echo $user_name." ".$password;
if(strlen($user_name) >= 6){
$query1 = "SELECT * FROM user where user_name=:user_name OR email_address=:email_address ";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":user_name", $user_name);
$statement1->bindValue(":email_address", $user_name);
$statement1->execute();
$list1 = $statement1->fetch();
$statement1->closeCursor();


if (isset($list1)) {
    if ($list1['password'] == $password) {
        $_SESSION['user'] = $list1['user_name'];
        $_SESSION['email'] = $list1['email_address'];
        $_SESSION['id'] = $list1['user_id'];
        header('location:homePage.php');
    } else {
        $_SESSION['error1'] = "Username/Email address or password is incorrect";
        header('location: login_registerForm.php');
    }
} else {
    $_SESSION['error1'] = "Username/Email address or password is incorrect";
    header('location: login_registerForm.php');
}}
else
{
    $_SESSION['error1'] = "Username should be 6 characters long";
    header('location: login_registerForm.php');
}