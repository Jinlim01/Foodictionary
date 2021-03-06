<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("database.php");

$id = $_GET['id'];

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$ingredient = filter_input(INPUT_POST, "ingredient", FILTER_SANITIZE_STRING);
$instructions = filter_input(INPUT_POST, "instructions", FILTER_SANITIZE_STRING);
$type = $_POST['type'];
$style = filter_input(INPUT_POST, 'style', FILTER_SANITIZE_STRING);
$time = filter_input(INPUT_POST, "time", FILTER_SANITIZE_STRING);

$ingredient = str_replace("\n", "<br>", $ingredient);
$instructions = str_replace("\n", "<br>", $instructions);

$query1 = "UPDATE recipe SET food_name= :food_name, ingridiants= :ingridiants, instructions= :instructions, food_category_id = :food_category_id ,cooking_time = :cooking_time WHERE recipe_id = :recipe_id;";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":food_name", $name);
$statement1->bindValue(":ingridiants", $ingredient);
$statement1->bindValue(":instructions", $instructions);
$statement1->bindValue(":food_category_id", $style);
$statement1->bindValue(":recipe_id", $id);
$statement1->bindValue(":cooking_time",$time);
$statement1->execute();
$statement1->closeCursor();

$query2 = "DELETE FROM recipe_food_type WHERE recipe_id=:recipe_id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":recipe_id", $id);
$statement2->execute();
$statement2->closeCursor();

foreach ($type as $type) {
    $query3 = "INSERT INTO recipe_food_type (recipe_id,food_type_id) VALUES (:id , :type_id);";
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(":id", $id);
    $statement3->bindValue(":type_id", $type);
    $statement3->execute();
    $statement3->closeCursor();
}

header('location: homePage.php');
