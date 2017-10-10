<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'database.php';



$user_name = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$retype_password = filter_input(INPUT_POST, "retype_password", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);

//echo $email.$password.$user_name.$retype_password;
$query1 = "SELECT * FROM user where user_name = :user_name";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":user_name", $user_name);
$statement1->execute();
$list1 = $statement1->fetch();
$statement1->closeCursor();


if (!empty($list1)) {
    $_SESSION['error2'] = 'Username has been taken';
    header('location:index.php');
    exit();
}

if ($password != $retype_password) {
    $_SESSION['error2'] = "Passwords don't match";
    header('location:index.php');
    exit();
}

$p1 = '/[A-Z]/';

$p2 = '/[a-z]/';

$p3 = '/[0-9]/';

$p4 = '/!#$%^&*{}()<.>]/';



$length = strlen($password);

if ($length < 6) {
    $_SESSION['error2'] = "Password must more than 6 characters";
    header('location: index.php');
    exit();
}


if (!preg_match($p1, $password) || !preg_match($p2, $password) || !preg_match($p3, $password)) {
    $_SESSION['error2'] = "Password must have at least 1 uppercase,lowercase letter and at 1 number";
    header('location: register.php');
    exit();
}

if (preg_match($p4, $password)) {
    $error_message = "Password cannot contain any of the following symbols : /!#$%^&*{}()<.>]/";
    header('location: register.php');
    exit();
}

$query2 = "SELECT * FROM user where email_address = :email_address";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":email_address", $email);
$statement2->execute();
$list2 = $statement2->fetch();
$statement2->closeCursor();

if (!empty($list2)) {
    $_SESSION['error2'] = 'Email address has been used';
    header('location:index.php');
    exit();
}


$query = "INSERT INTO user (user_name,password,email_address) VALUES (:username , :password , :email) ";
$statement = $db->prepare($query);
$statement->bindValue(":username", $user_name);
$statement->bindValue(":email", $email);
$statement->bindValue(":password", $password);
$statement->execute();
$statement->closeCursor();

$_SESSION['user'] = $user_name ;
$_SESSION['email'] = $email ; 

header('location:index.php');

