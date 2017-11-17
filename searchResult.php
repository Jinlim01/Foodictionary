<?php
    require_once('bin/filter.php');
   
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
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/homePage.css" rel="stylesheet" type="text/css"/>
        <!--Font Awesome css-->
        <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <style>
            .filter-box{
                margin-top: 100px;
                border-radius: 30px;
                border-style: outset;
                border-color: #cecece;
                padding: 10px;
            }

            .filter-btn span{
                color: #000;
                font-family: cursive;
            }
            
            .filter-btn:hover{
                background-color: #eb3812;
                transition-duration: 0.4s;
            }
            
            .filter-btn:hover span{
                color: #fff;
                transition-duration: 0.4s;
            }
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <div class="container-fluid option-bar" style="background-color: #eb3812;">
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
                <?php
                if(!empty($list)){
                    foreach($list as $list){
                        echo '<div class="col-lg-3 col-md-3 col-sm-8 col-md-offset-1 col-sm-offset-2 col-lg-offset-1 menu">
                              <a href="#"><img class="img-responsive recipe-img" src="img/'.$list['image'].'.jpg"></a>
                              <a href="recipePage.php?id='.$list['recipe_id'].'"><div class="rating"><span>Rating:<br>'.$list['rating_number'].'/10.0</span></div></a>

                              <div class="card-body">
                              <h4 class="card-title"><a href="#">'.$list['food_name'].'</a> </h4>
                              </div>
                              </div>';
                    
                }}else{
                    echo "No Recipe Found";
                }
                ?>
                
            </div>
            
            <!-- Filter Box -->
            <div class="col-md-3 col-lg-3 col-sm-3 filter-box">
                <form action="searchResult.php" method="post">
                    <?php
                        foreach ($list3 as $list3) {
                            echo '<input type="radio" value="'.$list3['food_category_id'].'" name="style">'.$list3['food_category_name'].'<br>';
                        }
                    ?>
                    <hr>
                    <?php
                        foreach ($list4 as $list4) {
                            echo '<input type="checkbox" value="'.$list4['food_type_id'].'" name=type[]">'.$list4['food_type_name'].'<br>';
                        }
                    ?>
                    
                    <input type="submit">
                </form>
            </div>
        </div>
    </body>
</html>

