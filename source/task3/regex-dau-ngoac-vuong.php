$phone_number = "0987654321";
if (preg_match("/^09[0-9]{8}$/", $phone_number)) {
    echo "Đây là số điện thoại di động Việt Nam";
} else {
    echo "Số điện thoại không hợp lệ";
}
