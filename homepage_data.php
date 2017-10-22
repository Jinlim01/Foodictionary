<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'database.php';

$query1 = "SELECT * FROM recipe";
$statement1 = $db->prepare($query1);
$statement1->execute();
$list1 = $statement1->fetchAll();
$statement1->closeCursor();


$name = array();

for ($i = 0; $i < sizeof($list1); $i++) {
    $query2 = "SELECT * FROM user where user_id = :user_id";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(":user_id", $list1[$i]['user_id']);
    $statement2->execute();
    $list2 = $statement2->fetch();
    $statement2->closeCursor();
    
    $name[$i]=$list2['user_name'];
}
