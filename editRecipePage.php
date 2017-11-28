<?php 
require_once('database.php');

$id = $_GET['id'];

$query1 = "SELECT * FROM recipe WHERE recipe_id = :id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id",$id);
$statement1->execute();
$list1 = $statement1->fetch();
$statement1->closeCursor();

$query3 = "SELECT * FROM food_category";
$statement3 = $db->prepare($query3);
$statement3->execute();
$list3 = $statement3->fetchAll();
$statement3->closeCursor();


$query4 = "SELECT * FROM food_type";
$statement4 = $db->prepare($query4);
$statement4->execute();
$list4 = $statement4->fetchAll();
$statement4->closeCursor();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Recipe</title>

        <style>  
            .addRecipeForm{
                background-color: #efefef;
                padding: 20px;
            }

            .add-btn{
                background-color: #f05f40;
                padding: 10px;
                padding-left: 20px;
                padding-right: 20px;
                border: 0px;
                color: #fff;
                border: 2px solid #f05f40;
                font-weight: bold;
            }

            .add-btn:hover{
                color: #f05f40;
                background-color: #fff;
                transition-duration: 0.4s;
            }
        </style>
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="container">
            <h2>Edit Recipe</h2>
            <form class="form-horizontal addRecipeForm" action="updateRecipe.php?id=<?php echo $id; ?>" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $list1['food_name'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="style" name="style">
                            <?php 
                            foreach($list3 as $list3){
                                echo '<option id="style" name="style" value="'.$list3['food_category_id'].'">'.$list3['food_category_name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Ingredients</label>
                    <div class="col-sm-10">
                        <textarea id="ingredient" name="ingredient" class="form-control" rows="5" ><?php
                                echo "\n";
                                $words = $list1['ingridiants'];
                                $words = str_replace("<br>","\n", $words);
                                echo $words;
                            ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Instructions</label>
                    <div class="col-sm-10">
                        <textarea id="instructions" name="instructions" class="form-control" rows="10"><?php 
                                echo "\n";
                                $words = $list1['instructions'];
                                $words = str_replace("<br>","\n", $words);
                                echo $words;
                            ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Food Type</label>
                    <div class="col-sm-10">
                        <?php 
                            foreach($list4 as $list4){
                                echo '<label class="radio-inline"><input value="'.$list4['food_type_id'].'" type="checkbox" name="type[]">&nbsp; '.$list4['food_type_name'].'</label>';
                            }
                        ?>
                    </div>
                </div>
                
                <br>
                <center><input type="submit" class="add-btn" value="Edit"></center>
            </form>
        </div>
    </body>
</html>
