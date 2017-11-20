<?php
session_start();
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
        <link href="css/loginregisterform.css" rel="stylesheet" type="text/css"/>

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/creative.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="js/register_js.js" type="text/javascript"></script>
        <script src="js/login_js.js" type="text/javascript"></script>
    </head>

    <body id="page-top">
        <header class="masthead">
            <div class="header-content">
                <div class="header-content-inner">
                    <h1 id="homeHeading">FOODICTIONARY</h1>
                    <hr>
                    
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="">Get Started</a>
                </div>
            </div>
        </header>

        <section id="about">
            <div class="container">
                <form id="login-form" action="login.php" method="post">
                    <div class="col-md-4 col-sm-6 col-md-offset-1 col-sm-offset-3 form-line"  id="login_form" name="login_form">
                        <div class="form-group">
                            <label for="">Username or Email</label>
                            <input type="text" class="form-control" id="username" name="id" required="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required="">
                        </div>
                        <div>
                            <?php
                            if (isset($_SESSION['error1'])) {
                                echo "<label>" . $_SESSION['error1'] . "</label><br>";
                            }
                            ?>
                            <input type="button" name="login" id="login_button" class="login loginmodal-submit" value="Login">

                        </div>
                    </div>
                </form>
                
                <form id="register-form" action="register.php" method="post">
                    <div class="col-md-4 col-sm-6 col-md-offset-2 col-sm-offset-3" id="register_form" name="register_form">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" required=""> 
                        </div>
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="eg, abc@hotmail.com" required="">
                        </div>	
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="at least 6 characters" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Please enter your password again" required="">
                        </div>
                        <div>
                            <?php
                            if (isset($_SESSION['error2'])) {
                                echo "<label>" . $_SESSION['error2'] . "</label><br>";
                            }
                            ?>
                         <button type="button" name="register" id="register_button" class="button submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>     Submit</button>

                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/creative.min.js"></script>
    </body>

    <footer class="container-fluid">
        <p>UDP Group Project Created by: Jin, Kyle, Bin & Emil</p>
    </footer>
</html>
<?php
unset($_SESSION['error1']);
unset($_SESSION['error2']);
