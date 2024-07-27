<?php

$numbers = [3, 7, 2, 15, 9];
$found = false;

do {
    $number = array_shift($numbers);
    echo "Số hiện tại: $number <br>";
    if ($number > 10) {
        echo "Đã tìm thấy số lớn hơn 10: $number <br>";
        $found = true;
    }
} while (!$found && count($numbers) > 0);
