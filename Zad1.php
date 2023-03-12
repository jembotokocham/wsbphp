<?php
// pętla for
function factorial_for($n) {
    $result = 1;
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

// pętla while
function factorial_while($n) {
    $result = 1;
    $i = 1;
    while ($i <= $n) {
        $result *= $i;
        $i++;
    }
    return $result;
}

// rekurencja
function factorial_recursive($n) {
    if ($n === 0) {
        return 1;
    } else {
        return $n * factorial_recursive($n - 1);
    }
}

 ?>
