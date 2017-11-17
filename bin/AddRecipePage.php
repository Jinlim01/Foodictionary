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
    </head>
    <body>
        <form action="AddRecipe.php" method="post" enctype="multipart/form-data">
            <label>Name </label>
            <input type="text" name="name" id="name" >
            <br>
            <label>Ingredient</label>
            <input type="text" name="ingredient" id="ingredient">
            <br>
            <label>Instructions</label>
            <input type="text" name="instructions" id="instructions">
            <br>
            <input type="radio" value="1" name="style">Indian<br>
            <input type="radio" value="2" name="style">Chinese<br>
            <input type="radio" value="3" name="style">Asian<br>
            <input type="radio" value="4" name="style">Italian<br>
            <input type="radio" value="5" name="style">Vegeterian<br>
            <input type="radio" value="6" name="style">Seafood<br>
            <input type="radio" value="7" name="style">Mexican<br>
            <input type="radio" value="8" name="style">Thai<br>
            
            <input type="checkbox" value="7" name="type[]">Meat<br>
            <input type="checkbox" value="8" name="type[]">Fish<br>
            <input type="checkbox" value="9" name="type[]">Rice<br>
            <input type="checkbox" value="10" name="type[]">Eggs<br>
            <input type="checkbox" value="11" name="type[]">Vegetables<br>
            <input type="checkbox" value="12" name="type[]">Nuts<br>
            <input type="checkbox" value="13" name="type[]">Mince meat<br>
            
            <input class="buttoncss" id="file" type="file" name="picture" />
            <br>
            <input type="submit">
        </form>
    </body>
</html>


<!--                    <form action="profilePicUpdate.php" method="post" enctype="multipart/form-data">
                        <input class="buttoncss" id="file" type="file" name="picture" />
                        <label class="buttoncss2" for="file">Choose File</label>
                        <input type='hidden' name="member_id" value=""/>
                        <button class="buttoncss" id="submit" type="submit" name="submit">Upload</button>
                    </form>-->


//<?php
//
//require_once('include/database.php');
//
//$target_dir = "img/profilepic/";
//$target_file = $target_dir . basename($_FILES["picture"]["name"]);
//$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
//
//$request_method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);
//
//if ($request_method == 'POST') {
//    $check = getimagesize($_FILES["picture"]["tmp_name"]);
//    if ($check == FALSE) {
//        $message = "<i class='fa fa-info-circle' aria-hidden='true'></i>Uploaded file is not an image.<div><i class'fa fa-times' aria-hidden='true'></i></div>";
//    }
//
//    if ($_FILES["picture"]["size"] > 50000000) {
//        $message = "<i class='fa fa-info-circle' aria-hidden='true'></i>Uploaded file is too large.<div><i class'fa fa-times' aria-hidden='true'></i></div>";
//    }
//
//    if ($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//        $message = "<i class='fa fa-info-circle' aria-hidden='true'></i>Only JPG, JPEG, PNG & GIF files are allowed.<div><i class'fa fa-times' aria-hidden='true'></i></div>";
//    }
//
//    if (isset($message)) {
//        include 'profile.php';
//        exit();
//    } else {
//        $member_id = filter_input(INPUT_POST, "member_id", FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
//
//        $query1 = "SELECT profile_pic FROM member_details WHERE member_id = :member_id";
//        $statement1 = $db->prepare($query1);
//        $statement1->bindValue(":member_id", $member_id);
//        $statement1->execute();
//        $result_array1 = $statement1->fetch();
//        $statement1->closeCursor();
//        $profile_pic_old = $result_array1['profile_pic'];
//
//        if ($profile_pic_old != "profile_pic.jpg") {
//            unlink("img/profile_pic/" . $profile_pic_old);
//        }
//
//        $pic_name = $target_dir . "member_" . $member_id . "." . $imageFileType;
//
//        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $pic_name)) {
//            $profile_pic_new = "member_" . $member_id . "." . $imageFileType;
//
//            $query2 = "UPDATE member_details SET profile_pic = :profile_pic WHERE member_id = :member_id";
//            $statement2 = $db->prepare($query2);
//            $statement2->bindValue(":profile_pic", $profile_pic_new);
//            $statement2->bindValue(":member_id", $member_id);
//            $statement2->execute();
//            $statement2->closeCursor();
//
//            $_SESSION['profilePicUpdated'] = 1;
//            header("Location: profile.php");
//            exit();
//        }
//    }
//} else {
//    header("Location: profile.php");
//    exit();
//}