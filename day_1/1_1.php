<html>
<?php

foreach ([10, 100, 150] as $max) {
    for ($i = 1; $i <= $max; $i++) {
        if ($i === $max) {
            echo $i . '<br><br>';
        } else {
            echo $i . '-';
        }
    }
}
