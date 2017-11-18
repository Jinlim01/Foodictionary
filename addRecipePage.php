<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Recipe</title>

        <style>
            .addRecipeForm{
                background-color: #fff;
                padding: 20px;
                border-radius: 50px;
            }

            .add-btn{
                background-color: #f05f40;
                padding: 10px;
                padding-left: 20px;
                padding-right: 20px;
                border: 0px;
                color: #fff;
                border: 2px solid #f05f40;
                font-weight: bold;
            }

            .add-btn:hover{
                color: #f05f40;
                background-color: #fff;
                transition-duration: 0.4s;
            }
        </style>
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="container">
            <h2>Add New Recipe</h2>
            <form class="form-horizontal addRecipeForm" action="AddRecipe.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2">Name</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter dishes name" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Ingredients</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" placeholder="1 onion, 2 garlics, 500g of Pork..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Instructions</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="10" placeholder="1. Prepare a 500ml of boiled water..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Food Type</label>
                    <div class="col-sm-10">
                        <label class="radio-inline"><input type="checkbox" name="type[]">&nbsp; Option 1</label>
                        <label class="radio-inline"><input type="checkbox" name="type[]">&nbsp; Option 2</label>
                        <label class="radio-inline"><input type="checkbox" name="type[]">&nbsp; Option 3</label>
                        <label class="radio-inline"><input type="checkbox" name="type[]">&nbsp; Option 2</label>
                        <label class="radio-inline"><input type="checkbox" name="type[]">&nbsp; Option 3</label>
                        <label class="radio-inline"><input type="checkbox" name="type[]">&nbsp; Option 2</label>
                        <label class="radio-inline"><input type="checkbox" name="type[]">&nbsp; Option 3</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Upload an image</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="file" type="file" name="picture" />
                    </div>
                </div>
                <br>
                <center><input type="submit" class="add-btn"></center>
            </form>
        </div>
    </body>
</html>
