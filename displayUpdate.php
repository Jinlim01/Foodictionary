<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('database.php');

$id = $_POST['id'];
$recipe = $_POST['recipe'];

$query2 = "SELECT * FROM comments WHERE recipe_id=:recipe_id ORDER BY comment_id DESC;";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":recipe_id", $recipe);
$statement2->execute();
$result = $statement2->fetchAll();
$statement2->closeCursor();

$string = '<summary>View more comments</summary><br>';

for ($i = 0; $i < sizeof($result); $i++) {
    $query4 = "SELECT * FROM user where user_id = :user_id";
    $statement4 = $db->prepare($query4);
    $statement4->bindValue(":user_id", $result[$i]['user_id']);
    $statement4->execute();
    $list4 = $statement4->fetch();
    $statement4->closeCursor();

    $query5 = "SELECT * FROM comment_likes where comment_id = :comment_id AND user_id = :user_id";
    $statement5 = $db->prepare($query5);
    $statement5->bindValue(":comment_id", $result[$i]['comment_id']);
    $statement5->bindValue(":user_id", $_SESSION['id']);
    $statement5->execute();
    $list5 = $statement5->fetch();
    $statement5->closeCursor();

    $string = $string . '<div><span style="font-weight: bold;">' . $list4['user_name'] . '</span>';
    if (empty($list5)) {
        $string = $string . ' <button onclick=like("empty",' . $_SESSION['id'] . ',' . $id . ',' . $result[$i]['comment_id'] . ') id="like_button" class="" style="background: transparent; border: 0px transparent;"><i class="fa fa-thumbs-o-up comment-del-btn"></i> ' . $result[$i]['likes'] . '</button><br>';
        ;
    } else {
        $string = $string .  '<button onclick=like("full",' . $_SESSION['id'] . ',' . $id . ',' . $result[$i]['comment_id'] . ') id="like_button" class="" style="background: transparent; border: 0px transparent;"><i class="fa fa-thumbs-up comment-del-btn"></i>' . $result[$i]['likes'] . '</button><br>';
    }

    if ($result[$i]['user_id'] == $_SESSION['id']) {
        if ($id == $result[$i]['comment_id']) {
            $string = $string . '<form method="post" > <input type="text" id="comments" name="comments"><input type="button" onclick="updateComment(' . $result[$i]['comment_id'] . ',' . $recipe . ')" value="Submit">  </form>';
        } else {
            $string = $string . '<p>' . $result[$i]['contents'] . '</p><button onclick=displayUpdate(' . $result[$i]['comment_id'] . ',' . $recipe . ')  class="" style="float: right; margin-left:2px;"><i class="fa fa-pencil-square-o comment-del-btn"></i></button>';
        }
        $string = $string . '<button onclick=deleteComment(' . $result[$i]['comment_id'] . ',' . $recipe . ') id="delete_button" class="" style="float: right;"><i class="fa fa-trash comment-del-btn"></i></button>';
    }
    $string = $string . '<br></div> <hr>';
}


echo $string;
