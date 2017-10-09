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
    </head>
    <body>
        <h4> Log in </h4>
        <form method="post" action="include/login.php"> 

            <label>User</label>
            <input type="text" name="id" id="id">
            <br>
            <label>Password </label> 
            <input type="password" name="password" id="password">
            <br>
            <?php
            if (isset($_SESSION['error1'])) {
                echo "<label>" . $_SESSION['error1'] . "</label><br>";
            }
            ?>
          
            <input type = "submit">
        </form>
        <br><br><br>
        <h4>Register</h4>
        <form method = "post" action = "include/register.php">
            <label>User</label>
            <input type = "text" name = "id" id = "id" >
            <br>
            <label>Password</label>
            <input type = "password" name = "password" id = "password">
            <br>
            <label>Retype Password </label>
            <input type = "password" name = "retype_password" id = "retype_password">
            <br>
            <label>Email</label>
            <input type = "email" name = "email" id = "email">
            <br>
            <?php
            if (isset($_SESSION['error2'])) {
                echo "<label>" . $_SESSION['error2'] . "</label><br>";
            }
            ?>

            <input type="submit">
        </form>

    </body>

</html>
<?php
unset($_SESSION['error1']);
unset($_SESSION['error2']);
