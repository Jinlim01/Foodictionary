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
        <!--Font Awesome css-->
        <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
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
                <div class="col-lg-3 col-md-3 col-sm-8 col-md-offset-1 col-sm-offset-2 col-lg-offset-1 menu">
                    <a href="#"><img class="img-responsive recipe-img" src="img/salmon.jpg"></a>
                    <div class="rating"><span>Rating:<br>8.1/10.0</span></div>
                    
                    <div class="card-body">
                        <h4 class="card-title"><a href="#">Teriyaki Salmon</a> </h4>
                    </div>
                </div>
            </div>
            
            <!-- Filter Box -->
            <div class="col-md-4 col-lg-4 col-sm-4 filter-box" style="background-color: red;">
                hi
            </div>
        </div>
    </body>
</html>
