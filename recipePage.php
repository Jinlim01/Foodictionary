<?php
require_once('database.php');

$id = $_GET['id'];

$query1 = "SELECT * FROM recipe where recipe_id = :recipe_id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":recipe_id", $id);
$statement1->execute();
$list1 = $statement1->fetch();
$statement1->closeCursor();

$query2 = "SELECT * FROM user where user_id = :user_id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":user_id", $list1['user_id']);
$statement2->execute();
$list2 = $statement2->fetch();
$statement2->closeCursor();

$query3 = "SELECT * FROM comments where recipe_id = :recipe_id ORDER BY comment_id DESC";
$statement3 = $db->prepare($query3);
$statement3->bindValue(":recipe_id", $id);
$statement3->execute();
$list3 = $statement3->fetchAll();
$statement3->closeCursor();

if (isset($_SESSION['id'])) {
    $query9 = "SELECT * FROM rating where recipe_id = :recipe_id AND user_id =:user_id";
    $statement9 = $db->prepare($query9);
    $statement9->bindValue(":recipe_id", $id);
    $statement9->bindValue(":user_id", $_SESSION['id']);
    $statement9->execute();
    $list9 = $statement9->fetch();
    $statement9->closeCursor();
}
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
        <link href="css/recipePage.css" rel="stylesheet" type="text/css"/>
        <!--Font Awesome css-->
        <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="container-fluid pic-container">
            <img class="img-test" <?php echo'src="img/' . $list1['image'] . '"'; ?> alt=""/>
            <h1 class="recipe-name"><span><?php echo $list1['food_name'] ?>&nbsp;</span></h1>
        </div>

        <div class="container recipe-info">
            <?php
            if (isset($_SESSION['email'])) {
                if ($_SESSION['email'] == $list2['email_address']) {
                    echo '<a href="DeleteRecipe.php?id=' . $list1['recipe_id'] . '"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete Recipe</a>
                          <a href="editRecipePage.php?id=' . $list1['recipe_id'] . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit Recipe</a>';
                }
            }
            ?>
            <div name="ratingBoard" id="ratingBoard" style="padding-left: 0px !important;" class="col-md-3">
                <h3><i class="fa fa-star" aria-hidden="true"></i>&nbsp; <?php echo $list1['rating_number'] ?>/10</h3>
            </div>

            <div class="col-md-3">
                <h3><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; <?php echo $list1['cooking_time'] ?> minutes</h3>
            </div>

            <div class="col-md-3">
                <?php
                if (empty($list9) && isset($_SESSION['id'])) {
                    echo'<div name="ratingBar" id="ratingBar">
                        Rate the dish
                        <form id="ratingForm" method="post"><input type="number" name="rating" id="rating" min="0" max="10"><input type="button" value="submit" onclick="ratingUpdate(' . $_SESSION['id'] . ',' . $id . ')"</form>
                        </div>';
                }
                ?>
            </div>
        </div>

        <div class="container ingredients-container">
            <h2 class="ingredients"><i class="fa fa-check-square-o"></i>&nbsp; INGREDIENTS</h2>
            <p>
                <?php echo $list1['ingridiants']; ?>
            </p>
        </div>

        <div class="container steps-container">
            <h2 class="steps"><i class="fa fa-book"></i>&nbsp; STEPS</h2>
            <details>
                <summary>Click to view steps</summary>
                <ol style="list-style-type: none;">
                    <?php
                    $instruction = $list1['instructions'];
                    $steps = explode("<br>", $instruction);
                    foreach ($steps as $steps) {
                        echo $steps . "<br>";
                    }
                    ?>
                </ol>
            </details>
        </div>

        <div class="container comments-container">
            <h2 class="comments"><i class="fa fa-comments"></i>&nbsp; COMMENTS</h2>

            <details id="output" class="comment-display">
                <summary>View more comments</summary>
                <br>
                <?php
                foreach ($list3 as $comments) {
                    $query4 = "SELECT * FROM user where user_id = :user_id";
                    $statement4 = $db->prepare($query4);
                    $statement4->bindValue(":user_id", $comments['user_id']);
                    $statement4->execute();
                    $list4 = $statement4->fetch();
                    $statement4->closeCursor();

                    if (isset($_SISSON['id'])) {
                        $query5 = "SELECT * FROM comment_likes where comment_id = :comment_id AND user_id = :user_id";
                        $statement5 = $db->prepare($query5);
                        $statement5->bindValue(":comment_id", $comments['comment_id']);
                        $statement5->bindValue(":user_id", $_SESSION['id']);
                        $statement5->execute();
                        $list5 = $statement5->fetch();
                        $statement5->closeCursor();
                    }

                    echo '<div>
                        <span style="font-weight: bold;">' . $list4['user_name'] . '</span>';
                    if (isset($_SESSION['id'])) {
                        if (empty($list5)) {
                            echo' <button onclick=like("empty",' . $_SESSION['id'] . ',' . $id . ',' . $comments['comment_id'] . ') id="like_button" class="" style="background: transparent; border: 0px transparent;"><i class="fa fa-thumbs-o-up comment-del-btn"></i> ' . $comments['likes'] . '</button>';
                        } else {
                            echo '<button onclick=like("full",' . $_SESSION['id'] . ',' . $id . ',' . $comments['comment_id'] . ') id="like_button" class="" style="background: transparent; border: 0px transparent;"><i class="fa fa-thumbs-up comment-del-btn"></i>' . $comments['likes'] . '</button>';
                        }
                    } else {
                        echo' <button id="like_button" class="" style="background: transparent; border: 0px transparent;"><i class="fa fa-thumbs-o-up comment-del-btn"></i> ' . $comments['likes'] . '</button>';
                    }
                    echo'<br>
                        <p>' . $comments['contents'] . '</p>';
                    if ( isset($_SESSION['id']) && $comments['user_id'] == $_SESSION['id']) {
                        echo'<button onclick=displayUpdate(' . $comments['comment_id'] . ',' . $id . ') class="" style="float: right; margin-left:2px;"><i class="fa fa-pencil-square-o comment-del-btn"></i></button>';
                        echo'<button onclick=deleteComment(' . $comments['comment_id'] . ',' . $id . ') id="delete_button" class="" style="float: right;"><i class="fa fa-trash comment-del-btn"></i></button>';
                    }
                    echo'<br></div> <hr>';
                }
                ?>
            </details>
            <br>
            <div class="form-group">
                <form method="post"role="form">
                    <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="write a comment..."></textarea>
                    <input type="hidden" id="recipe_id" value="<?php echo $id ?>">
                    <input type="hidden" id="user_id" value="<?php echo $_SESSION['id']; ?>"
                           <br><br>
                    <button type="button" id="comment_button" class="btn comment-btn">Submit</button>
                </form>
            </div>
        </div>

        <br>
        <?php include 'footer.php'; ?>
    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#comment_button').click(function () {
                var message = $('#comment').val();
                var recipeID = $('#recipe_id').val();
                var userID = $('#user_id').val();
                $.ajax({
                    type: "post",
                    url: "addComment.php", //get response from this file
                    data: {
                        comment: message,
                        user: userID,
                        recipe: recipeID
                    },
                    success: function (data) {
                        $("#output").html(data);
                    }
                });
            });
        });
        function deleteComment(id, recipeID) {
            $(document).ready(function () {
                $.ajax({
                    type: "post",
                    url: "deleteComment.php",
                    data: {
                        id: id,
                        recipe: recipeID
                    },
                    success: function (data) {
                        $("#output").html(data);
                    }
                });

            });
        }

        function displayUpdate(id, recipeID) {
            $(document).ready(function () {

                $.ajax({
                    type: "post",
                    url: "displayUpdate.php",
                    data: {
                        id: id,
                        recipe: recipeID
                    },
                    success: function (data) {
                        $("#output").html(data);
                    }
                });

            });
        }

        function updateComment(id, recipeID) {
            $(document).ready(function () {
                var comments = $('#comments').val();
                $.ajax({
                    type: "post",
                    url: "updateComment.php",
                    data: {
                        commentID: id,
                        recipe: recipeID,
                        comments: comments
                    },
                    success: function (data) {
                        $("#output").html(data);
                    }
                });

            });
        }

        function ratingUpdate(userID, recipeID) {
            $(document).ready(function () {
                var rating = $('#rating').val();
                $.ajax({
                    type: "post",
                    url: "ratingUpdate.php",
                    data: {
                        rating: rating,
                        userID: userID,
                        recipeID: recipeID
                    },
                    success: function (data) {
                        $("#ratingBoard").html(data);
                        $("#ratingBar").remove();
                    }
                });

            });
        }

        function like(statement, userID, recipeID, commentID) {
            $(document).ready(function () {
                $.ajax({
                    type: "post",
                    url: "likeFunction.php",
                    data: {
                        statement: statement,
                        userID: userID,
                        recipeID: recipeID,
                        commentID: commentID
                    },
                    success: function (data) {
                        $("#output").html(data);
                    }
                });

            });
        }

    </script>
</html>
