<?php
    require_once'homepage_data.php';
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
    </head>
    <body>
        <?php 
            for($i = 0 ; $i<sizeof($list1);$i=$i+3){
                echo $list1[$i]['image'] . '<br>';
                echo $list1[$i]['food_name'] . '<br>';
                echo $name[$i] . '<br>';
                
                echo $list1[$i+1]['image'] . '<br>';
                echo $list1[$i+1]['food_name']. '<br>';
                echo $name[$i+1] . '<br>';
               
                echo $list1[$i+2]['image'] . '<br>';
                echo $list1[$i+2]['food_name']. '<br>';
                echo $name[$i+2] . '<br>';
                echo '<hr>';
                
            }
            
      
        ?>
        
        
        
        
        <form action="bin/filter.php" method="post">
            <input type="radio" value="1" name="style">Indian<br>
            <input type="radio" value="2" name="style">Chinese<br>
            <input type="radio" value="3" name="style">Asian<br>
            <input type="radio" value="4" name="style">Italian<br>
            <input type="radio" value="5" name="style">Vegeterian<br>
            <input type="radio" value="6" name="style">Seafood<br>
            <input type="radio" value="7" name="style">Mexican<br>
            <input type="radio" value="8" name="style">Thai<br>
            
            <input type="checkbox" value="7" name="type[]">Meat<br>
            <input type="checkbox" value="8" name="type[]">Fish<br>
            <input type="checkbox" value="9" name="type[]">Rice<br>
            <input type="checkbox" value="10" name="type[]">Eggs<br>
            <input type="checkbox" value="11" name="type[]">Vegetables<br>
            <input type="checkbox" value="12" name="type[]">Nuts<br>
            <input type="checkbox" value="13" name="type[]">Mince meat<br>
            
            
            <input type="submit">
        </form>
        
    </body>
</html>
