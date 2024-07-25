<?php
// Khai báo trực tiếp một số float
$pi = 3.14;
echo "Giá trị của pi là: " . $pi . "<br>";

// Chuyển đổi từ int sang float
$soNguyen = 10;
$soThucTuSoNguyen = (float) $soNguyen;
echo "Chuyển đổi số nguyên 10 thành float: " . $soThucTuSoNguyen . "<br>";

// Chuyển đổi từ string sang float
$soChuoi = "3.14159";
$soThucTuChuoi = (float) $soChuoi;
echo "Chuyển đổi chuỗi '3.14159' thành float: " . $soThucTuChuoi . "<br>";

// Ép kiểu float
$giaTriBatKy = "123abc";
$soThucEpKieu = (float) $giaTriBatKy;
echo "Ép kiểu chuỗi '123abc' thành float: " . $soThucEpKieu; // Kết quả sẽ là 123

?>
