<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once("database.php");

$searchWord = filter_input(INPUT_POST, "search", FILTER_SANITIZE_STRING);

$searchWord = "'%" . $searchWord . "%'";

$query1="SELECT * FROM recipe WHERE (food_name LIKE" . $searchWord. "or ingridiants LIKE" . $searchWord. " or instructions LIKE " . $searchWord. ");";
$statement1 =$db->prepare($query1);
$statement1->execute();
$search = $statement1->fetchAll();
$statement1->closeCursor();





