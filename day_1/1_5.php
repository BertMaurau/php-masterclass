<html>
<?php

$colors = ['red', 'green'];

echo $string = "The menory.. the " . $colors[0] . "  carpet .. the ". $colors[1]. " lawn..<br>";



$colors = array(
   'carpet' => 'red',
   'lawn' => 'green'
);

echo $string = "The menory.. the " . $colors['carpet'] . " carpet .. the ". $colors['lawn']. " lawn..<br>";


foreach ($colors as $key => $value) {
   echo $key .' = '.$value.'<br>';
}