<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("database.php");

$like = $_POST['statement'];
$userID = $_POST['userID'];
$recipeID = $_POST['recipeID'];
$commentID = $_POST['commentID'];


$query2 = "SELECT * FROM comments WHERE recipe_id=:recipe_id AND comment_id =:comment_id;";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":recipe_id", $recipeID);
$statement2->bindValue(":comment_id", $commentID);
$statement2->execute();
$result = $statement2->fetch();
$statement2->closeCursor();

if ($like == "empty") {
    $query = "INSERT INTO comment_likes (user_id,comment_id,recipe_id) VALUES (:user_id , :comment_id , :recipe_id) ";
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $userID);
    $statement->bindValue(":comment_id", $commentID);
    $statement->bindValue(":recipe_id", $recipeID);
    $statement->execute();
    $statement->closeCursor();

    $current = $result['likes'] + 1;


    $query1 = "UPDATE comments SET likes=:likes WHERE comment_id = :comment_id AND recipe_id = :recipe_id";
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(":likes", $current);
    $statement1->bindValue(":comment_id", $commentID);
    $statement1->bindValue(":recipe_id", $recipeID);
    $statement1->execute();
    $statement1->closeCursor();
} else if ($like == "full") {
    $current = $result['likes'] - 1;

    $query3 = "UPDATE comments SET likes=:likes WHERE comment_id = :comment_id AND recipe_id = :recipe_id";
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(":likes", $current);
    $statement3->bindValue(":comment_id", $commentID);
    $statement3->bindValue(":recipe_id", $recipeID);
    $statement3->execute();
    $statement3->closeCursor();

    $query4 = "DELETE FROM comment_likes WHERE comment_id = :comment_id AND user_id =:user_id";
    $statement4 = $db->prepare($query4);
    $statement4->bindValue(":comment_id", $commentID);
    $statement4->bindValue("user_id", $userID);
    $statement4->execute();
    $statement4->closeCursor();
}

$query5 = "SELECT * FROM comments where recipe_id = :recipe_id ORDER BY comment_id DESC";
$statement5 = $db->prepare($query5);
$statement5->bindValue(":recipe_id", $recipeID);
$statement5->execute();
$list5 = $statement5->fetchAll();
$statement5->closeCursor();

$string ='<summary>View more comments</summary><br>';

foreach ($list5 as $comments) {
    $query6 = "SELECT * FROM user where user_id = :user_id";
    $statement6 = $db->prepare($query6);
    $statement6->bindValue(":user_id", $comments['user_id']);
    $statement6->execute();
    $list6 = $statement6->fetch();
    $statement6->closeCursor();

    $query7 = "SELECT * FROM comment_likes where comment_id = :comment_id AND user_id = :user_id";
    $statement7 = $db->prepare($query7);
    $statement7->bindValue(":comment_id", $comments['comment_id']);
    $statement7->bindValue(":user_id", $_SESSION['id']);
    $statement7->execute();
    $list7 = $statement7->fetch();
    $statement7->closeCursor();


    $string = $string . '<div><span style="font-weight: bold;">' . $list6['user_name'] . '</span>';

    if (empty($list7)) {
        $string = $string . ' <button onclick=like("empty",' . $_SESSION['id'] . ',' . $recipeID . ',' . $comments['comment_id'] . ') id="like_button" class="" style="background: transparent; border: 0px transparent;"><i class="fa fa-thumbs-o-up comment-del-btn"></i> ' . $comments['likes'] . '</button>';
    } else {
        $string = $string . '<button onclick=like("full",' . $_SESSION['id'] . ',' . $recipeID . ',' . $comments['comment_id'] . ') id="like_button" class="" style="background: transparent; border: 0px transparent;"><i class="fa fa-thumbs-up comment-del-btn"></i>' . $comments['likes'] . '</button>';
    }
    $string = $string . '<br><p>' . $comments['contents'] . '</p>';
    if ($comments['user_id'] == $_SESSION['id']) {
        $string = $string . '<button onclick=displayUpdate(' . $comments['comment_id'] . ',' . $recipeID . ') class="" style="float: right; margin-left:2px;"><i class="fa fa-pencil-square-o comment-del-btn"></i></button>';
        $string = $string .'<button onclick=deleteComment(' . $comments['comment_id'] . ',' . $recipeID . ') id="delete_button" class="" style="float: right;"><i class="fa fa-trash comment-del-btn"></i></button>';
    }
    $string = $string .'<br></div> <hr>';
}

echo $string;
