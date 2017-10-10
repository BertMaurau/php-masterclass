<html>
<?php

echo calculateIncrement(30, 1);


// calculate total (increment)
function calculateIncrement($max, $inc){
   $total = 0;
   for ($i = 0; $i <= $max; $i+=$inc) {
      $total += $i;
  }
  return $total;
}