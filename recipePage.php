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
            <img class="img-responsive img-test" src="img/test.jpg" alt=""/>
            <h1 class="recipe-name"><span>Kung Fu Panda &nbsp;<br>&nbsp;Grill Panda</span></h1>
        </div>

        <div class="container ingredients-container">
            <h2 class="ingredients"><i class="fa fa-check-square-o"></i>&nbsp; INGREDIENTS</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>

        <div class="container steps-container">
            <h2 class="steps"><i class="fa fa-book"></i>&nbsp; STEPS</h2>
            <details>
                <summary>Click to view steps</summary>
                <ol>
                    <li>Boiled Water</li>
                    <li>Boiled Water</li>
                    <li>Boiled Water</li>
                    <li>Boiled Water</li>
                    <li>Boiled Water</li>
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
