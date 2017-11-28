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

            <h3><i class="fa fa-star" aria-hidden="true"></i>&nbsp; <?php echo $list1['rating_number'] ?>/10</h3>
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
                        $steps= explode("<br>",$instruction);
                        foreach($steps as $steps){
                            echo $steps."<br>";
                        }
                   ?>
                </ol>
            </details>
        </div>

        <div class="container comments-container">
            <h2 class="comments"><i class="fa fa-comments"></i>&nbsp; COMMENTS</h2>

            <details class="comment-display">
                <summary>View more comments</summary>
                <div>
                    <span>Username</span>
                    <br>
                    <p>This dish taste like panda</p>
                    <button class="" style="float: right;"><i class="fa fa-trash comment-del-btn"></i></button>
                    <br>
                </div>
                <hr>
                <div>
                    <span>Username</span>
                    <br>
                    <p>This dish taste like panda</p>
                    <button class="" style="float: right;"><i class="fa fa-trash comment-del-btn"></i></button>
                    <br>
                </div>
                <hr>
                <div>
                    <span>Username</span>
                    <br>
                    <p>This dish taste like panda</p>
                    <button class="" style="float: right;"><i class="fa fa-trash comment-del-btn"></i></button>
                    <br>
                </div>
                <hr>
            </details>
            <br>
            <form method="post"role="form">
                <div class="form-group">
                    <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="write a comment..."></textarea>
                    <input type="hidden" id="recipe_id" value="<?php echo $id ?>">
                    <input type="hidden" id="user_id" value="<?php echo $list1['user_id']; ?>"
                </div>
                <button type="button" id="comment_button" class="btn comment-btn">Submit</button>
            </form>
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
     </script>
</html>
