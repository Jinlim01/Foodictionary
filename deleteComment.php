<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('database.php');

$id = $_POST['id'];
$recipe = $_POST['recipe'];

   
$query1 = "DELETE FROM comments WHERE comment_id = :comment_id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":comment_id",$id);
$statement1->execute();
$statement1->closeCursor();



$query2 = "SELECT * FROM comments WHERE recipe_id=:recipe_id ORDER BY comment_id DESC;";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":recipe_id",$recipe);
$statement2->execute();
$result = $statement2->fetchAll();
$statement2->closeCursor();

$string ='<summary>View more comments</summary><br>';

foreach($result as $comments){
    $query4 = "SELECT * FROM user where user_id = :user_id";
        $statement4 = $db->prepare($query4);
        $statement4->bindValue(":user_id", $comments['user_id']);
        $statement4->execute();
        $list4 = $statement4->fetch();
        $statement4->closeCursor();
        $string = $string . '<div>
            <span style="font-weight: bold;">' . $list4['user_name'] . '</span>
            <br>
            <p>' . $comments['contents'] . '</p>';
        if($comments['user_id'] == $_SESSION['id']){
            $string = $string . '<button onclick=displayUpdate('.$comments['comment_id'].','.$recipe.')>Update comment</button><button onclick=deleteComment('.$comments['comment_id'].','.$recipe.') id="delete_button" class="" style="float: right;"><i class="fa fa-trash comment-del-btn"></i></button>';
        }
            $string = $string . '<br></div> <hr>';
}


echo $string;