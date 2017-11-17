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
                background-color: #ff785b;
                transition-duration: 0.4s;
            }

            .filter-btn:hover span{
                color: #fff;
                transition-duration: 0.4s;
            }

            .menu{
                background-color: #dee0e2;
            }
        </style>
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
                <div class="col-lg-3 col-md-3 col-sm-8 col-md-offset-1 col-sm-offset-2 col-lg-offset-1 menu">
                    <a href="#"><img class="img-responsive recipe-img" src="img/salmon.jpg"></a>
                    <div class="rating"><span>Rating:<br>8.1/10.0</span></div>

                    <div class="card-body">
                        <h4 class="card-title"><a href="#">Teriyaki Salmon</a> </h4>
                    </div>
                </div>
            </div>

            <!-- Filter Box -->
            <div class="col-md-3 col-lg-3 col-sm-3 filter-box">
                <p>Filter Box Content</p>
                <p>Filter Box Content</p>
                <p>Filter Box Content</p>
                <p>Filter Box Content</p>
                <p>Filter Box Content</p>
                <p>Filter Box Content</p>
                <p>Filter Box Content</p>

                <center><button type="button" class="btn filter-btn"><span>Search</span></button></center>
            </div>
        </div>
    </body>

    <footer class="footer navbar-fixed-bottom">
        <p>UDP Group Project Created by: Jin, Kyle, Bin & Emil</p>
    </footer>
</html>
