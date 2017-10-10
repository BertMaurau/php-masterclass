<html>
<?php

echo calculateFac(6);

// n! = n · (n - 1) · (n - 2) · (n - 3) 
function calculateFac($number)
{
    $total = $number;
    for ($i = $number - 1; $i > 0; $i--) {
        $total = $total * $i;
    }
    return $total;
}
