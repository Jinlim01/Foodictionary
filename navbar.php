<?php 


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
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--Font Awesome css-->
        <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <nav class="navbar navbar-defualt navbar-static-top" role="navigation" style="background-color: #fff; border-bottom-color: #fff; margin-bottom: 0px !important;">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="homePage.php" id="title">FOODICTIONARY</a>
                    <ul class="nav navbar-nav" id="login-reg">
                        <?php
                            if(isset($_SESSION['user']) || isset($_SESSION['email'])){
                                echo '<li class="option">
                                      <a href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;'.$_SESSION['user'].'</a>'.'
                                      </li>';
                                
                                echo '<li class="option">
                                      <a href="addRecipePage.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Add Recipe</a>
                                      </li>';
                                echo '<li class="option">
                                      <a href="logOut.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Log Out</a>
                                      </li>';
                            }else{
                                echo '<li class="option">
                                      <a href="login_registerForm.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Login</a>
                                      </li>
                                      <li class="option">
                                      <a href="login_registerForm.php"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Sign Up</a>
                                       </li>';
                            }
                        
                        ?>
                    </ul>
                </div> 

                <form method="post" action="searchBarResult.php" class="navbar-form navbar-right">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search" id="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form> 
            </div>
        </nav>

        <nav class="navbar navbar-defualt navbar-static-top option-bar" role="navigation">
            <div class="navbar-inner">
                <ul class="nav navbar-nav" id="inner-option">
                    <li class="inner">
                        <a href="fastCook.php">Cook in 30 Minutes</a>
                    </li>
                    <li class="inner">
                        <a href="randomMeal.php">Pick A Meal</a>
                    </li>
                    <li class="inner">
                        <a href="topRated.php">Top Rated</a>
                    </li>
                </ul>
            </div>
        </nav>
    </body>
</html>
