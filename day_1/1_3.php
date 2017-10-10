<html>
<?php

echo generatePyramid($height=4);

// calculate total (increment)
function generatePyramid($height){

   $total_chars_on_line = $height + 2;

   // loop rows
   for ($j = 1; $j <= $height; $j++) {

      echo "row: ";

      // 1
      // 3
      // 5

      // loop width
      for ($i = 1; $i <= $total_chars_on_line; $i++) {
         // check if center
         if($i % 2 === 1 || $i-1 % 2 === 1 || $i+1 % 2 === 1){
            echo ' * ';
         }else{
            echo ' - ';
         }
      }
      echo "<br>";
   }
}