<?php
// Khai báo trực tiếp
$isTrue = true;
$isFalse = false;

// Ép kiểu từ các kiểu dữ liệu khác sang Boolean

// Từ số nguyên (int)
$number = 10;
$bool_from_int = (bool)$number; // true vì số khác 0
$zero = 0;
$bool_from_zero = (bool)$zero; // false vì bằng 0

// Từ số thực (float)
$float_number = 3.14;
$bool_from_float = (bool)$float_number; // true vì khác 0
$zero_float = 0.0;
$bool_from_zero_float = (bool)$zero_float; // false vì bằng 0

// Từ chuỗi (string)
$non_empty_string = "hello";
$bool_from_non_empty_string = (bool)$non_empty_string; // true vì chuỗi không rỗng
$empty_string = "";
$bool_from_empty_string = (bool)$empty_string; // false vì chuỗi rỗng

// Từ mảng (array)
$non_empty_array = [1, 2, 3];
$bool_from_non_empty_array = (bool)$non_empty_array; // true vì mảng không rỗng
$empty_array = [];
$bool_from_empty_array = (bool)$empty_array; // false vì mảng rỗng

// Từ đối tượng (object)
$object = new stdClass();
$bool_from_object = (bool)$object; // true vì đối tượng tồn tại
$null_object = null;
$bool_from_null_object = (bool)$null_object; // false vì đối tượng là null

// Từ null
$null_value = null;
$bool_from_null = (bool)$null_value; // false
?>
