<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("database.php");

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$ingredient = filter_input(INPUT_POST, "ingredient", FILTER_SANITIZE_STRING);
$instructions = filter_input(INPUT_POST, "instructions", FILTER_SANITIZE_STRING);
$type = $_POST['type'];
$style = filter_input(INPUT_POST,'style',FILTER_SANITIZE_STRING);

$ingredient = str_replace("\n", "<br>", $ingredient);
$instructions = str_replace("\n", "<br>", $instructions);


$query = "SELECT * FROM user where email_address = :email_address";
$statement = $db->prepare($query);
$statement->bindValue(":email_address", $_SESSION['email']);
$statement->execute();
$list = $statement->fetch();
$statement->closeCursor();

$target_dir = "img/";
$target_name = basename($_FILES["picture"]["name"]);
$target_file = $target_dir . basename($_FILES["picture"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);


$query1 = "INSERT INTO recipe (food_name,ingridiants,instructions,user_id,food_category_id,image) VALUES (:food_name,:ingridiants,:instructions,:user_id,:food_category_id,:image);";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":food_name", $name);
$statement1->bindValue(":ingridiants", $ingredient);
$statement1->bindValue(":instructions", $instructions);
$statement1->bindValue(":user_id",$list['user_id']);
$statement1->bindValue(":food_category_id",$style);
$statement1->bindValue(":image",$target_name);
$statement1->execute();
$statement1->closeCursor();


$query2="SELECT recipe_id FROM recipe where food_name = :name";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":name",$name);
$statement2->execute();
$id = $statement2->fetch();
$statement2->closeCursor();

foreach($type as $type){
    $query3 ="INSERT INTO recipe_food_type (recipe_id,food_type_id) VALUES (:id , :type_id);";
    $statement3=$db->prepare($query3);
    $statement3->bindValue(":id",$id[0]);
    $statement3->bindValue(":type_id",$type);
    $statement3->execute();
    $statement3->closeCursor();
}



header('location: homePage.php');