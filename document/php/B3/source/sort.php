<?php

// Mảng ban đầu
$numbers = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3];

// Sắp xếp tăng dần
echo "sort: ";
sort($numbers);
print_r($numbers); // Output: Array ( [0] => 1 [1] => 1 [2] => 2 [3] => 3 [4] => 3 [5] => 4 [6] => 5 [7] => 5 [8] => 6 [9] => 9 )
echo "<hr>";

// Sắp xếp giảm dần
echo "rsort: ";
rsort($numbers);
print_r($numbers); // Output: Array ( [0] => 9 [1] => 6 [2] => 5 [3] => 5 [4] => 4 [5] => 3 [6] => 3 [7] => 2 [8] => 1 [9] => 1 )
echo "<hr>";
// Mảng kết hợp
$students = [
    'Alice' => 85,
    'Bob' => 92,
    'Charlie' => 78,
];

// Sắp xếp theo điểm số tăng dần
echo "asort: ";
asort($students);
print_r($students); // Output: Array ( [Charlie] => 78 [Alice] => 85 [Bob] => 92 )
echo "<hr>";

// Sắp xếp theo điểm số giảm dần
echo "arsort: ";
arsort($students);
print_r($students); // Output: Array ( [Bob] => 92 [Alice] => 85 [Charlie] => 78 )
echo "<hr>";

// Mảng kết hợp
$colors = ['red' => 1, 'green' => 3, 'blue' => 2];

// Sắp xếp theo khóa tăng dần
echo "ksort: ";
ksort($colors);
print_r($colors); // Output: Array ( [blue] => 2 [green] => 3 [red] => 1 )
echo "<hr>";

// Sắp xếp theo khóa giảm dần
echo "krsort: ";
krsort($colors);
print_r($colors); // Output: Array ( [red] => 1 [green] => 3 [blue] => 2 )
echo "<hr>";
