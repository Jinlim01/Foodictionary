<?php
require_once('homepage_data.php');

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
        <title>Home</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/homePage.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'navbar.php';?>

        <div class="container-fluid" style="background-color: #efefef;">
            <div class="row">
                <!-- Filter Box -->
                <div class="col-sm-12 col-md-2 col-xs-12 col-md-offset-1 filter-box">
                    <form action="searchResult.php" method="post" class="filter-form">
                        <span class="filter-title">Categories</span><br><br>
                        <?php
                        for ($i = 0; $i < sizeof($list3); $i++) {
                        echo '<input type="radio" value="' . $list3[$i]['food_category_id'] . '" name="style">' . $list3[$i]['food_category_name'] . '<br>';
                        }
                        ?>
                        <hr style="background-color: #f05f40; height: 1px;">
                        <span class="filter-title">Food Type</span><br><br>
                        <?php
                        foreach ($list4 as $list4) {
                            echo '<input type="checkbox" value="' . $list4['food_type_id'] . '" name=type[]">' . $list4['food_type_name'] . '<br>';
                        }
                        ?>
                        <br>
                        <input type="submit" class="filter-btn">
                    </form>
                </div>

                <div class="col-sm-9 col-xs-12">
                    <h2 class="col-md-offset-1">CATEGORY</h2>
                    <?php 
                    for ($i = 0; $i < sizeof($list3); $i++) {
                    echo 
                    '<div class="col-sm-6 col-md-3 menu">
                        <a href="#"><img class="img-responsive recipe-img" src="img/' . $list3[$i]['food_category_image'] . '"></a>
                        <a href="searchResult.php?style='.$list3[$i]['food_category_id'].'"><div class="rating"></div></a>
                        <div class="card-body">
                            <h4 class="card-title"><a href="#">'.$list3[$i]['food_category_name'].'</a></h4>
                        </div>
                    </div>';}   
                    ?>
                </div>


            </div>
            <div class="row">
                <div class="container dishes-container">
                    <h2 class="dishes-title">DISHES</h2>
                    <?php
                    $length = sizeof($list1);
                    if ($length < 4) {
                        for ($i = 0; $i < $length; $i++) {
                    
                    echo 
                    '<div class="col-sm-8 col-md-2 col-md-offset-1 menu" style="background-color: #cecece;">
                        <a href="#"><img class="img-responsive recipe-img" src="img/' . $list1[$i]['image'] . '"></a>
                        <a href="recipePage.php?id=' . $list1[$i]['recipe_id'] . '"><div class="rating"><span>Rating:<br>' . $list1[$i]['rating_number'] . '/10.0</span></div></a>

                        <div class="card-body">
                            <h4 class="card-title"><a href="#">' . $list1[$i]['food_name'] . '</a></h4>
                        </div>
                    </div>';}}else{
                        for ($i = ($length - 1); $i > ($length - 5); $i--) {
                             echo 
                    '<div class="col-sm-8 col-md-2 col-md-offset-1 menu" style="background-color: #cecece;">
                        <a href="#"><img class="img-responsive recipe-img" src="img/' . $list1[$i]['image'] . '"></a>
                        <a href="recipePage.php?id=' . $list1[$i]['recipe_id'] . '"><div class="rating"><span>Rating:<br>' . $list1[$i]['rating_number'] . '/10.0</span></div></a>

                        <div class="card-body">
                            <h4 class="card-title"><a href="#">' . $list1[$i]['food_name'] . '</a></h4>
                        </div>
                    </div>';
                        }
                    }
                     ?>
                </div>
            </div>
        </div>
</body>
</html>

