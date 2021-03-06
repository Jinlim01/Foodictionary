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
    <body>
        <?php include 'navbar.php'?>
        <section>
            <div class="container">
                <form id="login-form" action="login.php" method="post">
                    <div class="col-md-4 col-sm-6 col-md-offset-1 col-sm-offset-3 form-line"  id="login_form" name="login_form">
                        <div class="form-group">
                            <label for="">Email</label>
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
                            <input type="password" class="form-control" name="password" id="pass" placeholder="at least 6 characters" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" id="retyped_pass" name="retype_password" placeholder="Please enter your password again" required="">
                        </div>
                        <div>
                            <?php
                            if (isset($_SESSION['error2'])) {
                                echo "<label>" . $_SESSION['error2'] . "</label><br>";
                            }
                            ?>
                            <button type="button" name="register" id="register_button" class="button submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </body>

    <?php include 'footer.php';?>
</html>
<?php
unset($_SESSION['error1']);
unset($_SESSION['error2']);
