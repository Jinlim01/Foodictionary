<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('database.php');


$style = filter_input(INPUT_POST, 'style', FILTER_SANITIZE_STRING);

if(isset($_POST['type'])){
    $type=$_POST['type'];
    $query = "SELECT * from recipe JOIN recipe_food_type WHERE recipe.recipe_id = recipe_food_type.recipe_id ";
    if (isset($style)) {
        $query = $query . "AND recipe.food_category_id = " . $style;
    }
}else{
    if (isset($style)) {
        $query = "SELECT * from recipe WHERE ";
        $query = $query . "recipe.food_category_id = " . $style;
    }
}




if (isset($type)) {
    foreach ($type as $type) {
        $query = $query . " AND recipe_food_type.food_type_id= " . $type;
    }
}


$statement1 = $db->prepare($query);
$statement1->execute();
$list = $statement1->fetchAll();
$statement1->closeCursor();


//SELECT * from recipe JOIN recipe_food_type WHERE recipe.recipe_id = recipe_food_type.recipe_id AND recipe_food_type.food_type_id = 7 AND recipe.food_category_id = 1
