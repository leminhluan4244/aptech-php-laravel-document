<?php
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  echo "$x <br>";
}

echo "<hr>";

$numbers = [3, 7, 2, 9, 5];
$max = $numbers[0];
foreach ($numbers as $number) {
    if ($number > $max) {
        $max = $number;
    }
}
echo "Tôi vừa kiểm tra mảng: [3, 7, 2, 9, 5] và số lớn nhất là: " . $max;