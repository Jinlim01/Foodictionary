<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$variable = $_SERVER['QUERY_STRING'];
echo $variable;

$choices = explode("&", $variable);
print_r($choices);
echo '<br>';

$type = array();
$style = array();
$a = 0;
$b = 0;
for ($i = 0; $i < sizeof($choices); $i++) {
    if (preg_match('/type/', $choices[$i])) {
        $type[$a] = substr($choices[$i], 5);
        $a++;
    }
    if (preg_match('/style/', $choices[$i])) {
        $style[$b] = substr($choices[$i],6);
        $b++;
    }
}


print_r($type);
echo '<br>';
print_r($style);
echo '<br>';