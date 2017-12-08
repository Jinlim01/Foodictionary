<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('database.php');


$comments = $_POST['comments'];
$recipeID = $_POST['recipe'];
$commentID = $_POST['commentID'];

$query1 = "UPDATE comments SET contents=:contents WHERE comment_id = :comment_id AND recipe_id = :recipe_id" ;
$statement1 = $db->prepare($query1);
$statement1->bindValue(":contents",$comments);
$statement1->bindValue(":comment_id",$commentID);
$statement1->bindValue(":recipe_id",$recipeID);
$statement1->execute();
$statement1->closeCursor();

$query2 = "SELECT * FROM comments WHERE recipe_id=:recipe_id ORDER BY comment_id DESC;";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":recipe_id",$recipeID);
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
        
        
        $query5 = "SELECT * FROM comment_likes where comment_id = :comment_id AND user_id = :user_id";
        $statement5 = $db->prepare($query5);
        $statement5->bindValue(":comment_id", $comments['comment_id']);
        $statement5->bindValue(":user_id",$_SESSION['id']);
        $statement5->execute();
        $list5 = $statement5->fetch();
        $statement5->closeCursor();

        
        $string = $string . '<div><span style="font-weight: bold;">' . $list4['user_name'] . '</span>';
        if(empty($list5)){
           $string = $string .' <button onclick=like("empty",'.$_SESSION['id'].','.$recipeID.','.$comments['comment_id'].') id="like_button" class="" style="background: transparent; border: 0px transparent;"><i class="fa fa-thumbs-o-up comment-del-btn"></i> '.$comments['likes'].'</button>';
        }else{
           $string = $string .'<button onclick=like("full",'.$_SESSION['id'].','.$recipeID.','.$comments['comment_id'].') id="like_button" class="" style="background: transparent; border: 0px transparent;"><i class="fa fa-thumbs-up comment-del-btn"></i>'.$comments['likes'].'</button>';                   
        }
        $string = $string .'<br>
            <p>' . $comments['contents'] . '</p>';
        if($comments['user_id'] == $_SESSION['id']){
            $string = $string . '<button onclick=displayUpdate(' . $comments['comment_id'] . ',' . $recipeID . ')  class="" style="float: right; margin-left:2px;"><i class="fa fa-pencil-square-o comment-del-btn"></i></button><button onclick=deleteComment('.$comments['comment_id'].','.$recipeID.') id="delete_button" class="" style="float: right;"><i class="fa fa-trash comment-del-btn"></i></button>';
        }
            $string = $string . '<br></div> <hr>';
}

echo $string;