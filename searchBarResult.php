<?php
    require_once("database.php");

    $searchWord = filter_input(INPUT_POST, "search", FILTER_SANITIZE_STRING);

    $searchWord = "'%" . $searchWord . "%'";

    $query1="SELECT * FROM recipe WHERE (food_name LIKE" . $searchWord. "or ingridiants LIKE" . $searchWord. " or instructions LIKE " . $searchWord. ");";
    $statement1 =$db->prepare($query1);
    $statement1->execute();
    $search = $statement1->fetchAll();
    $statement1->closeCursor();

    
    $query3 = "SELECT * FROM food_category";
    $statement3 = $db->prepare($query3);
    $statement3->execute();
    $list3 = $statement3->fetchAll();
    $statement3->closeCursor();


    $query4 = "SELECT * FROM food_type";
    $statement4 = $db->prepare($query4);
    $statement4->execute();
    $list4 = $statement4->fetchAll();
    $statement4->closeCursor();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/homePage.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>
        <?php include 'navbar.php' ?>

        <div class="container-fluid">
            <div class="row">
                <!-- Filter Box -->
                <div class="col-sm-12 col-md-2 col-xs-12 col-md-offset-1 filter-box">
                    <form action="searchResult.php" method="post" class="filter-form">
                        <span class="filter-title">Categories</span><br><br>
                        <?php
                        for ($i = 0; $i < sizeof($list3); $i++) {
                            echo '<input type="radio" value="' . $list3[$i]['food_category_id'] . '" name="style">' . $list3[$i]['food_category_name'] . '<br>';
                        }
                        ?>
                        <hr style="background-color: #f05f40; height: 1px;">
                        <span class="filter-title">Food Type</span><br><br>
                        <?php
                        foreach ($list4 as $list4) {
                            echo '<input type="checkbox" value="' . $list4['food_type_id'] . '" name=type[]">' . $list4['food_type_name'] . '<br>';
                        }
                        ?>
                        <br>
                        <input type="submit" class="filter-btn">
                    </form>
                </div>

                <div class="col-sm-9 col-xs-12">
                    <h2 class="col-md-offset-1">Your Search Result:</h2>
                    <?php
                    foreach($search as $search) {
                        echo
                        '<div class="col-sm-6 col-md-3 menu">
                        <a href="#"><img class="img-responsive recipe-img" src="img/' . $search['image'] . '"></a>
                        <a href="recipePage.php?id=' . $search['recipe_id'] . '"><div class="rating"><span>Rating:<br>' . $search['rating_number'] . '/10.0</span></div></a>
                        <div class="card-body">
                            <h4 class="card-title"><a href="#">' . $search['food_name'] . '</a></h4>
                        </div>
                    </div>';
                    }
                    ?>
                </div>


            </div>
    </body>
</html>

