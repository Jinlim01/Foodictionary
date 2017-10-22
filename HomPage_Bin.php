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
        
    </body>
</html>
