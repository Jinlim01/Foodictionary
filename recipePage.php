<?php 
    require_once('database.php');
    $id = $_GET['id'];
    
    $query1 = "SELECT * FROM recipe where recipe_id = :recipe_id";
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(":recipe_id", $id);
    $statement1->execute();
    $list1 = $statement1->fetch();
    $statement1->closeCursor();
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
    </head>
    <body>
        <div class="container-fluid pic-container">
            <img class="img-responsive img-test" <?php echo'src="img/'.$list1['image'].'"';?> alt=""/>
            <h1 class="recipe-name"><span><?php echo $list1['food_name'] ?>&nbsp;</span></h1>
        </div>
        
        <div class="container recipe-info">
            
            <a href="editRecipePage.php"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete Recipe</a>
            <a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit Recipe</a>
            <h3><i class="fa fa-star" aria-hidden="true"></i>&nbsp; 8.1/10</h3>
        </div>

        <div class="container ingredients-container">
            <h2 class="ingredients"><i class="fa fa-check-square-o"></i>&nbsp; INGREDIENTS</h2>
            <p>
               <?php  echo $list1['ingridiants'] ; ?>
            </p>
        </div>

        <div class="container steps-container">
            <h2 class="steps"><i class="fa fa-book"></i>&nbsp; STEPS</h2>
            <details>
                <summary>Click to view steps</summary>
                <ol>
                    <li><?php echo $list1['instructions']; ?></li>
                </ol>
            </details>
        </div>

        <div class="container comments-container">
            <h2 class="comments"><i class="fa fa-comments"></i>&nbsp; COMMENTS</h2>
            <details>
                <summary>View more comments</summary>



            </details>
            <br>
            <form method="post"role="form">
                <div class="form-group">
                    <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="write a comment..."></textarea>
                </div>
                <button type="button" id="comment_button" class="btn btn-primary comment-btn">Submit</button>
            </form>
        </div>
    </body>
</html>
