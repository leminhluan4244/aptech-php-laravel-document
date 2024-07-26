<?php
// Ví dụ về tham số bắt buộc và tham số tuỳ chọn:
function calculateArea($width, $height = 5) {
    $area = $width * $height;
    echo "Diện tích: $area\n";
  }
  
calculateArea(10); // Gọi hàm với tham số bắt buộc
calculateArea(10, 7); // Gọi hàm với tham số tùy chọn

echo '<br>';
// Ví dụ về tham số mặc định:
function greet($name = "World") {
    echo "Chào mừng bạn $name!\n";
  }
  
greet(); // Gọi hàm với tham số mặc định
greet("John"); // Gọi hàm với tham số do người dùng cung cấp

echo '<br>';
// Ví dụ về tham số biến số:
function printNumbers(...$numbers) {
    foreach ($numbers as $number) {
      echo "$number ";
    }
    echo var_dump($numbers);
  }
printNumbers(1, 2, 3, 4, 5);
  