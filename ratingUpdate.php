<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('database.php');

$rating = $_POST['rating'];
$userID = $_POST['userID'];
$recipeID = $_POST['recipeID'];

$query1 = "INSERT INTO rating (user_id,rating_score,recipe_id) VALUES (:user_id , :rating_score , :recipe_id) ";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":user_id", $userID);
$statement1->bindValue(":rating_score", $rating);
$statement1->bindValue(":recipe_id", $recipeID);
$statement1->execute();
$statement1->closeCursor();


$query2 = "SELECT * FROM recipe WHERE recipe_id =:recipe_id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":recipe_id",$recipeID);
$statement2->execute();
$list2 = $statement2->fetch();
$statement2->closeCursor();

$query3 = "SELECT count(*) FROM rating WHERE recipe_id =:recipe_id";
$statement3 = $db->prepare($query3);
$statement3->bindValue(":recipe_id",$recipeID);
$statement3->execute();
$list3 = $statement3->fetch();
$statement3->closeCursor();

$query5 = "SELECT * FROM rating WHERE recipe_id =:recipe_id";
$statement5 = $db->prepare($query5);
$statement5->bindValue(":recipe_id",$recipeID);
$statement5->execute();
$list5 = $statement5->fetchAll();
$statement5->closeCursor();

$total = 0 ;
foreach($list5 as $loop){
    $total = $total + $loop['rating_score'];
}


$result = $total / $list3[0]; 
$return = round($result);

$query4 = "UPDATE recipe SET rating_number = :rating_number WHERE recipe_id = :recipe_id;";
$statement4 = $db->prepare($query4);
$statement4->bindValue(":rating_number", $return);
$statement4->bindValue(":recipe_id",$recipeID);
$statement4->execute();
$statement4->closeCursor();

$string ='<h3><i class="fa fa-star" aria-hidden="true"></i>&nbsp;'. $return. '/10</h3>';
echo $string;
