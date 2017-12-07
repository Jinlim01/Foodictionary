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
$statement2->bindValue(":recipe_id",$recipe);
$statement2->execute();
$result = $statement2->fetchAll();
$statement2->closeCursor();

$string ='<summary>View more comments</summary><br>';

for($i=0;$i<sizeof($result);$i++){
        $query4 = "SELECT * FROM user where user_id = :user_id";
        $statement4 = $db->prepare($query4);
        $statement4->bindValue(":user_id", $result[$i]['user_id']);
        $statement4->execute();
        $list4 = $statement4->fetch();
        $statement4->closeCursor();
        
        $string = $string . '<div>
            <span style="font-weight: bold;">' . $list4['user_name'] . '</span>
            <br>';
        if($result[$i]['user_id'] == $_SESSION['id']){
            if($id == $result[$i]['comment_id']){
                $string = $string . '<form id="myForm" method="post" role="form"><input type="text" name="comments" id="comments"><input type="button" id="updateButton" onclick="updateComment('.$result[$i]['comment_id'].','.$recipe.')"></form>';
            }else{
              $string = $string.   '<p>' . $result[$i]['contents'] . '</p><button onclick=displayUpdate('.$result[$i]['comment_id'].','.$recipe.')>Update comment</button>';
            }
            $string = $string . '<button onclick=deleteComment('.$result[$i]['comment_id'].','.$recipe.') id="delete_button" class="" style="float: right;"><i class="fa fa-trash comment-del-btn"></i></button>';
        }
            $string = $string . '<br></div> <hr>';
}


echo $string;