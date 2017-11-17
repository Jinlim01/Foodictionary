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
        <link href="css/homePage.css" rel="stylesheet" type="text/css"/>
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
        <!--Font Awesome css-->
        <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <div class="container-fluid option-bar" style="background-color: #ff785b;">
            <div class="col-md-2 col-sm-2 col-md-offset-3 col-sm-offset-3 option-list">
                <center><a href="">Cook in 30 Minutes</a></center>
            </div>
            <div class="col-md-2 col-sm-2 option-list">
                <center><a href="">Pick A Meal</a></center>
            </div>
            <div class="col-md-2 col-sm-2 option-list">
                <center><a href="">Top Rated</a></center>
            </div>
        </div>

        <div class="container-fluid">        
            <div class="col-md-8 col-lg-8 col-sm-8 menu-list">
                <h2 class="menu-title">CATEGORY</h2>
                <?php
                    for($i=0;$i<sizeof($list3);$i++){
                        echo '<div class="col-lg-3 col-md-3 col-sm-8 col-md-offset-1 col-sm-offset-2 col-lg-offset-1 menu">
                                <a href="#"><img class="img-responsive recipe-img" src="img/'.$list3[$i]['food_category_image'].'"></a>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="#">'.$list3[$i]['food_category_name'].'</a></h4>
                                </div>
                                </div>';
                    }
                ?>
                
            </div>



            <!-- Filter Box -->
            <div class="col-md-3 col-lg-3 col-sm-3 col-md-offset-1 filter-box">
                <form action="searchResult.php" method="post">
                    <?php
                    foreach ($list3 as $list3) {
                        echo '<input type="radio" value="' . $list3['food_category_id'] . '" name="style">' . $list3['food_category_name'] . '<br>';
                    }
                    ?>
                    <hr>
                    <?php
                    foreach ($list4 as $list4) {
                        echo '<input type="checkbox" value="' . $list4['food_type_id'] . '" name=type[]">' . $list4['food_type_name'] . '<br>';
                    }
                    ?>

                    <input type="submit">
                </form>
            </div>
        </div>
        <div class="container">
            <h2 class="">DISHES</h2>
            <?php 
            $length = sizeof($list1);
            if($length < 6){
                for($i=0;$i<$length;$i++){
                echo ' <div class="col-sm-8 col-md-2 menu">
                    <a href="#"><img class="img-responsive recipe-img" src="img/'.$list1[$i]['image'].'"></a>
                    <a href="recipePage.php?id='.$list1[$i]['recipe_id'].'"><div class="rating"><span>Rating:<br>'.$list1[$i]['rating_number'].'/10.0</span></div></a>

                    <div class="card-body">
                        <h4 class="card-title"><a href="#">'.$list1[$i]['food_name'].'</a></h4>
                    </div>
                </div>'
              ;}
            }else{
                for($i=($length-1);$i>($length-7);$i--){
                    echo ' <div class="col-sm-8 col-md-2 menu">
                    <a href="#"><img class="img-responsive recipe-img" src="img/'.$list1[$i]['image'].'"></a>
                    <a href="recipePage.php?id='.$list1[$i]['recipe_id'].'"><div class="rating"><span>Rating:<br>'.$list1[$i]['rating_number'].'/10.0</span></div></a>

                    <div class="card-body">
                        <h4 class="card-title"><a href="#">'.$list1[$i]['food_name'].'</a></h4>
                    </div>
                </div>';
                }
            }
            ?>
        </div>

    </body>

    <footer class="footer">
        <p>UDP Group Project Created by: Jin, Kyle, Bin & Emil</p>
    </footer>
</html>
