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
    </head>
    <body>
        <form>
            <div class="col-md-12">
                <div class="col-md-4 col-sm-6 col-md-offset-1 col-sm-offset-3 form-line" id="login_form" name="login_form">
                    <div class="form-group">
                        <label for="">Username or Email</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="" class="form-control" id="">
                    </div>
                    <div>
                        <input type="submit" name="login" id="login_button" class="button submit" value="Login">
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-md-offset-2 col-sm-offset-3" id="register_form" name="register_form">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" class="form-control" id="" placeholder="eg, abc@hotmail.com">
                    </div>	
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="" class="form-control" id="" placeholder="at least 6 characters">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="" class="form-control" id="" placeholder="Please enter your password again">
                    </div>
                    <div>
                        <input type="submit" name="submit" id="register_button" class="button submit" value="Register">
                    </div>
                </div>
            </div>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
