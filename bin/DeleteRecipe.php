<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once('database.php');


$query2="DELETE FROM recipe_food_type WHERE recipe_id=:recipe_id";
$statement2=$db->prepare($query2);
$statement2->bindValue(":recipe_id",18);
$statement2->execute();
$statement2->closeCursor();



$query1 = "DELETE FROM recipe WHERE recipe_id=:recipe_id";
$statement1=$db->prepare($query1);
$statement1->bindValue(":recipe_id",18);
$statement1->execute();
$statement1->closeCursor();



