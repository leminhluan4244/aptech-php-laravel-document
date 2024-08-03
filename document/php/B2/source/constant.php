<?php
define("FIRSTWEEKDAY", 'MONDAY');
echo FIRSTWEEKDAY;         // Lấy hằng số bằng cách chỉ ra tên
echo '<br>';

$firstweek = 'FIRSTWEEKDAY';
echo constant($firstweek), PHP_EOL;   // Lấy hằng số có tên lưu trong biến $firstweek

echo '<hr/>';

// Kiểm tra xem hằng số MYCOLOR có tồn tại không, nếu không
// thì bắt đầu định nghĩa
if (!defined('MYCOLOR'))
{
    define('MYCOLOR', 'Green');
    echo '<br>';
    echo "Tôi vừa tạo ra một hằng số mới";
    echo '<br>';
}

echo '<hr/>';

// Định nghĩa hằng số bằng từ khóa const
const MONDAY = "THỨ HAI";
echo MONDAY;
echo '<br>';

// hằng số là một mảng các ký tự
const DAYOFWEEK = [
    'CHỦ NHẬT', 'THỨ HAI', 'THỨ BA', 'THỨ TƯ', 'THỨ NĂM', 'THỨ SAU', 'THỨ BẢY',
];
// Truy cập đọc hằng số
echo DAYOFWEEK[6]; // THỨ BẢY
