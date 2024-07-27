<?php
// Kiểm tra xem một chuỗi có phải là địa chỉ email hợp lệ hay không
$email1 = "example@example.com";
if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email1)) {
    echo "Email 1: Đây là một địa chỉ email hợp lệ";
} else {
    echo "Email 1: Địa chỉ email không hợp lệ";
}

echo "<hr>";

// Kiểm tra xem một chuỗi có phải là địa chỉ email hợp lệ hay không
$email2 = "example@example.com";
if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email2)) {
    echo "Email 2: Đây là một địa chỉ email hợp lệ";
} else {
    echo "Email 2: Địa chỉ email không hợp lệ";
}
