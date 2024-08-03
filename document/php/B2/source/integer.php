<?php
// Khai báo trực tiếp một số nguyên
$age = 30;
echo "Tuổi của tôi là: " . $age . " tuổi.<br>";

// Chuyển đổi từ string sang int (nếu chuỗi chỉ chứa số)
$string_number = "123";
$int_from_string = (int) $string_number;
echo "Chuyển đổi '123' thành số nguyên: " . $int_from_string . "<br>";

// Ép kiểu int từ một chuỗi chứa cả chữ và số (chỉ lấy phần số trước khi gặp chữ)
$mixed_string = "123abc";
$int_from_mixed_string = (int) $mixed_string;
echo "Ép kiểu '123abc' thành số nguyên: " . $int_from_mixed_string . "<br>";
?>
