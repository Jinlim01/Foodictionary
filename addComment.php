<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("database.php");

$message = $_POST['comment'];
$user= $_POST['user'];
$recipe= $_POST['recipe'];


$query = "INSERT INTO comments (user_id,recipe_id,contents) VALUES (:user_id , :recipe_id , :contents) ";
$statement = $db->prepare($query);
$statement->bindValue(":user_id", $user);
$statement->bindValue(":recipe_id", $recipe);
$statement->bindValue(":contents", $message);
$statement->execute();
$statement->closeCursor();


$query2 = "SELECT * FROM comments WHERE recipe_id=:recipe_id ORDER BY comment_id DESC;";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":recipe_id",$recipe);
$statement2->execute();
$result = $statement2->fetchAll();
$statement2->closeCursor();

echo "hi";
