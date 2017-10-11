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
        <title>Login</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form action="login.php" method="post">
                <div class="col-md-4 col-sm-6 col-md-offset-1 col-sm-offset-3 form-line"  id="login_form" name="login_form">
                    <div class="form-group">
                        <label for="">Username or Email</label>
                        <input type="text" class="form-control" id="" name="id" required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="" name="password" required="">
                    </div>
                    <div>
                        <?php
                        if (isset($_SESSION['error1'])) {
                            echo "<label>" . $_SESSION['error1'] . "</label><br>";
                        }
                        ?>
                        <input type="submit" name="login" id="login_button" class="button submit" value="Login">
                    </div>
                </div>
        </form>
        <form action="register.php" method="post">
            <div class="col-md-4 col-sm-6 col-md-offset-2 col-sm-offset-3" id="register_form" name="register_form">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="" name="id" required=""> 
                </div>
                <div class="form-group">
                    <label for="">Email Address</label>
                    <input type="email" class="form-control" id="" name="email" placeholder="eg, abc@hotmail.com" required="">
                </div>	
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="" class="form-control" name="password" id="" placeholder="at least 6 characters" required="">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="" class="form-control" id="" name="retype_password" placeholder="Please enter your password again" required="">
                </div>
                <div>
                    <?php
                    if (isset($_SESSION['error2'])) {
                        echo "<label>" . $_SESSION['error2'] . "</label><br>";
                    }
                    ?>
                    <input type="submit" name="submit" id="register_button" class="button submit" value="Register">
                </div>
            </div>
        </form>

    </body>

</html>
<?php
unset($_SESSION['error1']);
unset($_SESSION['error2']);
